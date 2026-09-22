<?php
/**
 * Point a single ACF image field (hero, CTA band, etc.) at a bundled theme asset.
 *
 * Companion to `set-card-image.php`, which handles repeater rows. This one is for
 * plain image fields such as `es_cta_image`, `ai_cta_image`, `mcs_hero_image`.
 *
 * Why a DB step is needed at all: on these pages the live image is usually a
 * media-library ATTACHMENT, and a stored value beats the template default. So
 * changing `assets/images/<file>` alone changes the default but not what renders.
 *
 * Usage (positional; WP-CLI rejects custom --flags on eval-file):
 *
 *   wp eval-file scripts/set-page-image.php "<page slug>" "<image field>" "assets/images/<file>.jpg"
 *
 * e.g.
 *   wp eval-file scripts/set-page-image.php "automated-system" "ai_cta_image" "assets/images/cta-rail-robot.jpg"
 *   wp eval-file scripts/set-page-image.php "engineered-solutions" "es_cta_image" "assets/images/cta-rail-robot.jpg"
 *
 * Idempotent: skips when the stored attachment already comes from that asset.
 *
 * NOTE: media_handle_sideload() MOVES the file it is given, so it is handed a
 * wp_tempnam() copy — otherwise it would delete the theme asset it imports from.
 *
 * @package GerotechChild
 */

if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

$args  = is_array( $args ) ? array_values( $args ) : array();
$slug  = isset( $args[0] ) ? trim( (string) $args[0], " \t\n\r\0\x0B\"'" ) : '';
$field = isset( $args[1] ) ? trim( (string) $args[1], " \t\n\r\0\x0B\"'" ) : '';
$asset_rel = isset( $args[2] ) ? trim( (string) $args[2], " \t\n\r\0\x0B\"'" ) : '';

if ( '' === $slug || '' === $field || '' === $asset_rel ) {
	echo "Usage: wp eval-file scripts/set-page-image.php \"<page slug>\" \"<image field>\" \"assets/images/<file>.jpg\"\n";
	return;
}

$page = get_page_by_path( $slug );
if ( ! $page ) {
	echo "Page '{$slug}' not found — aborting.\n";
	return;
}
$post_id = (int) $page->ID;

$asset = get_theme_file_path( $asset_rel );
if ( ! file_exists( $asset ) ) {
	echo "Missing theme asset: {$asset_rel}\n";
	return;
}

// Resolve the field key from its name so update_field() hits the real field.
$field_key = $field;
if ( function_exists( 'acf_get_field' ) ) {
	$f = acf_get_field( $field );
	if ( $f && ! empty( $f['key'] ) ) {
		$field_key = $f['key'];
	}
}

$current = get_field( $field, $post_id );
$current_id = 0;
if ( is_array( $current ) && isset( $current['ID'] ) ) {
	$current_id = (int) $current['ID'];
} elseif ( is_numeric( $current ) ) {
	$current_id = (int) $current;
}

$stub = pathinfo( $asset_rel, PATHINFO_FILENAME );
if ( $current_id ) {
	$attached = (string) get_post_meta( $current_id, '_wp_attached_file', true );
	if ( 0 === strpos( basename( $attached ), $stub ) ) {
		$meta = wp_get_attachment_metadata( $current_id );
		printf(
			"  %s.%s already uses attachment #%d (%s)%s — nothing to do.\n",
			$slug,
			$field,
			$current_id,
			$attached,
			isset( $meta['width'] ) ? " {$meta['width']}x{$meta['height']}" : ''
		);
		return;
	}
}

printf( "  %s.%s is currently %s.\n", $slug, $field, $current_id ? '#' . $current_id : '(empty/URL)' );

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$tmp = wp_tempnam( basename( $asset_rel ) );
if ( ! $tmp || ! copy( $asset, $tmp ) ) {
	echo "Could not stage a temp copy of the asset.\n";
	return;
}

$new_id = media_handle_sideload(
	array(
		'name'     => basename( $asset_rel ),
		'tmp_name' => $tmp,
	),
	$post_id,
	$slug . ' — ' . $field
);

if ( file_exists( $tmp ) ) {
	@unlink( $tmp );
}

if ( is_wp_error( $new_id ) ) {
	echo 'Import failed: ' . $new_id->get_error_message() . "\n";
	return;
}

update_field( $field_key, $new_id, $post_id );

$meta = wp_get_attachment_metadata( $new_id );
printf(
	"  imported #%d (%sx%s) and set as %s.%s.\n",
	$new_id,
	isset( $meta['width'] ) ? $meta['width'] : '?',
	isset( $meta['height'] ) ? $meta['height'] : '?',
	$slug,
	$field
);
