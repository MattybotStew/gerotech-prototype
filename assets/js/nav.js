(function () {
  const header = document.querySelector('.site-header');
  const alertBanner = document.querySelector('.alert-banner');

  // ── Sticky scroll behavior ──────────────────────────────
  function updateSticky() {
    const offset = alertBanner ? alertBanner.offsetHeight : 0;
    header.classList.toggle('is-sticky', window.scrollY > offset);
  }
  window.addEventListener('scroll', updateSticky, { passive: true });
  updateSticky();

  // ── Mobile toggle ───────────────────────────────────────
  const mobileToggle = document.querySelector('.mobile-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  if (mobileToggle && mobileNav) {
    mobileToggle.addEventListener('click', function () {
      const isOpen = mobileNav.classList.toggle('is-open');
      mobileToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ── Close mobile nav on outside click ──────────────────
  document.addEventListener('click', function (e) {
    if (!mobileNav) return;
    if (!header.contains(e.target)) {
      mobileNav.classList.remove('is-open');
      if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
    }
  });
})();
