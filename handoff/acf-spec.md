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
| `hero_slides` | Repeater | `eyebrow`, `headline` (WYSIWYG — accent via `em`), **`accent_color`**, `body`, `cta_label`, `cta_url`, `image`, `image_position`, `title_alt`, `peek_eyebrow`, `peek_accent`, `peek_title` |
| `hero_stats` | Repeater | `value`, `label` — currently 39+ / 14,000+ |
| `haas_eyebrow` | Text | "The Haas Relationship" |
| `haas_headline` | WYSIWYG | Accent word via `em` |
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
| `sections` | Flexible/Repeater | Section headers + card grids per page (see below) |
| `cta_*` | same as homepage | |
| `signup_title` | WYSIWYG | "Join Our <em>Mailing List</em>" |
| `signup_sub` | Text | |

**Card-grid repeater (MCS, Automation, Applications, Training, Support, About, Careers):** `eyebrow`, `title` (WYSIWYG), `body`, `image`, `modal_body` (MCS/Automation/Applications — drives `.mcs-modal`).

**Gallery repeater (MCS, Automation, Applications):** `image`, `alt`, `caption`, `category`.

**News editorial (ES):** same shape as homepage `news_lead` + `news_items`.

---

## 4. Accent-word rule

Headlines that mix ink and orange use a WYSIWYG field. The editor italicises the word (`em`); the theme maps `em`/`i` → `.accent` (dark surfaces) or `.accent--deep` (light surfaces). Confirmed approach — see plan §11 open decision 5.

### Hero slide accent colour (`hero_slides` → `accent_color`)

Per-slide select controlling the colour of the `<em>` accent word **and** its matching peek-card word:

| Value | Label | Classes emitted | Colour |
|---|---|---|---|
| `white` | White (default) | `accent accent--white` | `--clr-white` — no colour highlight |
| `haas` | Haas Red | `accent accent--haas` | `--clr-haas-red` (#CF0A2C) |
| `orange` | Brand Orange | `accent` | `--clr-orange` (#F38A2C) |

Mapped by `gerotech_accent_class()` (`inc/helpers.php`), which also tolerates the retired raw-class values (`accent`, `accent--haas`, `accent--deep`) so an un-migrated database (e.g. Dev) still renders correctly. Current: slide 1 `haas`, slides 2–3 `orange`; new slides default to `white`.

> **Note:** the `.accent--haas` CSS rule previously read `.accent.accent--haas` (compound), so the bare `accent--haas` class the theme emitted never matched and Haas red silently rendered white on WordPress. The modifiers now stand alone and follow `.accent` in source order.
>
> The CTA button colour is **not** driven by this field — slide 1 keeps `.btn--haas`, the rest `.btn--primary`.

---

## 5. Field-group locations

| Group | Location rule |
|---|---|
| Site Settings | Options page |
| Homepage | `page_type == front_page` |
| Page content | `page_template` matches the page template |
| CTA / signup | Attached to each page group (not global) — copy differs per page |
