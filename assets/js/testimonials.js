(function () {
  class TestimonialCarousel {
    constructor(el) {
      this.el = el;
      this.slides = Array.from(el.querySelectorAll('.testimonial-carousel__slide'));
      this.dots = Array.from(el.querySelectorAll('.testimonial-dot'));
      this.current = 0;
      this.total = this.slides.length;

      this.dots.forEach((dot, i) => {
        dot.addEventListener('click', () => this.goTo(i));
      });

      this.goTo(0);
    }

    goTo(index) {
      this.slides[this.current].classList.remove('is-active');
      if (this.dots[this.current]) this.dots[this.current].classList.remove('is-active');
      this.current = ((index % this.total) + this.total) % this.total;
      this.slides[this.current].classList.add('is-active');
      if (this.dots[this.current]) this.dots[this.current].classList.add('is-active');
    }
  }

  document.querySelectorAll('.testimonial-carousel').forEach(el => new TestimonialCarousel(el));
})();
