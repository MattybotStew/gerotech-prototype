# Project journal — gerotech-prototype

Shared session log for all AI agents. Newest entries at the top.

## 2026-07-14 — Design elevation pass (Cursor)
- **New layer:** `assets/css/elevated.css` loaded site-wide after layout.css — sticky header blur, hero depth, trust strip, button/card micro-interactions, section rhythm.
- **Homepage:** Trust metrics strip below hero (Since 1987, 3 locations, Haas FFO, FANUC ASI) replaces removed partner band with sharper proof points.
- **Tokens:** `--shadow-btn`, `--shadow-btn-hover`, `--ease-spring`.
- **Branch:** `cursor/design-elevated` — not merged.

## 2026-07-14 — Design recommendations implementation (Cursor)
- **Homepage:** Hero trimmed to 3 slides (Training, Machines, ES); slide 1 owns H1; primary CTAs wired (training, about, mailto quote).
- **ES hub:** Draft stats (35+ years, 3 locations, 500+ machines, 12 engineers); trust FAQ filled; testimonial placeholders replaced; FANUC badge styled as award block; filter tabs use name-split pattern.
- **Nav:** Mega-menu labels aligned — Machine / Custom Solutions, Automation / Controls Solutions; Get a Quote → mailto.
- **Automation page:** Name-split hero pattern applied.
- **MCS:** Gallery reframed as "Installed Projects" with project captions; modal copy filled; CTAs wired.
- **Orphan page:** `machine-modification.html` redirects to MCS.
- **Site-wide:** Lighter alert banner + collapse on scroll; footer socials hidden until URLs confirmed; support/training `#` CTAs wired.
- **Docs:** `design-spec.md` updated with interior hero system + CTA destinations.
- **Not done (needs client/external):** Navigo 500 in Adobe kit; official FANUC logo; real sales email confirmation; machine catalog `#` URLs.

## 2026-07-14 — Presentation-ready verification (Cursor, cursor/cline-beauty-pass)
- **Branch:** `cursor/cline-beauty-pass` reset from latest `master` (`83ae812`). All beauty-pass goals A–C already implemented on master — this pass verified, did not re-implement.
- **Verified @1440px:** Homepage (partners band, intro frame, model tags, testimonials, Ken Burns), ES (SVG why-feature icons), MCS (name split hero).
- **Verified @390px:** Homepage machine tabs horizontal scroll; no console errors on fetch of all 9 pages.
- **Per-page CTA images:** 9 unique Unsplash stand-ins confirmed.
- **Not changed (per blockers):** Nav "Machine Customization" vs page "Custom Solutions", orphan machine-modification.html, FANUC badge placeholder, `#` CTAs.
- **Not pushed** — awaiting Matt.

## 2026-07-14 — Merge beauty pass + per-page CTA images (Cursor)
- **Merged** `cursor/beauty-pass-polish` → `master` (partners, model tags, hero motion, ES SVG icons, token/CSS polish).
- **Salvaged from Cline WIP:** Each page now has its own `cta-band--photo` background (9 unique Unsplash stand-ins; no longer one shared image). Interior pages: about, application, automation-integration, engineered-solutions, machine-custom-solutions, machine-modification, support, training.
- **Discarded:** Duplicate/incomplete beauty-pass staged edits on `cursor/cline-beauty-pass`; `.claude/settings.json` (local paths, not committed).
- **Next:** Orphan machine-modification.html, FANUC badge, `#` CTAs, real partner logos when client supplies assets.

## 2026-07-14 — Beauty pass (Cursor)
- **Design polish:** Squared card radii (`--radius-card` → 0), orange/ink tints, intro image offset frame, partner wordmark grid (12 brands), model-tag chips on all 5 machine panels, hero Ken Burns, news-card hover lift, testimonial track shadow, machine-tab horizontal scroll on mobile.
- **Homepage:** Partners section after intro (Haas, Midaco, Fanuc, OnRobot, Dynatect, Royal Products, Marpos, Tsudakoma, Alberti, Renishaw, Keyence, 5th Axis). Testimonial slides 2–3 filled with draft quotes (no bracket placeholders).
- **Engineered Solutions:** Replaced emoji why-feature icons with inline SVG stroke icons (orange industrial style).
- **Next:** Orphan machine-modification.html, FANUC badge, `#` CTAs, real partner logos when client supplies assets.

## 2026-07-14 — Afternoon Session (Cursor)
- **MCS page naming split**: Fixed visual separation between "Machine" and "Custom Solutions"
- Updated heading structure to match other interior pages
- **Next**: Orphan machine-modification.html, FANUC badge, `#` CTAs

## 2026-07-14 — Claude Code (Fable 5) — homepage patterns propagated to interior pages
- Matt asked to roll homepage additions out site-wide. Photo CTA band (`cta-band--photo`) replaced the white-card CTA on all 8 interior pages — DECISION REVERSED from 2026-07-13 ("interior pages keep the white-card CTA"); each page keeps its own copy and tel: links, all use the homepage's placeholder image for now.
- Email signup added to about + support (only pages missing it). Navigation untouched — header/footer partials are already shared across all pages.
- showroom.html left alone (exploratory, has its own CTA variant). Verified via Playwright screenshots, no console errors.

## 2026-07-14 — Claude Code (Fable 5) — inline CSS migrated to global stylesheets
- Matt asked to globalize inline/hardcoded CSS. index.html's `<style>` block (machine tabs/panels) moved into components.css and tokenized; all `style=""` attributes stripped from index/about/support/engineered-solutions in favor of classes: `.slide__bg--right`, `.news-more`, `.about-photo`, `.section--white/--gray`, `.es-hero--compact`, `.grid-2--split`, `.grid--offset-top`, `.section-body--spaced`.
- Left alone on purpose: showroom.html and hero-variations.html `<style>` blocks — exploratory variant pages; promote their styles to components.css only if/when the designs are adopted.
- Verified with Playwright at 1440px (tabs default + switched, hero crop, about, support): rendering unchanged, no console errors.

## 2026-07-14 — Claude Code (Fable 5) — machine tab visual fix
- Fixed stray radius-matching arcs on inactive machine tabs (homepage). Cause: index.html's inline `<style>` gave `.machine-tab + .machine-tab` dividers both `border-left` and `border-radius`, curving each divider. Inactive tabs are now square with straight dividers; only the active tab is rounded (pill on mobile, dividers dropped there).
- Note: the machine-tab styles that actually apply live in index.html's inline `<style>` block — the `.machine-tab` rules at the bottom of components.css are overridden by it (left in place, uncommitted from a prior session).
- Repaired pre-existing parse error in components.css: orphaned declaration block after `.slide__content--left` (leftover body from a replaced rule in an earlier uncommitted edit) — removed.

## 2026-07-13 — Claude Code (Fable 5) — whole-site design improvement
- Executed Matt-approved 4-phase plan across all 9 pages. Biggest fix: subpages loaded dead Plus Jakarta Sans and rendered fallback sans-serif — all now load the Typekit Navigo kit.
- Consistency: squared all interior card types, 80→88px rhythm, replaced all 53 interior dashed placeholders with Unsplash stand-ins (POLICY CHANGE, Matt-approved — .clinerules updated; each img carries a credit/awaiting-client comment; only reused the 17 verified homepage URLs).
- Responsive: mobile nav switch at 1000px (was 768; header needs ~975px), hero/section/news/alert-banner mobile rules added, es-hero__headline--md modifier replaced inline h1 sizes (fixed 66px overflow on about @390).
- A11y/perf: :focus-visible system, skip link + #main on all pages, prefers-reduced-motion (CSS + autoplay/reveal guards), carousel aria-selected/aria-hidden/tabindex management, autoplay pause on hover/focus, single banner landmark, homepage h1, eager LCP hero img.
- Polish: unified card hover lift, image zoom in card shells, 60ms staggered reveal.
- Verified: 9 pages × 4 widths, zero console errors/404s, Navigo everywhere, no overflow; keyboard + reduced-motion passes.
- Loose ends unchanged by design: open client decisions (naming split on MCS page, orphan machine-modification.html, FANUC badge, ES stats/accordion copy, `#` CTAs).
- Follow-up (Matt request): homepage CTA band redesigned as hero-style full-bleed photo section (`.cta-band--photo` variant; new Unsplash stand-in Sam Moghadam, darker 0.85/0.75/0.82 overlay). Interior pages keep the white-card CTA.
- Follow-up (Matt request): desktop font-size double-check — swept every rendered size on all 9 pages @1440 via computed styles. Fixed 7 stragglers: slide__body 16→18 (lede), credential-band 28→h3, capability-bullet__num 48→h1, .btn 15→14 / .btn--lg 17→16 (uppercase sits a step smaller), mega-nav micro-type consolidated (col-title+services-label 10→11, cat-desc 11→12, badge 9→10). Deliberate off-scale values documented: 42px stat numerals, 22px mcs-card titles, 24px signup title.
- Follow-up (Matt request): full typography system overhaul (kept Navigo). KEY FINDING: typekit kit serves 400+700 only — 500/600/800 were falling back silently; tokens now map to real faces. Added fluid modular scale (--fs-hero→caption), tiered negative tracking (--ls-*), leading tokens, two caps-tracking standards (0.14/0.08em), balance/pretty wrapping, 62ch intro measure; removed all media-query font-size overrides (clamps handle it); unified card titles at 18px, fixed mcs-hero weight outlier. Verified computed styles on 3 pages × 2 widths. Flag to Matt: consider adding 500/800 to the kit for more weight contrast.
- Follow-up (Matt request): signup band bg → dark-nav grey #3A3A40 (the footer's old color) w/ white title + muted-grey sub; footer bg → black (--clr-ink #0D0D0D). Applies on all 7 pages via shared classes.
- Follow-up (Matt request): all button text uppercase w/ 0.05em tracking (.btn family, .btn-get-quote, .email-signup__submit, .mega-nav__cta-btn). Done in CSS via text-transform — markup copy unchanged.
- Follow-up (Matt request): testimonial panel vertical rhythm fixed — quote-mark line box crushed to 0.6 (was leaving ~40px dead space), blockquote made flex column w/ 24px gap so attribution no longer crams against the quote.
- Follow-up (Matt request): eyebrow→headline gap unified to exactly 8px everywhere (fixed es-hero 12px, mcs-hero badge 16px, hero slide 12px, intro "Since 1987" 32px, CTA band double-gap; measured with Playwright across pages). Email signup restructured on all 7 pages: new `__inner`/`__copy` wrappers — copy left-aligned, form right (flex row, wraps to stacked left-aligned on mobile).

## 2026-07-13 — Claude Code (Fable 5)
- Implemented "Gerotech Homepage.dc.html" (Deep Code standalone export found in ~/Downloads; the attached zip never reached disk — user confirmed the Downloads file as source). Unpacked its gzip/base64 bundle to read the design template.
- Most of the design was already in from Cline's Figma pass; this was a gap-closing alignment: bundled logo SVGs wired into header (dark) + footer (white, replaces text wordmark), hero converted to sliding track with dashed "Awaiting client copy" placeholder boxes on slides 2–6, homepage testimonials converted to sliding variant (ES page untouched), squared edges on testimonial/news imagery, news/CTA/email-signup metrics matched to spec, two new neutral tokens (--clr-gray-dot, --clr-gray-input).
- Decision: kept Navigo (Adobe Fonts) rather than the spec's Archivo/IBM Plex — the Navigo swap postdates the design export and looks like a deliberate brand-standards move. Flag to Matt.
- Verified with Playwright (Chromium, 1440/390px, scrolled all sections): motion, logos, no console errors.
- Loose end: hero slide 1 "View Training Schedule" and CTA/quote buttons still `#` placeholders (unchanged, per open client decisions).

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
