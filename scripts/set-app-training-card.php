<?php
/**
 * Point the Applications "Training" card at the client's training photo.
 *
 * Why this is needed on top of replacing the theme asset: the page's card images
 * are stored as media-library ATTACHMENTS (`app_cards_<i>_image`), while the
 * gallery collections use theme-relative paths. Replacing
 * `assets/images/app-training.jpg` therefore updates the GALLERY automatically
 * but leaves the CARD on the old upload. Both have to be brought forward.
 *
 * Idempotent: skips if the stored attachment already comes from this asset, so
 * re-running does not pile up duplicates.
 *
 * Run:  wp eval-file scripts/set-app-training-card.php
 *
 * @package GerotechChild
 */

if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

$page = get_page_by_path( 'unique-applications-for-standard-machines' );
if ( ! $page ) {
	echo "Applications page not found — aborting.\n";
	return;
}
$post_id = (int) $page->ID;

$asset_rel = 'assets/images/app-training.jpg';
$asset     = get_theme_file_path( $asset_rel );
if ( ! file_exists( $asset ) ) {
	echo "Missing theme asset: {$asset_rel}\n";
	return;
}

// Which card row is "Training"?
$cards = get_field( 'app_cards', $post_id );
if ( ! is_array( $cards ) ) {
	echo "No app_cards rows found.\n";
	return;
}

$target = null;
foreach ( $cards as $i => $card ) {
	if ( isset( $card['title'] ) && 'Training' === $card['title'] ) {
		$target = $i;
		break;
	}
}
if ( null === $target ) {
	echo "No 'Training' card found.\n";
	return;
}

$current_id = isset( $cards[ $target ]['image'] ) ? $cards[ $target ]['image'] : 0;
if ( is_array( $current_id ) && isset( $current_id['ID'] ) ) {
	$current_id = (int) $current_id['ID'];
}
$current_id = (int) $current_id;

// Already pointing at an append of this asset? Nothing to do.
if ( $current_id ) {
	$attached = (string) get_post_meta( $current_id, '_wp_attached_file', true );
	if ( 0 === strpos( basename( $attached ), 'app-training' ) ) {
		$meta = wp_get_attachment_metadata( $current_id );
		echo "Training card already uses attachment #{$current_id} ({$attached})";
		echo isset( $meta['width'] ) ? " {$meta['width']}x{$meta['height']}" : '';
		echo " — nothing to do.\n";
		return;
	}
}

echo "Training card is row {$target}, currently attachment #{$current_id}.\n";

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

// media_handle_sideload() MOVES the file it is given into uploads, so hand it a
// throwaway copy — otherwise it deletes the theme asset it is importing from.
$tmp = wp_tempnam( 'app-training.jpg' );
if ( ! $tmp || ! copy( $asset, $tmp ) ) {
	echo "Could not stage a temp copy of the asset.\n";
	return;
}

$new_id = media_handle_sideload(
	array(
		'name'     => 'app-training.jpg',
		'tmp_name' => $tmp,
	),
	$post_id,
	'Gerotech instructor walking a customer through a Haas control'
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
	"  imported #%d (%sx%s) and set as the Training card image.\n",
	$new_id,
	isset( $meta['width'] ) ? $meta['width'] : '?',
	isset( $meta['height'] ) ? $meta['height'] : '?'
);
