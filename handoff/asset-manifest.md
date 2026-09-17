# Asset manifest

**Classification:** **Bundle** = shipped with the theme (brand assets, rarely change). **Media Library** = uploaded content, referenced by ACF image fields.

---

## 1. Theme-bundled (brand) — `assets/images/`

| File | Use | Status |
|---|---|---|
| `gerotech-logo.svg` | Header logo | Final |
| `gerotech-logo-white.svg` | Footer logo | Final |
| `haas-f1-lockup.png` | Haas Relationship brand card | Final |
| `haas-wordmark-watermark.svg` | Haas Relationship watermark (~5% opacity) | Final |
| `fanuc-asi-seal.png` | ES credential band (clipped circle) | ⚠️ FANUC usage rights unconfirmed |
| `haas-winners-circle.png` | Haas Tooling lineup panel (white) | Final |
| `icons/haas-rel-{apps,sales,service,warranty}.svg` | Haas features band icons (black via CSS filter) | Final |

## 2. Media Library — client content photos

| File | Used on |
|---|---|
| `es-hero.png` (2.8MB — compress before upload) | ES page-hero |
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

| Page | Count |
|---|---|
| `index.html` | 3 |
| `engineered-solutions.html` | 5 |
| `machine-custom-solutions.html` | 3 |
| `automation-integration.html` | 4 |
| `application.html` | 14 |
| `training.html` | 6 |
| `support.html` | 2 |
| `about.html` | 4 |
| `careers.html` | 3 |

Every remote `<img>` carries an HTML comment (`<!-- Stand-in: Unsplash — awaiting client photo -->`). Search for `images.unsplash.com` to find them all. Unsplash URLs can 404 over time — verify before migration.

## 4. Videos

`assets/videos/placeholder-*.mp4` — ffmpeg placeholders used only by the **gallery-module preview** (not a shipping page). Do not migrate; await client footage.

## 5. Fonts

- **Barlow Condensed** — Google Fonts (500/600/700), display.
- **Navigo** — Adobe Fonts kit `lqh7ybe`, 400 + 700 (body/UI). **Domain-locked:** add WP Engine production + staging domains in the Adobe Fonts kit.

## 6. Post-migration tasks

1. Compress large PNGs (`es-hero.png` 2.8MB; `machine-milling-centers.png` 1.2MB) → WebP/JPEG.
2. Replace all Unsplash URLs with Media Library attachments.
3. Confirm FANUC ASI seal usage rights before go-live.
4. Keep brand assets in the theme (not the Media Library) so updates don't touch content.
