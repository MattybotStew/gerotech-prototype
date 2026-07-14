# LLM Instructions — Gerotech Prototype

This file is read by Claude Code and any other LLM assistants working in this repo.

## Shared Context (read every session)

Read `.clinerules` at the start of every session. It contains current project state, what was last worked on, open decisions, and things not to do. After any change, update `.clinerules` so all agents stay in sync.

## Project

CloudMellow (Matt's agency) is rebuilding the Gerotech website (Michigan CNC machinery distributor, Haas Factory Outlet, est. 1987). This repo is a **static HTML/CSS/JS prototype** — NOT the production build. The final site will be WordPress.

**Branch:** `master` (presentation-ready prototype as of 2026-07-14)

## Stack

- Pure HTML5 / CSS3 (custom properties) / vanilla JS (ES6)
- Zero frameworks, no build tools, no package manager
- Font: Navigo via Adobe Fonts (kit `lqh7ybe` — **400 + 700** in kit; tokens map `--fw-medium: 500` — add Medium to kit when ready)
- **CSS load order:** `tokens.css` → `components.css` → `layout.css` → **`elevated.css`**
- **JS:** `include-partials.js`, `nav.js` (sticky, mobile, search modal, signup thanks), `slider.js`, `filter.js`, `animations.js`, `testimonials.js`, `machine-tabs.js`, `modal.js`

## Key conventions

- All images are Unsplash stand-ins (HTML comment on each) — verify URLs periodically; some IDs 404 over time
- CSS class naming: BEM (e.g. `.service-card__category`, `.slide__content--left`)
- Phone links: E.164 format (`tel:+17343797788`)
- Never guess at open client decisions — use placeholder + HTML comment
- Buttons: `text-transform: uppercase` + 0.05em letter-spacing
- Card border-radius: **0** (squared edges per Figma)
- **Hero pattern (homepage + all interior pages):** full-bleed photo, left gradient overlay (`105deg`), left-aligned copy; centers on mobile ≤768px
- **CTA bands:** `.cta-band--photo` — same left-aligned photo treatment as hero
- See `design-spec.md` and `cline-project-handoff.md` for full project context

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

Shared partials: `partials/site-header.html`, `partials/site-footer.html`

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
- `.vscode/mcp.json` — Figma MCP for VS Code Copilot Agent

### Local preview

From repo root: `python3 -m http.server 8080` → http://localhost:8080/

**Note:** Server can hang after long sessions — if `ERR_EMPTY_RESPONSE` or `ERR_CONNECTION_REFUSED`, kill port 8080 and restart.

In VS Code: **Terminal → Run Task → Serve Gerotech (8080)**.

### Figma (each editor authenticates once)

- **Cursor:** Settings → MCP → figma → Connect (or `/add-plugin figma`)
- **VS Code Copilot:** Open `.vscode/mcp.json` → Start figma server → sign in
- **Cline:** Cline panel → MCP Servers → add HTTP server `https://mcp.figma.com/mcp`

Then paste a Figma frame link and ask to implement using this project's HTML/BEM/tokens.
