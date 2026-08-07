(function () {
  /** Circumference of progress circle (r=21): 2π × 21 */
  const PROGRESS_CIRC = 2 * Math.PI * 21;

  class HeroSlider {
    constructor(el) {
      this.el = el;
      this.track = el.querySelector('.hero-slider__track');
      this.slides = Array.from(el.querySelectorAll('.slide'));
      this.dots = Array.from(el.querySelectorAll('.dot'));
      this.indexBadge = el.querySelector('.hero-slider__index');
      this.indexNum = el.querySelector('.hero-slider__index-num');
      this.progressBar = el.querySelector('.hero-slider__progress-bar');
      this.peeksHost = el.querySelector('.hero-slider__peeks');
      this.isPeek = el.classList.contains('hero-slider--peek');
      this.current = 0;
      this.total = this.slides.length;
      this.autoplayTimer = null;
      this.progressInterval = null;
      this.autoplayMs = this.isPeek ? 10000 : 6000;
      this.segmentStartedAt = 0;

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

      if (this.progressBar) {
        this.progressBar.style.strokeDasharray = String(PROGRESS_CIRC);
        this.setProgress(0);
      }

      this.goTo(0);
      this.startAutoplay();
    }

    padIndex(i) {
      return String(i + 1).padStart(2, '0');
    }

    /** progress: 0 (empty) → 1 (full orange ring) */
    setProgress(progress) {
      if (!this.progressBar || !this.isPeek) return;
      const p = Math.min(1, Math.max(0, progress));
      this.progressBar.style.strokeDashoffset = String(PROGRESS_CIRC * (1 - p));
    }

    clearProgressAnim() {
      if (this.progressRaf) {
        cancelAnimationFrame(this.progressRaf);
        this.progressRaf = null;
      }
      if (this.progressInterval) {
        clearInterval(this.progressInterval);
        this.progressInterval = null;
      }
      if (this.indexBadge) this.indexBadge.classList.remove('is-progressing');
      this.setProgress(0);
    }

    tickProgress() {
      if (!this.progressBar || !this.isPeek) return;
      if (!this.segmentStartedAt) return;

      const elapsed = performance.now() - this.segmentStartedAt;
      const progress = Math.min(1, elapsed / this.autoplayMs);
      this.setProgress(progress);

      if (progress >= 1 && this.progressInterval) {
        clearInterval(this.progressInterval);
        this.progressInterval = null;
      }
    }

    startProgress() {
      this.clearProgressAnim();
      if (!this.isPeek || !this.progressBar) return;
      this.indexBadge.classList.add('is-progressing');
      this.segmentStartedAt = performance.now();
      this.tickProgress();
      // setInterval (not rAF) — keeps filling when the tab/webview is backgrounded
      this.progressInterval = setInterval(() => this.tickProgress(), 50);
    }

    startAutoplay() {
      clearTimeout(this.autoplayTimer);
      this.startProgress();

      this.autoplayTimer = setTimeout(() => {
        this.next();
      }, this.autoplayMs);
    }

    /** Full restart after slide change (auto or manual). */
    resetAutoplay() {
      clearTimeout(this.autoplayTimer);
      this.autoplayTimer = null;
      this.startAutoplay();
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
  }

  document.querySelectorAll('.hero-slider').forEach(el => new HeroSlider(el));
})();
