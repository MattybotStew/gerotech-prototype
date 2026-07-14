document.addEventListener('DOMContentLoaded', function () {
  var tabs = document.querySelectorAll('.machine-tab');
  var panels = document.querySelectorAll('.machine-panel');
  if (!tabs.length) return;

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      var target = this.getAttribute('data-target');
      tabs.forEach(function (t) {
        t.classList.remove('is-active');
        t.setAttribute('aria-selected', 'false');
      });
      this.classList.add('is-active');
      this.setAttribute('aria-selected', 'true');
      panels.forEach(function (p) { p.classList.remove('is-active'); });
      var panel = document.getElementById(target);
      if (panel) panel.classList.add('is-active');
    });
  });
});
