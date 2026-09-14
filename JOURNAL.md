# Project journal — gerotech-prototype

Shared session log for all AI agents. Newest entries at the top.

## 2026-09-14 — MCS dropdown: Process Engineering + Specialty Machine (Cursor)
- Added both links under Machine Custom Solutions in desktop mega-nav and mobile sub-nav (`partials/site-header.html`). Same href as other MCS items (`machine-custom-solutions.html`).
- Checked mega-nav height at 1920×1080: extra rows still inside the panel (`vhClip` false). No CSS change.
- Loose ends: Safety & Environmental still not in the dropdown (comment #7 did not ask for it).

## 2026-09-14 — Automation hero swapped (Cursor)
- Client cell photo saved as `assets/images/automation-hero.jpg` and wired on `automation-integration.html` `.page-hero`. Gallery/CTA Unsplash left in place.
- Loose ends: gallery images still stand-ins.

## 2026-09-14 — Haas F1 lockup verified; ES hero swapped (Cursor)
- **#6:** Figma `7155:671` is the Haas F1 lockup on a white 5px tile — already live as `assets/images/haas-f1-lockup.png` in `.haas-relationship__brand` (476×137-ish contain in 558×372). No logo swap needed.
- **#8:** Client photo from Downloads copied to `assets/images/es-hero.png` and wired on `engineered-solutions.html`.
- MCS `machineCustomSolutions` attachments left unused — Custom Workholding + gallery stay Unsplash placeholders.
- Loose ends: Automation hero still Unsplash; copy/nav items from comment plan not executed yet.

## 2026-09-14 — Verified Figma client comments vs prototype (Cursor)
- File `YgHwqyyFj57c1ZSbmfkL0c`, page `6:124` ✅ Design [WIP]. Comments API not readable (401); checked selected frames + live HTML.
- Already in prototype: MCS titles/copy 11–16 + modal 24; FANUC ASI on ES; Haas relationship band; MCS/Automation/Applications gallery layouts; F1 lockup.
- Still to do: homepage hero copy (#2–3); mega-nav Process Engineering + Specialty Machine (#7); Applications RFID + Fire Suppression cards (#22); gallery heading “Installed Projects” → “Gallery” (#10/20).
- Blocked: logo/header/gallery images (#6,8,12,13,18,19); four MCS card bodies (#17a–d). Items #21/#23 look like MCS copy pinned on Applications/old Automation — confirm before applying.
- Loose ends: not implemented this session.

## 2026-09-01 — Published Haas F1 lockup to GitHub Pages (Cursor)
- Fast-forwarded `master` to `be3eede` so https://mattybotstew.github.io/gerotech-prototype/ serves the F1 lockup (`haas-f1-lockup.png`, 200). Pages status: built.

## 2026-09-01 — Haas F1 lockup + white brand tile (Cursor)
- **Logo:** Replaced `assets/images/haas-logo.svg` in the Haas Relationship intro with `assets/images/haas-f1-lockup.png` (from Downloads: `HaasF1TeamLogoLockup_Color (2).png`). Transparent PNG — Automation mark + F1 Team lockup. Applied on `index.html` and `index-cta-lockup-preview.html`.
- **Brand tile:** `.haas-relationship__brand` is a 558×372 card (`aspect-ratio`, padding, 5px radius) with **`background: #fff`**. Old SVG gradient is no longer used.
- **Loose ends:** Old `haas-logo.svg` left in assets. White left-side “HAAS” wordmark in the lockup sits on white — red H-mark still reads; say if a dark plate is preferred.


## 2026-08-18 — Mega-nav CTA button text invisible (Cline)
- **Bug:** Text disappeared on all 3 dropdown CTA buttons ("Talk to an Engineer", "Talk to a Sales Engineer", "Get a Quote →").
- **Root cause:** Duplicate conflicting `.mega-nav__cta-btn` rule in `components.css`. Base rule (line ~2402, `b43c854c`) = filled orange button, white text. FANUC-ASI col block (line ~4699, `d4954f17`) used the **same global class** and set `color: var(--clr-orange)` — equal specificity, later in cascade → text turned orange on the orange background (≈1:1 contrast, invisible) for all 3 buttons.
- **Fix:** Scoped the FANUC override to `.mega-nav__col--cta .mega-nav__cta-btn` and set `color: var(--clr-white)` (visible on orange fill); hover keeps white text while lightening background. The other two buttons return to base white-on-orange.
- **Verified:** Playwright render (1440px) — all 3 buttons: color `rgb(255,255,255)`, bg `rgb(243,138,44)`, `visibility: visible`, weight 700. CSS braces balanced (747/747). Diff minimal (+6/−5) in `components.css`.
- **Loose ends:** Uncommitted.

## 2026-08-17 — Peek hero full-width at ≤900px (Figma 7094:5096) (Cursor)
- **Figma:** `7094:5096` — tablet/mobile breakpoint; hero copy should span full viewport (24px inset only).
- **Fix:** At `max-width: 900px`, removed `--max-home` / `16ch` / `--hero-copy-max` constraints on peek hero copy; peek-card band `width: 100%`.
- **Loose ends:** Uncommitted. Figma MCP could not resolve node (file access limited).

## 2026-08-17 — Homepage peek hero height (Figma 7094:5312) (Cursor)
- **Figma:** `7094:5312` — slide 1 tabpanel; height hugs copy, not fixed viewport.
- **Peek hero:** `.hero-slider--peek` → `height: auto`; active slide `position: relative` so track sizes to content. Copy block `padding-top/bottom: 100px`. Removed `75vh` overrides in `elevated.css` + `layout.css`.
- **Mobile:** Bottom padding adds 96px clearance above peek-card band at ≤900px.
- **Loose ends:** Uncommitted.

## 2026-08-17 — Responsive audit: Phases 4–7 (Cline, visual verification)
- **Phase 4 (grid ladder):** `.grid-4` 4→2→1, `.grid-6`/`.partners-grid` 6→3→1, `.grid-2` collapse at 640 (was 480). `.haas-relationship__grid` 4→2×2 (≤1024, cross dividers)→1 (≤640). Added `min-width: 0` to all utility-grid items — fixes images/text forcing their track wider than the container.
- **Phase 5 (hero alignment):** mobile heroes now stay left-aligned site-wide (`.slide__content--left` + `.page-hero__actions` at ≤768), matching the homepage peek; removed the interior-only center override.
- **Phase 6 (cleanup):** deleted orphaned `.machine-browse` + `.machine-cards` CSS blocks and their layout-list entry.
- **Phase 7 (Playwright, in /tmp/pw):** scanned all 10 pages at 360/768/1024/1440 → **0 horizontal overflows** after these fixes: header collapse breakpoint 1000→1120 (desktop nav overflowed 1001–1119), `.about-photo` overflow fixed by grid `min-width:0`, `.btn` wraps at ≤480 (was overflowing a 312px split-grid column at 360).
- **Verified:** CSS brace-counts balanced; all pages + CSS serve 200; console errors = 0.
- **Files:** `assets/css/layout.css`, `assets/css/components.css` (uncommitted).
- **Loose ends:** visual screenshot eyeball not possible (model lacks image input) — used programmatic geometry instead. trust-strip / testimonial-split / testimonial-carousel legacy CSS still present (cross-file, left in place).

## 2026-08-17 — Responsive audit: universal spacing/padding (Cline, Phases 1–3)
- **Static audit** (no browser automation available in plan mode — Playwright not installed). Root causes of the "weird layouts":
  1. **Double horizontal gutter (48px vs 24px):** `.container` adds `padding-inline: 24px` AND the `layout.css` section class list adds another 24px. Sections that nest a `.container` (news, testimonials, mcs-grid, machine-lineup) got 48px mobile insets while `__inner` sections got 24px.
  2. **Mixed container widths per page:** `--max-es` was 1120px while hero/stat-counter use 1200px — left edges didn't align on interior pages.
  3. **Hardcoded vertical rhythm:** full-bleed bands used `--sp-96`/`--sp-64` block padding that ignored the `--section-y` token + its media scaling.
- **Fixes (CSS-only, no markup):**
  - Removed `padding-inline` from the `layout.css` section list; `.container` is the single gutter source. Added `padding-inline: var(--sp-24)` to `__inner` wrappers (why, es-grid, tech-partners, capability, credential, trust, email-signup).
  - `--max-es` 1120 → 1200 (unified to `--max-home`).
  - Added `--section-y-lg: clamp(72px, 8.5vw, 120px)`; applied to `.machine-lineup`, `.haas-relationship__top`, `.cta-band--cinema-lockup .cta-band__content`; removed the fixed media overrides that fought it.
- **Files:** `assets/css/tokens.css`, `assets/css/layout.css`, `assets/css/components.css`. Brace counts balanced.
- **Loose ends:** Phases 4–7 remain — grid-step/breakpoint consistency, mobile hero alignment consistency, legacy CSS cleanup, and a real Playwright screenshot pass at 360/768/1024/1440. Working tree already had uncommitted Cursor WIP (modal.js, HTML, docs) — not committed here.

## 2026-08-17 — Header responsive layout fix (Cursor)
- **Issue:** Logo appeared misaligned on mobile/tablet — header inner shrink-wrapped and centered instead of spanning full width; alert bar used 16px inset vs header/container 24px.
- **Fix:** `width: 100%` on `.site-header__inner` + `.alert-banner__inner`; alert bar padding moved to inner (`padding-inline: var(--sp-24)`). Mobile breakpoint hides desktop `<nav>` wrapper, uses `margin-left: auto` on hamburger; tighter row padding + slightly smaller logo at ≤480px; alert bar centers at ≤768px.
- **Files:** `assets/css/components.css`, `assets/css/layout.css`.
- **Loose ends:** Uncommitted. Verify at ~1440 / 768 / 390px on localhost:8080 or :8899.

## 2026-08-17 — Header logo left padding (Cursor)
- **Issue:** Logo image flush to viewport left (`left: 0`); right-side header content appeared inset.
- **Fix:** `.site-header__inner` horizontal padding `0` → `var(--sp-24)` to match `.container` and section `padding-inline`.
- **File:** `assets/css/components.css` only.
- **Loose ends:** Uncommitted. Browser MCP unavailable for live verify — refresh localhost:8080 to confirm.

## 2026-08-17 — ES detail modal close + gallery lightbox (Cursor)
- **Figma:** Pulled `7009:58` (Gerotech-Design). Node is the mobile contact bar (black / white / orange) — not a lightbox. No gallery lightbox exists in that frame, so chrome matches that high-contrast treatment rather than inventing a conflicting overlay.
- **Close X:** `.mcs-modal__close` is now a 40px ink disc, white glyph, 2px white ring + shadow so it stays visible on light or dark card photos; orange/ink on hover. Top-of-image scrim on `.mcs-modal__img`. Applies to MCS, Application, Automation detail windows.
- **Gallery lightbox:** Clicking `.mcs-gallery-card` opens a full-screen viewer (arrows, keyboard, swipe, scrollable orange-accent thumbs). Wired in `modal.js`; CSS in `components.css`. Same three ES detail pages.
- **Loose ends:** Uncommitted. Figma `7009:58` is not the MCS/gallery page — confirm if a dedicated lightbox frame exists.

## 2026-08-17 — Testimonials + email signup site-wide sync (Cursor)
- **Testimonials partial:** Added `.accent--deep` on "Michigan" + `.headline-rule--deep` under title in `partials/testimonials-block.html` — all pages pick up via include.
- **Email signup:** Unified title/copy to match homepage (`Join Our Mailing List` with accent). Added missing section to Application + MCS.
- **Cleanup:** Removed dead `testimonials.js` from index + ES; dropped `.testimonial-split` from `animations.js`.
- **Loose ends:** Uncommitted.

## 2026-08-17 — Feature icon tiles unified site-wide (Cursor)
- **Scope:** CSS-only — grouped `.haas-relationship__icon`, `.category-card__icon`, `.why-feature__icon` to match homepage Haas band pattern (40×40 `--clr-gray-card` tile, 4px radius, 18px ink/black icons).
- **Before:** Interior pages used orange-tint backgrounds (10–12px radius) with orange stroke SVGs.
- **Pages affected:** Support, About, Careers (category cards); Engineered Solutions (why-feature rows).
- **Loose ends:** Uncommitted.

## 2026-08-17 — Design system propagated site-wide (Cline)
- **Section-header accent system:** Added `.accent--deep` accent words + `.headline-rule--deep` under every `section-title` on ES, MCS, Automation, Application, Training, Support, About, Careers (was homepage-only). Light (white/gray) sections use `.accent--deep` / `.headline-rule--deep`.
- **ES news → editorial split:** Converted Engineered Solutions "Latest Projects & News" from legacy `.news-section--split`/`.news-card` to the homepage's `.news-section--editorial`/`.news-editorial` (photo lead + numbered rows 02–04, same content). No orphaned legacy classes.
- **Stat counters:** MCS, Automation, Application now include the `.stat-counter` band (37+/4,000+/12/#1) after the hero and load `stat-counter.js`. About/Careers keep `.page-hero-trust` (existing decision); Training/Support unchanged.
- **Testimonials site-wide:** Shared `partials/testimonials-block.html` included before the CTA band on MCS, Automation, Application, Training, Support, About, Careers (was homepage + ES only).
- **Verified:** all 9 pages + partials HTTP 200; edited HTML tag-balanced (err=0); editorial/news CSS present in components.css.
- **Loose ends:** Uncommitted. Story links still pending news page.

## 2026-08-17 — Agent docs: design directions sync (Cursor)
- **Updated:** `AGENTS.md`, `CLAUDE.md`, `.cursor/rules/gerotech-agent-sync.mdc`, `.clinerules`, `design-spec.md`, `cline-project-handoff.md` with 2026-08-17 design directions — Haas Relationship (watermark + inverted features band), editorial news split, testimonial card refresh, accent system, Figma node refs (`7080:1405`, `7080:2240`).
- **Loose ends:** Uncommitted code + doc updates from today's session.

## 2026-08-17 — Testimonial card refresh (Cursor)
- **Scope:** CSS-only refresh of `.testimonial-card` in components.css — shared partial `partials/testimonials-block.html` is unchanged, so Homepage + ES both pick it up.
- **Added:** 48px orange top rule (`.headline-rule` motif) that widens to 88px on hover; oversized serif closing quote in `--clr-orange-tint` parked in the empty bottom-right corner (replaces the small inline `"` on `__quote::before`).
- **Attribution:** hairline divider above the name; name now Barlow Condensed 20px (was Navigo 14px); role/company now an 11px uppercase micro-label with `--ls-meta` tracking. `__sub` gets `min-height: 2.7em` so a 2-line role (e.g. "Automotive Supplier, Southeast Michigan") doesn't push the divider out of line with the other cards.
- **Layout:** card `gap` → 0 with explicit margins; `__quote` gets `flex: 1` so attributions bottom-align. Hover adds a 4px lift + orange-tinted border; `prefers-reduced-motion` disables the lift.
- **Also:** `.testimonial-card` added to `animations.js` scroll-reveal targets (the old `.testimonial-split` target is stale since the carousel became a grid).
- **Loose ends:** Uncommitted. Verified Homepage + ES at 1440px and 390px.

## 2026-08-17 — Latest Projects & News redesign (Cursor)
- **Layout:** Replaced 3 identical `.news-card` rows with editorial split — `.news-editorial` grid (1.08fr / 1fr): dark photo lead story + 3 numbered secondary rows (02–04).
- **Lead story (`.news-feature`):** Full-bleed photo, 105deg left gradient + bottom scrim (matches hero/CTA band treatment), orange `.news-tag` chip, Barlow Condensed headline, and a 3-up outcome stat row (38% / FANUC / Turnkey) on a hairline rule.
- **Secondary rows (`.news-item`):** Barlow Condensed index numerals (02/03/04, matching the Haas band `01 ·` motif), tinted `.news-tag--light` chips, 132×96 thumb; hover tints row, shifts padding, zooms thumb, turns index + title deep orange. `justify-content: space-between` aligns the column to the feature height.
- **Added a 4th item** (Training — Macomb operator sessions) so the right column balances the lead card.
- **Also:** `.news-feature` / `.news-item` added to `animations.js` scroll-reveal targets and to the elevated.css photography-cohesion rule; reduced-motion disables image zoom.
- **Untouched:** `.news-card` styles remain (still used by engineered-solutions, showroom, preview pages).
- **Loose ends:** Uncommitted. Story links still omitted pending the dedicated news page (client TBD) — no new dead `href="#"` added.

## 2026-08-17 — Haas features band color invert (Cursor)
- **7080:2240 band:** Inverted to white bg + dark text — `--clr-ink` titles, `--clr-gray-body` copy, `--clr-gray-muted` labels; icon tiles `--clr-gray-card` with black SVGs; dividers `rgba(0,0,0,0.08)`.
- **Loose ends:** Uncommitted.

## 2026-08-17 — Haas watermark stacking fix (Cursor)
- **Layer split:** `.haas-relationship__bg` (watermark only, absolute inset 0, overflow hidden) + `.haas-relationship__content` (z-index 1) inside `__top`; `isolation: isolate` on top wrapper.
- **Result:** Headline, lede, and Haas logo card render above 5% watermark; dark features band (`01 · Sales`, etc.) sits below with solid `--clr-ink` — no watermark bleed.
- **Loose ends:** Uncommitted; preview localhost:8080.

## 2026-08-17 — Haas Relationship features band (Figma 7080:2240) (Cursor)
- **Section:** Dark 4-column capability grid (Sales / Application Support / Warranty / Service & Parts) — part of existing Haas Relationship block on homepage, not a new page.
- **HTML:** Wrapped grid in `.haas-relationship__features` full-bleed band; removed `<hr class="haas-relationship__divider">`; CTAs moved to separate white `.container` below band.
- **CSS:** `components.css` — 4-col grid, column dividers `rgba(255,255,255,0.1)`, icon wrappers 40px / 10% white bg / 4px radius, 24px white titles, 10px uppercase labels, 14px body; mobile stacks single column with row dividers.
- **Assets:** Reused existing `assets/images/icons/haas-rel-*.svg` with `filter: brightness(0) invert(1)` for white-on-dark (no new SVG commits).
- **Placement:** Homepage `index.html` — inside `.haas-relationship`, between intro split (7080:1405) and action buttons, above Machine Lineup.
- **Loose ends:** Uncommitted; preview localhost:8080 — scroll to Haas Relationship section.

## 2026-08-17 — Haas Relationship watermark behind copy (Cursor)
- **Figma 7080:1405:** Repositioned Haas wordmark watermark — `position: absolute` inside `.haas-relationship__intro`, z-index 0 behind copy/brand; Figma left bleed (~-402px); section `overflow-x: clip` prevents horizontal scroll.
- **Removed:** `haas-scroll-bg.js` parallax (user wanted static absolute, not scroll-driven transform).
- **Headline:** Split line breaks + separate `accent--deep` on "authorized" / "outlet" per Figma.
- **Loose ends:** Uncommitted; preview at localhost:8080 — Haas Relationship section.

## 2026-08-17 — Haas Relationship scroll watermark (Cursor) [superseded]
- **Figma 7080:1405:** Added parallax-scrolling Haas wordmark background to `.haas-relationship` — `haas-wordmark-watermark.svg` at 5% opacity, `haas-scroll-bg.js` ties horizontal drift to page scroll; respects `prefers-reduced-motion`.
- **Headline:** Split line breaks + separate `accent--deep` on "authorized" / "outlet" per Figma.
- **Loose ends:** Uncommitted; preview at localhost:8080 — scroll through Haas Relationship section to see drift.

## 2026-08-14 — Site-wide design pass (Codewhale)
- **Lockup CTA site-wide:** `.cta-band--cinema-lockup` (copy-left editorial + call card) promoted to components.css and applied to all 9 pages, each preserving its own copy. Careers/Support/Training keep their custom actions (no call card; copy spans full width).
- **Accent system:** `.accent`/`.accent--deep`/`.headline-rule` added to components.css; orange accent words in hero/section headlines across pages (bright orange on dark, deep `--clr-orange-deep` on light).
- **Testimonials:** shared partial converted from split-photo carousel to `.testimonial-card` grid (`.testimonial-grid` in layout.css); Homepage + ES now use it.
- **Contrast:** new `--clr-orange-deep` (#B45000, ~5.1:1); buttons `.btn-get-quote`/`.btn--primary` → ink-on-orange; `.btn--outline-orange`, `.eyebrow`, card labels/links → deep orange on light surfaces; dark surfaces keep bright orange.
- **A11y:** search modal focus trap (Tab/Shift+Tab) + background `inert` while open.
- **CTA layout:** homepage cinema CTA → 1200px container, left-aligned.
- **ES stat counter:** old `.stat-strip`/`.trust-strip` → homepage `.stat-counter` (37+/4,000+/12/#1).
- **Kept as-is (decision):** About + Careers hero trust facts; showroom/hero-variations exploratory pages.
- **Preview:** `index-cta-lockup-preview.html` committed as an exploratory lockup variant.
- **Loose ends:** `--clr-gray-muted` (#9A9AA8, ~2.8:1) still low-contrast on light surfaces; 57 dead `href="#"` links; mega-menu hover labels on white still bright orange.

## 2026-08-07 — Merged `cursor/hero-bg-and-progress` → `master` (Cursor)
- **Fast-forward** `a578b27..3ba1225` — hero peek/autoplay, Haas Relationship, audit cleanup, machine lineup.
- **`master`** now synced with `origin/master`.

## 2026-08-07 — Machine lineup from Figma 7043:223 (Cursor)
- **Replaced** 4-card `.machine-cards` grid with dark `.machine-lineup` — 5 tabs, split photo/panel, model tag chips.
- **Asset:** `assets/images/machine-milling-centers.png` (Figma export for Machining Centers tab).
- **JS:** Re-enabled `machine-tabs.js` on homepage; panels toggle `hidden` + `is-active`.
- **Tabs:** Machining Centers, Turning Centers, 5-Axis, Automation, Haas Tooling — other tabs use Unsplash stand-ins.

## 2026-08-07 — Homepage audit cleanup implemented (Cursor)
- **Hero slide 1:** Outlet story aligned with shop-floor photo; peek labels synced; CTA → `#machine-browse`.
- **Machine browse:** Renamed to `.machine-browse`; removed duplicate Haas logo; application-focused copy.
- **Haas Relationship:** Added CTAs; eyebrow → shared `.eyebrow-row` + `.eyebrow`.
- **News:** Removed Show More (pending news page); eyebrow → “From the Floor”.
- **CTA / signup:** Trimmed cinema body; `.eyebrow--white`; signup → “Join Our Mailing List”.
- **Cards:** All four link to `gerotech.com/machines` ↗.
- **CSS:** Removed `.machine-dealer-header` / `.haas-dealer-brand`; white/gray section rhythm.
- **Loose ends:** Hero slides 2–3 photos, stat claims, client assets — see `design-spec.md`.

## 2026-08-07 — Homepage design audit + design-spec sync (Cursor)
- **Audit:** High-level homepage review — narrative flow, Haas repetition, hero/peek drift, duplicate logo, placeholders.
- **Docs:** Rewrote `design-spec.md` homepage sections to match current build (peek hero, stat counter, Haas Relationship, 4-card machine browse, cinema CTA); added Figma node refs, removed sections, open cleanup table, Barlow Condensed + asset inventory.
- **Loose ends:** P0 cleanup items documented in spec — not implemented this session.

## 2026-08-07 — Haas Relationship layout upgrade (Figma 7047:904) (Cursor)
- **Intro:** Split redesign — left column stacks headline + lede (40px gap); right column shows Haas wordmark (`haas-logo.png`).
- **HTML/CSS:** `.haas-relationship__copy-col` + `__brand` / `__brand-logo`; eyebrow sits above the split; feature grid unchanged.
- **Branch:** `cursor/hero-bg-and-progress` — uncommitted.

## 2026-08-07 — Fix peek hero autoplay + orange progress (Cursor)
- **Bug:** Autoplay + orange ring never ran — `canAutoplay()` gated on `prefers-reduced-motion` and full-hero hover/focus pause (first viewport = always “paused” while inspecting).
- **Fix (`slider.js`):** Always auto-advance (10s peek / 6s classic); removed hover/focus pause; JS-driven `stroke-dashoffset` via `setInterval(50)` synced to the same clock (not CSS keyframes / rAF — survives background tabs). Manual peek/dot/arrow still resets via `resetAutoplay()`.
- **CSS:** Dropped keyframe / `is-paused` animation hooks; ring look unchanged.
- **Branch:** `cursor/hero-bg-and-progress` — uncommitted follow-up on top of `e690009`.

## 2026-08-07 — Hero peek index autoplay progress ring (Cursor)
- **Progress ring:** Orange SVG stroke on `.hero-slider__index` fills over peek autoplay (10s) via `stroke-dashoffset` + `--hero-progress-ms`.
- **JS (`slider.js`):** `setTimeout` + remaining-time tracking so hover/focus pauses both timer and CSS animation (`is-paused`), then resumes; slide change (auto/manual) resets ring; `prefers-reduced-motion` skips autoplay + animation.
- **CSS:** Explicit `from` keyframe; reduced-motion hides orange stroke, keeps static index + gray track.
- **HTML:** No change (SVG scaffold already in `index.html`) — avoids conflicting with concurrent hero-slide-01 bg work.
- **Loose ends:** Superseded by autoplay fix entry above.

## 2026-08-07 — Homepage hero slide 1 background from Figma (Cursor)
- **Hero slide 1 bg:** Replaced `hero-training-showroom.jpg` with Figma export `assets/images/hero-slide-01.jpg` (node `7046:872` — Haas Automation shop floor / VF-4 line, JPEG 1328×784).
- **HTML:** `index.html` first `.slide__bg` src → local asset; comment notes Figma node. Kept `slide__bg--right` (65% crop) + existing alt/loading attrs — Figma was plain `object-cover`; left-copy bias still fits this frame.
- **Loose ends:** Uncommitted; slides 2–3 still Unsplash stand-ins.

## 2026-08-07 — Haas Relationship section + stat-counter Figma sync (Cursor)
- **Stat counter (Figma 7045:552):** hairline column dividers + bottom rule; values Barlow Condensed 700 / 48px; labels 11px / 1.5px tracking; left-aligned columns.
- **Homepage intro:** Removed Since 1987 text+image block. Replaced with **Haas Relationship** section (Figma 7045:583) — eyebrow, split headline/lede, hairline divider, 2×2 feature grid (Sales / Application Support / Warranty / Service & Parts).
- **Assets:** Figma-exported icons in `assets/images/icons/haas-rel-*.svg` (cart, gear, shield, wrench).
- **CSS:** `.haas-relationship*` in `components.css`; machine browse kept as separate `.intro-section` (margin-top cleared in `elevated.css`).
- **Loose ends:** Uncommitted; browser MCP flaky this session — hard-refresh localhost:8080 for visual QA; not committed.

## 2026-08-07 — Barlow Condensed headline font + hero updates (Cline)
- **Headline font swap:** `--font-display` → **Barlow Condensed** (Google Fonts, 500/600/700); `--font-sans` stays Navigo. Google Fonts link added to all 12 HTML files. Display weight 600 via override rule in components.css; hero exception 700 (bold). Display scale bumped ~25-28% (Barlow Condensed is narrower): `--fs-hero: clamp(40px, 8vw, 106px)`, `--fs-h1: clamp(34px, 4.5vw, 64px)`, `--fs-h2: clamp(30px, 2.6vw + 12px, 50px)`. Tracking loosened, leading tightened for condensed face.
- **Hero text:** eyebrow → "Gerotech"; headline → "The Haas Outlet for Michigan." (106px bold, `pre-headline-font` tag = rollback point).
- **Header/container:** header L/R padding removed; hero peek content container → 1200px centered (`--max-home`).
- **Commits:** `37db95c` (font swap + scale), `7207966` (hero 106px bold), `d83e5e5` (header/container), `c348225` (hero headline), `a652914` (hero eyebrow) — all on `origin/master`.
- **Rollback:** `git reset --hard pre-headline-font` restores Navigo headline state.

## 2026-08-07 — Homepage Figma redesign + stat counter (Cline)
- **Homepage redesign per Figma (node 7009:17 / home frame):** hero slide 1 → "Gerotech is the Front Door to Haas in Michigan"; intro → "Michigan's Premier Distributor for CNC Machinery, Robotics, and Engineered Turnkey Solutions"; machine tabs → **4-card grid**; removed award banner + trust strip; CTA → "Put Our Engineers to Work on Your Project"; email signup → "Stay in the Loop".
- **Header:** FANUC ASI mega-menu column added; nav links UPPERCASE; top bar (`.alert-banner`) → white labels, space-between, 12px padding, 1200px container; factored Figma node 7009:79.
- **Footer:** Machines col → EDM/Automation; Company col → News.
- **Stat counter (node 7030:228):** new `.stat-counter` section (37+ / 4,000+ / 12 / #1) with count-up animation via `stat-counter.js`.
- **Commits:** `d4954f1` (homepage redesign), `90cfe32` (stat counter) — both on `origin/master`.
- **Rollback point:** tag **`pre-headline-font`** pushed — before trying a new headline font (current = Navigo). Roll back with `git reset --hard pre-headline-font`.

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
