# Asset manifest

**Classification:** **Bundle** = shipped with the theme (brand assets, rarely change). **Media Library** = uploaded content, referenced by ACF image fields.

---

## 1. Theme-bundled (brand) — `assets/images/`

| File | Use | Status |
|---|---|---|
| `gerotech-logo.svg` | Header logo | Final |
| `gerotech-logo-white.svg` | Footer logo | Final |
| `haas-f1-team.jpg` | Haas Relationship brand card (WP Engine-safe JPEG) | Final |
| `haas-f1-lockup.png` | Legacy PNG — **403 on WP Engine**; do not use | Deprecated |
| `haas-wordmark-watermark.svg` | Haas Relationship watermark (~5% opacity) | Final |
| `fanuc-asi-seal.png` | ES credential band (clipped circle) | ⚠️ FANUC usage rights unconfirmed |
| `haas-winners-circle.png` | Haas Tooling lineup panel (white) | Final |
| `icons/haas-rel-{apps,sales,service,warranty}.svg` | Haas features band icons (black via CSS filter) | Final |

## 2. Media Library — client content photos

| File | Used on |
|---|---|
| `es-hero.jpg` (500KB — was a 2.8MB PNG, converted 2026-09-21) | ES page-hero |
| `cta-engineered-solutions.jpg` + `@2x` (484KB / 740KB — client FANUC rail-robot photo, 2026-09-22) | ES bottom CTA band |
| `mcs-hero.jpg` + `@2x` (444KB / 660KB — client 5-axis machining-center interior, 2026-09-22) | Machine Custom Solutions page-hero — in WP this hero is rendered by **`page-modification-of-standard-machine-tools.php`** (ACF `mcs_hero_image`), i.e. `/modification-of-standard-machine-tools/` on Dev, which displays the "Machine Custom Solutions" headline |
| `mcs-gallery/specialty-machine.jpg` (1920×670, 245KB — client Haas ST-45 + bar feeder, from Figma node `7196:3348`, 2026-09-22) | MCS "Specialty Machine" service card |
| `mcs-gallery/custom-workholding.jpg` (1012×1800, 420KB — client fixture holding a welded subframe, from Figma node `7196:3332`, 2026-09-22) | MCS "Custom Workholding" service card |
| `app-troubleshooting.jpg`, `app-optimization.jpg`, `app-tooling.jpg`, `app-demo.jpg`, `app-training.jpg` (1600px, 200–392KB — bundled stand-ins, 2026-09-22) | Applications gallery collections (cover + lightbox) AND the matching service cards |
| `app-hero.jpg` (1920×1280, 416KB) · `app-cta.jpg` (1920×1204, 532KB) — bundled stand-ins, 2026-09-22 | Applications hero + CTA band |
| `mcs-gallery/custom-fixtures.jpg` (1350×1800 — fixture plates on the floor) | MCS **gallery collection** "Custom Fixture Design" (cover + lightbox) — no longer the service card |
| `automation-hero.jpg` | Automation page-hero |
| `automation-cell-design.jpg` | Automation service card |
| `robot-eoat.jpg` | Automation service card |
| `app-gallery-umc750.jpg` | Applications card + gallery |
| `haas-umc-750.jpg` | Homepage lineup — machining centers |
| `haas-st-25y.jpg` | Homepage lineup — turning |
| `haas-umc-1000ss.png`, `machine-milling-centers.png` | ES/machine imagery |
| `hero-slide-01.jpg`, `hero-showroom.jpg`, `hero-automation-cell.jpg`, `hero-training-showroom.jpg` | Homepage hero slides / training |
| `mcs-gallery/*.jpg` (13) | MCS gallery + service cards |
| `automation-gallery/*.jpg` (7) | Automation gallery |

> Verify each against client-provided originals; some bundled files are downloaded stand-ins, not final client art.

## 3. Unsplash stand-ins — remote URLs (MUST be replaced before launch)

**The WordPress build is now at ZERO.** Every page on Dev renders entirely from local assets or the media library (verified site-wide 2026-09-22, after the Applications gallery migration). The remaining stand-ins below are **prototype-only** — the prototype is the design source and its placeholders are still swapped by hand, so the two can drift.

| Page | Count |
|---|---|
| `index.html` | 2 |
| `engineered-solutions.html` | **0 ✅** |
| `machine-custom-solutions.html` | 1 |
| `automation-integration.html` | 4 |
| `application.html` | **0 ✅** |
| `training.html` | 6 |
| `support.html` | 2 |
| `about.html` | 4 |
| `careers.html` | 3 |
| `showroom.html` *(exploratory)* | 11 |
| `index-cta-lockup-preview.html` *(preview)* | 9 |
| `hero-variations.html` *(exploratory)* | 3 |
| **Total** | **45** |

`engineered-solutions.html` and `application.html` are now fully local. Applications was the last page on the **live** site depending on someone else's servers — its five gallery collections (cover + lightbox) were on Unsplash while its cards were already local media attachments, so the fix was the gallery, not the cards. Bundled as `app-{troubleshooting,optimization,tooling,demo,training}.jpg` plus `app-hero.jpg` / `app-cta.jpg`; the stored rows were rewritten by `scripts/localize-applications-gallery.php`.

**`machine-custom-solutions.html` has one left:** `photo-1666634157070` on the **Process Engineering** service card (also still the fallback in the `mcs_cards` default array in `page-modification-of-standard-machine-tools.php`). Every other MCS card is real client art. Worth asking the client for a Process Engineering photo.

**`index.html` has 2** — worth a look, since the homepage is the most visible page in the build.

Every remote `<img>` carries an HTML comment (`<!-- Stand-in: Unsplash — awaiting client photo -->`). Search for `images.unsplash.com` to find them all. Unsplash URLs can 404 over time — verify before migration.

## 4. Videos

| File | Used on | Status |
|---|---|---|
| `auto-door.mp4` (4.4MB) | **Client footage.** MCS Auto Doors card thumbnail (muted inline loop), MCS gallery "Auto Door Integration" collection, and `gallery-module-preview.html` | Shipping |
| `placeholder-*.mp4` | ffmpeg placeholders used only by the **gallery-module preview** (not a shipping page) | Do not migrate; await client footage |

`auto-door.mp4` was remuxed from the client's `.mov`. It is the first video used as an **inline card thumbnail** — see the `video` sub-field on the `mcs_cards` ACF repeater. At 4.4MB it is the heaviest asset on the MCS page and is worth compressing if the client supplies more card clips.

## 5. Fonts

- **Barlow Condensed** — Google Fonts (500/600/700), display.
- **Navigo** — Adobe Fonts kit `lqh7ybe`, 400 + 700 (body/UI). **Domain-locked:** add WP Engine production + staging domains in the Adobe Fonts kit.

## 6. Post-migration tasks

1. ~~Compress large PNGs (`es-hero.png` 2.8MB)~~ **Done 2026-09-21** — `es-hero.png` → `es-hero.jpg` (500KB), and the homepage hero went from a 7.2MB raw JPEG to `hero-slide-1.jpg` (619KB) + `hero-slide-1@2x.jpg` (1.0MB) behind `srcset`. Still open: `machine-milling-centers.png` (1.2MB, preview page only) → WebP/JPEG.
2. Replace all Unsplash URLs with Media Library attachments.
3. Confirm FANUC ASI seal usage rights before go-live.
4. Keep brand assets in the theme (not the Media Library) so updates don't touch content.
