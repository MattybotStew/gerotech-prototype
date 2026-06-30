(function () {
  var includes = document.querySelectorAll('[data-include]');
  if (!includes.length) return;

  var promises = Array.from(includes).map(function (el) {
    var src = el.getAttribute('data-include');
    return fetch(src)
      .then(function (r) {
        if (!r.ok) throw new Error('HTTP ' + r.status + ' loading ' + src);
        return r.text();
      })
      .then(function (html) {
        el.outerHTML = html;
      });
  });

  Promise.all(promises)
    .then(function () {
      if (typeof window.initNav === 'function') window.initNav();
    })
    .catch(function (err) {
      console.error('[include-partials]', err.message);
      if (location.protocol === 'file:') {
        console.warn('[include-partials] fetch() is blocked on file:// URLs. Run a local server instead:\n  python3 -m http.server 8080\nthen open http://localhost:8080');
      }
    });
})();
