# Gerotech — Engineered Solutions pages: READY

**Status:** Build complete and live on Dev. Ready for review/sign-off.
**Last updated:** 2026-09-18

---

## 1. Scope delivered (4 pages)

| Page | URL (Dev) |
|---|---|
| Engineered Solutions (hub) | `/engineered-solutions/` |
| Machine Custom Solutions | `/modification-of-standard-machine-tools/` |
| Applications | `/unique-applications-for-standard-machines/` |
| Automation & Controls | `/automated-system/` |

- Dev: https://gerotechdev.wpenginepowered.com/
- Local: https://gerotech.local
- Theme: `gerotech-child` (WordPress, no page builder)

## 2. What's included

- Full section builds matching the approved design (hero, services, galleries, FAQ, partners, testimonials, CTA, mailing list).
- **Interactive galleries** — image collections + video viewer (MCS 7 collections, Applications 8, Automation 7).
- **Detail modals** on service cards (MCS 8, Applications 8, Automation 5) with real copy.
- **FANUC ASI** credential band on the ES hub.
- All pages: 200 OK, no PHP errors, **zero broken images**.

## 3. Editing (for the client)

- Content is **ACF-driven** and already **populated** — no blank fields.
- Each page has a “— Content” field group in the block editor → **Meta Boxes** panel (bottom of the editor). Tabs map to sections.
- Legacy parent fields are hidden on these pages so editors only see the correct group.

## 4. Open items — client-supplied (do not block sign-off)

1. **Photography** — currently stand-in images (self-hosted). Swap when client photos are delivered.
2. **FANUC ASI seal** — placeholder pending usage-rights confirmation.
3. **News story links** on the ES hub — no destination until a News page exists.

## 5. For the developer

- Theme: `wp-content/themes/gerotech-child/` (child of `gerotech`). Source of truth in the repo; assets sync via `scripts/sync-theme-assets.sh`.
- Deploy: theme-only to **Dev** (never Production, never the DB). Direct rsync over the WP Engine key + `wp page-cache flush` / `wp cdn-cache flush` — steps in `handoff/implementation-plan-wordpress-theme-acf.md` §14.
- ACF field groups are registered in PHP: `inc/acf-fields.php` (Home / ES / MCS / Applications / Automation / Careers + global testimonials) and `inc/acf-legacy-fields.php` (legacy pages).
- Note: DB content was seeded from the template defaults — DB values now override code defaults.
- Fixed in this pass: page-template metas, Google Maps (keyless embeds), hero eyebrow alignment, `post_name` ACF location rule, `/machine-modification/` → MCS 301, parent legacy field groups hidden.

## 6. Next

- PM/dev review of the 4 URLs above.
- Remaining site work in our lane: header + mega-nav.
