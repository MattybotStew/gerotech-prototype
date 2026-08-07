(function () {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  class HeroSlider {
    constructor(el) {
      this.el = el;
      this.track = el.querySelector('.hero-slider__track');
      this.slides = Array.from(el.querySelectorAll('.slide'));
      this.dots = Array.from(el.querySelectorAll('.dot'));
      this.indexBadge = el.querySelector('.hero-slider__index');
      this.indexNum = el.querySelector('.hero-slider__index-num');
      this.peeksHost = el.querySelector('.hero-slider__peeks');
      this.isPeek = el.classList.contains('hero-slider--peek');
      this.current = 0;
      this.total = this.slides.length;
      this.autoplayTimer = null;
      this.autoplayMs = this.isPeek ? 10000 : 6000;

      const prev = el.querySelector('.slider-arrow--prev');
      const next = el.querySelector('.slider-arrow--next');
      if (prev) prev.addEventListener('click', () => this.prev());
      if (next) next.addEventListener('click', () => this.next());

      this.dots.forEach((dot, i) => {
        dot.addEventListener('click', () => {
          this.goTo(i);
          this.resetAutoplay();
        });
      });

      // Pause autoplay while the user is reading or navigating the carousel
      el.addEventListener('mouseenter', () => this.stopAutoplay());
      el.addEventListener('mouseleave', () => this.startAutoplay());
      el.addEventListener('focusin', () => this.stopAutoplay());
      el.addEventListener('focusout', () => this.startAutoplay());

      this.goTo(0);
      this.startAutoplay();
    }

    padIndex(i) {
      return String(i + 1).padStart(2, '0');
    }

    restartProgress() {
      if (!this.indexBadge || !this.isPeek) return;
      this.indexBadge.classList.remove('is-progressing', 'is-paused');
      if (reducedMotion) return;
      this.indexBadge.style.setProperty('--hero-progress-ms', this.autoplayMs + 'ms');
      // Force reflow so the animation restarts cleanly
      void this.indexBadge.offsetWidth;
      this.indexBadge.classList.add('is-progressing');
    }

    renderPeeks() {
      if (!this.peeksHost) return;
      this.peeksHost.innerHTML = '';

      this.slides.forEach((slide, i) => {
        if (i === this.current) return;

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'hero-slider__peek';
        btn.setAttribute('role', 'tab');
        btn.setAttribute('aria-label', 'Go to slide ' + (i + 1));
        btn.setAttribute('aria-selected', 'false');

        const num = document.createElement('span');
        num.className = 'hero-slider__peek-num';
        num.textContent = this.padIndex(i);

        const eyebrow = document.createElement('span');
        eyebrow.className = 'hero-slider__peek-eyebrow';
        eyebrow.textContent = slide.dataset.peekEyebrow || '';

        const title = document.createElement('span');
        title.className = 'hero-slider__peek-title';
        title.textContent = slide.dataset.peekTitle || '';

        btn.append(num, eyebrow, title);
        btn.addEventListener('click', () => {
          this.goTo(i);
          this.resetAutoplay();
        });
        this.peeksHost.appendChild(btn);
      });
    }

    goTo(index) {
      this.current = ((index % this.total) + this.total) % this.total;
      this.slides.forEach((slide, i) => {
        const active = i === this.current;
        slide.classList.toggle('is-active', active);
        slide.setAttribute('aria-hidden', active ? 'false' : 'true');
        slide.querySelectorAll('a, button').forEach(link => {
          link.tabIndex = active ? 0 : -1;
        });
      });
      this.dots.forEach((dot, i) => {
        dot.classList.toggle('is-active', i === this.current);
        dot.setAttribute('aria-selected', i === this.current ? 'true' : 'false');
      });

      if (this.isPeek) {
        if (this.indexNum) this.indexNum.textContent = this.padIndex(this.current);
        this.renderPeeks();
      } else if (this.track) {
        this.track.style.transform = 'translateX(' + (-100 * this.current) + '%)';
      }
    }

    prev() { this.goTo(this.current - 1); this.resetAutoplay(); }
    next() { this.goTo(this.current + 1); this.resetAutoplay(); }

    startAutoplay() {
      if (reducedMotion) return;
      clearInterval(this.autoplayTimer);
      this.autoplayTimer = setInterval(() => this.next(), this.autoplayMs);
      this.restartProgress();
    }

    stopAutoplay() {
      clearInterval(this.autoplayTimer);
      if (this.indexBadge) this.indexBadge.classList.add('is-paused');
    }

    resetAutoplay() {
      this.stopAutoplay();
      this.startAutoplay();
    }
  }

  document.querySelectorAll('.hero-slider').forEach(el => new HeroSlider(el));
})();
