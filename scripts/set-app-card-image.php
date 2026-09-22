<?php
/**
 * Point an Applications service card at a bundled theme asset.
 *
 * WHY THIS EXISTS
 * ---------------
 * On this page the card images are stored as media-library ATTACHMENTS
 * (`app_cards_<i>_image`) while the gallery collections use theme-relative
 * paths. Replacing `assets/images/<file>` therefore updates the GALLERY
 * automatically but leaves the CARD on the old upload — both have to be brought
 * forward, and only the DB half needs a script.
 *
 * Usage (positional — WP-CLI rejects custom --flags on eval-file):
 *   wp eval-file scripts/set-app-card-image.php "Training" assets/images/app-training.jpg
 *   wp eval-file scripts/set-app-card-image.php "Process Optimization" assets/images/app-optimization.jpg
 *
 * Idempotent: skips if the stored attachment already comes from that asset, so
 * re-running does not pile up duplicates.
 *
 * NOTE: media_handle_sideload() MOVES the file it is given. It is handed a
 * wp_tempnam() copy here on purpose — pointing it at the theme asset would
 * rename the asset out of the theme.
 *
 * @package GerotechChild
 */

if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

$args = is_array( $args ) ? array_values( $args ) : array();

$card_title = isset( $args[0] ) ? trim( (string) $args[0], " \t\n\r\0\x0B\"'" ) : '';
$asset_rel  = isset( $args[1] ) ? trim( (string) $args[1], " \t\n\r\0\x0B\"'" ) : '';

if ( '' === $card_title || '' === $asset_rel ) {
	echo "Usage: wp eval-file scripts/set-app-card-image.php \"<card title>\" assets/images/<file>.jpg\n";
	return;
}

$page = get_page_by_path( 'unique-applications-for-standard-machines' );
if ( ! $page ) {
	echo "Applications page not found — aborting.\n";
	return;
}
$post_id = (int) $page->ID;

$asset = get_theme_file_path( $asset_rel );
if ( ! file_exists( $asset ) ) {
	echo "Missing theme asset: {$asset_rel}\n";
	return;
}

$cards = get_field( 'app_cards', $post_id );
if ( ! is_array( $cards ) ) {
	echo "No app_cards rows found.\n";
	return;
}

$target = null;
foreach ( $cards as $i => $card ) {
	if ( isset( $card['title'] ) && $card_title === $card['title'] ) {
		$target = $i;
		break;
	}
}
if ( null === $target ) {
	echo "No '{$card_title}' card found.\n";
	return;
}

$current_id = isset( $cards[ $target ]['image'] ) ? $cards[ $target ]['image'] : 0;
if ( is_array( $current_id ) && isset( $current_id['ID'] ) ) {
	$current_id = (int) $current_id['ID'];
}
$current_id = (int) $current_id;

$expected_stub = pathinfo( $asset_rel, PATHINFO_FILENAME );

if ( $current_id ) {
	$attached = (string) get_post_meta( $current_id, '_wp_attached_file', true );
	if ( 0 === strpos( basename( $attached ), $expected_stub ) ) {
		$meta = wp_get_attachment_metadata( $current_id );
		printf(
			"  '%s' already uses attachment #%d (%s)%s — nothing to do.\n",
			$card_title,
			$current_id,
			$attached,
			isset( $meta['width'] ) ? " {$meta['width']}x{$meta['height']}" : ''
		);
		return;
	}
}

printf( "  '%s' is row %d, currently attachment #%d.\n", $card_title, $target, $current_id );

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
	$card_title
);

if ( file_exists( $tmp ) ) {
	@unlink( $tmp );
}

if ( is_wp_error( $new_id ) ) {
	echo 'Import failed: ' . $new_id->get_error_message() . "\n";
	return;
}

$cards[ $target ]['image'] = $new_id;
update_field( 'field_app_cards', $cards, $post_id );

$meta = wp_get_attachment_metadata( $new_id );
printf(
	"  imported #%d (%sx%s) and set as the '%s' card image.\n",
	$new_id,
	isset( $meta['width'] ) ? $meta['width'] : '?',
	isset( $meta['height'] ) ? $meta['height'] : '?',
	$card_title
);
