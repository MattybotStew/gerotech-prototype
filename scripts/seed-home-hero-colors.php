<?php
/**
 * Seed / repair the homepage hero + Haas Relationship colour choices.
 *
 * Run this after a **theme-only** deploy. A files-only push carries the field
 * *definitions* (they are registered in code) but not their stored *values*, so
 * without this the editor on that environment shows the ACF field defaults while
 * the front end renders via the template fallbacks — the two disagree.
 *
 * Safe to run repeatedly and on any environment:
 *
 *   wp eval-file scripts/seed-home-hero-colors.php
 *
 * Precedence per value: an already-stored choice wins; otherwise the retired
 * `accent_class` meta is honoured; otherwise the original design treatment
 * (slide 1 Haas red, everything else brand orange).
 *
 * @package GerotechChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'gerotech_accent_choice' ) ) {
	echo "ERROR: gerotech_accent_choice() not found — is the gerotech-child theme active?\n";
	return;
}

$home_id = (int) get_option( 'page_on_front' );
$valid   = array( 'white', 'haas', 'orange' );

/** True when a meta value has actually been saved (ACF injects defaults on read, so the returned value alone cannot tell us). */
$has_meta = function ( $key ) use ( $home_id ) {
	return metadata_exists( 'post', $home_id, $key );
};

/** Pick the first acceptable value, or fall back. */
$resolve = function ( $candidate, $fallback ) use ( $valid ) {
	return in_array( $candidate, $valid, true ) ? $candidate : $fallback;
};

/* ── Hero slides ───────────────────────────────────────────────────── */
$rows = get_field( 'home_hero_slides', $home_id );

if ( is_array( $rows ) && $rows ) {
	foreach ( $rows as $i => $row ) {
		$positional = ( 0 === $i ) ? 'haas' : 'orange'; // The original design treatment.

		// Accent colour: stored choice → retired accent_class meta → positional.
		$accent = $has_meta( "home_hero_slides_{$i}_accent_color" ) && isset( $row['accent_color'] ) ? $row['accent_color'] : '';
		if ( ! in_array( $accent, $valid, true ) ) {
			$legacy = (string) get_post_meta( $home_id, "home_hero_slides_{$i}_accent_class", true );
			$accent = ( '' !== $legacy ) ? gerotech_accent_choice( $legacy ) : $positional;
		}

		// Button colour: stored choice → positional.
		$cta = $has_meta( "home_hero_slides_{$i}_cta_color" ) && isset( $row['cta_color'] ) ? $row['cta_color'] : $positional;

		$rows[ $i ]['accent_color'] = $accent;
		$rows[ $i ]['cta_color']    = $resolve( $cta, $positional );

		// Drop the retired sub-field so the editor never sees it.
		unset( $rows[ $i ]['accent_class'] );
		delete_post_meta( $home_id, "home_hero_slides_{$i}_accent_class" );
	}
	update_field( 'home_hero_slides', $rows, $home_id );
	echo 'Hero slides: ' . count( $rows ) . " row(s) seeded.\n";
} else {
	echo "WARN: no hero slide rows found — skipped.\n";
}

/* ── Haas Relationship ─────────────────────────────────────────────── */
foreach ( array( 'haas_eyebrow_color', 'haas_accent_color' ) as $key ) {
	// Both default to Haas red, matching the Figma.
	$value = $has_meta( $key ) ? $resolve( get_field( $key, $home_id ), 'haas' ) : 'haas';
	update_field( $key, $value, $home_id );
}

/* ── Verify ────────────────────────────────────────────────────────── */
echo "\nStored values now:\n";

$check = get_field( 'home_hero_slides', $home_id );
if ( is_array( $check ) ) {
	foreach ( $check as $i => $row ) {
		printf(
			"  slide %d: accent_color=%s%s  cta_color=%s%s\n",
			$i + 1,
			isset( $row['accent_color'] ) ? $row['accent_color'] : '-',
			$has_meta( "home_hero_slides_{$i}_accent_color" ) ? '' : ' (default)',
			isset( $row['cta_color'] ) ? $row['cta_color'] : '-',
			$has_meta( "home_hero_slides_{$i}_cta_color" ) ? '' : ' (default)'
		);
	}
}

foreach ( array( 'haas_eyebrow_color', 'haas_accent_color' ) as $key ) {
	printf( "  %s=%s%s\n", $key, get_field( $key, $home_id ), $has_meta( $key ) ? '' : ' (default)' );
}
