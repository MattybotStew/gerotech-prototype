/* ============================================================
   GEROTECH — GALLERY MODULE (exploratory)
   Collection cards → scoped media viewer (images + video).

   Data lives in the markup: each `.gallery-collection` carries a
   `<template class="gallery-collection__data">` whose `[data-type]`
   children describe the collection's media (image | video). Authors
   only edit markup — badges/counts are derived.

   Loaded ONLY by gallery-module-preview.html. Promote into modal.js
   (or keep as its own file) only if the module is adopted.
   ============================================================ */
(function () {
  var root = document.querySelector('[data-gallery]');
  if (!root) return;

  var PLAY_GLYPH =
    '<svg viewBox="0 0 12 12" aria-hidden="true" focusable="false">' +
    '<path fill="currentColor" d="M2 1.2 10.4 6 2 10.8z"/></svg>';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function parseItem(el) {
    return {
      type: el.getAttribute('data-type') === 'video' ? 'video' : 'image',
      src: el.getAttribute('data-src') || '',
      poster: el.getAttribute('data-poster') || '',
      alt: el.getAttribute('data-alt') || '',
      caption: el.getAttribute('data-caption') || ''
    };
  }

  function countLabel(items) {
    var images = 0;
    var videos = 0;
    items.forEach(function (item) {
      if (item.type === 'video') videos += 1;
      else images += 1;
    });
    var parts = [];
    if (images) parts.push(images + (images === 1 ? ' photo' : ' photos'));
    if (videos) parts.push(videos + (videos === 1 ? ' video' : ' videos'));
    return parts.join(' \u00b7 ');
  }

  var collections = Array.prototype.map.call(
    root.querySelectorAll('.gallery-collection'),
    function (card) {
      var tpl = card.querySelector('.gallery-collection__data');
      var items = tpl
        ? Array.prototype.map.call(tpl.content.querySelectorAll('[data-type]'), parseItem)
        : [];
      var hasVideo = items.some(function (item) { return item.type === 'video'; });

      if (hasVideo) card.classList.add('gallery-collection--has-video');

      var badge = card.querySelector('.gallery-collection__badge');
      if (badge) badge.textContent = countLabel(items);

      return {
        card: card,
        items: items,
        title: (card.querySelector('h3') || {}).textContent || '',
        meta: (card.querySelector('.gallery-collection__meta') || {}).textContent || ''
      };
    }
  ).filter(function (collection) { return collection.items.length; });

  if (!collections.length) return;

  /* ── Viewer shell ─────────────────────────────────────── */
  var viewer = document.createElement('div');
  viewer.className = 'gallery-viewer';
  viewer.id = 'gallery-viewer';
  viewer.setAttribute('role', 'dialog');
  viewer.setAttribute('aria-modal', 'true');
  viewer.setAttribute('aria-labelledby', 'gallery-viewer-title');
  viewer.hidden = true;
  viewer.innerHTML =
    '<div class="gallery-viewer__backdrop"></div>' +
    '<button type="button" class="gallery-viewer__close" aria-label="Close gallery">&#215;</button>' +
    '<button type="button" class="gallery-viewer__nav gallery-viewer__nav--prev" aria-label="Previous item">&#8249;</button>' +
    '<figure class="gallery-viewer__stage">' +
      '<div class="gallery-viewer__media"></div>' +
      '<figcaption class="gallery-viewer__caption">' +
        '<span class="gallery-viewer__title" id="gallery-viewer-title"></span>' +
        '<span class="gallery-viewer__meta"></span>' +
        '<span class="gallery-viewer__count"></span>' +
      '</figcaption>' +
    '</figure>' +
    '<button type="button" class="gallery-viewer__nav gallery-viewer__nav--next" aria-label="Next item">&#8250;</button>' +
    '<div class="gallery-viewer__thumbs" role="list"></div>';
  document.body.appendChild(viewer);

  var backdrop = viewer.querySelector('.gallery-viewer__backdrop');
  var closeBtn = viewer.querySelector('.gallery-viewer__close');
  var prevBtn = viewer.querySelector('.gallery-viewer__nav--prev');
  var nextBtn = viewer.querySelector('.gallery-viewer__nav--next');
  var mediaEl = viewer.querySelector('.gallery-viewer__media');
  var titleEl = viewer.querySelector('.gallery-viewer__title');
  var metaEl = viewer.querySelector('.gallery-viewer__meta');
  var countEl = viewer.querySelector('.gallery-viewer__count');
  var thumbsEl = viewer.querySelector('.gallery-viewer__thumbs');

  var activeCollection = null;
  var activeIndex = 0;
  var lastFocused = null;
  var touchStartX = 0;

  function lockScroll() { document.body.style.overflow = 'hidden'; }
  function unlockScroll() { document.body.style.overflow = ''; }

  function stopMedia() {
    var video = mediaEl.querySelector('video');
    if (video) {
      video.pause();
      video.currentTime = 0;
    }
  }

  function renderMedia(item) {
    mediaEl.innerHTML = '';
    if (item.type === 'video') {
      var video = document.createElement('video');
      video.className = 'gallery-viewer__video';
      video.src = item.src;
      if (item.poster) video.poster = item.poster;
      video.controls = true;
      video.playsInline = true;
      video.preload = 'metadata';
      if (item.alt) video.setAttribute('aria-label', item.alt);
      mediaEl.appendChild(video);
    } else {
      var img = document.createElement('img');
      img.className = 'gallery-viewer__img';
      img.src = item.src;
      img.alt = item.alt || '';
      mediaEl.appendChild(img);
    }
  }

  function buildThumbs(collection) {
    thumbsEl.innerHTML = '';
    collection.items.forEach(function (item, i) {
      var thumb = document.createElement('button');
      thumb.type = 'button';
      thumb.className = 'gallery-viewer__thumb';
      thumb.setAttribute('role', 'listitem');
      thumb.setAttribute('aria-label', 'Item ' + (i + 1) + ' of ' + collection.items.length);

      var img = document.createElement('img');
      img.src = item.type === 'video' ? (item.poster || item.src) : item.src;
      img.alt = '';
      thumb.appendChild(img);

      if (item.type === 'video') {
        var badge = document.createElement('span');
        badge.className = 'gallery-viewer__thumb-play';
        badge.innerHTML = PLAY_GLYPH;
        thumb.appendChild(badge);
      }

      thumb.addEventListener('click', function () { show(i); });
      thumbsEl.appendChild(thumb);
    });
  }

  function show(index) {
    var total = activeCollection.items.length;
    stopMedia();
    activeIndex = (index + total) % total;
    var item = activeCollection.items[activeIndex];

    renderMedia(item);
    titleEl.textContent = activeCollection.title;
    metaEl.textContent = item.caption || activeCollection.meta;
    metaEl.hidden = !metaEl.textContent;
    countEl.textContent = (activeIndex + 1) + ' / ' + total;

    Array.prototype.forEach.call(thumbsEl.children, function (thumb, i) {
      thumb.classList.toggle('is-active', i === activeIndex);
    });
    var activeThumb = thumbsEl.children[activeIndex];
    if (activeThumb && activeThumb.scrollIntoView) {
      activeThumb.scrollIntoView({
        inline: 'center',
        block: 'nearest',
        behavior: reduceMotion ? 'auto' : 'smooth'
      });
    }
  }

  function open(collection, index) {
    activeCollection = collection;
    lastFocused = collection.card.querySelector('.gallery-collection__trigger') || collection.card;
    buildThumbs(collection);
    viewer.removeAttribute('hidden');
    lockScroll();
    show(index || 0);
    closeBtn.focus();
  }

  function close() {
    stopMedia();
    viewer.setAttribute('hidden', '');
    unlockScroll();
    if (lastFocused) lastFocused.focus();
  }

  collections.forEach(function (collection) {
    var trigger = collection.card.querySelector('.gallery-collection__trigger');
    if (!trigger) return;
    trigger.addEventListener('click', function () { open(collection, 0); });
  });

  function focusables() {
    return Array.prototype.filter.call(
      viewer.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'),
      function (node) { return node.offsetParent !== null; }
    );
  }

  viewer.addEventListener('keydown', function (e) {
    if (e.key === 'Tab') {
      var nodes = focusables();
      if (!nodes.length) return;
      var first = nodes[0];
      var last = nodes[nodes.length - 1];
      if (e.shiftKey && (document.activeElement === first || !viewer.contains(document.activeElement))) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && (document.activeElement === last || !viewer.contains(document.activeElement))) {
        e.preventDefault();
        first.focus();
      }
      return;
    }
    if (e.key === 'ArrowLeft') { e.preventDefault(); show(activeIndex - 1); }
    if (e.key === 'ArrowRight') { e.preventDefault(); show(activeIndex + 1); }
  });

  closeBtn.addEventListener('click', close);
  backdrop.addEventListener('click', close);
  prevBtn.addEventListener('click', function () { show(activeIndex - 1); });
  nextBtn.addEventListener('click', function () { show(activeIndex + 1); });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !viewer.hasAttribute('hidden')) close();
  });

  mediaEl.addEventListener('touchstart', function (e) {
    if (e.target.tagName === 'VIDEO') return;
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });
  mediaEl.addEventListener('touchend', function (e) {
    if (e.target.tagName === 'VIDEO') return;
    var dx = e.changedTouches[0].screenX - touchStartX;
    if (Math.abs(dx) < 50) return;
    show(activeIndex + (dx < 0 ? 1 : -1));
  }, { passive: true });
})();
