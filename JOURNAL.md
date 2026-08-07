# Project journal — gerotech-prototype

Shared session log for all AI agents. Newest entries at the top.

## 2026-08-07 — ES hub gateway layout (Cursor)
- **Client (Tristien/Mike):** ES page redundant — mega menu + Why Explore links + filterable service grid all led to same content. Keep mega menu + Why→detail pages + trust strip; remove grid; emphasize FANUC.
- **Removed:** Entire `#es-grid` What We Do section (filters, cards, guide) + `filter.js` from `engineered-solutions.html`.
- **FANUC:** New `.credential-band--featured` chapter after stats — larger badge, H2 claim, benefits list, Talk to an Engineer + Explore Automation; `id="fanuc"`. Placeholder badge only (logo still pending).
- **CTAs:** Hero/partners/capability → `Explore Capabilities` → `#why-headline`. FAQ H2 → **Common Questions**. Partners copy softens FANUC double-sell.
- **CSS:** Featured band in `components.css` / `layout.css` / `elevated.css`.
- **Loose ends:** Not committed; visual QA at 390px; official FANUC logo; Figma `6:124` still has old grid — align when convenient. Peek-card homepage WIP still uncommitted from Aug 4.

## 2026-08-04 — Figma peek-card homepage hero (Cursor)
- **Live homepage:** Replaced classic arrows/dots carousel with Figma Make-style **peek-card** hero (`.hero-slider--peek`): left circular index, bottom-right preview cards for other slides, 3 slides (Macomb training / New Arrivals / Engineered Solutions), 10s autoplay, 450ms opacity crossfade.
- **Artifact:** Excel 5-slide hero saved at `artifacts/homepage-hero-excel-5-slide.html` — restore by swapping that `<section>` onto `index.html`.
- **JS/CSS:** `slider.js` supports peek + classic paths; peek styles in `components.css`.
- **Verified:** index, hero-variations, artifact HTTP 200.
- **Loose ends:** Not committed; peek mobile layout may need visual QA at 390px.

## 2026-08-04 — Excel content sync (5 pages) (Cursor)
- **Homepage (`index.html`):** 5-slide hero (training, showroom inventory multi-CTA, rotary, training duplicate, Winner's Circle); intro + cinema CTA + newsletter copy from content doc. Slide 2 H1 demoted to H2 (H1 only on slide 1).
- **ES hub:** Why-section body + Get A Quote; removed 7 grid cards (Spin Forming, 5-Axis Grinding, Mist & Dust, Tool Offsets, RFID, Fire Suppression, Electrical); Sheet Metal detailed body; CTA headline + newsletter subtitle.
- **MCS:** Hero eyebrow `MACHINE CUSTOMIZATIONS`; modal templates keep Talk to an Engineer only (Get a Quote removed).
- **Applications:** Eyebrow + H1 `Applications Solutions`; removed RFID/Fire Suppression cards; modal Get a Quote removed (page CTA kept).
- **Automation:** Eyebrow + name-split add “and”; removed Electrical card + gallery tile; modal Get a Quote removed; CTA headline updated.
- **Verified:** All 5 pages HTTP 200; ES service cards = 19; MCS/App/Auto cards = 8/6/5.
- **Loose ends:** Excel dump via openpyxl was approval-blocked this session — copy applied from approved prompt + existing partial homepage edits; Figma `6:124` still lags Excel. Uncommitted CSS name-split why-feature rule removal left as-is (no CSS scope in this pass). Not committed.

## 2026-08-03 — Applications page: hero + CTA copy removal, new cards (Cline)
- **Application page (`application.html`):** Removed hero body sentence ("Part programming, process troubleshooting, optimization, tooling recommendations, demos, and training — our application engineers help you get the most out of your equipment.") and removed CTA band body sentence ("Our application engineers help you get the most from your machines, tooling, and production processes.").
- **Application page:** Added 2 new cards to the Application Services grid — **RFID** and **Fire Suppression** (8 cards total now). Both use placeholder copy ("Content coming soon.") + HTML comments flagging no detail copy provided; Unsplash stand-in images pending client photography.
- **Loose ends:** RFID + Fire Suppression detail copy still TBD (same as ES page placeholders).

## 2026-08-03 — Figma design review: ES cards + MCS modals (Cline)
- **ES page (`engineered-solutions.html`):** Removed "Why Gerotech" eyebrow (both Why-features + trust sections) + "More Coming Soon" placeholder card; added "Everyday at Gerotech…" tagline placeholder (copy TBD); updated Machine Column Risers + Sheet Metal Modifications card copy; added 6 new Machine Customization cards — Spin Forming, 5-Axis Grinding, Mist & Dust Collection, Tool Offsets, RFID (placeholder), Fire Suppression (placeholder). Machine Customization group now totals 14 cards.
- **MCS page (`machine-custom-solutions.html`):** Updated modal copy for Machine Column Risers, Sheet Metal Modifications, Safety & Environmental, Auto Doors (full copy from Figma comments); removed hero eyebrow; flagged 4 cards needing content (Hydraulic/Pneumatic, Custom Workholding, Process Engineering, Specialty Machine) as HTML comments only (no visible "Content TBD."); removed email signup section.
- **Application page (`application.html`):** Removed hero eyebrow + email signup section.
- **Automation page:** Removed stray "(Slide 15)" from "Standardized Software Design Methodology" summary + visible "Client provides final copy." from Robot EOAT modal (kept as HTML comments).
- **Verified:** All 4 ES pages HTTP 200; 14 machine cards; breadcrumb targets resolve; no visible stray authoring notes.
- **Loose ends:** Tagline/RFID/Fire Suppression copy TBD; MCS card content TBD; dialog removal (item 15) ambiguous — needs commenter clarification; ES "Update spacing" near signup flagged; Automation "Stay in the Loop" email signup still present (PM decision — removed on MCS + Applications, kept on ES main + Automation).

## 2026-07-31 — Careers page + About rebuild (Cursor)
- **Careers:** New `careers.html` — trust-integrated hero, culture split, open positions table, benefits cards, cinema CTA; live copy from gerotech.com/careers/.
- **Nav:** Header/footer Careers links → `careers.html`.
- **CSS:** `.careers-table` + `.careers-benefits-note` in `components.css`.
- **About:** Rebuilt with live About copy + `page-hero-trust` (prior session work, same batch).
- **Loose ends:** Job links use mailto placeholders — wire to client ATS when available.

- **Copy width:** `--hero-copy-max: 820px` on left-aligned hero headline/body (was 600px).
- **Showcase:** Removed Photo dock + Minimal options; four finalists remain. Trust hero copy spacing; editorial split headline 10% smaller.
- **Loose ends:** Not committed yet in this entry — see git.

## 2026-07-31 — Cinematic footer CTA site-wide (Cursor)
- **Component:** New `cta-band--cinema` — centered full-bleed photo, radial vignette, body lede, dual CTAs.
- **Pages:** Replaced `cta-band--photo` on all 8 core pages (homepage + interiors).
- **Showcase:** Hero option 03 renamed to footer CTA preview; uses production `cta-band--cinema` markup.

## 2026-07-31 — Hero design options page (Cursor)
- **Page:** `hero-variations.html` — rebuilt as a polished 7-option hero showcase with sticky jump nav, metadata tags, and varied Gerotech copy.
- **CSS:** New `assets/css/hero-showcase.css` (exploratory page only — not in global load order).
- **Options:** 01 live carousel · 02 editorial split · 03 cinematic center · 04 left gradient static · 05 photo dock · 06 trust-integrated · 07 minimal statement.
- **Loose ends:** Not committed; preview at `/hero-variations.html`.

## 2026-07-30 — Global testimonial template (Cursor)
- **Partial:** `partials/testimonials-block.html` — homepage split-photo carousel (3 slides, dot nav).
- **Pages:** Homepage + ES hub include the partial; removed ES card variant (`.es-testimonials-section`, `.testimonial-card` carousel).
- **JS:** `testimonials.js` + `include-partials.js` init after partial load.

## 2026-07-30 — Stat strip → trust-strip style (Cursor)
- **Style:** ES + About stat sections now use homepage `.trust-strip` dark bar (orange left rule, white value, grey label, orange bottom border).
- **Counter:** `data-count` on `.trust-strip__value`; headline sits in `.stat-strip__intro` above the bar.

## 2026-07-30 — Stat strip counter redesign (Cursor)
- **Style:** Replaced card pills with flat `.stat-counter` columns — white bg, vertical dividers, large orange numbers, reference-style headline.
- **Animation:** New `stat-counter.js` — counts up on scroll via `data-count` / `data-suffix`; respects `prefers-reduced-motion`.
- **Pages:** `engineered-solutions.html`, `about.html` (Year Founded + “100s” stay static).

## 2026-07-30 — ES hub design refinement (Cursor)
- **Why section:** Stronger headline (“Why Manufacturers Trust Gerotech”); explore links to MCS, Applications, Automation category pages; MCS/Automation name-split titles.
- **ES grid:** Centered header + lede; filters on own row; footer guidance CTA (“Not sure which solution fits your shop?”); category pills aligned to “Machine Custom Solutions” / “Automation Controls Solutions”.
- **News:** Split layout (headline + lede + More Updates left, feed right) on gray band; category meta labels on cards.
- **Spacing:** Extra margin below FANUC credential band (#59).
- **Loose ends:** Not committed; “More Updates” href `#` pending news/blog page (ORDER #48); service card copy still placeholder.

## 2026-07-30 — Unified interior page hero (Cursor)
- **Hero:** All 7 interior pages now use `.page-hero` — same HTML/CSS as homepage hero slide (`slide__bg`, `slide__overlay--left`, `slide__content--left`, `slide__eyebrow/headline/body`).
- **Removed:** Per-page `es-hero` / `mcs-hero--photo` CSS modifiers from `elevated.css`; backgrounds moved to `<img>` in each page.
- **ES detail pages:** Breadcrumb retained as `.page-hero__breadcrumb`; duplicate category badges removed.

## 2026-07-29 — ES mega-menu 2-col + category CTA (Cursor)
- **Layout:** Pure 2-column ES mega (By Category | All Services); removed horizontal CTA band + robot image.
- **CTA:** “Talk to a Sales Engineer” pinned to bottom of first column via flex + `margin-top: auto`.
- **Loose ends:** Not committed; `es-mega-cta-robot.png` unused in markup.

## 2026-07-29 — ES mega-menu horizontal CTA band (Cursor)
- **Layout (option C):** ES mega → 2 nav columns + full-width dark CTA band below (photo left, headline/body/button right). Width `min(880px, calc(100vw - 48px))`.
- **Replaces:** Narrow Col 3 vertical stack that broke “Talk to a Sales Engineer” button.
- **Loose ends:** Not committed; mobile ES CTA still “Talk to an Engineer →”.

## 2026-07-29 — ES mega-menu CTA robot image — white-bar fix (Cursor)
- **Issue:** White vertical bars beside robot photo — letterboxing baked into original Figma export plus bare `<img>` scaling full file width.
- **Fix:** Replaced asset with cleaner center-crop (`300×1024`); added `.mega-nav__cta-media` wrapper (overflow hidden, horizontal bleed); img `height: 100%` + `object-fit: cover`.
- **Loose ends:** Not committed; button copy/link unchanged.

## 2026-07-29 — ES mega-menu CTA robot image (Cursor)
- **ES mega-menu Col 3:** Restored Figma robot-arm photo above “Talk to a Sales Engineer” button; image exported from Figma node 6805:69 → `assets/images/es-mega-cta-robot.png`.
- **CSS:** CTA panel back to flex column (dark bg, 20px padding, image flex-grow + cover, button unchanged fit-content).

## 2026-07-29 — Mega-menu CTA panel + button polish (Cursor)
- **ES mega-menu CTA panel:** Reduced to button-only — removed FANUC badge, headline, and body copy; panel padding tightened.
- **Mega-menu CTAs:** Removed `→` suffixes from “Talk to an Engineer” and “Talk to a Sales Engineer”; buttons use `width: fit-content` and hug label text.
- **Layout:** ES mega width 748px; third column grid ratio 1.1fr; machine-help column `align-items: flex-start`.
- **Nav:** Desktop/mobile dropdown `+` carets and styles unchanged.

- **Machine browse (#73):** Official Haas logo (`assets/images/haas-logo.png`) in dealer header; “Browse Haas Machines ↗” CTA; “Authorized Factory Outlet” badge.

## 2026-07-29 — Header polish: alert banner + search (Cursor)
- **Alert banner:** Background `#000` (`--clr-black`) per Figma.
- **Search button:** Light gray bg (`--clr-gray-border`), dark icon (`--clr-ink`) per Figma.

## 2026-07-29 — Figma homepage comments (Cursor)
- **Trust strip:** Removed Wixom from locations line (`Flat Rock · Grand Rapids`).
- **Award banner:** Removed eyebrow + credit lines; body reworded per tbridges (#71).
- **Machine browse:** Haas text wordmark + dealer lead copy; headline now references Haas (#73).
- **Header:** Primary CTA → "Talk to a Sales Engineer"; ES mega button matches; "Talk to an Engineer" kept on engineering paths (#74/#75).
- **Homepage CTA:** Headline changed from "Put our engineers…" to "Ready to discuss your project?" (#76/#77).
- **Loose ends:** Official Haas logo asset still pending; Flat Rock in trust strip kept (HQ) — client asked re content sheet (#70).

## 2026-07-14 — Agent docs refresh (Cursor)
- **Docs:** Refreshed `AGENTS.md`, `.clinerules`, `JOURNAL.md`, `design-spec.md`, `docs/PROJECT_BRIEF.md`, `cline-project-handoff.md`, `.cursor/rules/gerotech-agent-sync.mdc`.
- **Fixes:** `.clinerules` last-commit pointer → `45977a9`; documented all interior hero modifier classes; Unsplash 404 swap IDs recorded.
- **Remote:** `master` confirmed synced with `origin/master` (no unpushed commits).

## 2026-07-14 — Agent docs sync + interior hero unification (Cursor)
- **Docs:** Updated `AGENTS.md`, `CLAUDE.md`, `docs/PROJECT_BRIEF.md`, `design-spec.md`, `.cursor/rules/gerotech-agent-sync.mdc`, `.clinerules`.
- **Heroes:** All interior pages now use left-aligned photo hero (commit `79b9726`).
- **CTA:** Photo CTA bands left-aligned like hero (`d7138d0`).
- **Images:** Fixed 404 Unsplash URLs on homepage intro/CTA (`4331930`).

## 2026-07-14 — Full design fixes pass (Cursor)
- **Bugs:** Homepage `#main` skip target; scoped `.es-hero` photo modifiers (blueprint / about / support / training).
- **Homepage:** 3 category cards (Machines, ES, Support); slide 3 FANUC ASI eyebrow; cohesive news thumbs; machine tabs → `machine-tabs.js`.
- **ES hub:** Technology Partners section (9 wordmarks); capability band → boxed `.capability-card` layout.
- **Site-wide:** Search modal with quick links; email signup thanks state; footer links wired; CTA band rhythm; SVG category icons (about/support).
- **Automation:** Gallery renamed "Installed Automation Projects".
- **CSS:** Removed dead `.partners-section` / `.partner-logo`; kept `.partner-wordmark` for ES partners grid.

## 2026-07-14 — Elevation pass: photography, Typekit prep, ES/MCS (Cursor)
- **Photography:** Hero slide 2 + intro image aligned to warmer industrial set; `decoding="async"` on homepage heroes; subtle saturation/contrast on hero/CTA photos; MCS sheet-metal card swapped off mismatched asset.
- **Typekit:** `design-spec.md` documents exactly what to add — **Navigo Medium (500)** required; Black (900) optional; no Thin/Light.
- **Tokens:** `--fw-medium` / `--fw-semibold` → 500 (falls back to 400 until kit updated).
- **ES hub:** Dark hero with blueprint bg overlay; why-feature hover accents; stat strip borders; trust accordion open state; credential band hover.
- **MCS:** Left orange accent bar on hero; gallery card lift + image zoom.
- **Branch:** `cursor/design-elevated` — ready to merge → `master`.

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
