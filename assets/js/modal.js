(function () {
  const modal = document.getElementById('mcs-modal');
  const cards = document.querySelectorAll('.mcs-card[aria-haspopup="dialog"]');
  const galleryCards = document.querySelectorAll('.mcs-gallery-card');

  let lastFocused = null;
  let lightbox = null;
  let lightboxItems = [];
  let lightboxIndex = 0;
  let lightboxLastFocused = null;
  let touchStartX = 0;

  function largerSrc(src) {
    return src ? src.replace(/([?&]w=)\d+/, '$11600') : src;
  }

  function lockScroll() {
    document.body.style.overflow = 'hidden';
  }

  function unlockScroll() {
    if (
      (modal && !modal.hasAttribute('hidden')) ||
      (lightbox && !lightbox.hasAttribute('hidden'))
    ) {
      return;
    }
    document.body.style.overflow = '';
  }

  function focusables(root) {
    return Array.prototype.filter.call(
      root.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'),
      function (node) { return node.offsetParent !== null; }
    );
  }

  function trapTab(e, root) {
    if (e.key !== 'Tab') return;
    const nodes = focusables(root);
    if (!nodes.length) return;
    const first = nodes[0];
    const last = nodes[nodes.length - 1];
    if (e.shiftKey) {
      if (document.activeElement === first || !root.contains(document.activeElement)) {
        e.preventDefault();
        last.focus();
      }
    } else if (document.activeElement === last || !root.contains(document.activeElement)) {
      e.preventDefault();
      first.focus();
    }
  }

  if (modal && cards.length) {
    const backdrop = modal.querySelector('.mcs-modal__backdrop');
    const closeBtn = modal.querySelector('.mcs-modal__close');
    const titleEl  = modal.querySelector('.mcs-modal__title');
    const imgSlot  = modal.querySelector('.mcs-modal__img');
    const detail   = modal.querySelector('.mcs-modal__detail');

    function open(card) {
      lastFocused = card;
      titleEl.textContent = card.querySelector('.mcs-card__title').textContent;

      const srcImg = card.querySelector('.mcs-card__image');
      imgSlot.innerHTML = srcImg ? srcImg.outerHTML : '';

      detail.innerHTML = '';
      const tmpl = card.querySelector('template');
      if (tmpl) detail.appendChild(tmpl.content.cloneNode(true));

      modal.removeAttribute('hidden');
      lockScroll();
      closeBtn.focus();
    }

    function close() {
      modal.setAttribute('hidden', '');
      unlockScroll();
      if (lastFocused) lastFocused.focus();
    }

    cards.forEach(function (card) {
      card.addEventListener('click', function () { open(card); });
      card.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(card); }
      });
    });

    closeBtn.addEventListener('click', close);
    backdrop.addEventListener('click', close);
    modal.addEventListener('keydown', function (e) { trapTab(e, modal); });

    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Escape') return;
      if (lightbox && !lightbox.hasAttribute('hidden')) return;
      if (!modal.hasAttribute('hidden')) close();
    });
  }

  if (!galleryCards.length) return;

  lightbox = document.createElement('div');
  lightbox.className = 'gallery-lightbox';
  lightbox.id = 'gallery-lightbox';
  lightbox.setAttribute('role', 'dialog');
  lightbox.setAttribute('aria-modal', 'true');
  lightbox.setAttribute('aria-labelledby', 'gallery-lightbox-title');
  lightbox.hidden = true;
  lightbox.innerHTML =
    '<div class="gallery-lightbox__backdrop"></div>' +
    '<button type="button" class="mcs-modal__close gallery-lightbox__close" aria-label="Close gallery">&#215;</button>' +
    '<button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" aria-label="Previous image">&#8249;</button>' +
    '<figure class="gallery-lightbox__stage">' +
      '<img class="gallery-lightbox__img" alt="" />' +
      '<figcaption class="gallery-lightbox__caption">' +
        '<span class="gallery-lightbox__title" id="gallery-lightbox-title"></span>' +
        '<span class="gallery-lightbox__meta"></span>' +
        '<span class="gallery-lightbox__count"></span>' +
      '</figcaption>' +
    '</figure>' +
    '<button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" aria-label="Next image">&#8250;</button>' +
    '<div class="gallery-lightbox__thumbs" role="list"></div>';
  document.body.appendChild(lightbox);

  const lbBackdrop = lightbox.querySelector('.gallery-lightbox__backdrop');
  const lbClose = lightbox.querySelector('.gallery-lightbox__close');
  const lbPrev = lightbox.querySelector('.gallery-lightbox__nav--prev');
  const lbNext = lightbox.querySelector('.gallery-lightbox__nav--next');
  const lbImg = lightbox.querySelector('.gallery-lightbox__img');
  const lbTitle = lightbox.querySelector('.gallery-lightbox__title');
  const lbMeta = lightbox.querySelector('.gallery-lightbox__meta');
  const lbCount = lightbox.querySelector('.gallery-lightbox__count');
  const lbThumbs = lightbox.querySelector('.gallery-lightbox__thumbs');

  lightboxItems = Array.prototype.map.call(galleryCards, function (card, i) {
    const img = card.querySelector('.mcs-gallery-card__image');
    const title = card.querySelector('h3');
    const meta = card.querySelector('.mcs-gallery-card__meta');
    card.setAttribute('role', 'button');
    card.setAttribute('tabindex', '0');
    card.setAttribute('aria-haspopup', 'dialog');
    return {
      src: img ? largerSrc(img.getAttribute('src')) : '',
      thumb: img ? img.getAttribute('src') : '',
      alt: img ? img.getAttribute('alt') || '' : '',
      title: title ? title.textContent : '',
      meta: meta ? meta.textContent : '',
      card: card,
      index: i
    };
  });

  lightboxItems.forEach(function (item) {
    const thumb = document.createElement('img');
    thumb.className = 'gallery-lightbox__thumb';
    thumb.src = item.thumb;
    thumb.alt = '';
    thumb.setAttribute('role', 'listitem');
    thumb.tabIndex = 0;
    thumb.addEventListener('click', function () { show(item.index); });
    thumb.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); show(item.index); }
    });
    lbThumbs.appendChild(thumb);
  });

  function show(index) {
    const total = lightboxItems.length;
    lightboxIndex = (index + total) % total;
    const item = lightboxItems[lightboxIndex];
    lbImg.src = item.src;
    lbImg.alt = item.alt;
    lbTitle.textContent = item.title;
    lbMeta.textContent = item.meta;
    lbMeta.hidden = !item.meta;
    lbCount.textContent = (lightboxIndex + 1) + ' / ' + total;
    Array.prototype.forEach.call(lbThumbs.children, function (thumb, i) {
      thumb.classList.toggle('is-active', i === lightboxIndex);
    });
    const activeThumb = lbThumbs.children[lightboxIndex];
    if (activeThumb && activeThumb.scrollIntoView) {
      const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      activeThumb.scrollIntoView({ inline: 'center', block: 'nearest', behavior: reduce ? 'auto' : 'smooth' });
    }
  }

  function openLightbox(index) {
    lightboxLastFocused = lightboxItems[index] && lightboxItems[index].card;
    lightbox.removeAttribute('hidden');
    lockScroll();
    show(index);
    lbClose.focus();
  }

  function closeLightbox() {
    lightbox.setAttribute('hidden', '');
    unlockScroll();
    if (lightboxLastFocused) lightboxLastFocused.focus();
  }

  galleryCards.forEach(function (card, i) {
    card.addEventListener('click', function () { openLightbox(i); });
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLightbox(i); }
    });
  });

  lbClose.addEventListener('click', closeLightbox);
  lbBackdrop.addEventListener('click', closeLightbox);
  lbPrev.addEventListener('click', function () { show(lightboxIndex - 1); });
  lbNext.addEventListener('click', function () { show(lightboxIndex + 1); });

  lightbox.addEventListener('keydown', function (e) {
    trapTab(e, lightbox);
    if (e.key === 'ArrowLeft') { e.preventDefault(); show(lightboxIndex - 1); }
    if (e.key === 'ArrowRight') { e.preventDefault(); show(lightboxIndex + 1); }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && lightbox && !lightbox.hasAttribute('hidden')) {
      closeLightbox();
    }
  });

  lbImg.addEventListener('touchstart', function (e) {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });
  lbImg.addEventListener('touchend', function (e) {
    const dx = e.changedTouches[0].screenX - touchStartX;
    if (Math.abs(dx) < 50) return;
    show(lightboxIndex + (dx < 0 ? 1 : -1));
  }, { passive: true });
})();
