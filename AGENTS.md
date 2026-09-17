# LLM Instructions — Gerotech Prototype

This file is read by Claude Code and any other LLM assistants working in this repo.

## Shared Context (read every session)

Read `.clinerules` at the start of every session. It contains current project state, what was last worked on, open decisions, and things not to do. After any change, update `.clinerules` so all agents stay in sync.

## Project

CloudMellow (Matt's agency) is rebuilding the Gerotech website (Michigan CNC machinery distributor, Haas Factory Outlet, est. 1987). The repo holds **two things**: the **static HTML/CSS/JS prototype** (design source of truth) and the **WordPress child theme build** under `wp-content/themes/gerotech-child/`. The final site is WordPress.

**Branch:** `master` — synced with `origin/master`. Build phase: WordPress child theme + ACF, **no page builder**. Plan: `handoff/implementation-plan-wordpress-theme-acf.md`.

## Prototype → WP build sync

The prototype stays the **source of truth for shared assets** until design lock.

- **CSS / JS / images:** edit in the prototype `assets/`, then run `./scripts/sync-theme-assets.sh` (one-way copy into the theme). `--check` reports drift; `--prune` removes orphaned theme images.
- **Markup:** port prototype HTML changes by hand into the matching PHP template — map in `handoff/theme-map.md`.
- **Not synced:** `include-partials.js` (replaced by PHP includes) and `gallery-module.js` (not promoted).
- **At design lock:** tag the prototype, then the theme becomes the source and syncing stops.

**Repo theme → Local site:** the running LocalWP site has its own copy of the child theme. After editing the theme, run `./scripts/sync-theme-to-local.sh` (or `--check`) so changes appear at `gerotech.local`. A WP Engine "Pull" can overwrite the Local theme dir — re-run the sync afterward.

## Stack

- Pure HTML5 / CSS3 (custom properties) / vanilla JS (ES6)
- Zero frameworks, no build tools, no package manager
- Fonts: **Barlow Condensed** (Google Fonts, 500/600/700) for headlines (`--font-display`) + **Navigo** (Adobe Fonts kit `lqh7ybe`, 400 + 700) for body/UI (`--font-sans`)
- **CSS load order:** `tokens.css` → `components.css` → `layout.css` → **`elevated.css`**
- **JS:** `include-partials.js`, `nav.js` (sticky, mobile, search modal, signup thanks), `slider.js`, `filter.js`, `animations.js`, `machine-tabs.js`, `modal.js` (ES detail card modals + gallery lightbox)

## Key conventions

- All images are Unsplash stand-ins (HTML comment on each) — verify URLs periodically; some IDs 404 over time
- CSS class naming: BEM (e.g. `.service-card__category`, `.slide__content--left`)
- Phone links: E.164 format (`tel:+17343797788`)
- Never guess at open client decisions — use placeholder + HTML comment
- Buttons: `text-transform: uppercase` + 0.05em letter-spacing
- Card border-radius: **0** (squared edges per Figma)
- **Hero pattern (homepage + all interior pages):** full-bleed photo, left gradient overlay (`105deg`), left-aligned copy; centers on mobile ≤768px
- **Interior hero:** All sub-pages use **`.page-hero`** — same markup as homepage hero slide (`slide__bg`, `slide__overlay--left`, `slide__content--left`). Per-page photo via `<img src>` in HTML.
- **CTA bands:** `.cta-band--photo` — same left-aligned photo treatment as hero
- **CTA lockup (site-wide):** `.cta-band--cinema-lockup` — copy-left + optional call card; Careers / Support / Training omit the call card
- See `design-spec.md` and `cline-project-handoff.md` for full project context

## Design directions (2026-08-17)

Homepage and shared components use an editorial, numbered-row system with inverted light bands and photo-led cards. **Do not revert** these patterns without explicit client direction.

### Accent + section headers
- Orange accent words in headlines: `.accent` on dark surfaces, `.accent--deep` on light
- Short orange rule under titles: `.headline-rule` / `.headline-rule--deep` (48px bar — same motif on testimonial card tops)
- Eyebrows: uppercase Navigo, `--ls-meta` tracking; deep orange on light sections
- **Applied site-wide:** the section-header accent/rule system (accent word + headline-rule under `section-title`) now runs on Homepage + all 8 interior pages (ES, MCS, Automation, Application, Training, Support, About, Careers). Keep new section titles on the pattern. `.headline-rule--deep` on light (white/gray) sections.

### Haas Relationship (Figma `7080:1405` intro · `7080:2240` features)
- Section: `.haas-relationship` — eyebrow row, intro copy, features band, CTAs
- **Watermark:** `assets/images/haas-wordmark-watermark.svg` at ~5% opacity inside `.haas-relationship__bg`; visible copy in `.haas-relationship__content` with `isolation: isolate` + z-index so intro/brand sit **above** the watermark. Watermark is **static** (`position: absolute`) behind intro only — not the features band. Section uses `overflow-x: clip`. No parallax.
- **Features band:** `.haas-relationship__features` — **inverted light treatment:** white bg, `--clr-ink` titles, `--clr-gray-body` copy, `--clr-gray-muted` labels. Icon tiles on `--clr-gray-card` with black SVGs (CSS filter). Vertical hairline dividers `rgba(0,0,0,0.08)`. Four columns numbered `01 ·`–`04 ·`.

### Latest Projects & News (homepage + ES editorial)
- Class: `.news-section--editorial` → `.news-editorial` grid (`1.08fr / 1fr`)
- **Lead story:** `.news-feature` — full-bleed photo, 105° left gradient + bottom scrim (matches hero/CTA), orange `.news-tag`, Barlow headline, 3-up stat row on hairline rule
- **Secondary rows:** `.news-list` → numbered `.news-item` (index `02`–`04`), `.news-tag--light` chips, 132×96 thumb; hover tints row and turns index/title deep orange
- **Scope (2026-08-17 session):** editorial split live on Homepage **and** Engineered Solutions (ES converted from legacy `.news-card`). Legacy `.news-card` styles remain in CSS for showroom/preview pages — do not remove.
- Story links omitted until dedicated news page (client TBD) — no dead `href="#"`

### Testimonials (shared partial)
- Partial: `partials/testimonials-block.html` — Homepage, Engineered Solutions, **and all interior pages** (MCS, Automation, Application, Training, Support, About, Careers) via `<div data-include>` placed before each CTA band
- Layout: `.testimonial-grid` (3 → 2+1 → 1 col in `layout.css`), **not** the old split-photo carousel
- Card: `.testimonial-card` — orange top rule (widens on hover), oversized serif closing quote in `--clr-orange-tint` bottom-right, hairline divider above attribution, Barlow Condensed name (20px), uppercase micro role label (11px, `--ls-meta`). Hover: 4px lift + orange-tinted border. `prefers-reduced-motion` disables lift.
- Scroll reveal: `.testimonial-card` in `animations.js` targets

### Typography
- **Display:** Barlow Condensed (`--font-display`) — section titles, card titles, stat numerals, testimonial names, news index numerals
- **Body/UI:** Navigo (`--font-sans`) — paragraphs, labels, buttons
- Buttons: uppercase + 0.05em letter-spacing

### Photography + motion
- Photo cards: left gradient overlay at 105°, bottom scrim where needed
- Card image zoom on hover; disabled under `prefers-reduced-motion`
- `elevated.css` photography cohesion includes `.news-feature__bg`, `.news-item__thumb` with hero/CTA images

### Feature icon tiles (site-wide)
- **Pattern:** 40×40 `--clr-gray-card` tile, 4px radius, 18px icon — matches Haas features band (`7080:2240`)
- **Classes:** `.haas-relationship__icon` (img + `filter: brightness(0)`), `.category-card__icon`, `.why-feature__icon` (inline SVG, `stroke: var(--clr-ink)`)
- Do not use orange-tint icon backgrounds or rounded-10/12px tiles on interior pages

### Figma reference nodes (Gerotech-Design `YgHwqyyFj57c1ZSbmfkL0c`)
| Area | Node |
|------|------|
| Haas Relationship intro + watermark | `7080:1405` |
| Haas features band (inverted) | `7080:2240` |
| Homepage wireframe | `6218:10` |
| ES wireframe | `6217:425` |

## Pages (11 HTML)

| Page | File |
|------|------|
| Homepage | `index.html` |
| Engineered Solutions | `engineered-solutions.html` |
| Machine Custom Solutions | `machine-custom-solutions.html` |
| Automation & Controls | `automation-integration.html` |
| Applications | `application.html` |
| Training | `training.html` |
| Support | `support.html` |
| About | `about.html` |
| Machine Modification | `machine-modification.html` (redirect → MCS) |
| Showroom | `showroom.html` (exploratory) |
| Hero variations | `hero-variations.html` (exploratory) |

Shared partials: `partials/site-header.html`, `partials/site-footer.html`, `partials/testimonials-block.html`

## Session continuity

This project is worked on in **Cursor** and **VS Code (Cline)** — plus other agents as needed.

### Sync workflow (all editors)

| When | Action |
|------|--------|
| **Session start** | Read `.clinerules`, then `JOURNAL.md` (newest first), then `git log -5` |
| **Session end** | Prepend to `JOURNAL.md`; update **Current Session State** in `.clinerules` |
| **Handoff code** | Commit + push so the other editor pulls the same branch |

Shared config (committed in repo):

- `.clinerules` — live state (Cline reads this automatically)
- `AGENTS.md` / `CLAUDE.md` — LLM instructions (Cursor + Claude Code)
- `.cursor/rules/gerotech-agent-sync.mdc` — Cursor always-on sync rule
- `.vscode/tasks.json` — **Serve Gerotech (8080)** dev server
- `.vscode/mcp.json` — Figma MCP (remote) for VS Code Copilot Agent

### Local preview

From repo root: `python3 -m http.server 8080` → http://localhost:8080/

**Note:** Server can hang after long sessions — if `ERR_EMPTY_RESPONSE` or `ERR_CONNECTION_REFUSED`, kill port 8080 and restart.

In VS Code: **Terminal → Run Task → Serve Gerotech (8080)**.

### Figma → agent workflow (global remote MCP)

Figma is used via the **remote** MCP at `https://mcp.figma.com/mcp` — works in **any project**, no Figma desktop app or local `:3845` server required.

| Client | Config |
|--------|--------|
| **Cursor** | Figma plugin (`/add-plugin figma`) + global `~/.cursor/mcp.json` |
| **VS Code Copilot** | `.vscode/mcp.json` (this repo) or user-level MCP |
| **Cline** | Add remote HTTP server `https://mcp.figma.com/mcp` in Cline MCP settings |

**Workflow (any project):**
1. Open the design at [figma.com](https://www.figma.com) (FigmaAgent supplies local fonts if installed)
2. Copy a frame/layer link (`figma.com/design/:fileKey/...?node-id=...`)
3. In **Agent mode**, paste the link and ask to implement using this project's HTML/BEM/tokens
4. Prefer skill **`figma-design-to-code`** before `get_design_context`
5. First use: authenticate Figma MCP (**Settings → MCP → Figma → Connect**) if tools show `needsAuth`

**Gerotech file keys (reference):**
- File: `YgHwqyyFj57c1ZSbmfkL0c` (Gerotech-Design)
- Haas Relationship intro: `7080:1405` · Haas features band: `7080:2240`
- ES wireframe node: `6217:425` · Homepage wireframe: `6218:10`

**Note:** Local Dev Mode MCP (`http://127.0.0.1:3845/mcp`) only works with Figma **desktop** + Dev Mode MCP enabled. This machine uses **web Figma + remote MCP** instead — do not depend on `:3845`.

@FIGMA.md
