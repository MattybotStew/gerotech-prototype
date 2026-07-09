# Project journal — gerotech-prototype

Shared session log for all AI agents. Newest entries at the top.

## 2026-07-09 — Claude Code (Fable 5)
- Added Machines mega dropdown to the shared header partial: full Haas catalog (8 categories / 41 models per client screenshot), 4-column viewport-centered panel matching the existing ES mega-nav design system, plus "Talk to an Engineer" CTA and full-catalog footer link.
- Mobile nav: Machines is now a `<details>` accordion with the 8 category links.
- nav.js: Escape key dismisses open menus (keyboard a11y).
- Decision: kept the top-level Machines link pointing at gerotech.com/machines (existing behavior); all 41 model links are `#` placeholders — Matt supplies URLs later (TODO comments in partial).
- Fixed Safari bug found after user report: panel used `position: fixed; top: auto`, which WebKit anchors to the document flow position instead of the stuck header — menu rendered ~800px off-screen when scrolled. Now anchors absolutely to the sticky header (li static). Also stretched nav items to full header height so hover survives the link→panel traversal gap.
- Verified with Playwright (WebKit + Chromium) at 1440px + 390px, scrolled and unscrolled. Uncommitted.

## 2026-07-07 — Claude Code (setup)
- Adopted agent-agnostic setup: AGENTS.md is canonical (CLAUDE.md is a symlink), this journal tracks cross-agent session history.
- Recent git history at time of setup:
  - 51020b3 Add product galleries to Applications and Automation & Controls Solutions pages
  - f3c9206 fix: move mailing list signup from buried footer to standalone section
  - 1950760 feat: replace footer logo placeholder with GEROTECH wordmark text
  - 8502f25 feat: populate automation modals with presentation content + footer mailing list signup
  - 3d388d7 Add Figma comments to engineered-solutions.html
  - 068801f chore: update .clinerules with current session state
  - d564578 feat: replace intro category cards with Haas machine browse on homepage
  - 875a9e6 chore: set GEROTECH wordmark to white
