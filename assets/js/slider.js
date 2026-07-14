(function () {
  const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  class HeroSlider {
    constructor(el) {
      this.el = el;
      this.track = el.querySelector('.hero-slider__track');
      this.slides = Array.from(el.querySelectorAll('.slide'));
      this.dots = Array.from(el.querySelectorAll('.dot'));
      this.current = 0;
      this.total = this.slides.length;
      this.autoplayTimer = null;

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
      if (this.track) this.track.style.transform = 'translateX(' + (-100 * this.current) + '%)';
    }

    prev() { this.goTo(this.current - 1); this.resetAutoplay(); }
    next() { this.goTo(this.current + 1); this.resetAutoplay(); }

    startAutoplay() {
      if (reducedMotion) return;
      clearInterval(this.autoplayTimer);
      this.autoplayTimer = setInterval(() => this.next(), 6000);
    }

    stopAutoplay() {
      clearInterval(this.autoplayTimer);
    }

    resetAutoplay() {
      this.stopAutoplay();
      this.startAutoplay();
    }
  }

  document.querySelectorAll('.hero-slider').forEach(el => new HeroSlider(el));
})();
