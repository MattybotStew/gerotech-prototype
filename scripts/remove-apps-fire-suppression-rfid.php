<?php
/**
 * Remove the Fire Suppression + RFID rows from the APPLICATIONS page.
 *
 * Client (Tristien Bridges, Message Board, 2026-09-21): both sections exist on the
 * prototype only — they are not in Figma and must not go to development. The
 * prototype markup was cleaned first, but the ACF rows seeded earlier (on Local and
 * Dev, materialised from the template defaults) still rendered both sections, so
 * the stored rows have to go too. The template defaults are cleaned in
 * `page-unique-applications-for-standard-machines.php` so a fresh environment is
 * correct without this running.
 *
 * APPLICATIONS ONLY — the MCS page keeps its own Fire Suppression collection.
 *
 * Safe to run repeatedly and on any environment:
 *
 *   wp eval-file scripts/remove-apps-fire-suppression-rfid.php
 *
 * On a LocalWP site there is no `wp` CLI — bootstrap wp-load.php with Local's PHP
 * instead (see `.clinerules` → "Repo theme → Local site sync").
 *
 * @package GerotechChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'get_field' ) ) {
	echo "ERROR: ACF functions unavailable — is ACF Pro active?\n";
	return;
}

$slug = 'unique-applications-for-standard-machines';
$page = get_page_by_path( $slug );

if ( ! $page ) {
	echo "ERROR: page /{$slug}/ not found on this environment.\n";
	return;
}

$post_id = $page->ID;
$targets = array( 'fire suppression', 'rfid' );

/**
 * Repeater rows can come back keyed by sub-field name or by field key — accept both.
 *
 * @param array $row Repeater row.
 * @return string
 */
$row_title = function ( $row ) {
	foreach ( array( 'title', 'field_app_card_title', 'field_app_coll_title' ) as $key ) {
		if ( isset( $row[ $key ] ) && '' !== $row[ $key ] ) {
			return (string) $row[ $key ];
		}
	}
	return '';
};

printf( "Applications page: #%d (%s)\n", $post_id, $slug );

foreach ( array( 'app_cards', 'app_collections' ) as $field ) {
	$rows = get_field( $field, $post_id, false );

	if ( ! is_array( $rows ) || ! $rows ) {
		printf( "  %-16s empty — skipped\n", $field );
		continue;
	}

	$keep = array();
	foreach ( $rows as $row ) {
		$title = $row_title( $row );

		if ( in_array( strtolower( trim( $title ) ), $targets, true ) ) {
			printf( "  %-16s removing: %s\n", $field, $title );
			continue;
		}

		$keep[] = $row;
	}

	if ( count( $keep ) === count( $rows ) ) {
		printf( "  %-16s already clean (%d rows)\n", $field, count( $rows ) );
		continue;
	}

	update_field( $field, array_values( $keep ), $post_id );
	printf( "  %-16s %d → %d rows\n", $field, count( $rows ), count( $keep ) );
}

/* ── Verify ────────────────────────────────────────────────────────── */
echo "\nStored rows now:\n";

foreach ( array( 'app_cards', 'app_collections' ) as $field ) {
	$rows   = get_field( $field, $post_id, false );
	$titles = array();

	foreach ( (array) $rows as $row ) {
		$titles[] = $row_title( $row );
	}

	printf( "  %-16s %d: %s\n", $field, count( $titles ), implode( ' | ', $titles ) );
}
