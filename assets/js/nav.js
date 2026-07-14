window.initNav = function () {
  var header = document.querySelector('.site-header');
  var alertBanner = document.querySelector('.alert-banner');
  if (!header) return;

  // ── Sticky scroll behavior ──────────────────────────────
  function updateSticky() {
    var offset = alertBanner ? alertBanner.offsetHeight : 0;
    header.classList.toggle('is-sticky', window.scrollY > offset);
    if (alertBanner) {
      alertBanner.classList.toggle('is-collapsed', window.scrollY > 24);
    }
  }
  window.addEventListener('scroll', updateSticky, { passive: true });
  updateSticky();

  // ── Mobile toggle ───────────────────────────────────────
  var mobileToggle = document.querySelector('.mobile-toggle');
  var mobileNav = document.querySelector('.mobile-nav');
  if (mobileToggle && mobileNav) {
    mobileToggle.addEventListener('click', function () {
      var isOpen = mobileNav.classList.toggle('is-open');
      mobileToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ── Search modal ────────────────────────────────────────
  var searchBtn = document.querySelector('.header-search');
  var searchModal = document.getElementById('search-modal');
  if (searchBtn && searchModal && !searchBtn.dataset.bound) {
    searchBtn.dataset.bound = 'true';
    var searchInput = searchModal.querySelector('.search-modal__input');
    var searchClose = searchModal.querySelector('.search-modal__close');
    var searchBackdrop = searchModal.querySelector('.search-modal__backdrop');

    function openSearch() {
      searchModal.hidden = false;
      document.body.classList.add('search-open');
      if (searchInput) searchInput.focus();
    }

    function closeSearch() {
      searchModal.hidden = true;
      document.body.classList.remove('search-open');
      searchBtn.focus();
    }

    searchBtn.addEventListener('click', openSearch);
    if (searchClose) searchClose.addEventListener('click', closeSearch);
    if (searchBackdrop) searchBackdrop.addEventListener('click', closeSearch);

    searchModal.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeSearch();
    });

    searchModal.querySelectorAll('.search-modal__link').forEach(function (link) {
      link.addEventListener('click', closeSearch);
    });
  }

  // ── Email signup prototype state ────────────────────────
  document.querySelectorAll('.email-signup__form').forEach(function (form) {
    if (form.dataset.bound) return;
    form.dataset.bound = 'true';
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var input = form.querySelector('.email-signup__input');
      if (!input || !input.value.trim()) return;
      form.classList.add('is-submitted');
      var thanks = form.parentElement.querySelector('.email-signup__thanks');
      if (!thanks) {
        thanks = document.createElement('p');
        thanks.className = 'email-signup__thanks';
        thanks.setAttribute('role', 'status');
        form.insertAdjacentElement('afterend', thanks);
      }
      thanks.hidden = false;
      thanks.textContent = 'Thanks — you\u2019re on the list. (Prototype signup; Constant Contact integration pending.)';
      input.value = '';
    });
  });

  // ── Escape closes any open dropdown / mega menu ────────
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && document.activeElement && header.contains(document.activeElement)) {
      document.activeElement.blur();
    }
  });

  // ── Close mobile nav on outside click ──────────────────
  document.addEventListener('click', function (e) {
    if (!mobileNav) return;
    if (!header.contains(e.target)) {
      mobileNav.classList.remove('is-open');
      if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
    }
  });
};

window.initNav();
