#!/usr/bin/env bash
#
# Sync shared front-end assets from the static prototype (source of truth)
# into the WordPress child theme.
#
#   One-way: prototype assets/  ->  wp-content/themes/gerotech-child/assets/
#
# Usage:
#   ./scripts/sync-theme-assets.sh           # copy prototype assets into the theme
#   ./scripts/sync-theme-assets.sh --check   # report drift only, change nothing
#   ./scripts/sync-theme-assets.sh --prune   # also delete theme images the prototype no longer has
#
# What syncs:
#   assets/css/{tokens,components,layout,elevated}.css
#   assets/js/{nav,slider,animations,stat-counter,machine-tabs,modal,filter}.js
#   assets/images/**  (mirrored; --prune removes orphans)
#
# What does NOT sync (theme-only by design):
#   assets/js/include-partials.js   -> replaced by native PHP includes
#   assets/js/gallery-module.js     -> not promoted to live pages yet
#
# Markup is NOT handled here. Prototype HTML changes must be ported by hand into
# the matching PHP template — see handoff/theme-map.md.
#
set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SRC="$REPO_ROOT/assets"
DST="$REPO_ROOT/wp-content/themes/gerotech-child/assets"

CSS_FILES=(tokens.css components.css layout.css elevated.css)
JS_FILES=(nav.js slider.js animations.js stat-counter.js machine-tabs.js modal.js filter.js)

MODE="sync"
PRUNE=0
for arg in "$@"; do
  case "$arg" in
    --check) MODE="check" ;;
    --prune) PRUNE=1 ;;
    -h|--help) sed -n '2,30p' "$0" | sed 's/^# \{0,1\}//'; exit 0 ;;
    *) echo "Unknown option: $arg" >&2; exit 1 ;;
  esac
done

if [ ! -d "$DST" ]; then
  echo "ERROR: theme assets not found at $DST" >&2
  exit 1
fi

changed=0
drift=0

copy_file() {
  local src="$1" dst="$2" label="$3"
  if [ ! -f "$src" ]; then
    echo "  MISSING in prototype: $label" >&2
    return
  fi
  if [ -f "$dst" ] && cmp -s "$src" "$dst"; then
    return
  fi
  if [ "$MODE" = "check" ]; then
    echo "  DRIFT: $label"
    drift=$((drift + 1))
  else
    mkdir -p "$(dirname "$dst")"
    cp "$src" "$dst"
    echo "  updated: $label"
    changed=$((changed + 1))
  fi
}

echo "Prototype: $SRC"
echo "Theme:     $DST"
echo
echo "CSS:"
for f in "${CSS_FILES[@]}"; do copy_file "$SRC/css/$f" "$DST/css/$f" "css/$f"; done

echo "JS:"
for f in "${JS_FILES[@]}"; do copy_file "$SRC/js/$f" "$DST/js/$f" "js/$f"; done

echo "Images:"
img_changed=0
img_drift=0
while IFS= read -r rel; do
  src="$SRC/images/$rel"
  dst="$DST/images/$rel"
  if [ -f "$dst" ] && cmp -s "$src" "$dst"; then continue; fi
  if [ "$MODE" = "check" ]; then
    echo "  DRIFT: images/$rel"
    img_drift=$((img_drift + 1))
  else
    mkdir -p "$(dirname "$dst")"
    cp "$src" "$dst"
    img_changed=$((img_changed + 1))
  fi
done < <(cd "$SRC/images" && find . -type f | sed 's|^\./||')

if [ "$PRUNE" -eq 1 ] && [ "$MODE" = "sync" ]; then
  while IFS= read -r rel; do
    [ -f "$SRC/images/$rel" ] && continue
    rm -f "$DST/images/$rel"
    echo "  pruned: images/$rel"
    img_changed=$((img_changed + 1))
  done < <(cd "$DST/images" && find . -type f | sed 's|^\./||')
fi

echo
if [ "$MODE" = "check" ]; then
  total=$((drift + img_drift))
  if [ "$total" -eq 0 ]; then
    echo "OK — theme assets match the prototype."
  else
    echo "DRIFT — $total file(s) out of sync. Run without --check to update."
    exit 1
  fi
else
  echo "Done — $((changed + img_changed)) file(s) updated."
fi
