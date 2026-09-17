document.addEventListener('DOMContentLoaded', function () {
  var tabs = document.querySelectorAll('.machine-tab');
  var panels = document.querySelectorAll('.machine-panel');
  if (!tabs.length) return;

  function activateTab(tab) {
    var target = tab.getAttribute('data-target');

    tabs.forEach(function (t) {
      t.classList.remove('is-active');
      t.setAttribute('aria-selected', 'false');
    });
    tab.classList.add('is-active');
    tab.setAttribute('aria-selected', 'true');

    panels.forEach(function (p) {
      p.classList.remove('is-active');
      p.hidden = true;
    });

    var panel = document.getElementById(target);
    if (panel) {
      panel.classList.add('is-active');
      panel.hidden = false;
    }
  }

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      activateTab(this);
    });
  });
});
