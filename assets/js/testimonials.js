(function () {
  class TestimonialCarousel {
    constructor(el) {
      this.el = el;
      this.row = el.querySelector('.testimonial-carousel__track--slide .testimonial-carousel__row');
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
      this.current = ((index % this.total) + this.total) % this.total;
      this.slides.forEach((slide, i) => {
        const active = i === this.current;
        slide.classList.toggle('is-active', active);
        if (this.row) {
          slide.setAttribute('aria-hidden', active ? 'false' : 'true');
          slide.querySelectorAll('a, button').forEach(link => {
            link.tabIndex = active ? 0 : -1;
          });
        }
      });
      this.dots.forEach((dot, i) => {
        dot.classList.toggle('is-active', i === this.current);
        dot.setAttribute('aria-selected', i === this.current ? 'true' : 'false');
      });
      if (this.row) this.row.style.transform = 'translateX(' + (-100 * this.current) + '%)';
    }
  }

  function initTestimonialCarousels() {
    document.querySelectorAll('.testimonial-carousel').forEach(function (el) {
      if (el.dataset.carouselInit) return;
      el.dataset.carouselInit = '1';
      new TestimonialCarousel(el);
    });
  }

  window.initTestimonialCarousels = initTestimonialCarousels;
  initTestimonialCarousels();
  document.addEventListener('partials:loaded', initTestimonialCarousels);
})();
