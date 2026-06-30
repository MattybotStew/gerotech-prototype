# Gerotech Website Prototype — Project Brief

> Shared reference for AI agents (Cline, Claude, etc.). Keep updated as the project evolves.

## Overview

Two-page static HTML/CSS/JS **wireframe/prototype** for **Gerotech, Inc.** — Michigan-based CNC machinery distributor & engineering solutions provider (serving manufacturers since 1987). Built for a **July 7, 2026** client presentation. No frameworks, no build tools.

**Current stage: Wireframe.** Structural layout, real copy, and functional interactions are in place. Placeholder visuals (emoji icons, dashed-border image divs, logo placeholder) are intentional — they mark slots that will be upgraded to real design assets. The CSS token system is the bridge: wireframe values can be refined without touching component markup.

**Live site:** https://gerotech.com/ (WordPress, custom theme, Smart Slider 3, Contact Form 7, Max Mega Menu)

## Pages

| Page | URL | Sections |
|------|-----|----------|
| Homepage | `index.html` | 10 sections: Alert Banner, Sticky Header, Hero Slider, Intro + 3 Category Cards, Partner Logos, Testimonial Split, News Feed, CTA Band, Email Signup, Footer |
| Engineered Solutions | `engineered-solutions.html` | 13 sections: same header + hero, Why Gerotech, Stat Strip, Filterable Service Grid, FANUC ASI Band, Tech Partners, Capability Band, Testimonials, News, CTA, Footer (black) |
| About (stub) | `about.html` | Minimal — needs content |
| Support (stub) | `support.html` | Minimal — needs content |

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

## Live Site Comparison (https://gerotech.com/)

### What the live site has that the wireframe can leverage

| Asset | Live Site | Wireframe Status |
|-------|-----------|-----------------|
| **Logo** | Exists at `/wp-content/themes/gerotech/images/logo_desktop_white.png` and `logo_tagline.jpg` | Dashed placeholder — can grab real logo |
| **Partner logos** | HAAS, Takamaz, Midaco, FANUC, OnRobot, Dynatect, Royal Products, Marpos, Tsudakoma(Koma), Alberti, Renishaw, Keyence, 5th Axis (13 partners, real logo images) | 12 placeholder tiles — can source real logos |
| **Testimonial photo** | `/wp-content/uploads/2021/07/Webp.net-resizeimage-3.jpg` | Placeholder — real image exists |
| **Hero slides** | 6 slides via Smart Slider 3 with real machine photos and promotional content | 3 placeholder slides |
| **Mailing list fields** | First name, last name, company name, zip code, email (5 fields) | Only email (1 field) — live collects more data |
| **Service/process icons** | Real product photos (Machines, Tooling, Automation, Engineered Solutions, Training, Parts and Support) | None — wireframe uses emoji category cards |

### IA Differences

| Element | Live Site (WordPress) | Wireframe (Static) |
|---------|----------------------|-------------------|
| **Top banner** | Logo + phone numbers + GET A QUOTE (single row) | Dark alert bar with phone numbers (logo below in header) |
| **Nav order** | Company, Machines (mega menu), Engineered Solutions, Support | Machines, Engineered Solutions, Support, About |
| **Machines section** | Huge mega menu with VMC/HMC/Turning/Rotaries/Tooling/Financing/HFO subcategories | External link to gerotech.com/machines |
| **ES subpages** | 7 dedicated pages (Automated System, Engineering Process Optimization, Custom Workholding, Training, Modification, Integration Partners, Unique Applications) | Single filterable grid page with 8 service cards |
| **Support subpages** | Service Request Forms, Training, Rotary Repair, Planned Maintenance | Simple dropdown (Service Request, Parts, Training, Documentation) |
| **Mobile nav** | 6 items (ES, Training, Service, About, Careers, Contact) | 5 items (Machines, ES, Support, About, Get a Quote) |

### Design Differences

| Aspect | Live Site | Wireframe |
|--------|-----------|-----------|
| **Primary accent** | Orange `#F38A2C` + Red `#C8102E`/`#CF0A2C` (two accents) | Orange `#F38A2C` only (one accent) |
| **Fonts** | Oswald, Roboto, Outfit, Open Sans (mixed, no single system) | Plus Jakarta Sans (one font family) |
| **Slider tech** | Smart Slider 3 (WordPress plugin, 6 slides, autoplay 8s) | Custom HTML/CSS/JS (3 slides, autoplay 5s) |
| **Below slider** | 6 process icon buttons with product photos, then intro text + 3-col text, then partner logos | Intro + 3 category cards, then partner logos |
| **Testimonial format** | `~Michael Rudisill~` (tildes) | Proper blockquote with `<footer>` |
| **Footer** | Simpler: logo, address line, copyright + privacy | 4-column with logo, tagline, address, socials, 3 link columns |
| **CTA button color** | Red `#C8102E` for some buttons (showroom slide) | Orange only |
| **Background** | White, no dark sections besides footer and some slider slides | Alternating white/gray-band/dark-bg sections |

### Content to Carry Forward from Live Site

1. **Real partner logos** (13 partners) — replace 12 placeholders, match actual partners
2. **Testimonial photo** — real image available at gerotech.com
3. **Company logo** — grab from live site
4. **Mailing list fields** — consider adding more fields (name, company, zip) if client expects it
5. **Slider content** — 6 live slides have real promotions (training, showroom machines, rotary products, winner's circle) that could inform hero content
6. **Service pages** — ES page has 7 dedicated subpages on live site; wireframe condenses to 8 filterable cards

## Wireframe → Full Design Upgrade Path

Priority order for upgrading from wireframe to finished design:

1. **Real SVG icons** — Replace emoji placeholders (⚙️ 🔧 🛠️ 🏭 🤖) with Phosphor or Tabler SVG icons
2. **Real images** — Generate or source hero photography, testimonial photo, news thumbnails, partner logos (many exist on live site)
3. **Logo** — Replace dashed placeholder with actual Gerotech logo (available on live site)
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