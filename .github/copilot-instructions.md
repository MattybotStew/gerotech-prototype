# Copilot instructions — Gerotech Prototype

Shared multi-agent repo (Cursor, Cline, Copilot, Claude, etc.). Stay aligned via the shared files below.

## Read at session start (in order)

1. `.clinerules` — live session state, blockers, recent decisions, what not to do
2. `AGENTS.md` — stack + conventions (canonical LLM instructions)
3. `FIGMA.md` — Figma remote MCP config, file links, design-to-code flow
4. `JOURNAL.md` — newest entry first (cross-agent change log)

## Hard rules (do not drift)

- Static HTML5/CSS3/vanilla JS only — no frameworks, no build tools
- CSS load order: `tokens.css` → `components.css` → `layout.css` → `elevated.css` (never change)
- Brand colors only in `tokens.css`
- BEM class naming; squared cards (radius 0); E.164 `tel:+1` links
- Hero + CTA photo bands: full-bleed photo, left gradient overlay (105deg), left-aligned copy
- Unsplash images are stand-ins — verify URLs (some 404 over time), comment each `<img>`
- Never guess open client decisions — use placeholder + HTML comment
- Never use a real FANUC logo (usage rights unconfirmed)

## Figma (remote MCP — always available)

- Server: `https://mcp.figma.com/mcp` — works in any project, no Figma desktop app
- File key `YgHwqyyFj57c1ZSbmfkL0c` (Gerotech-Design) · Homepage handoff **`7306:1063`** (canvas `6573:406`) · ES wireframe `6217:425` · Homepage wireframe `6218:10`
- Paste a frame/layer link with `node-id`, run `get_design_context` + `get_screenshot`, then implement in this repo's HTML/BEM/tokens — not React/Tailwind verbatim
- If MCP returns a localhost image/SVG URL, use it directly; do not add icon packages or placeholders for those assets
- See `FIGMA.md` for the full flow and auth steps

## End of session

- Update `.clinerules` (Current Session State), prepend to `JOURNAL.md`, commit + push so the other editor pulls the same state.
