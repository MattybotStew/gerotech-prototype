# LLM Instructions — Gerotech Prototype

This file is read by Claude Code and any other LLM assistants working in this repo.

## Shared Context (read every session)

Read `.clinerules` at the start of every session. It contains current project state, what was last worked on, open decisions, and things not to do. After any change, update `.clinerules` so all agents stay in sync.

## Project

CloudMellow (Matt's agency) is rebuilding the Gerotech website (Michigan CNC machinery distributor, Haas Factory Outlet, est. 1987). This repo is a **static HTML/CSS/JS prototype** — NOT the production build. The final site will be WordPress.

## Stack

- Pure HTML5 / CSS3 (custom properties) / vanilla JS (ES6)
- Zero frameworks, no build tools, no package manager
- Font: Plus Jakarta Sans via Google Fonts
- CSS load order: `tokens.css` → `components.css` → `layout.css`

## Key conventions

- All images are `<div class="img-placeholder">` — replace with `<img>` when real assets arrive
- CSS class naming: BEM (e.g. `.service-card__category`)
- Phone links: E.164 format (`tel:+17343797788`)
- Never guess at open client decisions — use placeholder + HTML comment
- See `design-spec.md` and `cline-project-handoff.md` for full project context

## Session continuity

This project is worked on by multiple AI agents (Claude Code, Gemini CLI, Deep Code, …).
- At session start: read `JOURNAL.md` (newest first) and recent `git log`.
- Before ending a session: add a short entry at the top of `JOURNAL.md` — date, agent/model, what was done, decisions, loose ends.
