(function () {
  // Fade-in-up on scroll for sections and cards
  if (!('IntersectionObserver' in window)) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  const targets = document.querySelectorAll(
    '.category-card, .news-card, .service-card, .testimonial-card, ' +
    '.stat-pill, .partner-wordmark, .why-feature, .capability-card, .capability-bullet, ' +
    '.section-header, .intro-section__lead, .cta-band__card, ' +
    '.testimonial-split, .credential-band__inner, .tech-partners-section__inner, ' +
    '.mcat-card, .mcs-card, .mcs-gallery-card, .trust-strip__item, .machine-panel'
  );

  targets.forEach(function (el) {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
  });

  const observer = new IntersectionObserver(function (entries) {
    // Stagger the batch that entered together so card grids cascade
    const entering = entries.filter(function (e) { return e.isIntersecting; });
    entering.forEach(function (entry, i) {
      entry.target.style.transitionDelay = (i * 60) + 'ms';
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  targets.forEach(function (el) { observer.observe(el); });
})();
