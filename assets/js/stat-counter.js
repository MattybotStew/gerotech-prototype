(function () {
  var counters = document.querySelectorAll('[data-count]');
  if (!counters.length || !('IntersectionObserver' in window)) return;

  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function formatValue(value, decimals) {
    if (decimals > 0) return value.toFixed(decimals);
    return Math.round(value).toLocaleString('en-US');
  }

  function animateCounter(el) {
    var target = parseFloat(el.dataset.count, 10);
    if (isNaN(target)) return;

    var suffix = el.dataset.suffix || '';
    var prefix = el.dataset.prefix || '';
    var duration = parseInt(el.dataset.duration, 10) || 2000;
    var decimals = parseInt(el.dataset.decimals, 10) || 0;

    if (reducedMotion) {
      el.textContent = prefix + formatValue(target, decimals) + suffix;
      return;
    }

    var start = performance.now();

    function tick(now) {
      var progress = Math.min((now - start) / duration, 1);
      var eased = 1 - Math.pow(1 - progress, 3);
      var current = target * eased;
      el.textContent = prefix + formatValue(current, decimals) + suffix;
      if (progress < 1) requestAnimationFrame(tick);
    }

    requestAnimationFrame(tick);
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.35 });

  counters.forEach(function (el) { observer.observe(el); });
})();
