# QA checklist

Pre-launch verification for the WordPress build. Check against the frozen prototype `v1.0-prototype`.

---

## 1. Breakpoints

Test every page at: **360, 390, 768, 1024, 1440, 1920**.

- [ ] No horizontal overflow at any width (prototype audit found none)
- [ ] Header collapses to hamburger ≥1120px desktop-nav threshold
- [ ] `.grid-4` 4→2→1; `.grid-6` / `.partners-grid` 6→3→1 (tablet step 1024, single col 640)
- [ ] `.haas-relationship__grid` 4-col → 2×2 (≤1024) → 1-col (≤640)
- [ ] Hero copy left-aligned on desktop; mobile fallback centered ≤768 (homepage peek stays left)
- [ ] Machine lineup tabs scroll horizontally on mobile
- [ ] Gallery grids 4→3→2→1
- [ ] Long button labels wrap ≤480

## 2. Browsers

- [ ] Chrome (latest), Safari (latest + iOS), Firefox, Edge
- [ ] Safari: `backdrop-filter` header blur, `aspect-ratio`, `gap` in flex
- [ ] `position: sticky` header + alert banner on iOS Safari
- [ ] `IntersectionObserver` reveals fire correctly (not stuck at opacity 0)

## 3. Accessibility

- [ ] Skip-to-content link works
- [ ] Visible `:focus-visible` (orange 2px) on all interactive elements
- [ ] Search modal: focus trap, Esc closes, background `inert`, focus restored
- [ ] Hero slider: off-screen slides `aria-hidden` + links `tabindex="-1"`; dots `aria-selected`
- [ ] Machine tabs: `role="tablist"` / `role="tab"` / `aria-selected` / `aria-controls`
- [ ] Modals/lightbox: `role="dialog"`, `aria-modal`, focus trap, Esc, focus restore
- [ ] All images have meaningful `alt`; decorative images `aria-hidden`
- [ ] `prefers-reduced-motion`: animations, card zoom, testimonial lift, counter, lightbox fade all disabled
- [ ] Color contrast: body gray on white, white on orange, accent text on light (deep orange) all ≥ 4.5:1
- [ ] Forms: labels (`sr-only` ok), `required`, `autocomplete`

## 4. Content / editor walkthrough

- [ ] Every ACF field edits the correct spot with no layout break
- [ ] Repeaters: add / remove / reorder items (hero slides, stats, cards, gallery, news, testimonials, footer links)
- [ ] News lead Group renders; news items 02–04 index correctly
- [ ] Machine lineup: switching `panel_type` shows the right conditional fields
- [ ] Accent words: italicising a word in a WYSIWYG maps to orange
- [ ] Images: upload, crop, alt text; no missing-image boxes
- [ ] Long copy doesn't overflow (test a 2× paragraph in each field)
- [ ] Empty-field behaviour: section hides or shows a sensible fallback (decide per section)

## 5. Functional

- [ ] Sticky header + alert banner collapse on scroll
- [ ] Mobile nav opens/closes; all links resolve
- [ ] Mega-nav (Machines + ES) opens, keyboard-navigable
- [ ] Search modal quick links work
- [ ] Email signup shows thanks state (Constant Contact / CF7 interim)
- [ ] `tel:` links dial correct numbers (E.164)
- [ ] `mailto:` Get a Quote opens with subject
- [ ] External machine links open new tab with `rel="noopener noreferrer"`
- [ ] MCS/Automation/Applications card modals + gallery lightbox (arrows, keys, swipe)
- [ ] `machine-modification` URL 301s to MCS

## 6. WordPress-specific

- [ ] Parent theme CSS dequeued; load order `tokens → components → layout → elevated`
- [ ] No console errors on any template
- [ ] ACF Pro active; field groups registered in PHP (no admin-UI drift)
- [ ] Options page saves; values render site-wide
- [ ] Adobe Fonts kit `lqh7ybe` domains include production + staging (Navigo loads)
- [ ] WP Engine cache purges on content update; check logged-in vs logged-out
- [ ] Slug collisions resolved (`/training/`, `/support/`, `/about/`, `/careers/`)
- [ ] `wp_get_attachment_image()` outputs `srcset`/`sizes`; images optimized (WebP)

## 7. Launch blockers (must be resolved before go-live)

- [ ] All Unsplash stand-ins replaced with client photography
- [ ] FANUC ASI seal usage rights confirmed
- [ ] Social + legal footer URLs wired (currently `#` / placeholders)
- [x] Large PNGs compressed — `es-hero.png` → `es-hero.jpg` (2.8MB → 500KB) and homepage hero → `hero-slide-1.jpg` + `@2x` with `srcset` (7.2MB → 619KB/1.0MB), 2026-09-21. Remaining: `machine-milling-centers.png` (1.2MB, preview page only)
- [ ] News "Show More" destination confirmed (or link removed)
