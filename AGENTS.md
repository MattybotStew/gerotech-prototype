# LLM Instructions — Gerotech Prototype

This file is read by Claude Code and any other LLM assistants working in this repo.

## Shared Context (read every session)

Read `.clinerules` at the start of every session. It contains current project state, what was last worked on, open decisions, and things not to do. After any change, update `.clinerules` so all agents stay in sync.

## Project

CloudMellow (Matt's agency) is rebuilding the Gerotech website (Michigan CNC machinery distributor, Haas Factory Outlet, est. 1987). This repo is a **static HTML/CSS/JS prototype** — NOT the production build. The final site will be WordPress.

## Stack

- Pure HTML5 / CSS3 (custom properties) / vanilla JS (ES6)
- Zero frameworks, no build tools, no package manager
- Font: Navigo via Adobe Fonts (kit `lqh7ybe` — 400 + 700 weights only)
- CSS load order: `assets/css/tokens.css` → `assets/css/components.css` → `assets/css/layout.css`
- JS: `nav.js`, `slider.js`, `filter.js`, `animations.js`, `testimonials.js`

## Key conventions

- All images are placeholder Unsplash stand-ins — replace with client-provided assets when ready. Unsplash is approved placeholder treatment (Matt-approved).
- CSS class naming: BEM (e.g. `.service-card__category`, `.slide__content--left`)
- Phone links: E.164 format (`tel:+17343797788`)
- Never guess at open client decisions — use placeholder + HTML comment
- Navigo font weights: only 400 and 700 are available from kit `lqh7ybe`. 500/600/800 silently fall back.
- Buttons use `text-transform: uppercase` + 0.05em letter-spacing
- Card border-radius: 0 (squared edges per Figma design)
- See `design-spec.md` and `cline-project-handoff.md` for full project context

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

In VS Code: **Terminal → Run Task → Serve Gerotech (8080)**.

### Figma (each editor authenticates once)

- **Cursor:** Settings → MCP → figma → Connect (or `/add-plugin figma`)
- **VS Code Copilot:** Open `.vscode/mcp.json` → Start figma server → sign in
- **Cline:** Cline panel → MCP Servers → add HTTP server `https://mcp.figma.com/mcp`

Then paste a Figma frame link and ask to implement using this project's HTML/BEM/tokens.