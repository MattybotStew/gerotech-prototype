/**
 * Legacy page tabs.
 *
 * The service page (ported from the dev site) uses `.to` triggers with a
 * `data-tab` attribute to switch between `.service_tab` panels. The parent
 * theme's jQuery handler was dequeued, so this reproduces the behaviour in
 * vanilla JS, scoped to `.legacy`.
 */
(function () {
  var root = document.querySelector('.legacy');
  if (!root) return;

  var toggles = root.querySelectorAll('.to[data-tab]');
  var panels = root.querySelectorAll('.service_tab');
  if (!toggles.length || !panels.length) return;

  function activate(target) {
    toggles.forEach(function (t) {
      var on = t.getAttribute('data-tab') === target;
      t.classList.toggle('to_active', on);
      t.classList.toggle('to_not_active', !on);
    });
    panels.forEach(function (p) {
      p.style.display = p.id === target ? '' : 'none';
    });
  }

  toggles.forEach(function (t) {
    t.addEventListener('click', function (e) {
      e.preventDefault();
      activate(t.getAttribute('data-tab'));
    });
  });
})();
