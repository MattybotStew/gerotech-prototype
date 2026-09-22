<?php
/**
 * Append images to an Applications gallery collection.
 *
 * The Applications gallery lives in the `app_collections` repeater, whose `media`
 * field is one pipe-delimited item per line:
 *
 *     type | src | poster | alt | caption
 *
 * A stored value beats the template default, so adding images to the PHP default
 * alone changes nothing on Local or Dev — the stored rows have to be updated.
 *
 * Usage (positional; WP-CLI rejects custom --flags on eval-file):
 *
 *   wp eval-file scripts/add-app-gallery-items.php "Part Programming" \
 *     "assets/images/x.jpg|Alt text|Caption text" \
 *     "assets/images/y.jpg|Alt text|Caption text"
 *
 *   # optional: also replace the collection's static meta label
 *   wp eval-file scripts/add-app-gallery-items.php "Part Programming" "meta=Milling · turning" \
 *     "assets/images/x.jpg|Alt|Caption"
 *
 * Idempotent: an item whose src is already present is skipped, so re-running is
 * safe. Paths beginning "assets/" are expanded to the theme URL with
 * GEROTECH_CHILD_URI, matching the existing rows.
 *
 * @package GerotechChild
 */

if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

$args = is_array( $args ) ? array_values( $args ) : array();
$title = isset( $args[0] ) ? trim( (string) $args[0] ) : '';
if ( '' === $title ) {
	echo "Usage: wp eval-file scripts/add-app-gallery-items.php \"<collection title>\" [\"meta=...\"] \"src|alt|caption\" ...\n";
	return;
}

$page = get_page_by_path( 'unique-applications-for-standard-machines' );
if ( ! $page ) {
	echo "Applications page not found.\n";
	return;
}
$post_id = (int) $page->ID;

$rows = get_field( 'app_collections', $post_id );
if ( ! is_array( $rows ) ) {
	echo "No app_collections rows found.\n";
	return;
}

$target = null;
foreach ( $rows as $i => $row ) {
	if ( isset( $row['title'] ) && $title === $row['title'] ) {
		$target = $i;
		break;
	}
}
if ( null === $target ) {
	echo "No '{$title}' collection found.\n";
	return;
}

$new_meta = null;
$items    = array();
foreach ( array_slice( $args, 1 ) as $a ) {
	$a = trim( (string) $a );
	if ( '' === $a ) {
		continue;
	}
	if ( 0 === strpos( $a, 'meta=' ) ) {
		$new_meta = substr( $a, 5 );
		continue;
	}
	$items[] = $a;
}

$media = isset( $rows[ $target ]['media'] ) ? (string) $rows[ $target ]['media'] : '';
$lines = array();
foreach ( preg_split( '/\r\n|\r|\n/', $media ) as $l ) {
	$l = trim( $l );
	if ( '' !== $l ) {
		$lines[] = $l;
	}
}

$added = 0;
foreach ( $items as $item ) {
	$p     = array_map( 'trim', explode( '|', $item, 3 ) );
	$src   = isset( $p[0] ) ? $p[0] : '';
	$alt   = isset( $p[1] ) ? $p[1] : '';
	$cap   = isset( $p[2] ) ? $p[2] : '';
	if ( '' === $src ) {
		continue;
	}
	// Items are stored as absolute theme URLs, matching the existing rows.
	$full = ( 0 === strpos( $src, 'assets/' ) ) ? GEROTECH_CHILD_URI . '/' . $src : $src;

	$dupe = false;
	foreach ( $lines as $l ) {
		if ( false !== strpos( $l, basename( $full ) ) ) {
			$dupe = true;
			break;
		}
	}
	if ( $dupe ) {
		printf( "  skip   %s (already in '%s')\n", basename( $full ), $title );
		continue;
	}

	$lines[] = 'image | ' . $full . ' | | ' . $alt . ' | ' . $cap;
	printf( "  add    %s\n", basename( $full ) );
	$added++;
}

$rows[ $target ]['media'] = implode( "\n", $lines );
if ( null !== $new_meta ) {
	$rows[ $target ]['meta'] = $new_meta;
	printf( "  meta   -> %s\n", $new_meta );
}

if ( $added || null !== $new_meta ) {
	update_field( 'field_app_collections', $rows, $post_id );
	echo "  saved.\n";
} else {
	echo "  nothing to do.\n";
}

$after = get_field( 'app_collections', $post_id );
$n     = 0;
foreach ( preg_split( '/\r\n|\r|\n/', (string) $after[ $target ]['media'] ) as $l ) {
	if ( '' !== trim( $l ) ) {
		$n++;
	}
}
printf( "  '%s' now has %d media item(s).\n", $title, $n );
