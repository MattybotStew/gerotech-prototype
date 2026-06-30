# Gerotech Website Prototype — Project Brief

> Shared reference for AI agents (Cline, Claude, etc.). Keep updated as the project evolves.

## Overview

Static HTML/CSS/JS **wireframe/prototype** for **Gerotech, Inc.** — Michigan-based CNC machinery distributor & engineering solutions provider (serving manufacturers since 1987). Built for a **July 7, 2026** client presentation. No frameworks, no build tools.

**Current stage: Wireframe.** Structural layout, real copy (verified against live site), and functional interactions are in place. Placeholder visuals (emoji icons, dashed-border image divs, logo placeholder) are intentional — they mark slots for design upgrade.

**Live site:** https://gerotech.com/ (WordPress, custom theme, Smart Slider 3, Contact Form 7, Max Mega Menu)

**Agency:** CloudMellow — 16-week engagement. This prototype is built ahead of their design phase.

**Client contact:** CEO Rochelle attends July 7 presentation.

## Pages (10 total)

| Page | File | Status |
|------|------|--------|
| Homepage | `index.html` | ✅ 10 sections, copy verified against live site |
| Engineered Solutions (hub) | `engineered-solutions.html` | ✅ Filterable grid + 8 sections |
| Machine Custom Solutions | `machine-custom-solutions.html` | ✅ 8 services, product gallery with status tags |
| Machine Modification | `machine-modification.html` | ✅ 5 services (hydraulics, pneumatics, auto-doors, workholding, broken tool detection) |
| Automation Integration | `automation-integration.html` | ✅ 4 services (ROBOGUIDE, robot selection, cell integration, cobots) |
| Application | `application.html` | ✅ 4 services (programming, macros, training, probing) |
| Training | `training.html` | ✅ 4 Haas courses (operator + programming) |
| Support | `support.html` | ⬜ Stub |
| About | `about.html` | ⬜ Stub |

## Architecture

```
gerotech-prototype/
├── index.html                   # Homepage
├── engineered-solutions.html    # ES landing hub
├── machine-custom-solutions.html# Detail: Column Risers, Sheet Metal, Spin Forming, etc.
├── machine-modification.html   # Detail: Hydraulics, Pneumatics, Auto-Doors, etc.
├── automation-integration.html  # Detail: ROBOGUIDE, Robot Selection, Cobots
├── application.html             # Detail: Programming, Macros, Training, Probing
├── training.html                # Haas training courses
├── about.html                   # Stub
├── support.html                 # Stub
├── cline-project-handoff.md     # Full project handoff doc for AI agents
├── design-spec.md               # Client-facing design spec
├── assets/
│   ├── css/
│   │   ├── tokens.css           # Design tokens (CSS custom properties)
│   │   ├── components.css       # All reusable UI components (~1400 lines)
│   │   └── layout.css           # Base reset, grids, section layouts, responsive
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

## Navigation Structure (Desktop Nav)

```
Machines ↗ | Engineered Solutions ▼ | Training | Support ▼ | About ▼ | [Get a Quote] [🔍]
```

- **Machines ↗** — external link to gerotech.com/machines, opens new tab
- **Engineered Solutions ▼** — mega nav with 3 columns (By Category, All Services, CTA)
  - By Category: Machine Custom Solutions, Machine Customization, Automation Integration
  - All Services: links to all Detail pages
- **Training** — standalone nav item (per client, moved from Support dropdown)
- **Support ▼** — dropdown: Service Request, Parts, Documentation (Training removed)
- **About ▼** — dropdown: Our Story, Team, Careers, Contact

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
**Max-width:** Homepage 1200px | ES page + Detail pages 1120px  
**Border radius:** 8px (buttons) | 18–20px (cards) | 99px (pills)  
**Breakpoints:** 1024px, 768px, 480px

## CSS Loading Order

1. `tokens.css` — must be first
2. `components.css` — component styles
3. `layout.css` — layout, grids, responsive

## JavaScript Loading

| Page | Scripts |
|------|---------|
| index.html | nav.js, slider.js, animations.js |
| engineered-solutions.html | nav.js, filter.js, animations.js |
| All Detail pages | nav.js, animations.js |

## Figma Comments — Implementation Status

| # | Comment | Status |
|---|---------|--------|
| #42 | "Change all orange headers to Machine Customization" | ✅ Done — renamed from Machine Modification |
| #32 | "Training needs its own nav item" | ✅ Standalone nav item + training.html page with 4 Haas courses |
| #31 | "Application as its own category" | ✅ Application filter tab + Detail page |
| #30 | "Separate Machine Custom Solutions and Automation Integration" | ✅ Separate Detail pages |
| #26 | "Remove Takamaz" | ✅ 12 partner slots, Takamaz excluded |
| #36 | "Links open in new browser window" | ✅ All external links have `target="_blank"` |
| #28 | "All phones clickable" | ✅ All use proper `tel:+1` E.164 format (live site had broken tel: links) |
| #34 | "Highlight Haas more than we do now" | ⬜ Flagged — training.html features Haas prominently, hero may need updates |
| #40 | "Remove CTA" | ⬜ Need to identify which CTA |
| #41 | Mailing list Constant Contact | 🔵 Process question — live site uses CF7 → email group → manual Constant Contact entry |

## Current State & Known Placeholders

| Item | Status |
|------|--------|
| All images | Placeholder divs with dashed borders |
| UI icons | Emoji markers (⚙️ 🔧 🛠️) — need real SVG icons |
| Many CTA links | `href="#"` — needs real URLs |
| Second testimonial (ES page) | Placeholder text |
| Social media links | `href="#"` — no real profiles confirmed |
| Search functionality | Button exists, no search implementation |
| Email signup form | Email only — live site uses 5 fields (name, company, zip) |
| Dark mode | Not implemented |
| Logo | Dashed placeholder box |

## Key Source Files

- `cline-project-handoff.md` — Full project context: timeline, agency details, live site audit, open decisions, confirmed copy. **Read this first before making changes.**
- `docs/superpowers/plans/2026-06-29-gerotech-website.md` — Original implementation plan
- `design-spec.md` — Client-facing component library

## Key Conventions

- **BEM naming** for CSS (`.site-footer__col-title`)
- **ARIA attributes** throughout
- **External links**: `target="_blank" rel="noopener noreferrer"`
- **Phone numbers**: `tel:+1` E.164 format
- **Address**: 29220 Commerce Drive, Flat Rock, MI 48134
- **Footer variants**: `.site-footer` (dark nav — homepage), `.site-footer--black` (ES + Detail pages)
- **Social icons**: LinkedIn, YouTube, Instagram per Figma