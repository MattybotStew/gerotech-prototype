# Gerotech Website Prototype Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Build a two-page static HTML/CSS/JS prototype for Gerotech (CNC machinery distributor, Michigan) — homepage and Engineered Solutions landing page — for a July 7, 2026 client presentation.

**Architecture:** Pure HTML/CSS/JS with zero frameworks. Three CSS files (tokens → components → layout), three JS files (nav, slider, filter), two HTML pages. All images are placeholder divs with dashed borders. CSS custom properties drive all colors/spacing so the client can request tweaks easily.

**Tech Stack:** HTML5, CSS3 (custom properties), vanilla JS (ES6 classes), Plus Jakarta Sans via Google Fonts

---

## File Map

| File | Responsibility |
|------|---------------|
| `assets/css/tokens.css` | All CSS custom properties — colors, fonts, spacing, radii, shadows, z-index |
| `assets/css/components.css` | Alert banner, nav, buttons, cards, pills, testimonial, news items, partner logos, stat strip, CTA band, email signup, footer, service grid, filter tabs, FANUC band |
| `assets/css/layout.css` | Base reset, body, containers, section padding, page-specific layout overrides, responsive breakpoints |
| `assets/js/nav.js` | Sticky header scroll behavior, hover dropdowns, mobile toggle |
| `assets/js/slider.js` | HeroSlider class — prev/next, dot navigation, active slide management |
| `assets/js/filter.js` | ES grid filter tabs — show/hide cards by data-category attribute |
| `index.html` | Homepage — 10 sections in order |
| `engineered-solutions.html` | ES page — 13 sections in order |
| `design-spec.md` | Client-facing reference doc |

---

## Task 1: tokens.css

**Files:**
- Create: `assets/css/tokens.css`

- [ ] **Step 1: Write tokens.css**

```css
/* ============================================================
   GEROTECH — DESIGN TOKENS
   All color/spacing/radius changes go here first.
   ============================================================ */

:root {
  /* ── Brand Colors ─────────────────────────────────────── */
  --clr-orange:        #F38A2C;
  --clr-orange-light:  #F9A94A;
  --clr-ink:           #0D0D0D;
  --clr-dark-bg:       #1C1C21;
  --clr-dark-nav:      #3A3A40;
  --clr-gray-body:     #808080;
  --clr-gray-muted:    #9A9AA8;
  --clr-gray-border:   #D6D6D6;
  --clr-gray-card:     #F9F9FB;
  --clr-gray-band:     #F2F2F2;
  --clr-white:         #FFFFFF;
  --clr-black:         #000000;

  /* ── Typography ───────────────────────────────────────── */
  --font-sans: 'Plus Jakarta Sans', sans-serif;
  --fw-regular:   400;
  --fw-medium:    500;
  --fw-semibold:  600;
  --fw-bold:      700;
  --fw-extrabold: 800;

  /* ── Spacing Scale ────────────────────────────────────── */
  --sp-4:   4px;
  --sp-8:   8px;
  --sp-12:  12px;
  --sp-16:  16px;
  --sp-20:  20px;
  --sp-24:  24px;
  --sp-32:  32px;
  --sp-40:  40px;
  --sp-48:  48px;
  --sp-64:  64px;
  --sp-80:  80px;
  --sp-96:  96px;
  --sp-120: 120px;

  /* ── Border Radius ────────────────────────────────────── */
  --radius-btn:     8px;
  --radius-card:    18px;
  --radius-card-lg: 20px;
  --radius-pill:    99px;

  /* ── Shadows ──────────────────────────────────────────── */
  --shadow-card:       0 4px 24px rgba(0, 0, 0, 0.07);
  --shadow-card-hover: 0 8px 40px rgba(0, 0, 0, 0.13);
  --shadow-nav:        0 2px 16px rgba(0, 0, 0, 0.12);

  /* ── Layout ───────────────────────────────────────────── */
  --max-home: 1200px;
  --max-es:   1120px;

  /* ── Motion ───────────────────────────────────────────── */
  --ease: 0.22s ease;
  --ease-slow: 0.35s ease;

  /* ── Z-Index ──────────────────────────────────────────── */
  --z-alert:    300;
  --z-header:   200;
  --z-dropdown: 100;
}
```

- [ ] **Step 2: Verify**

Open `assets/css/tokens.css` in a text editor and confirm all variables are present. No browser test needed yet.

- [ ] **Step 3: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git init && git add assets/css/tokens.css && git commit -m "feat: add design tokens"
```

---

## Task 2: components.css

**Files:**
- Create: `assets/css/components.css`

- [ ] **Step 1: Write components.css**

```css
/* ============================================================
   GEROTECH — COMPONENTS
   Reusable UI atoms and patterns. Import after tokens.css.
   ============================================================ */

/* ── Alert Banner ─────────────────────────────────────────── */
.alert-banner {
  background: var(--clr-ink);
  color: var(--clr-white);
  font-family: var(--font-sans);
  font-size: 13px;
  font-weight: var(--fw-medium);
  text-align: center;
  padding: var(--sp-8) var(--sp-16);
  position: relative;
  z-index: var(--z-alert);
}
.alert-banner__inner {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--sp-32);
  flex-wrap: wrap;
}
.alert-banner__item {
  display: flex;
  align-items: center;
  gap: var(--sp-8);
}
.alert-banner__label {
  color: var(--clr-gray-muted);
}
.alert-banner__link {
  color: var(--clr-orange);
  text-decoration: none;
  font-weight: var(--fw-semibold);
  transition: color var(--ease);
}
.alert-banner__link:hover {
  color: var(--clr-orange-light);
}

/* ── Site Header ──────────────────────────────────────────── */
.site-header {
  background: var(--clr-dark-nav);
  position: sticky;
  top: 0;
  z-index: var(--z-header);
  transition: box-shadow var(--ease);
}
.site-header.is-sticky {
  box-shadow: var(--shadow-nav);
}
.site-header__inner {
  display: flex;
  align-items: center;
  gap: var(--sp-32);
  padding: var(--sp-16) var(--sp-24);
  max-width: var(--max-home);
  margin: 0 auto;
}
.site-header__logo {
  display: flex;
  align-items: center;
  text-decoration: none;
  margin-right: auto;
}
.logo-placeholder {
  width: 140px;
  height: 40px;
  border: 2px dashed var(--clr-gray-body);
  border-radius: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--clr-gray-muted);
  font-size: 12px;
  font-family: var(--font-sans);
}

/* Nav links */
.site-nav {
  display: flex;
  align-items: center;
  gap: var(--sp-4);
  list-style: none;
  margin: 0;
  padding: 0;
}
.site-nav__item {
  position: relative;
}
.site-nav__link {
  display: flex;
  align-items: center;
  gap: var(--sp-4);
  color: var(--clr-white);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-medium);
  padding: var(--sp-8) var(--sp-12);
  border-radius: var(--radius-btn);
  transition: background var(--ease), color var(--ease);
  white-space: nowrap;
}
.site-nav__link:hover {
  background: rgba(255,255,255,0.08);
  color: var(--clr-orange-light);
}
.site-nav__link .arrow {
  font-size: 10px;
  opacity: 0.6;
}

/* Dropdown */
.dropdown {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  background: var(--clr-white);
  border-radius: var(--radius-card);
  box-shadow: var(--shadow-card-hover);
  padding: var(--sp-8);
  min-width: 180px;
  opacity: 0;
  pointer-events: none;
  transform: translateY(-6px);
  transition: opacity var(--ease), transform var(--ease);
  z-index: var(--z-dropdown);
}
.has-dropdown:hover .dropdown,
.has-dropdown:focus-within .dropdown {
  opacity: 1;
  pointer-events: all;
  transform: translateY(0);
}
.dropdown__link {
  display: block;
  color: var(--clr-ink);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-medium);
  padding: var(--sp-8) var(--sp-12);
  border-radius: 6px;
  transition: background var(--ease);
}
.dropdown__link:hover {
  background: var(--clr-gray-card);
  color: var(--clr-orange);
}

/* Header CTA */
.btn-get-quote {
  background: var(--clr-orange);
  color: var(--clr-white);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-bold);
  padding: var(--sp-8) var(--sp-20);
  border-radius: var(--radius-btn);
  border: none;
  cursor: pointer;
  transition: background var(--ease), transform var(--ease);
  white-space: nowrap;
}
.btn-get-quote:hover {
  background: var(--clr-orange-light);
  transform: translateY(-1px);
}

/* Search icon */
.header-search {
  background: none;
  border: none;
  color: var(--clr-white);
  cursor: pointer;
  padding: var(--sp-8);
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: var(--radius-btn);
  transition: background var(--ease);
  font-size: 18px;
}
.header-search:hover {
  background: rgba(255,255,255,0.08);
}

/* Mobile toggle */
.mobile-toggle {
  display: none;
  background: none;
  border: none;
  color: var(--clr-white);
  cursor: pointer;
  padding: var(--sp-8);
  font-size: 22px;
}

/* Mobile nav */
.mobile-nav {
  display: none;
  flex-direction: column;
  background: var(--clr-dark-nav);
  padding: var(--sp-16) var(--sp-24);
  gap: var(--sp-4);
}
.mobile-nav.is-open {
  display: flex;
}
.mobile-nav__link {
  color: var(--clr-white);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 15px;
  font-weight: var(--fw-medium);
  padding: var(--sp-12) 0;
  border-bottom: 1px solid rgba(255,255,255,0.08);
}

/* ── Buttons ──────────────────────────────────────────────── */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: var(--sp-8);
  font-family: var(--font-sans);
  font-weight: var(--fw-bold);
  font-size: 15px;
  border-radius: var(--radius-btn);
  padding: var(--sp-12) var(--sp-24);
  text-decoration: none;
  border: 2px solid transparent;
  cursor: pointer;
  transition: background var(--ease), color var(--ease), border-color var(--ease), transform var(--ease);
  white-space: nowrap;
}
.btn:hover { transform: translateY(-1px); }

.btn--primary {
  background: var(--clr-orange);
  color: var(--clr-white);
  border-color: var(--clr-orange);
}
.btn--primary:hover {
  background: var(--clr-orange-light);
  border-color: var(--clr-orange-light);
}

.btn--outline-white {
  background: transparent;
  color: var(--clr-white);
  border-color: var(--clr-white);
}
.btn--outline-white:hover {
  background: var(--clr-white);
  color: var(--clr-ink);
}

.btn--outline-dark {
  background: transparent;
  color: var(--clr-ink);
  border-color: var(--clr-ink);
}
.btn--outline-dark:hover {
  background: var(--clr-ink);
  color: var(--clr-white);
}

.btn--outline-orange {
  background: transparent;
  color: var(--clr-orange);
  border-color: var(--clr-orange);
}
.btn--outline-orange:hover {
  background: var(--clr-orange);
  color: var(--clr-white);
}

.btn--lg {
  font-size: 17px;
  padding: var(--sp-16) var(--sp-32);
}

/* ── Eyebrow ──────────────────────────────────────────────── */
.eyebrow {
  font-family: var(--font-sans);
  font-size: 12px;
  font-weight: var(--fw-bold);
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--clr-orange);
}
.eyebrow--white { color: var(--clr-white); opacity: 0.7; }

/* ── Hero Slider ──────────────────────────────────────────── */
.hero-slider {
  position: relative;
  background: var(--clr-dark-bg);
  height: 520px;
  overflow: hidden;
}
.slide {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity var(--ease-slow);
  pointer-events: none;
}
.slide.is-active {
  opacity: 1;
  pointer-events: all;
}
.slide__placeholder {
  width: 100%;
  height: 100%;
  border: 3px dashed var(--clr-dark-nav);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: var(--sp-12);
  color: var(--clr-gray-muted);
  font-family: var(--font-sans);
}
.slide__placeholder-label {
  font-size: 20px;
  font-weight: var(--fw-bold);
  color: var(--clr-white);
}
.slide__placeholder-sub {
  font-size: 14px;
}
.slider-arrow {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.2);
  color: var(--clr-white);
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  font-size: 20px;
  transition: background var(--ease);
  z-index: 2;
}
.slider-arrow:hover { background: rgba(255,255,255,0.22); }
.slider-arrow--prev { left: var(--sp-24); }
.slider-arrow--next { right: var(--sp-24); }
.slider-dots {
  position: absolute;
  bottom: var(--sp-20);
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: var(--sp-8);
  z-index: 2;
}
.dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: rgba(255,255,255,0.35);
  border: none;
  cursor: pointer;
  padding: 0;
  transition: background var(--ease), transform var(--ease);
}
.dot.is-active {
  background: var(--clr-orange);
  transform: scale(1.3);
}

/* ── Image Placeholder ────────────────────────────────────── */
.img-placeholder {
  background: var(--clr-gray-band);
  border: 2px dashed var(--clr-gray-border);
  border-radius: var(--radius-card);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--clr-gray-muted);
  font-family: var(--font-sans);
  font-size: 13px;
  font-weight: var(--fw-medium);
}
.img-placeholder--dark {
  background: var(--clr-dark-nav);
  border-color: var(--clr-gray-body);
  color: var(--clr-gray-muted);
}

/* ── Category Cards (homepage intro) ─────────────────────── */
.category-card {
  background: var(--clr-gray-card);
  border-radius: var(--radius-card-lg);
  padding: var(--sp-32);
  display: flex;
  flex-direction: column;
  gap: var(--sp-16);
  border: 1px solid var(--clr-gray-border);
  transition: box-shadow var(--ease), transform var(--ease);
}
.category-card:hover {
  box-shadow: var(--shadow-card-hover);
  transform: translateY(-3px);
}
.category-card__icon {
  width: 48px;
  height: 48px;
  background: rgba(243,138,44,0.12);
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
}
.category-card__title {
  font-family: var(--font-sans);
  font-size: 18px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  margin: 0;
}
.category-card__body {
  font-family: var(--font-sans);
  font-size: 14px;
  color: var(--clr-gray-body);
  line-height: 1.65;
  margin: 0;
}
.category-card__link {
  color: var(--clr-orange);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-semibold);
  display: inline-flex;
  align-items: center;
  gap: var(--sp-4);
  margin-top: auto;
}
.category-card__link:hover { text-decoration: underline; }

/* ── Partner Logo Row ─────────────────────────────────────── */
.partner-logo {
  background: var(--clr-white);
  border: 2px dashed var(--clr-gray-border);
  border-radius: var(--radius-card);
  display: flex;
  align-items: center;
  justify-content: center;
  height: 72px;
  color: var(--clr-gray-muted);
  font-family: var(--font-sans);
  font-size: 12px;
  font-weight: var(--fw-medium);
  transition: border-color var(--ease);
}
.partner-logo:hover { border-color: var(--clr-orange); }

/* ── Testimonial Split ────────────────────────────────────── */
.testimonial-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  border-radius: var(--radius-card-lg);
  overflow: hidden;
  box-shadow: var(--shadow-card-hover);
}
.testimonial-split__photo {
  min-height: 400px;
}
.testimonial-split__panel {
  background: var(--clr-dark-bg);
  padding: var(--sp-64) var(--sp-48);
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: var(--sp-24);
}
.testimonial-split__quote {
  font-family: var(--font-sans);
  font-size: 18px;
  font-weight: var(--fw-medium);
  color: var(--clr-white);
  line-height: 1.7;
  margin: 0;
}
.testimonial-split__quote::before {
  content: '\201C';
  color: var(--clr-orange);
  font-size: 48px;
  line-height: 1;
  display: block;
  margin-bottom: var(--sp-8);
}
.testimonial-split__name {
  font-family: var(--font-sans);
  font-size: 15px;
  font-weight: var(--fw-bold);
  color: var(--clr-orange);
  margin: 0;
}
.testimonial-split__title {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-muted);
  margin: var(--sp-4) 0 0;
}

/* ── News Feed ────────────────────────────────────────────── */
.news-card {
  display: flex;
  gap: var(--sp-16);
  align-items: flex-start;
}
.news-card__thumb {
  width: 88px;
  height: 72px;
  flex-shrink: 0;
  border-radius: 10px;
}
.news-card__content {}
.news-card__meta {
  font-family: var(--font-sans);
  font-size: 11px;
  font-weight: var(--fw-semibold);
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: var(--clr-orange);
  margin: 0 0 var(--sp-4);
}
.news-card__title {
  font-family: var(--font-sans);
  font-size: 15px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  line-height: 1.4;
  margin: 0 0 var(--sp-8);
}
.news-card__excerpt {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-body);
  line-height: 1.6;
  margin: 0;
}

/* ── CTA Band ─────────────────────────────────────────────── */
.cta-band {
  background: var(--clr-dark-bg);
  padding: var(--sp-64) var(--sp-24);
}
.cta-band__card {
  background: var(--clr-white);
  border-radius: var(--radius-card-lg);
  padding: var(--sp-64) var(--sp-48);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--sp-32);
  max-width: 900px;
  margin: 0 auto;
}
.cta-band__copy {}
.cta-band__eyebrow {
  margin: 0 0 var(--sp-8);
}
.cta-band__headline {
  font-family: var(--font-sans);
  font-size: 32px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  margin: 0;
  line-height: 1.2;
}

/* ── Email Signup ─────────────────────────────────────────── */
.email-signup {
  background: var(--clr-gray-band);
  padding: var(--sp-48) var(--sp-24);
  text-align: center;
}
.email-signup__title {
  font-family: var(--font-sans);
  font-size: 22px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  margin: 0 0 var(--sp-8);
}
.email-signup__sub {
  font-family: var(--font-sans);
  font-size: 14px;
  color: var(--clr-gray-body);
  margin: 0 0 var(--sp-24);
}
.email-signup__form {
  display: flex;
  gap: var(--sp-8);
  max-width: 420px;
  margin: 0 auto;
}
.email-signup__input {
  flex: 1;
  padding: var(--sp-12) var(--sp-16);
  border: 1px solid var(--clr-gray-border);
  border-radius: var(--radius-btn);
  font-family: var(--font-sans);
  font-size: 14px;
  outline: none;
  transition: border-color var(--ease);
}
.email-signup__input:focus { border-color: var(--clr-orange); }
.email-signup__submit {
  background: var(--clr-orange);
  color: var(--clr-white);
  border: none;
  padding: var(--sp-12) var(--sp-20);
  border-radius: var(--radius-btn);
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-bold);
  cursor: pointer;
  transition: background var(--ease);
}
.email-signup__submit:hover { background: var(--clr-orange-light); }

/* ── Footer ───────────────────────────────────────────────── */
.site-footer {
  background: var(--clr-dark-nav);
  color: var(--clr-white);
  padding: var(--sp-64) var(--sp-24) var(--sp-32);
  font-family: var(--font-sans);
}
.site-footer--black { background: var(--clr-ink); }
.site-footer__inner {
  max-width: var(--max-home);
  margin: 0 auto;
}
.site-footer__top {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr 1fr;
  gap: var(--sp-48);
  padding-bottom: var(--sp-48);
  border-bottom: 1px solid rgba(255,255,255,0.1);
}
.site-footer__brand {}
.site-footer__tagline {
  font-size: 13px;
  color: var(--clr-gray-muted);
  line-height: 1.6;
  margin: var(--sp-16) 0;
}
.site-footer__address {
  font-size: 13px;
  color: var(--clr-gray-muted);
  line-height: 1.7;
  font-style: normal;
}
.site-footer__address a {
  color: var(--clr-orange);
  text-decoration: none;
}
.site-footer__address a:hover { text-decoration: underline; }
.site-footer__col-title {
  font-size: 13px;
  font-weight: var(--fw-bold);
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--clr-white);
  margin: 0 0 var(--sp-16);
}
.site-footer__links {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: var(--sp-8);
}
.site-footer__links a {
  color: var(--clr-gray-muted);
  text-decoration: none;
  font-size: 13px;
  transition: color var(--ease);
}
.site-footer__links a:hover { color: var(--clr-orange-light); }
.site-footer__socials {
  display: flex;
  gap: var(--sp-12);
  margin-top: var(--sp-20);
}
.social-icon {
  width: 36px;
  height: 36px;
  background: rgba(255,255,255,0.08);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--clr-white);
  text-decoration: none;
  font-size: 15px;
  transition: background var(--ease);
}
.social-icon:hover { background: var(--clr-orange); }
.site-footer__bottom {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: var(--sp-24);
  font-size: 12px;
  color: var(--clr-gray-muted);
  flex-wrap: wrap;
  gap: var(--sp-8);
}
.site-footer__bottom a {
  color: var(--clr-gray-muted);
  text-decoration: none;
}
.site-footer__bottom a:hover { color: var(--clr-white); }

/* ── Service Card (ES Grid) ───────────────────────────────── */
.service-card {
  background: var(--clr-gray-card);
  border: 1px solid var(--clr-gray-border);
  border-radius: var(--radius-card);
  padding: var(--sp-24);
  display: flex;
  flex-direction: column;
  gap: var(--sp-12);
  transition: box-shadow var(--ease), transform var(--ease);
}
.service-card:hover {
  box-shadow: var(--shadow-card-hover);
  transform: translateY(-3px);
}
.service-card__category {
  display: inline-flex;
  align-items: center;
  background: rgba(243,138,44,0.1);
  color: var(--clr-orange);
  font-family: var(--font-sans);
  font-size: 11px;
  font-weight: var(--fw-bold);
  letter-spacing: 0.06em;
  text-transform: uppercase;
  padding: var(--sp-4) var(--sp-12);
  border-radius: var(--radius-pill);
  width: fit-content;
}
.service-card__title {
  font-family: var(--font-sans);
  font-size: 17px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  margin: 0;
}
.service-card__body {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-body);
  line-height: 1.65;
  margin: 0;
  flex: 1;
}
.service-card__link {
  color: var(--clr-orange);
  text-decoration: none;
  font-family: var(--font-sans);
  font-size: 13px;
  font-weight: var(--fw-semibold);
  margin-top: auto;
}
.service-card__link:hover { text-decoration: underline; }

/* Placeholder card */
.service-card--placeholder {
  border: 2px dashed var(--clr-gray-border);
  background: transparent;
  align-items: center;
  justify-content: center;
  min-height: 180px;
}
.service-card--placeholder span {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-muted);
}

/* ── Filter Tabs ──────────────────────────────────────────── */
.filter-tabs {
  display: flex;
  gap: var(--sp-8);
  flex-wrap: wrap;
}
.filter-tab {
  font-family: var(--font-sans);
  font-size: 13px;
  font-weight: var(--fw-semibold);
  padding: var(--sp-8) var(--sp-20);
  border-radius: var(--radius-pill);
  border: 1px solid var(--clr-gray-border);
  background: var(--clr-white);
  color: var(--clr-gray-body);
  cursor: pointer;
  transition: background var(--ease), color var(--ease), border-color var(--ease);
}
.filter-tab:hover,
.filter-tab.is-active {
  background: var(--clr-orange);
  color: var(--clr-white);
  border-color: var(--clr-orange);
}

/* ── Stat Strip ───────────────────────────────────────────── */
.stat-strip {
  background: var(--clr-gray-band);
  padding: var(--sp-48) var(--sp-24);
}
.stat-pill {
  background: var(--clr-white);
  border: 1px solid var(--clr-gray-border);
  border-radius: var(--radius-pill);
  padding: var(--sp-20) var(--sp-32);
  text-align: center;
  box-shadow: var(--shadow-card);
}
.stat-pill__number {
  font-family: var(--font-sans);
  font-size: 36px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-orange);
  margin: 0;
  line-height: 1;
}
.stat-pill__label {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-body);
  margin: var(--sp-4) 0 0;
}

/* ── FANUC / Credential Band ──────────────────────────────── */
.credential-band {
  background: var(--clr-dark-bg);
  padding: var(--sp-64) var(--sp-24);
}
.credential-band__inner {
  display: flex;
  align-items: center;
  gap: var(--sp-48);
  max-width: var(--max-es);
  margin: 0 auto;
}
.credential-band__badge {
  flex-shrink: 0;
  width: 140px;
  height: 140px;
  border: 2px dashed rgba(255,255,255,0.25);
  border-radius: var(--radius-card);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--clr-gray-muted);
  font-family: var(--font-sans);
  font-size: 11px;
  text-align: center;
}
.credential-band__copy {
  color: var(--clr-white);
}
.credential-band__headline {
  font-family: var(--font-sans);
  font-size: 28px;
  font-weight: var(--fw-extrabold);
  margin: 0 0 var(--sp-12);
  line-height: 1.25;
}
.credential-band__body {
  font-family: var(--font-sans);
  font-size: 15px;
  color: var(--clr-gray-muted);
  line-height: 1.7;
  margin: 0;
}

/* ── Capability Band ──────────────────────────────────────── */
.capability-band {
  background: var(--clr-dark-bg);
  padding: var(--sp-96) var(--sp-24);
}
.capability-band__inner {
  max-width: var(--max-es);
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--sp-64);
  align-items: center;
}
.capability-band__headline {
  font-family: var(--font-sans);
  font-size: 52px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-white);
  margin: var(--sp-12) 0 var(--sp-20);
  line-height: 1.1;
}
.capability-band__body {
  font-family: var(--font-sans);
  font-size: 16px;
  color: var(--clr-gray-muted);
  line-height: 1.7;
  margin: 0 0 var(--sp-32);
}
.capability-band__actions {
  display: flex;
  gap: var(--sp-12);
  flex-wrap: wrap;
}
.capability-bullets {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
  gap: var(--sp-24);
}
.capability-bullet {
  display: flex;
  gap: var(--sp-20);
  align-items: flex-start;
}
.capability-bullet__num {
  font-family: var(--font-sans);
  font-size: 48px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-orange);
  line-height: 1;
  flex-shrink: 0;
  width: 60px;
}
.capability-bullet__text {
  font-family: var(--font-sans);
  font-size: 16px;
  color: var(--clr-white);
  font-weight: var(--fw-medium);
  line-height: 1.5;
  padding-top: var(--sp-8);
}

/* ── Testimonial Cards (ES page) ──────────────────────────── */
.testimonial-card {
  border: 1px solid var(--clr-gray-border);
  border-radius: var(--radius-card-lg);
  padding: var(--sp-40);
  display: flex;
  flex-direction: column;
  gap: var(--sp-20);
  transition: box-shadow var(--ease);
}
.testimonial-card:hover { box-shadow: var(--shadow-card-hover); }
.testimonial-card__quote {
  font-family: var(--font-sans);
  font-size: 16px;
  color: var(--clr-ink);
  line-height: 1.7;
  margin: 0;
}
.testimonial-card__quote::before {
  content: '\201C';
  color: var(--clr-orange);
  font-size: 40px;
  line-height: 1;
  display: block;
  margin-bottom: var(--sp-8);
}
.testimonial-card__name {
  font-family: var(--font-sans);
  font-size: 14px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  margin: 0;
}
.testimonial-card__sub {
  font-family: var(--font-sans);
  font-size: 12px;
  color: var(--clr-gray-muted);
  margin: var(--sp-4) 0 0;
}

/* ── Why Gerotech Feature Rows ────────────────────────────── */
.why-feature {
  display: flex;
  align-items: flex-start;
  gap: var(--sp-16);
  padding: var(--sp-20) 0;
  border-bottom: 1px solid var(--clr-gray-border);
}
.why-feature:last-child { border-bottom: none; }
.why-feature__icon {
  width: 44px;
  height: 44px;
  background: rgba(243,138,44,0.1);
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}
.why-feature__title {
  font-family: var(--font-sans);
  font-size: 16px;
  font-weight: var(--fw-bold);
  color: var(--clr-ink);
  margin: 0 0 var(--sp-4);
}
.why-feature__body {
  font-family: var(--font-sans);
  font-size: 13px;
  color: var(--clr-gray-body);
  line-height: 1.6;
  margin: 0;
}
```

- [ ] **Step 2: Verify file was written**

```bash
wc -l /Users/mattstewart/gerotech-prototype/assets/css/components.css
```
Expected: output showing 400+ lines.

- [ ] **Step 3: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add assets/css/components.css && git commit -m "feat: add component styles"
```

---

## Task 3: layout.css

**Files:**
- Create: `assets/css/layout.css`

- [ ] **Step 1: Write layout.css**

```css
/* ============================================================
   GEROTECH — LAYOUT
   Base reset, containers, section spacing, page-specific grid.
   ============================================================ */

/* ── Reset ────────────────────────────────────────────────── */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  font-family: var(--font-sans);
  color: var(--clr-ink);
  background: var(--clr-white);
  -webkit-font-smoothing: antialiased;
}
img, video { display: block; max-width: 100%; }
button { cursor: pointer; }

/* ── Container ────────────────────────────────────────────── */
.container {
  width: 100%;
  max-width: var(--max-home);
  margin: 0 auto;
  padding: 0 var(--sp-24);
}
.container--es { max-width: var(--max-es); }

/* ── Section Spacing ──────────────────────────────────────── */
.section {
  padding: var(--sp-80) var(--sp-24);
}
.section--sm { padding: var(--sp-48) var(--sp-24); }
.section--lg { padding: var(--sp-120) var(--sp-24); }

/* ── Section Headers ──────────────────────────────────────── */
.section-header {
  margin-bottom: var(--sp-48);
}
.section-header--centered { text-align: center; }
.section-title {
  font-size: 36px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  line-height: 1.2;
  margin: var(--sp-8) 0 0;
}
.section-title--white { color: var(--clr-white); }
.section-body {
  font-size: 16px;
  color: var(--clr-gray-body);
  line-height: 1.7;
  margin: var(--sp-16) 0 0;
  max-width: 640px;
}
.section-body--centered { margin-left: auto; margin-right: auto; }

/* ── Grid Utilities ───────────────────────────────────────── */
.grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-24);
}
.grid-2 {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--sp-24);
}
.grid-4 {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--sp-16);
}
.grid-6 {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: var(--sp-16);
}

/* ── Intro Section (homepage) ─────────────────────────────── */
.intro-section { background: var(--clr-white); }
.intro-section__lead {
  max-width: 780px;
}
.intro-section__headline {
  font-size: 42px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  line-height: 1.15;
  margin: var(--sp-8) 0 var(--sp-16);
}
.intro-section__body {
  font-size: 16px;
  color: var(--clr-gray-body);
  line-height: 1.7;
  margin-bottom: var(--sp-32);
}

/* ── Partner Logos section ────────────────────────────────── */
.partners-section { background: var(--clr-gray-band); }
.partners-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  gap: var(--sp-12);
}

/* ── Testimonial Section (homepage) ──────────────────────── */
.testimonial-section { background: var(--clr-white); }

/* ── News Section ─────────────────────────────────────────── */
.news-section { background: var(--clr-gray-card); }
.news-section__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-32);
  align-items: start;
}

/* ── ES Hero ──────────────────────────────────────────────── */
.es-hero {
  background: var(--clr-dark-bg);
  padding: var(--sp-96) var(--sp-24);
  text-align: center;
}
.es-hero__headline {
  font-size: 72px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-white);
  line-height: 1.05;
  margin: var(--sp-12) 0 var(--sp-20);
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}
.es-hero__body {
  font-size: 17px;
  color: var(--clr-gray-muted);
  line-height: 1.7;
  max-width: 640px;
  margin: 0 auto var(--sp-40);
}
.es-hero__actions {
  display: flex;
  gap: var(--sp-16);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Why Gerotech (ES) ────────────────────────────────────── */
.why-section {
  background: var(--clr-white);
  padding: var(--sp-80) var(--sp-24);
}
.why-section__inner {
  max-width: var(--max-es);
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--sp-64);
  align-items: start;
}
.why-section__copy-headline {
  font-size: 38px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  line-height: 1.2;
  margin: var(--sp-8) 0 var(--sp-20);
}
.why-section__copy-body {
  font-size: 15px;
  color: var(--clr-gray-body);
  line-height: 1.75;
  margin: 0 0 var(--sp-32);
}

/* ── Stat Strip ───────────────────────────────────────────── */
.stat-strip__inner {
  max-width: var(--max-es);
  margin: 0 auto;
}
.stat-strip__eyebrow {
  font-family: var(--font-sans);
  font-size: 22px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  margin: 0 0 var(--sp-32);
  text-align: center;
}
.stat-strip__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--sp-16);
}

/* ── ES Grid Section ──────────────────────────────────────── */
.es-grid-section {
  background: var(--clr-white);
  padding: var(--sp-80) var(--sp-24);
}
.es-grid-section__inner {
  max-width: var(--max-es);
  margin: 0 auto;
}
.es-grid-section__controls {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: var(--sp-20);
  margin-bottom: var(--sp-32);
  flex-wrap: wrap;
}
.es-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-20);
}

/* ── Tech Partners (ES) ───────────────────────────────────── */
.tech-partners-section {
  background: var(--clr-gray-band);
  padding: var(--sp-80) var(--sp-24);
}
.tech-partners-section__inner {
  max-width: var(--max-es);
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--sp-64);
  align-items: center;
}
.tech-partners-section__copy-headline {
  font-size: 32px;
  font-weight: var(--fw-extrabold);
  color: var(--clr-ink);
  line-height: 1.2;
  margin: var(--sp-8) 0 var(--sp-16);
}
.tech-partners-section__copy-body {
  font-size: 15px;
  color: var(--clr-gray-body);
  line-height: 1.75;
  margin: 0 0 var(--sp-24);
}
.tech-logo-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--sp-12);
}

/* ── ES Testimonials ──────────────────────────────────────── */
.es-testimonials-section {
  background: var(--clr-white);
  padding: var(--sp-80) var(--sp-24);
}
.es-testimonials-section__inner {
  max-width: var(--max-es);
  margin: 0 auto;
}

/* ── Responsive ───────────────────────────────────────────── */
@media (max-width: 1024px) {
  .es-hero__headline { font-size: 54px; }
  .capability-band__headline { font-size: 42px; }
  .grid-3 { grid-template-columns: repeat(2, 1fr); }
  .es-grid { grid-template-columns: repeat(2, 1fr); }
  .site-footer__top { grid-template-columns: 1fr 1fr; gap: var(--sp-32); }
  .tech-logo-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  /* Nav */
  .site-nav,
  .btn-get-quote,
  .header-search { display: none; }
  .mobile-toggle { display: flex; }

  /* Typography */
  .es-hero__headline { font-size: 38px; }
  .intro-section__headline { font-size: 30px; }
  .section-title { font-size: 26px; }
  .capability-band__headline { font-size: 34px; }

  /* Layouts */
  .grid-3,
  .grid-4,
  .grid-6,
  .es-grid,
  .news-section__grid,
  .partners-grid { grid-template-columns: 1fr; }

  .why-section__inner,
  .capability-band__inner,
  .tech-partners-section__inner { grid-template-columns: 1fr; }

  .testimonial-split { grid-template-columns: 1fr; }
  .testimonial-split__photo { min-height: 240px; }

  .cta-band__card {
    flex-direction: column;
    text-align: center;
    padding: var(--sp-40) var(--sp-24);
  }

  .email-signup__form { flex-direction: column; }

  .stat-strip__grid { grid-template-columns: repeat(2, 1fr); }

  .site-footer__top { grid-template-columns: 1fr; }

  .credential-band__inner { flex-direction: column; }

  .btn--lg { width: 100%; }
  .es-hero__actions { flex-direction: column; align-items: center; }
  .capability-band__actions { flex-direction: column; }
}

@media (max-width: 480px) {
  .alert-banner__inner { gap: var(--sp-12); flex-direction: column; }
  .stat-strip__grid { grid-template-columns: 1fr; }
  .grid-2 { grid-template-columns: 1fr; }
  .es-hero__headline { font-size: 30px; }
}
```

- [ ] **Step 2: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add assets/css/layout.css && git commit -m "feat: add layout styles and responsive breakpoints"
```

---

## Task 4: nav.js

**Files:**
- Create: `assets/js/nav.js`

- [ ] **Step 1: Write nav.js**

```js
(function () {
  const header = document.querySelector('.site-header');
  const alertBanner = document.querySelector('.alert-banner');

  // ── Sticky scroll behavior ──────────────────────────────
  function updateSticky() {
    const offset = alertBanner ? alertBanner.offsetHeight : 0;
    header.classList.toggle('is-sticky', window.scrollY > offset);
  }
  window.addEventListener('scroll', updateSticky, { passive: true });
  updateSticky();

  // ── Mobile toggle ───────────────────────────────────────
  const mobileToggle = document.querySelector('.mobile-toggle');
  const mobileNav = document.querySelector('.mobile-nav');
  if (mobileToggle && mobileNav) {
    mobileToggle.addEventListener('click', function () {
      const isOpen = mobileNav.classList.toggle('is-open');
      mobileToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ── Close mobile nav on outside click ──────────────────
  document.addEventListener('click', function (e) {
    if (!mobileNav) return;
    if (!header.contains(e.target)) {
      mobileNav.classList.remove('is-open');
      if (mobileToggle) mobileToggle.setAttribute('aria-expanded', 'false');
    }
  });
})();
```

- [ ] **Step 2: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add assets/js/nav.js && git commit -m "feat: add nav JS (sticky + mobile toggle)"
```

---

## Task 5: slider.js

**Files:**
- Create: `assets/js/slider.js`

- [ ] **Step 1: Write slider.js**

```js
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
```

- [ ] **Step 2: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add assets/js/slider.js && git commit -m "feat: add hero slider JS with autoplay"
```

---

## Task 6: filter.js

**Files:**
- Create: `assets/js/filter.js`

- [ ] **Step 1: Write filter.js**

```js
(function () {
  const tabs = document.querySelectorAll('.filter-tab');
  const cards = document.querySelectorAll('.service-card[data-category]');

  if (!tabs.length) return;

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      tabs.forEach(t => t.classList.remove('is-active'));
      tab.classList.add('is-active');

      const filter = tab.dataset.filter;

      cards.forEach(function (card) {
        const match = filter === 'all' || card.dataset.category === filter;
        card.style.display = match ? '' : 'none';
      });
    });
  });
})();
```

- [ ] **Step 2: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add assets/js/filter.js && git commit -m "feat: add ES grid filter JS"
```

---

## Task 7: index.html

**Files:**
- Create: `index.html`

- [ ] **Step 1: Write index.html**

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gerotech — Michigan's Premier CNC Machinery Distributor</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tokens.css" />
  <link rel="stylesheet" href="assets/css/components.css" />
  <link rel="stylesheet" href="assets/css/layout.css" />
</head>
<body>

  <!-- ============================================================
       SECTION 1: Alert Banner
       ============================================================ -->
  <div class="alert-banner" role="banner" aria-label="Contact information">
    <div class="alert-banner__inner">
      <div class="alert-banner__item">
        <span class="alert-banner__label">Headquarters &amp; Sales:</span>
        <a class="alert-banner__link" href="tel:+17343797788">734-379-7788</a>
      </div>
      <div class="alert-banner__item">
        <span class="alert-banner__label">Service:</span>
        <a class="alert-banner__link" href="tel:+12484768787">248-476-8787</a>
      </div>
      <div class="alert-banner__item">
        <span class="alert-banner__label">Grand Rapids:</span>
        <a class="alert-banner__link" href="tel:+16167351100">616-735-1100</a>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SECTION 2: Sticky Header
       ============================================================ -->
  <header class="site-header" role="banner">
    <div class="site-header__inner">
      <a class="site-header__logo" href="index.html" aria-label="Gerotech Home">
        <div class="logo-placeholder">LOGO</div>
      </a>

      <nav aria-label="Main navigation">
        <ul class="site-nav">
          <li class="site-nav__item">
            <a class="site-nav__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">
              Machines <span aria-hidden="true">↗</span>
            </a>
          </li>
          <li class="site-nav__item">
            <a class="site-nav__link" href="engineered-solutions.html">Engineered Solutions</a>
          </li>
          <li class="site-nav__item has-dropdown">
            <a class="site-nav__link" href="#" aria-haspopup="true">
              Support <span class="arrow" aria-hidden="true">▼</span>
            </a>
            <div class="dropdown" role="menu">
              <a class="dropdown__link" href="#" role="menuitem">Service Request</a>
              <a class="dropdown__link" href="#" role="menuitem">Parts</a>
              <a class="dropdown__link" href="#" role="menuitem">Training</a>
              <a class="dropdown__link" href="#" role="menuitem">Documentation</a>
            </div>
          </li>
          <li class="site-nav__item has-dropdown">
            <a class="site-nav__link" href="#" aria-haspopup="true">
              About <span class="arrow" aria-hidden="true">▼</span>
            </a>
            <div class="dropdown" role="menu">
              <a class="dropdown__link" href="#" role="menuitem">Our Story</a>
              <a class="dropdown__link" href="#" role="menuitem">Team</a>
              <a class="dropdown__link" href="#" role="menuitem">Careers</a>
              <a class="dropdown__link" href="#" role="menuitem">Contact</a>
            </div>
          </li>
        </ul>
      </nav>

      <a class="btn-get-quote" href="#">Get a Quote</a>
      <button class="header-search" aria-label="Search">&#128269;</button>
      <button class="mobile-toggle" aria-label="Open menu" aria-expanded="false">&#9776;</button>
    </div>

    <nav class="mobile-nav" aria-label="Mobile navigation">
      <a class="mobile-nav__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">Machines ↗</a>
      <a class="mobile-nav__link" href="engineered-solutions.html">Engineered Solutions</a>
      <a class="mobile-nav__link" href="#">Support</a>
      <a class="mobile-nav__link" href="#">About</a>
      <a class="mobile-nav__link" href="#">Get a Quote</a>
    </nav>
  </header>

  <main>

    <!-- ============================================================
         SECTION 3: Hero Slider
         ============================================================ -->
    <section class="hero-slider" aria-label="Homepage hero carousel">
      <!-- Slide 1 -->
      <div class="slide is-active" role="tabpanel" aria-label="Slide 1 of 3">
        <div class="slide__placeholder">
          <div class="slide__placeholder-label">Slide 1 — CNC Machinery</div>
          <div class="slide__placeholder-sub">Image + headline placeholder</div>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="slide" role="tabpanel" aria-label="Slide 2 of 3">
        <div class="slide__placeholder">
          <div class="slide__placeholder-label">Slide 2 — Engineered Solutions</div>
          <div class="slide__placeholder-sub">Image + headline placeholder</div>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="slide" role="tabpanel" aria-label="Slide 3 of 3">
        <div class="slide__placeholder">
          <div class="slide__placeholder-label">Slide 3 — Support &amp; Service</div>
          <div class="slide__placeholder-sub">Image + headline placeholder</div>
        </div>
      </div>

      <!-- Controls -->
      <button class="slider-arrow slider-arrow--prev" aria-label="Previous slide">&#8592;</button>
      <button class="slider-arrow slider-arrow--next" aria-label="Next slide">&#8594;</button>
      <div class="slider-dots" role="tablist" aria-label="Slide navigation">
        <button class="dot is-active" role="tab" aria-label="Go to slide 1"></button>
        <button class="dot" role="tab" aria-label="Go to slide 2"></button>
        <button class="dot" role="tab" aria-label="Go to slide 3"></button>
      </div>
    </section>

    <!-- ============================================================
         SECTION 4: Intro + 3 Category Cards
         ============================================================ -->
    <section class="intro-section section">
      <div class="container">
        <div class="intro-section__lead">
          <p class="eyebrow">Since 1987</p>
          <h2 class="intro-section__headline">Michigan's Premier CNC Machinery Distributor &amp; Engineering Partner</h2>
          <p class="intro-section__body">
            For nearly four decades, Gerotech has been the trusted source for cutting-edge CNC machinery and 
            application-driven engineering solutions across Michigan and beyond. We don't just sell machines — 
            we partner with manufacturers to keep them running faster, safer, and smarter.
          </p>
          <a class="btn btn--outline-dark" href="#">Learn About Gerotech</a>
        </div>

        <div class="grid-3" style="margin-top: var(--sp-48);">
          <!-- Card 1: Machines -->
          <article class="category-card">
            <div class="category-card__icon">⚙️</div>
            <h3 class="category-card__title">CNC Machines</h3>
            <p class="category-card__body">
              Premium CNC machining centers, turning centers, EDM, and more from the world's leading 
              manufacturers — matched to your production requirements.
            </p>
            <a class="category-card__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">Browse Machines ↗</a>
          </article>

          <!-- Card 2: Engineered Solutions -->
          <article class="category-card">
            <div class="category-card__icon">🔧</div>
            <h3 class="category-card__title">Engineered Solutions</h3>
            <p class="category-card__body">
              Machine modification, customization, and full automation integration — engineered around 
              your existing equipment and production goals.
            </p>
            <a class="category-card__link" href="engineered-solutions.html">Explore Solutions →</a>
          </article>

          <!-- Card 3: Support -->
          <article class="category-card">
            <div class="category-card__icon">🛠️</div>
            <h3 class="category-card__title">Service &amp; Support</h3>
            <p class="category-card__body">
              Factory-trained technicians, responsive service, and comprehensive support programs to 
              maximize uptime and protect your investment.
            </p>
            <a class="category-card__link" href="#">View Support Options →</a>
          </article>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 5: Partner Logo Row (12 logos)
         ============================================================ -->
    <section class="partners-section section--sm">
      <div class="container">
        <div class="section-header section-header--centered">
          <p class="eyebrow">Proud to Represent</p>
          <h2 class="section-title">World-Class Manufacturing Partners</h2>
        </div>
        <div class="partners-grid">
          <div class="partner-logo">Partner 1</div>
          <div class="partner-logo">Partner 2</div>
          <div class="partner-logo">Partner 3</div>
          <div class="partner-logo">Partner 4</div>
          <div class="partner-logo">Partner 5</div>
          <div class="partner-logo">Partner 6</div>
          <div class="partner-logo">Partner 7</div>
          <div class="partner-logo">Partner 8</div>
          <div class="partner-logo">Partner 9</div>
          <div class="partner-logo">Partner 10</div>
          <div class="partner-logo">Partner 11</div>
          <div class="partner-logo">Partner 12</div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 6: Testimonial Split
         ============================================================ -->
    <section class="testimonial-section section">
      <div class="container">
        <div class="testimonial-split">
          <div class="img-placeholder testimonial-split__photo img-placeholder--dark">
            Photo — Michael Rudisill
          </div>
          <div class="testimonial-split__panel">
            <blockquote>
              <p class="testimonial-split__quote">
                I have never had such consistent, quality customer support from a company and an overall 
                great experience. Every contact has been timely, there has been good communication, friendly 
                service, and each time they are happy to educate me along the way and I walk away with more 
                information and peace of mind than I had hoped for.
              </p>
              <footer>
                <p class="testimonial-split__name">Michael Rudisill</p>
                <p class="testimonial-split__title">Gerotech Customer</p>
              </footer>
            </blockquote>
            <a class="btn btn--outline-white" href="#">Learn More About Gerotech</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 7: News Feed
         ============================================================ -->
    <section class="news-section section">
      <div class="container">
        <div class="section-header">
          <p class="eyebrow">Stay Informed</p>
          <h2 class="section-title">Latest Projects &amp; News</h2>
        </div>
        <div class="news-section__grid">
          <!-- News Item 1 -->
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">Project — June 2025</p>
              <h3 class="news-card__title">Automated Robotic Cell Delivered to Tier-1 Automotive Supplier</h3>
              <p class="news-card__excerpt">
                Gerotech engineers designed and integrated a complete FANUC robotic automation cell, 
                reducing cycle times by 38% for a major Michigan supplier.
              </p>
            </div>
          </article>
          <!-- News Item 2 -->
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">News — May 2025</p>
              <h3 class="news-card__title">Gerotech Expands Grand Rapids Service Territory</h3>
              <p class="news-card__excerpt">
                Our Grand Rapids office is now fully staffed with factory-trained service technicians 
                serving manufacturers across West Michigan.
              </p>
            </div>
          </article>
          <!-- News Item 3 -->
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">Project — April 2025</p>
              <h3 class="news-card__title">Hydraulic Workholding System Installed on Legacy Okuma</h3>
              <p class="news-card__excerpt">
                A custom hydraulic workholding and auto-door system breathed new life into a legacy 
                machining center, extending its productive life by years.
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 8: CTA Band
         ============================================================ -->
    <section class="cta-band" aria-label="Call to action">
      <div class="cta-band__card">
        <div class="cta-band__copy">
          <p class="eyebrow cta-band__eyebrow">Take Action Now</p>
          <h2 class="cta-band__headline">Put our engineers to work on your project</h2>
        </div>
        <a class="btn btn--primary btn--lg" href="#">Engage With Us Today</a>
      </div>
    </section>

    <!-- ============================================================
         SECTION 9: Email Signup
         ============================================================ -->
    <section class="email-signup" aria-label="Mailing list signup">
      <h2 class="email-signup__title">Stay in the Loop</h2>
      <p class="email-signup__sub">Get the latest projects, news, and machine updates from Gerotech.</p>
      <form class="email-signup__form" action="#" method="post" novalidate>
        <label for="email-input" class="sr-only">Email address</label>
        <input
          class="email-signup__input"
          id="email-input"
          type="email"
          name="email"
          placeholder="your@email.com"
          required
          autocomplete="email"
        />
        <button class="email-signup__submit" type="submit">Sign Up</button>
      </form>
    </section>

  </main>

  <!-- ============================================================
       SECTION 10: Footer
       ============================================================ -->
  <footer class="site-footer" role="contentinfo">
    <div class="site-footer__inner">
      <div class="site-footer__top">
        <div class="site-footer__brand">
          <div class="logo-placeholder">LOGO</div>
          <p class="site-footer__tagline">
            Michigan's Premier CNC Machinery Distributor &amp; Engineering Solutions Provider — 
            serving manufacturers since 1987.
          </p>
          <address class="site-footer__address">
            29220 Commerce Drive<br />
            Flat Rock, MI 48134<br />
            <a href="tel:+17343797788">734-379-7788</a>
          </address>
          <div class="site-footer__socials">
            <a class="social-icon" href="#" aria-label="LinkedIn">in</a>
            <a class="social-icon" href="#" aria-label="Facebook">f</a>
            <a class="social-icon" href="#" aria-label="YouTube">▶</a>
          </div>
        </div>

        <div>
          <p class="site-footer__col-title">Machines</p>
          <ul class="site-footer__links">
            <li><a href="#">Machining Centers</a></li>
            <li><a href="#">Turning Centers</a></li>
            <li><a href="#">EDM</a></li>
            <li><a href="#">Automation</a></li>
            <li><a href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">All Machines ↗</a></li>
          </ul>
        </div>

        <div>
          <p class="site-footer__col-title">Solutions &amp; Support</p>
          <ul class="site-footer__links">
            <li><a href="engineered-solutions.html">Engineered Solutions</a></li>
            <li><a href="#">Service Request</a></li>
            <li><a href="#">Parts</a></li>
            <li><a href="#">Training</a></li>
            <li><a href="#">Documentation</a></li>
          </ul>
        </div>

        <div>
          <p class="site-footer__col-title">Company</p>
          <ul class="site-footer__links">
            <li><a href="#">About Gerotech</a></li>
            <li><a href="#">Our Team</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>

      <div class="site-footer__bottom">
        <span>&copy; 2025 Gerotech, Inc. All rights reserved.</span>
        <div style="display:flex; gap: var(--sp-16);">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="assets/js/nav.js"></script>
  <script src="assets/js/slider.js"></script>
</body>
</html>
```

- [ ] **Step 2: Open in browser and verify**

```bash
open /Users/mattstewart/gerotech-prototype/index.html
```

Check:
- Alert banner shows 3 phone numbers as clickable links
- Header is dark with nav links, orange "Get a Quote" button
- Hero slider is dark 520px tall with arrows and dots; clicking arrows/dots cycles slides
- Intro section shows headline + 3 cards
- Partner grid shows 12 placeholder tiles in 2 rows of 6
- Testimonial split: left placeholder | dark right panel with quote
- News feed: 3 items with thumbnails
- CTA band: dark bg, white card, orange button
- Email signup: light gray, form with email input
- Footer: dark, 4-column layout

- [ ] **Step 3: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add index.html && git commit -m "feat: build homepage (10 sections)"
```

---

## Task 8: engineered-solutions.html

**Files:**
- Create: `engineered-solutions.html`

- [ ] **Step 1: Write engineered-solutions.html**

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Engineered Solutions — Gerotech</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tokens.css" />
  <link rel="stylesheet" href="assets/css/components.css" />
  <link rel="stylesheet" href="assets/css/layout.css" />
</head>
<body>

  <!-- ============================================================
       SECTION 1: Alert Banner
       ============================================================ -->
  <div class="alert-banner" role="banner" aria-label="Contact information">
    <div class="alert-banner__inner">
      <div class="alert-banner__item">
        <span class="alert-banner__label">Headquarters &amp; Sales:</span>
        <a class="alert-banner__link" href="tel:+17343797788">734-379-7788</a>
      </div>
      <div class="alert-banner__item">
        <span class="alert-banner__label">Service:</span>
        <a class="alert-banner__link" href="tel:+12484768787">248-476-8787</a>
      </div>
      <div class="alert-banner__item">
        <span class="alert-banner__label">Grand Rapids:</span>
        <a class="alert-banner__link" href="tel:+16167351100">616-735-1100</a>
      </div>
    </div>
  </div>

  <!-- ============================================================
       SECTION 2: Sticky Header
       ============================================================ -->
  <header class="site-header" role="banner">
    <div class="site-header__inner">
      <a class="site-header__logo" href="index.html" aria-label="Gerotech Home">
        <div class="logo-placeholder">LOGO</div>
      </a>

      <nav aria-label="Main navigation">
        <ul class="site-nav">
          <li class="site-nav__item">
            <a class="site-nav__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">
              Machines <span aria-hidden="true">↗</span>
            </a>
          </li>
          <li class="site-nav__item">
            <a class="site-nav__link" href="engineered-solutions.html" aria-current="page">Engineered Solutions</a>
          </li>
          <li class="site-nav__item has-dropdown">
            <a class="site-nav__link" href="#" aria-haspopup="true">
              Support <span class="arrow" aria-hidden="true">▼</span>
            </a>
            <div class="dropdown" role="menu">
              <a class="dropdown__link" href="#" role="menuitem">Service Request</a>
              <a class="dropdown__link" href="#" role="menuitem">Parts</a>
              <a class="dropdown__link" href="#" role="menuitem">Training</a>
              <a class="dropdown__link" href="#" role="menuitem">Documentation</a>
            </div>
          </li>
          <li class="site-nav__item has-dropdown">
            <a class="site-nav__link" href="#" aria-haspopup="true">
              About <span class="arrow" aria-hidden="true">▼</span>
            </a>
            <div class="dropdown" role="menu">
              <a class="dropdown__link" href="#" role="menuitem">Our Story</a>
              <a class="dropdown__link" href="#" role="menuitem">Team</a>
              <a class="dropdown__link" href="#" role="menuitem">Careers</a>
              <a class="dropdown__link" href="#" role="menuitem">Contact</a>
            </div>
          </li>
        </ul>
      </nav>

      <a class="btn-get-quote" href="#">Get a Quote</a>
      <button class="header-search" aria-label="Search">&#128269;</button>
      <button class="mobile-toggle" aria-label="Open menu" aria-expanded="false">&#9776;</button>
    </div>

    <nav class="mobile-nav" aria-label="Mobile navigation">
      <a class="mobile-nav__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">Machines ↗</a>
      <a class="mobile-nav__link" href="engineered-solutions.html">Engineered Solutions</a>
      <a class="mobile-nav__link" href="#">Support</a>
      <a class="mobile-nav__link" href="#">About</a>
      <a class="mobile-nav__link" href="#">Get a Quote</a>
    </nav>
  </header>

  <main>

    <!-- ============================================================
         SECTION 3: ES Hero
         ============================================================ -->
    <section class="es-hero" aria-label="Engineered Solutions hero">
      <div class="container container--es">
        <p class="eyebrow eyebrow--white">Engineering-Driven Manufacturing Solutions</p>
        <h1 class="es-hero__headline">Your Manufacturing Solutions Partner</h1>
        <p class="es-hero__body">
          From machine modification and customization to full automation cells, Gerotech engineers 
          solutions that keep manufacturers running faster, safer, and smarter — backed by decades 
          of application expertise.
        </p>
        <div class="es-hero__actions">
          <a class="btn btn--primary btn--lg" href="#">Get a Quote</a>
          <a class="btn btn--outline-white btn--lg" href="#es-grid">Explore Engineered Solutions</a>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 4: Why Gerotech
         ============================================================ -->
    <section class="why-section" aria-labelledby="why-headline">
      <div class="why-section__inner">
        <div class="why-section__copy">
          <p class="eyebrow">Why Gerotech</p>
          <h2 class="why-section__copy-headline" id="why-headline">
            Engineering Expertise Backed by Decades of Application Experience
          </h2>
          <p class="why-section__copy-body">
            Our in-house engineering team doesn't rely on off-the-shelf solutions. We assess your 
            equipment, understand your production goals, and design modifications and automation 
            systems built specifically for your floor — any make, any control.
          </p>
          <a class="btn btn--primary" href="#">Talk to an Engineer</a>
        </div>

        <div class="why-section__features">
          <div class="why-feature">
            <div class="why-feature__icon">🏭</div>
            <div>
              <h3 class="why-feature__title">Machine Modification</h3>
              <p class="why-feature__body">
                Hydraulic and pneumatic additions, auto-doors, workholding, and broken tool detection — 
                we upgrade your existing equipment to meet new demands.
              </p>
            </div>
          </div>
          <div class="why-feature">
            <div class="why-feature__icon">⚙️</div>
            <div>
              <h3 class="why-feature__title">Machine Customization</h3>
              <p class="why-feature__body">
                Remote tool offset and control-level customizations that give operators more capability 
                and reduce setup time.
              </p>
            </div>
          </div>
          <div class="why-feature">
            <div class="why-feature__icon">🤖</div>
            <div>
              <h3 class="why-feature__title">Automation Integration</h3>
              <p class="why-feature__body">
                Robot selection, simulation with ROBOGUIDE, and full cell integration — we design and 
                build automation around your production reality.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 5: Stat Strip
         ============================================================ -->
    <section class="stat-strip section--sm" aria-label="Key statistics">
      <div class="stat-strip__inner">
        <p class="stat-strip__eyebrow">Every Single Day at Gerotech&hellip;</p>
        <div class="stat-strip__grid">
          <div class="stat-pill">
            <p class="stat-pill__number">37+</p>
            <p class="stat-pill__label">Years in Business</p>
          </div>
          <div class="stat-pill">
            <p class="stat-pill__number">3</p>
            <p class="stat-pill__label">Michigan Locations</p>
          </div>
          <div class="stat-pill">
            <p class="stat-pill__number">100s</p>
            <p class="stat-pill__label">Machines Serviced Annually</p>
          </div>
          <div class="stat-pill">
            <p class="stat-pill__number">1</p>
            <p class="stat-pill__label">Engineering Team, All In-House</p>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 6: Engineered Solutions Grid (filterable)
         ============================================================ -->
    <section class="es-grid-section" id="es-grid" aria-labelledby="es-grid-headline">
      <div class="es-grid-section__inner">
        <div class="es-grid-section__controls">
          <div>
            <p class="eyebrow">What We Do</p>
            <h2 class="section-title" id="es-grid-headline">Engineered Solutions</h2>
          </div>
          <div class="filter-tabs" role="tablist" aria-label="Filter solutions by category">
            <button class="filter-tab is-active" data-filter="all" role="tab" aria-selected="true">All</button>
            <button class="filter-tab" data-filter="machine-modification" role="tab" aria-selected="false">Machine Modification</button>
            <button class="filter-tab" data-filter="machine-customization" role="tab" aria-selected="false">Machine Customization</button>
            <button class="filter-tab" data-filter="automation-integration" role="tab" aria-selected="false">Automation Integration</button>
          </div>
        </div>

        <div class="es-grid">
          <!-- Machine Modification cards -->
          <article class="service-card" data-category="machine-modification">
            <span class="service-card__category">Machine Modification</span>
            <h3 class="service-card__title">Hydraulic Additions</h3>
            <p class="service-card__body">
              Integrate hydraulic circuits into existing CNC machines for workholding, clamping, 
              and specialized tooling applications.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <article class="service-card" data-category="machine-modification">
            <span class="service-card__category">Machine Modification</span>
            <h3 class="service-card__title">Pneumatic Additions</h3>
            <p class="service-card__body">
              Add pneumatic circuits for air blowoff, chip clearing, fixture actuators, and 
              other production-enhancing functions.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <article class="service-card" data-category="machine-modification">
            <span class="service-card__category">Machine Modification</span>
            <h3 class="service-card__title">Auto-Doors</h3>
            <p class="service-card__body">
              Automated door systems that integrate with the machine cycle for robot-ready 
              automation and safer, faster operation.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <article class="service-card" data-category="machine-modification">
            <span class="service-card__category">Machine Modification</span>
            <h3 class="service-card__title">Workholding</h3>
            <p class="service-card__body">
              Custom workholding solutions designed and integrated into your machine for improved 
              repeatability, reduced setup time, and higher throughput.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <article class="service-card" data-category="machine-modification">
            <span class="service-card__category">Machine Modification</span>
            <h3 class="service-card__title">Broken Tool Detection</h3>
            <p class="service-card__body">
              Automated broken tool detection systems that stop the machine before a bad part 
              is made — protecting tooling, fixtures, and your machine.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <!-- Machine Customization cards -->
          <article class="service-card" data-category="machine-customization">
            <span class="service-card__category">Machine Customization</span>
            <h3 class="service-card__title">Remote Tool Offset</h3>
            <p class="service-card__body">
              Control-level programming that allows operators to adjust tool offsets from a 
              remote panel or HMI — reducing door openings and improving ergonomics.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <!-- Automation Integration cards -->
          <article class="service-card" data-category="automation-integration">
            <span class="service-card__category">Automation Integration</span>
            <h3 class="service-card__title">Simulation (ROBOGUIDE)</h3>
            <p class="service-card__body">
              FANUC ROBOGUIDE simulation lets us design, validate, and optimize your robot cell 
              before a single bolt is turned — reducing risk and accelerating deployment.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <article class="service-card" data-category="automation-integration">
            <span class="service-card__category">Automation Integration</span>
            <h3 class="service-card__title">Robot Selection</h3>
            <p class="service-card__body">
              Application-matched robot selection from the full FANUC lineup — payload, reach, 
              speed, and IP rating matched to your specific production environment.
            </p>
            <a class="service-card__link" href="#">Learn More →</a>
          </article>

          <!-- Placeholder slot -->
          <div class="service-card service-card--placeholder" aria-hidden="true">
            <span>More Solutions Coming Soon</span>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 7: FANUC ASI Credential Band
         ============================================================ -->
    <section class="credential-band" aria-label="FANUC ASI credential">
      <div class="credential-band__inner">
        <div class="credential-band__badge">
          FANUC ASI<br />Badge<br />Placeholder
        </div>
        <div class="credential-band__copy">
          <p class="eyebrow">Authorized System Integrator</p>
          <h2 class="credential-band__headline">
            FANUC Authorized System Integrator
          </h2>
          <p class="credential-band__body">
            Gerotech is a FANUC Authorized System Integrator (ASI) — one of a select group of 
            companies certified to design, build, and support complete FANUC robotic automation 
            systems. This credential means factory-trained engineers, direct technical support from 
            FANUC, and proven integration methodology on every project.
          </p>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 8: Technology Partners
         ============================================================ -->
    <section class="tech-partners-section" aria-labelledby="tech-partners-headline">
      <div class="tech-partners-section__inner">
        <div>
          <p class="eyebrow">Our Technology Ecosystem</p>
          <h2 class="tech-partners-section__copy-headline" id="tech-partners-headline">
            The Right Technology for Every Application
          </h2>
          <p class="tech-partners-section__copy-body">
            We work with the world's leading automation and controls manufacturers to source the 
            right components for every solution — no brand allegiance, just engineering judgment 
            matched to your application.
          </p>
          <a class="btn btn--outline-dark" href="#">See All Partners</a>
        </div>

        <div class="tech-logo-grid">
          <div class="partner-logo">FANUC</div>
          <div class="partner-logo">Okuma</div>
          <div class="partner-logo">Mazak</div>
          <div class="partner-logo">Doosan</div>
          <div class="partner-logo">Makino</div>
          <div class="partner-logo">Heidenhain</div>
          <div class="partner-logo">Renishaw</div>
          <div class="partner-logo">Schunk</div>
          <div class="partner-logo">Blum</div>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 9: Capability Band
         ============================================================ -->
    <section class="capability-band" aria-labelledby="capability-headline">
      <div class="capability-band__inner">
        <div>
          <p class="eyebrow eyebrow--white">Beyond a Single Brand</p>
          <h2 class="capability-band__headline" id="capability-headline">
            Your Machine.<br />Our Solution.
          </h2>
          <p class="capability-band__body">
            Whatever sits on your floor, any make and any control, our engineers modify, 
            customize, and automate around it.
          </p>
          <div class="capability-band__actions">
            <a class="btn btn--primary btn--lg" href="#">Get a Quote</a>
            <a class="btn btn--outline-white btn--lg" href="#es-grid">Explore Engineered Solutions</a>
          </div>
        </div>

        <ul class="capability-bullets" aria-label="Key capabilities">
          <li class="capability-bullet">
            <span class="capability-bullet__num" aria-hidden="true">01</span>
            <span class="capability-bullet__text">
              Any make, any control — we engineer to your existing equipment
            </span>
          </li>
          <li class="capability-bullet">
            <span class="capability-bullet__num" aria-hidden="true">02</span>
            <span class="capability-bullet__text">
              In-house design, programming, and integration
            </span>
          </li>
          <li class="capability-bullet">
            <span class="capability-bullet__num" aria-hidden="true">03</span>
            <span class="capability-bullet__text">
              From a single modification to a full automation cell
            </span>
          </li>
        </ul>
      </div>
    </section>

    <!-- ============================================================
         SECTION 10: Testimonials (2 bordered cards)
         ============================================================ -->
    <section class="es-testimonials-section" aria-labelledby="testimonials-headline">
      <div class="es-testimonials-section__inner">
        <div class="section-header">
          <p class="eyebrow">What Customers Say</p>
          <h2 class="section-title" id="testimonials-headline">Trusted by Michigan Manufacturers</h2>
        </div>
        <div class="grid-2">
          <article class="testimonial-card">
            <blockquote>
              <p class="testimonial-card__quote">
                I have never had such consistent, quality customer support from a company and an 
                overall great experience. Every contact has been timely, there has been good 
                communication, friendly service, and each time they are happy to educate me along 
                the way and I walk away with more information and peace of mind than I had hoped for.
              </p>
              <footer>
                <p class="testimonial-card__name">Michael Rudisill</p>
                <p class="testimonial-card__sub">Gerotech Customer</p>
              </footer>
            </blockquote>
          </article>

          <article class="testimonial-card">
            <blockquote>
              <p class="testimonial-card__quote">
                The Gerotech team understood exactly what we needed and delivered a solution that 
                exceeded our expectations. The automation cell they designed has transformed our 
                throughput and quality metrics. We couldn't be more satisfied.
              </p>
              <footer>
                <p class="testimonial-card__name">Testimonial Placeholder</p>
                <p class="testimonial-card__sub">Customer Name &amp; Company</p>
              </footer>
            </blockquote>
          </article>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 11: News Feed
         ============================================================ -->
    <section class="news-section section" aria-labelledby="news-headline">
      <div class="container container--es">
        <div class="section-header">
          <p class="eyebrow">Stay Informed</p>
          <h2 class="section-title" id="news-headline">Latest Projects &amp; News</h2>
        </div>
        <div class="news-section__grid">
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">Project — June 2025</p>
              <h3 class="news-card__title">Automated Robotic Cell Delivered to Tier-1 Automotive Supplier</h3>
              <p class="news-card__excerpt">
                Gerotech engineers designed and integrated a complete FANUC robotic automation cell, 
                reducing cycle times by 38%.
              </p>
            </div>
          </article>
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">News — May 2025</p>
              <h3 class="news-card__title">Gerotech Expands Grand Rapids Service Territory</h3>
              <p class="news-card__excerpt">
                Our Grand Rapids office is now fully staffed with factory-trained service technicians 
                serving manufacturers across West Michigan.
              </p>
            </div>
          </article>
          <article class="news-card">
            <div class="img-placeholder news-card__thumb">Thumb</div>
            <div class="news-card__content">
              <p class="news-card__meta">Project — April 2025</p>
              <h3 class="news-card__title">Hydraulic Workholding System Installed on Legacy Okuma</h3>
              <p class="news-card__excerpt">
                A custom hydraulic workholding and auto-door system extended a legacy machining 
                center's productive life by years.
              </p>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 12: CTA Band
         ============================================================ -->
    <section class="cta-band" aria-label="Call to action">
      <div class="cta-band__card">
        <div class="cta-band__copy">
          <p class="eyebrow cta-band__eyebrow">Take Action Now</p>
          <h2 class="cta-band__headline">Ready to Engineer a Better Way to Manufacture?</h2>
        </div>
        <a class="btn btn--primary btn--lg" href="#">Get a Quote</a>
      </div>
    </section>

  </main>

  <!-- ============================================================
       SECTION 13: Footer (black version)
       ============================================================ -->
  <footer class="site-footer site-footer--black" role="contentinfo">
    <div class="site-footer__inner">
      <div class="site-footer__top">
        <div class="site-footer__brand">
          <div class="logo-placeholder">LOGO</div>
          <p class="site-footer__tagline">
            Michigan's Premier CNC Machinery Distributor &amp; Engineering Solutions Provider — 
            serving manufacturers since 1987.
          </p>
          <address class="site-footer__address">
            29220 Commerce Drive<br />
            Flat Rock, MI 48134<br />
            <a href="tel:+17343797788">734-379-7788</a>
          </address>
          <div class="site-footer__socials">
            <a class="social-icon" href="#" aria-label="LinkedIn">in</a>
            <a class="social-icon" href="#" aria-label="Facebook">f</a>
            <a class="social-icon" href="#" aria-label="YouTube">▶</a>
          </div>
        </div>

        <div>
          <p class="site-footer__col-title">Machines</p>
          <ul class="site-footer__links">
            <li><a href="#">Machining Centers</a></li>
            <li><a href="#">Turning Centers</a></li>
            <li><a href="#">EDM</a></li>
            <li><a href="#">Automation</a></li>
            <li><a href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">All Machines ↗</a></li>
          </ul>
        </div>

        <div>
          <p class="site-footer__col-title">Solutions &amp; Support</p>
          <ul class="site-footer__links">
            <li><a href="engineered-solutions.html">Engineered Solutions</a></li>
            <li><a href="#">Service Request</a></li>
            <li><a href="#">Parts</a></li>
            <li><a href="#">Training</a></li>
            <li><a href="#">Documentation</a></li>
          </ul>
        </div>

        <div>
          <p class="site-footer__col-title">Company</p>
          <ul class="site-footer__links">
            <li><a href="#">About Gerotech</a></li>
            <li><a href="#">Our Team</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>

      <div class="site-footer__bottom">
        <span>&copy; 2025 Gerotech, Inc. All rights reserved.</span>
        <div style="display:flex; gap: var(--sp-16);">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="assets/js/nav.js"></script>
  <script src="assets/js/filter.js"></script>
</body>
</html>
```

- [ ] **Step 2: Open in browser and verify**

```bash
open /Users/mattstewart/gerotech-prototype/engineered-solutions.html
```

Check:
- Same alert banner and header as homepage
- Dark hero with 72px headline, 2 CTA buttons
- Why Gerotech 2-col layout: copy + CTA left, 3 feature rows right
- Stat strip: gray band, 4 pill cards
- ES grid: 8 service cards + 1 placeholder in 3×3 grid; filter tabs work (click "Machine Modification" — only shows 5 cards)
- FANUC band: dark bg, badge placeholder + copy
- Tech partners: 2-col, 3×3 logo grid
- Capability band: dark, large headline, 3 numbered bullets
- 2 testimonial cards side by side
- News feed (same as homepage)
- CTA band
- Black footer

- [ ] **Step 3: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add engineered-solutions.html && git commit -m "feat: build engineered solutions page (13 sections)"
```

---

## Task 9: design-spec.md

**Files:**
- Create: `design-spec.md`

- [ ] **Step 1: Write design-spec.md**

```markdown
# Gerotech Website Prototype — Design Spec

**Presentation date:** July 7, 2026  
**Client:** Gerotech — CNC Machinery Distributor + Engineering Solutions, Michigan  
**Build:** Static HTML/CSS/JS, no framework

---

## Brand Tokens

| Token | Value |
|-------|-------|
| Primary orange | `#F38A2C` |
| Light orange | `#F9A94A` |
| Ink/black | `#0D0D0D` |
| Dark bg | `#1C1C21` |
| Dark nav/footer | `#3A3A40` |
| Gray body | `#808080` |
| Gray muted | `#9A9AA8` |
| Gray border | `#D6D6D6` |
| Gray card bg | `#F9F9FB` |
| Gray band | `#F2F2F2` |

**Font:** Plus Jakarta Sans (400, 500, 600, 700, 800) — Google Fonts  
**Max-width:** Homepage 1200px | ES page 1120px  
**Border radius:** Buttons 8px | Cards 18–20px | Pills 99px

---

## Phone Numbers (click-to-call)

| Label | Display | href |
|-------|---------|------|
| Headquarters & Sales | 734-379-7788 | `tel:+17343797788` |
| Service | 248-476-8787 | `tel:+12484768787` |
| Grand Rapids | 616-735-1100 | `tel:+16167351100` |

**Address:** 29220 Commerce Drive, Flat Rock, MI 48134

---

## Homepage Sections

1. Alert banner — dark, 3 click-to-call phone numbers
2. Sticky header — logo | Machines ↗ | Engineered Solutions | Support ▼ | About ▼ | Get a Quote | 🔍
3. Hero slider — dark, 520px, 3 placeholder slides, arrows + dots
4. Intro + 3 category cards — Since 1987, Michigan's Premier Distributor
5. Partner logo row — 12 logos, 2 rows of 6, dashed tiles
6. Testimonial split — photo left, dark panel right, Michael Rudisill quote
7. News feed — 3 items with thumbnails
8. CTA band — dark bg, white card, "Put our engineers to work on your project"
9. Email signup — mailing list, email input + Sign Up
10. Footer — dark (#3A3A40), 4-column, logo, socials, address

---

## ES Page Sections

1. Alert banner (same)
2. Sticky header (same, "Engineered Solutions" active)
3. Hero — dark, 72px H1 "Your Manufacturing Solutions Partner", 2 CTAs
4. Why Gerotech — 2-col, copy + CTA left, 3 feature rows right
5. Stat strip — gray, 4 pill cards
6. ES grid — 3×3, 8 service cards + 1 placeholder, filterable
7. FANUC ASI band — dark, badge + copy
8. Technology Partners — 2-col, 3×3 logo grid
9. Capability band — dark, "Your Machine. Our Solution.", 3 numbered bullets
10. Testimonials — 2 bordered cards
11. News feed (same pattern)
12. CTA band — "Ready to Engineer a Better Way to Manufacture?"
13. Footer — black (#0D0D0D)

---

## Service Cards

| Card | Category | data-category |
|------|----------|--------------|
| Hydraulic Additions | Machine Modification | `machine-modification` |
| Pneumatic Additions | Machine Modification | `machine-modification` |
| Auto-Doors | Machine Modification | `machine-modification` |
| Workholding | Machine Modification | `machine-modification` |
| Broken Tool Detection | Machine Modification | `machine-modification` |
| Remote Tool Offset | Machine Customization | `machine-customization` |
| Simulation (ROBOGUIDE) | Automation Integration | `automation-integration` |
| Robot Selection | Automation Integration | `automation-integration` |

---

## Image Placeholders

All images are placeholder `div` elements with dashed borders. When client provides images:

- Replace `<div class="img-placeholder ...">` with `<img src="..." alt="..." />`
- The placeholder's border-radius and dimensions will transfer to the `<img>` via CSS

---

## File Structure

```
gerotech-prototype/
├── index.html
├── engineered-solutions.html
├── design-spec.md
└── assets/
    ├── css/
    │   ├── tokens.css        ← All CSS variables; client color tweaks go here
    │   ├── components.css    ← Reusable UI atoms
    │   └── layout.css        ← Page structure, grid, responsive
    ├── js/
    │   ├── nav.js            ← Sticky header + mobile toggle
    │   ├── slider.js         ← Hero carousel
    │   └── filter.js         ← ES grid filter tabs
    └── images/placeholders/  ← Drop client images here
```
```

- [ ] **Step 2: Commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git add design-spec.md && git commit -m "docs: add design spec for client handoff"
```

---

## Task 10: Final verification

- [ ] **Step 1: Check all phone links**

```bash
grep -n "tel:" /Users/mattstewart/gerotech-prototype/index.html /Users/mattstewart/gerotech-prototype/engineered-solutions.html
```

Expected: 6 total `tel:` links (3 per page).

- [ ] **Step 2: Check external links open in new tab**

```bash
grep -n 'target="_blank"' /Users/mattstewart/gerotech-prototype/index.html /Users/mattstewart/gerotech-prototype/engineered-solutions.html
```

Expected: only "Machines ↗" links and gerotech.com references have `target="_blank"`.

- [ ] **Step 3: Verify filter data attributes**

```bash
grep -n "data-category" /Users/mattstewart/gerotech-prototype/engineered-solutions.html
```

Expected: 8 cards with `data-category` values matching the 4 filter tab `data-filter` values.

- [ ] **Step 4: Open both pages in browser**

```bash
open /Users/mattstewart/gerotech-prototype/index.html
open /Users/mattstewart/gerotech-prototype/engineered-solutions.html
```

- [ ] **Step 5: Final commit**

```bash
cd /Users/mattstewart/gerotech-prototype && git status
```

All files should be committed. If any are untracked:

```bash
cd /Users/mattstewart/gerotech-prototype && git add -A && git commit -m "chore: final cleanup and verification"
```
```
