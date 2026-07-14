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

**Font:** Navigo (Adobe kit `lqh7ybe`, weights 400 + 700) — consider adding 500 to kit for finer UI hierarchy  
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
