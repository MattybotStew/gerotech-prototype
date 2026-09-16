# Gerotech → WordPress Implementation Plan
## Static HTML theme + ACF fields (no page builder)

**Status:** Approved direction (pending staging inspection)
**Created:** September 16, 2026
**Owner:** CloudMellow (retainer build)
**Source of truth:** tagged prototype `v1.0-prototype`
**Companion docs:** `handoff/gerotech-handoff-plan.docx` (PM-facing), this file (build-facing)

---

## 0. Picking this up cold

**Read first:** `.clinerules` → `JOURNAL.md` → `handoff/gerotech-handoff-plan.docx` → this file.

**Where we are:** approach chosen (static HTML → WP theme → ACF). Not started. First action is Phase 1 (inspect staging theme).

**Decisions still open:** see §11.

---

## 1. The model

- Each prototype page becomes a **PHP page template**; section markup is copied verbatim, not rebuilt.
- Client-editable content becomes **ACF fields**; everything else stays in code.
- Header/footer partials become real theme files.
- **No builder, no shortcodes** — no lock-in, no grid conflict.

**Trade-off:** the client edits content within a fixed layout and can add/remove/reorder items inside lists, but cannot drag whole sections. Set expectations accordingly.

---

## 2. Handoff artifacts to produce

| Artifact | Purpose |
|---|---|
| Tagged prototype `v1.0-prototype` | Frozen visual + markup source |
| `handoff/theme-map.md` | HTML file → PHP template; partial → template part |
| `handoff/acf-spec.md` | Field groups: name, type, location, consuming template |
| `handoff/component-inventory.md` | Section → BEM root → editable fields → JS dependency |
| `handoff/asset-manifest.md` | Theme-bundled vs. Media Library; final vs. stand-in |
| `handoff/js-spec.md` | Each script, selectors, init conditions, a11y/motion |
| `handoff/qa-checklist.md` | Breakpoints, browsers, a11y, editor walkthrough |

---

## 3. Theme architecture

Child theme of `gerotech` (fallback: new theme — pending inspection).

```
wp-content/themes/gerotech-child/
├── style.css                 # child theme header only
├── functions.php             # enqueue, theme supports, includes
├── header.php                # alert banner + site header + search modal
├── footer.php                # footer + wp_footer()
├── front-page.php            # homepage
├── page-engineered-solutions.php
├── page-machine-custom-solutions.php
├── page-automation-integration.php
├── page-application.php
├── page-training.php
├── page-support.php
├── page-about.php
├── page-careers.php
├── template-parts/
│   ├── global/               # alert-banner, search-modal, mega-nav
│   ├── sections/             # hero-peek, page-hero, stat-counter, haas-relationship,
│   │                         # machine-lineup, testimonials, news-editorial, cta-band,
│   │                         # email-signup, service-grid, card-grid, gallery, accordion
│   └── cards/                # service-card, mcs-card, news-item, testimonial-card
├── inc/
│   ├── enqueue.php
│   ├── acf-fields.php        # acf_add_local_field_group() — version-controlled
│   ├── options.php           # acf_add_options_page() site settings
│   └── cpt.php               # only if parent doesn't register them
└── assets/                   # css/, js/, images/, videos/ copied in
```

**Template strategy:** use `page-{slug}.php` (auto-applies, no assignment). Fall back to named templates where a slug collides with an existing CPT (`/training/`, `/support/` already exist live).

---

## 4. HTML → PHP conversion map

| Prototype | Becomes |
|---|---|
| `<div data-include="partials/site-header.html">` | `<?php get_header(); ?>` |
| `<div data-include="partials/site-footer.html">` | `<?php get_footer(); ?>` |
| `<div data-include="partials/testimonials-block.html">` | `<?php get_template_part('template-parts/sections/testimonials'); ?>` |
| `<link rel="stylesheet" href="assets/css/*.css">` | `wp_enqueue_style()`; parent CSS dequeued |
| `<script src="assets/js/*.js">` | `wp_enqueue_script()`, loaded per template |
| `include-partials.js` | **Deleted** — replaced by native PHP includes |
| Every `<img src="...">` | `get_field()` → `wp_get_attachment_image()` |

Section markup is unchanged; only strings/images become field calls.

---

## 5. ACF field model

**Global — Options page "Site Settings":** contact numbers, address, alert-banner repeater, header CTA, footer columns/socials/legal, shared testimonials repeater.

**Per page:** homepage = hero slides, stats, Haas intro + features, machine-lineup panels, news lead + items, CTA, email signup. Interior = page-hero, section headers, card-grid repeater, CTA, email signup.

**Three constraints:**

1. **Repeaters can't nest.** News lead → **Group** (groups can hold repeaters). Footer links → flattened `{column, label, url}` rows.
2. **Accent words.** Map WYSIWYG `em`/`i` → accent style; client italicises the word.
3. **Machine lineup** = one flat repeater with `panel_type` select + conditional fields.

**v1 content model:** testimonials = global ACF; news/training cards = ACF repeaters. CPTs later on retainer.

---

## 6. JS + assets

- Enqueue scripts conditionally (slider on home, filter on ES, modal where modals exist).
- **No builder → no AJAX re-init problem**; scripts run once on load as prototyped.
- Preserve the one-instance-per-page assumption in `machine-tabs.js` / `modal.js`.
- Brand assets (logos, icons, watermark, F1 lockup) theme-bundled; content photos in Media Library.
- Adobe Fonts kit `lqh7ybe` is domain-locked — add WP Engine production + staging domains.

---

## 7. Forms and dynamic bits

- Email signup → Constant Contact (CF7 interim).
- Get a Quote → `mailto:` v1; CF7 later.
- Search modal → prototype quick-links v1; WP search later.
- Navigation **hardcoded in `header.php`** for v1 — not client-editable at launch (retainer item).

---

## 8. Build sequence

| Phase | Work | Days |
|---|---|---|
| 1 | Inspect staging theme; confirm child-vs-new; check CPT registration | 0.5 |
| 2 | Theme skeleton: child theme, header/footer, enqueue, dequeue parent | 2 |
| 3 | Convert 11 pages HTML→PHP (hardcoded markup) | 3 |
| 4 | ACF Pro + options page + field groups (PHP registration) | 2 |
| 5 | Wire fields into templates | 3 |
| 6 | Forms + search wiring | 1 |
| 7 | Asset migration + fonts domain | 1 |
| 8 | Content entry + client editor walkthrough | 2 |
| 9 | QA (responsive, a11y, cross-browser, WP Engine cache) | 2 |
| | **Total** | **~16–17 days (~3 weeks)** |

---

## 9. Risks

- **Parent theme unknown** — inspect staging; new theme if unmaintainable.
- **Slug collisions** — `/training/`, `/support/`, `/about/`, `/careers/` already live; reuse-vs-new URL is the SEO decision.
- **ACF Pro license** (~$99/yr) required.
- **Unsplash stand-ins** must be replaced before launch.
- **Nav not editable** at launch (documented).
- **WP Engine caching** — purge on content updates.

---

## 10. Division of labour

Retainer build: we do phases 1–7, then content entry + client walkthrough (8). Split front-end theme (us) vs. ACF/forms/integration (WP dev) only if desired.

---

## 11. Open decisions

1. **Child theme vs. new theme** — needs staging access to inspect the parent `gerotech` theme.
2. **Navigation** — hardcoded for launch, or register editable WP menus now (+1–2 days)?
3. **URL strategy** — reuse existing top-level slugs or new URLs?
4. **CPTs now or ACF-only v1** — plan assumes ACF-only for speed.
5. **Accent-word editing** — confirm the `em`-mapping approach.

---

**Next action on pickup:** Phase 1 — obtain staging access, inspect `wp-content/themes/gerotech/`, confirm where CPTs register, and finalise child-vs-new theme.
