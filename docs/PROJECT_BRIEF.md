# Gerotech Website Prototype — Project Brief

> Shared reference for AI agents (Cline, Claude, etc.). Keep updated as the project evolves.

## Overview

Two-page static HTML/CSS/JS **wireframe/prototype** for **Gerotech, Inc.** — Michigan-based CNC machinery distributor & engineering solutions provider (serving manufacturers since 1987). Built for a **July 7, 2026** client presentation. No frameworks, no build tools.

**Current stage: Wireframe.** Structural layout, real copy, and functional interactions are in place. Placeholder visuals (emoji icons, dashed-border image divs, logo placeholder) are intentional — they mark slots that will be upgraded to real design assets. The CSS token system is the bridge: wireframe values can be refined without touching component markup.

## Pages

| Page | URL | Sections |
|------|-----|----------|
| Homepage | `index.html` | 10 sections: Alert Banner, Sticky Header, Hero Slider, Intro + 3 Category Cards, Partner Logos, Testimonial Split, News Feed, CTA Band, Email Signup, Footer |
| Engineered Solutions | `engineered-solutions.html` | 13 sections: same header + hero, Why Gerotech, Stat Strip, Filterable Service Grid, FANUC ASI Band, Tech Partners, Capability Band, Testimonials, News, CTA, Footer (black) |

## Architecture

```
gerotech-prototype/
├── index.html                   # Homepage
├── engineered-solutions.html    # ES landing page
├── about.html                   # Stub
├── support.html                 # Stub
├── design-spec.md               # Client-facing design spec
├── assets/
│   ├── css/
│   │   ├── tokens.css           # Design tokens (CSS custom properties)
│   │   ├── components.css       # All reusable UI components (~1162 lines)
│   │   └── layout.css           # Base reset, grids, section layouts, responsive (~507 lines)
│   ├── js/
│   │   ├── nav.js               # Sticky header + mobile toggle
│   │   ├── slider.js            # HeroSlider class (prev/next, dots, 5s autoplay)
│   │   ├── filter.js            # ES grid filter tabs (data-category)
│   │   └── animations.js        # Scroll-triggered fade-in-up (IntersectionObserver)
│   └── images/placeholders/     # Drop client images here
└── docs/
    ├── PROJECT_BRIEF.md         # ← This file
    └── superpowers/plans/       # Original implementation plan
```

## Design System

**CSS custom properties live in `tokens.css`** — all color/spacing/radius changes go there first.

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

**Font:** Plus Jakarta Sans (400/500/600/700/800) via Google Fonts  
**Max-width:** Homepage 1200px | ES page 1120px  
**Border radius:** 8px (buttons) | 18–20px (cards) | 99px (pills)  
**Breakpoints:** 1024px, 768px, 480px

## CSS Loading Order

1. `tokens.css` — must be first so all variables are available
2. `components.css` — component styles
3. `layout.css` — layout, grids, responsive overrides

## JavaScript Loading Order (index.html)

```html
<script src="assets/js/nav.js"></script>
<script src="assets/js/slider.js"></script>
<script src="assets/js/animations.js"></script>
```

JavaScript Loading Order (engineered-solutions.html):
```html
<script src="assets/js/nav.js"></script>
<script src="assets/js/filter.js"></script>
<script src="assets/js/animations.js"></script>
```

Note: `slider.js` only on homepage (`index.html`). `filter.js` only on ES page.

## Key Conventions

- **All images are placeholder `<div>` elements** with dashed borders and `.img-placeholder` class. Replace with `<img src="..." alt="..." />` when real images arrive — CSS handles dimensions/border-radius via class.
- **Phone numbers** use `tel:` links for click-to-call: HQ/Sales `734-379-7788`, Service `248-476-8787`, Grand Rapids `616-735-1100`
- **Address:** 29220 Commerce Drive, Flat Rock, MI 48134
- **Footer variants:** `.site-footer` (dark nav `#3A3A40` - homepage), `.site-footer--black` (`#0D0D0D` - ES page)
- **ARIA attributes** used throughout for accessibility (roles, labels, aria-expanded, aria-current)
- **BEM naming** for CSS classes (e.g., `.site-footer__col-title`, `.service-card__category`)
- **No CSS framework**, no build tools, no package manager dependencies

## Current State & Known Placeholders

**This is a wireframe.** Placeholders are intentional — they mark slots for design upgrades.

| Item | Status |
|------|--------|
| Hero slider images | 3 placeholder slides |
| Partner logos | 12 placeholder tiles |
| Testimonial photo | Placeholder div |
| News thumbnails | Placeholder divs |
| Company logo | Dashed placeholder box |
| UI icons | Emoji characters (⚙️ 🔧 🛠️ etc.) — wireframe markers, to be replaced with real SVG icons |
| Many CTA links | `href="#"` — needs real URLs |
| Second testimonial (ES page) | Placeholder text ("Testimonial Placeholder" / "Customer Name & Company") |
| about.html, support.html | Stub pages, minimal content |
| Social media links | `href="#"` |
| Search functionality | Button exists, no search implementation |
| Email signup form | No backend/action URL |
| Dark mode | Not implemented — wireframe is light-only with dark accent sections |
| Real images | None — all visual assets are placeholder divs pending client-provided photography |

## Wireframe → Full Design Upgrade Path

Priority order for upgrading from wireframe to finished design:

1. **Real SVG icons** — Replace emoji placeholders (⚙️ 🔧 🛠️ 🏭 🤖) with Phosphor or Tabler SVG icons
2. **Real images** — Generate or source hero photography, testimonial photo, news thumbnails, partner logos
3. **Logo** — Replace dashed placeholder with actual Gerotech logo
4. **Typography refinement** — Plus Jakarta Sans is solid; consider display weight tuning for hero headlines
5. **Eyebrow/label reduction** — Audit and reduce section eyebrow labels (currently above the recommended cap)
6. **Dark mode** — Add system-aware dark mode if needed for brand expression
7. **CTA label standardization** — Ensure one label per intent across all pages
8. **Reduced motion support** — Add `prefers-reduced-motion` check to animations.js

## Interactive Components

- **Hero Slider:** Auto-advances every 5s. Arrows + dots reset autoplay timer.
- **ES Grid Filter:** Tabs filter `.service-card` elements by `data-category` attribute. Cards are shown/hidden (CSS `display: none`).
- **Mobile Nav:** Hamburger toggle, closes on outside click.
- **Mega Nav:** Engineered Solutions has a 3-column mega dropdown (categories, services list, CTA panel).
- **Simple Dropdowns:** Support and About have standard dropdown menus.
- **Scroll Animations:** Sections/cards fade in and slide up as they enter viewport. Uses IntersectionObserver.

## Brand Voice

- Professional, engineering-focused, solutions-oriented
- Emphasizes: Michigan roots (since 1987), in-house engineering, any-make/any-control capability, FANUC ASI credential
- Tagline: "Michigan's Premier CNC Machinery Distributor & Engineering Partner"