window.initNav = function () {
  var header = document.querySelector('.site-header');
  var alertBanner = document.querySelector('.alert-banner');
  if (!header) return;

  // ── Sticky scroll behavior ──────────────────────────────
  function updateSticky() {
    var offset = alertBanner ? alertBanner.offsetHeight : 0;
    header.classList.toggle('is-sticky', window.scrollY > offset);
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

  // ── Escape closes any open dropdown / mega menu ────────
  // Menus open via :hover / :focus-within, so blurring the
  // focused link is enough to dismiss them for keyboard users.
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

// Try immediately — guard inside initNav handles missing header gracefully
window.initNav();
