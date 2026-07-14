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

**Font:** Navigo via Adobe Fonts — kit [`lqh7ybe`](https://use.typekit.net/lqh7ybe.css)

### Typekit — what to add (kit `lqh7ybe`)

**Currently enabled (4 faces):**
| Style | Weight | Use |
|-------|--------|-----|
| Regular | 400 | Body, descriptions |
| Regular Italic | 400 italic | Quotes (rare) |
| Bold | 700 | Headlines, buttons, emphasis |
| Bold Italic | 700 italic | — |

**Add this next (required for UI polish):**
| Style | Weight | Why |
|-------|--------|-----|
| **Medium** | **500** | Eyebrows, breadcrumbs, nav links, card labels, stat labels, `.mcs-name-split__lead` — stops everything collapsing to 400 vs 700 |

**Optional (only if you want more display range):**
| Style | Weight | Why |
|-------|--------|-----|
| Black | 900 | Hero numerals / stat pills only — use sparingly |

**Do not add:** Thin, ExtraLight, Light — too soft for industrial B2B.

**After adding Medium in [Adobe Fonts → Web Projects → lqh7ybe → Navigo](https://fonts.adobe.com/fonts/navigo):**
1. Republish the kit (Adobe does this automatically on save).
2. Hard-refresh the site — tokens already map `--fw-medium: 500`.
3. No CSS changes needed unless you add Black (then set `--fw-extrabold: 900`).

**Max-width:** Homepage 1200px | ES page 1120px  
**Border radius:** Cards 0 (squared) | Buttons 8px | Pills 99px

---

## Interior hero system (2026-07-14)

| Pattern | Class | Used on |
|---------|-------|---------|
| **Dark full-bleed hub** | `.es-hero` | Engineered Solutions hub, Training |
| **Light gray + breadcrumb** | `.mcs-hero` | MCS, Application, Automation detail pages |

Hub pages use dark heroes for category landing; detail/drill-down pages use light heroes with breadcrumbs.

## Primary CTA destinations (prototype)

| Action | Destination |
|--------|-------------|
| Get a Quote | `mailto:sales@gerotech.com?subject=Gerotech%20Quote%20Request` |
| Talk to an Engineer | `tel:+17343797788` |
| Service Request | `tel:+12484768787` |

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
2. Sticky header — logo | Machines ↗ | Engineered Solutions | Support ▼ | About ▼ | Get a Quote | Search
3. Hero slider — 3 slides (Training, Machines, ES + FANUC ASI), arrows + dots
4. Trust strip — Since 1987, 3 locations, Haas FFO, FANUC ASI
5. Intro + 3 category cards — Machines, Engineered Solutions, Service & Support
6. Machine browse tabs — 5 categories with model tags
7. Testimonial carousel — split photo + dark panel
8. News feed — 3 items with thumbnails
9. CTA band — photo hero, mailto quote
10. Email signup — prototype thanks state on submit
11. Footer — 4-column, wired internal links

---

## ES Page Sections

1. Alert banner (same)
2. Sticky header (same, "Engineered Solutions" active)
3. Hero — dark, 72px H1 "Your Manufacturing Solutions Partner", 2 CTAs
4. Why Gerotech — 2-col, copy + CTA left, 3 feature rows right
5. Stat strip — gray, 4 pill cards
6. ES grid — 3×3, 8 service cards + 1 placeholder, filterable
7. FANUC ASI band — dark, badge + copy
8. Technology Partners — 2-col, 9 wordmark grid
9. Capability band — boxed numbered cards (01–03)
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
