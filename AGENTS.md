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

This project is worked on by multiple AI agents (Claude Code, Cline, Gemini CLI, Deep Code, …).
- At session start: read `JOURNAL.md` (newest first), `.clinerules`, and recent `git log`.
- Before ending a session: add a short entry at the top of `JOURNAL.md` — date, agent/model, what was done, decisions, loose ends. Update `.clinerules` state section.