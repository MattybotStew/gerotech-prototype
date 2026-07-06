(function () {
  const modal = document.getElementById('mcs-modal');
  if (!modal) return;

  const backdrop = modal.querySelector('.mcs-modal__backdrop');
  const closeBtn = modal.querySelector('.mcs-modal__close');
  const titleEl  = modal.querySelector('.mcs-modal__title');
  const imgSlot  = modal.querySelector('.mcs-modal__img');
  const detail   = modal.querySelector('.mcs-modal__detail');

  let lastFocused = null;

  function open(card) {
    lastFocused = card;

    titleEl.textContent = card.querySelector('.mcs-card__title').textContent;

    const srcImg = card.querySelector('.mcs-card__image');
    imgSlot.innerHTML = srcImg ? srcImg.outerHTML : '';

    detail.innerHTML = '';
    const tmpl = card.querySelector('template');
    if (tmpl) detail.appendChild(tmpl.content.cloneNode(true));

    modal.removeAttribute('hidden');
    document.body.style.overflow = 'hidden';
    closeBtn.focus();
  }

  function close() {
    modal.setAttribute('hidden', '');
    document.body.style.overflow = '';
    if (lastFocused) lastFocused.focus();
  }

  document.querySelectorAll('.mcs-card').forEach(function (card) {
    card.addEventListener('click', function () { open(card); });
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(card); }
    });
  });

  closeBtn.addEventListener('click', close);
  backdrop.addEventListener('click', close);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && !modal.hasAttribute('hidden')) close();
  });
})();
