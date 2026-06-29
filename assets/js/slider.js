(function () {
  class HeroSlider {
    constructor(el) {
      this.el = el;
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

      this.goTo(0);
      this.startAutoplay();
    }

    goTo(index) {
      this.slides[this.current].classList.remove('is-active');
      if (this.dots[this.current]) this.dots[this.current].classList.remove('is-active');
      this.current = ((index % this.total) + this.total) % this.total;
      this.slides[this.current].classList.add('is-active');
      if (this.dots[this.current]) this.dots[this.current].classList.add('is-active');
    }

    prev() { this.goTo(this.current - 1); this.resetAutoplay(); }
    next() { this.goTo(this.current + 1); this.resetAutoplay(); }

    startAutoplay() {
      this.autoplayTimer = setInterval(() => this.next(), 5000);
    }

    resetAutoplay() {
      clearInterval(this.autoplayTimer);
      this.startAutoplay();
    }
  }

  document.querySelectorAll('.hero-slider').forEach(el => new HeroSlider(el));
})();
