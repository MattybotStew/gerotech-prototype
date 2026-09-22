# ACF field spec

**Companion to:** `implementation-plan-wordpress-theme-acf.md`
**Requires:** ACF Pro (repeaters + options page)
**Registration:** all field groups registered in PHP (`inc/acf-fields.php`) via `acf_add_local_field_group()` — version-controlled, **not** via the admin UI.

---

## 1. Global — Options page "Site Settings"

Location: `acf_add_options_page()`. Consumed by `header.php` / `footer.php` / shared parts.

| Field | Type | Notes |
|---|---|---|
| `alert_banner_items` | Repeater | `label` (text), `link_label` (text), `link_url` (text) — 3 phone numbers today |
| `header_cta_label` | Text | "Get a Quote" |
| `header_cta_url` | Text | `mailto:sales@gerotech.com?subject=…` |
| `header_nav_items` | Repeater | `label`, `url`, `mega_nav` (select: none/machines/es) — v1 may stay hardcoded |
| `footer_tagline` | Textarea | |
| `footer_address` | Textarea | 3 lines |
| `footer_phone` | Text | `tel:` target separate |
| `footer_columns` | Repeater (flattened) | `column` (select: Machines / Solutions & Support / Company), `label`, `url`, `external` (true/false) — **flattened because repeaters can't nest** |
| `footer_socials` | Repeater | `network`, `url` (currently `#` placeholders) |
| `footer_legal_links` | Repeater | `label`, `url` (currently placeholders) |
| `testimonials` | Repeater | `quote`, `name`, `role` — **shared, global**; consumed by the testimonials section on every page |

---

## 2. Homepage (`front-page.php`)

| Field | Type | Notes |
|---|---|---|
| `hero_slides` | Repeater | `eyebrow`, `headline` (WYSIWYG — accent via `em`), **`accent_color`**, `body`, `cta_label`, `cta_url`, **`cta_color`**, `image`, `image_position`, `title_alt`, `peek_eyebrow`, `peek_accent`, `peek_title` |

> There is **no** separate peek-colour field. The peek card's accent word inherits the slide's `accent_color` — `front-page.php` emits it as `data-peek-accent-color="<choice>"`, and `slider.js` whitelists it (`ACCENT_COLORS`) before applying `hero-slider__peek-accent--<colour>`. So the headline accent and its peek-card counterpart can never drift apart.
| `hero_stats` | Repeater | `value`, `label` — currently 39+ / 14,000+ |
| `haas_eyebrow` | Text | "The Haas Relationship" |
| `haas_eyebrow_color` | Select | `white` / `haas` (default) / `orange` — colours the eyebrow text **and** its short rule together |
| `haas_headline` | WYSIWYG | Accent word via `em` |
| `haas_accent_color` | Select | `white` / `haas` (default) / `orange` — colour of the `em` accent words |
| `haas_lede` | Textarea | |
| `haas_brand_logo` | Image | F1 lockup (theme-bundled default) |
| `haas_features` | Repeater | `index`, `icon` (image), `label`, `title`, `body` — numbered `01 ·`–`04 ·` |
| `lineup_eyebrow` | Text | |
| `lineup_headline` | WYSIWYG | |
| `lineup_panels` | Repeater (flat) | `panel_type` (select: milling/turning/rotaries/automation/tooling), `tab_label`, `photo`, `badge`, `category`, `title`, `description`, `tags_label`, `tags` (repeater of `label`+`url` — **allowed: nested inside a repeater is not; use a flattened tag list or a sub-repeater only if ACF Pro nested repeaters are enabled**), `cta_label`, `cta_url` |
| `news_lead` | **Group** | `tag`, `date`, `title`, `excerpt`, `image`, `stats` (repeater `value`+`label`) — **Group because a repeater can't hold a repeater** |
| `news_items` | Repeater | `index`, `tag`, `date`, `title`, `excerpt`, `image` |
| `cta_eyebrow`, `cta_headline`, `cta_body`, `cta_button_label`, `cta_button_url` | Text/WYSIWYG | |
| `cta_call_label`, `cta_call_number`, `cta_call_note` | Text | Optional call card (omit on Careers/Support/Training) |
| `cta_image` | Image | |

> **Nested-repeater constraint:** if `lineup_panels.tags` cannot nest, flatten to `lineup_tags` repeater keyed by `panel_type`. Decide in Phase 4.

---

## 3. Interior pages (shared pattern)

| Field | Type | Notes |
|---|---|---|
| `hero_eyebrow` | Text | |
| `hero_headline` | WYSIWYG | Accent via `em` |
| `hero_body` | Textarea | |
| `hero_cta_label` / `hero_cta_url` | Text | Optional |
| `hero_image` | Image | |
| `hero_breadcrumb` | Repeater | MCS / Automation / Applications only: `label`, `url` (last item = current, no link) |
| `hero_trust_stats` | Repeater | About / Careers only: `value`, `label` |
| `hero_accent_color` / `hero_cta_color` | Select | Per page, prefixed (`es_`, `app_`, `ai_`, `careers_`). Same White / Haas Red / Brand Orange palette as the homepage hero. Ship **blank** with **no `default_value`** — blank keeps the design colour (Brand Orange). See "Un-migrated databases" below. |
| `sections` | Flexible/Repeater | Section headers + card grids per page (see below) |
| `cta_*` | same as homepage | |
| `signup_title` | WYSIWYG | "Join Our <em>Mailing List</em>" |
| `signup_sub` | Text | |

**Card-grid repeater (MCS, Automation, Applications, Training, Support, About, Careers):** `eyebrow`, `title` (WYSIWYG), `body`, `image`, `modal_body` (MCS/Automation/Applications — drives `.mcs-modal`).

**Gallery repeater (MCS, Automation, Applications):** `image`, `alt`, `caption`, `category`.

**News editorial (ES):** same shape as homepage `news_lead` + `news_items` — **but PARKED** (see below).

### Latest Projects & News — parked behind `es_show_news` (ES only)

Client (Sep 2026): *"we just don't know if we can support the Latest Projects & News right now… disable on all pages BUT keep it as a component that can be easily added back by the client."*

| Field | Type | Notes |
|---|---|---|
| `es_show_news` | True/False | **`default_value` 0 (Hidden).** Renders `template-parts/sections/news.php` on Engineered Solutions only. |

The markup was extracted out of `page-engineered-solutions.php` into `template-parts/sections/news.php`, which returns early unless `es_show_news` is on. **Nothing was deleted** — every `es_news_*` field is still registered and still holds its seeded content, so flipping the toggle re-renders the real section with the client's own data. Only ES ever rendered it (homepage news was already removed in the Figma-alignment pass).

- **Client re-enables it:** ES → **News** tab → "Show the Latest Projects & News section" → **Show** → Update. No dev work.
- **Adding it to another page:** add `get_template_part( 'template-parts/sections/news' );` to that template and copy the `field_es_show_news` entry into that page's ACF group.
- **Prototype equivalent:** `engineered-solutions.html` SECTION 12 is now just a pointer comment — the markup itself was **moved** into `partials/news-block.html` (not duplicated), and ES keeps a commented-out one-line `data-include` to bring it back. Re-enable = uncomment that line.
- **Gotcha:** while the toggle is off this template never runs, so a content-seeder's capture hook will not see these fields. Both Local and Dev are already seeded; if a re-seed is ever needed, switch the toggle on for one render first.
- **Verified on Dev:** toggle off → 0 news markers, on → 2, off again → 0; meta then deleted so Dev sits at the default-off state. Local behaves identically.

---

## 4. Accent-word rule

Headlines that mix ink and orange use a WYSIWYG field. The editor italicises the word (`em`); the theme maps `em`/`i` → `.accent` (dark surfaces) or `.accent--deep` (light surfaces). Confirmed approach — see plan §11 open decision 5.

### Hero slide accent colour (`hero_slides` → `accent_color`)

Per-slide select controlling the colour of the `<em>` accent word **and** its matching peek-card word:

| Value | Label | Classes emitted | Colour |
|---|---|---|---|
| `white` | White (no highlight) | `accent accent--white` | `--clr-white` — no colour highlight |
| `haas` | Haas Red | `accent accent--haas` | `--clr-haas-red` (#CF0A2C) |
| `orange` | Brand Orange | `accent` | `--clr-orange` (#F38A2C) |

Mapped by `gerotech_accent_class()` (`inc/helpers.php`), which also tolerates the retired raw-class values (`accent`, `accent--haas`, `accent--deep`) so an un-migrated database (e.g. Dev) still renders correctly. Current: slide 1 `haas`, slides 2–3 `orange`. The select ships **blank** — blank means "no choice made" and resolves to the positional design default (slide 1 Haas red, later slides Brand Orange), **not** to White. This field has **no `default_value`**; see "Un-migrated databases" below for why that matters.

> **Note:** the `.accent--haas` CSS rule previously read `.accent.accent--haas` (compound), so the bare `accent--haas` class the theme emitted never matched and Haas red silently rendered white on WordPress. The modifiers now stand alone and follow `.accent` in source order.

### Hero slide button colour (`hero_slides` → `cta_color`)

Per-slide select controlling that slide's call-to-action button, **independent of the accent colour**:

| Value | Label | Classes emitted |
|---|---|---|
| `orange` | Brand Orange | `btn btn--primary` |
| `haas` | Haas Red | `btn btn--primary btn--haas` |
| `white` | White outline | `btn btn--outline-white` |

Mapped by `gerotech_btn_class()` (`inc/helpers.php`). Current: slide 1 `haas`, slides 2–3 `orange`. Ships **blank** with no `default_value`; blank resolves positionally (slide 1 Haas Red, later slides Brand Orange).

### Haas Relationship colours (`haas_eyebrow_color` / `haas_accent_color`)

Same White / Haas Red / Brand Orange palette as the hero slides, defaulting to **Haas Red** to match the Figma. The eyebrow fields drive a shared custom property so text and rule can never drift:

```css
.haas-relationship .eyebrow-row            { --eyebrow-accent: var(--clr-haas-red); }
.haas-relationship .eyebrow-row--white     { --eyebrow-accent: var(--clr-white); }
.haas-relationship .eyebrow-row--orange    { --eyebrow-accent: var(--clr-orange); }
.haas-relationship .eyebrow-row .eyebrow,
.haas-relationship .eyebrow-row .eyebrow-row__rule { color/background: var(--eyebrow-accent); }
```

The unmodified default is Haas red, so markup without a modifier (older prototypes, un-migrated rows) still renders as designed. `haas_accent_color` reuses `gerotech_accent_class()`. **Interior page eyebrows are untouched** — the modifiers are scoped to `.haas-relationship` for now.

### Un-migrated databases (important)

ACF **injects a field's `default_value` on read** when a repeater row has no stored value. So a database that predates a newly-added field does not return an empty string — it returns the default. That would silently change the design on deploy (slide 1's Haas-red accent and button would both have turned white/orange).

The fix is to **give these fields no `default_value` at all** (`'default_value' => ''` + `'allow_null' => 1` + a `placeholder` naming the design default). A blank/absent value then genuinely means "the client has not chosen", so `front-page.php` can fall back in order:

1. the retired `accent_class` meta — read **raw** via `get_post_meta()`, because that field is no longer registered and so is absent from the ACF row array;
2. the original positional treatment — slide 1 Haas red, all others brand orange.

An earlier revision tried to solve this with `metadata_exists( 'post', $home_id, 'home_hero_slides_<i>_<field>' )` guards while leaving `default_value` in place. **That does not work** — ACF's injected default makes the value non-empty on read, so the guard never fires and the design silently regresses. The guards were removed; the empty default is the actual fix. Every interior `*_hero_accent_color` / `*_hero_cta_color` field follows the same pattern.

Verified across four states on Local: explicit values, un-migrated rows (legacy `accent_class` only), a **naive wp-admin save that leaves the select blank**, and an explicit White choice. All four render as designed. Re-seed with `scripts/seed-home-hero-colors.php` (idempotent, environment-agnostic) — note it lives in the repo's `scripts/` directory, which a theme-only push does **not** deliver, so it must be copied to the server before `wp eval-file`.

---

## 5. Field-group locations

| Group | Location rule |
|---|---|
| Site Settings | Options page |
| Homepage | `page_type == front_page` |
| Page content | `page_template` matches the page template |
| CTA / signup | Attached to each page group (not global) — copy differs per page |
