<?php
/**
 * Audit which ACF fields are APPLIED on this environment.
 *
 * "Applied" = the field holds a stored value, so an editor opening the page sees
 * real content instead of an empty control. A field that is defined in code but
 * never stored still renders correctly on the front end (the template default
 * covers it), which is exactly why this is easy to miss — the site looks right
 * while the editor looks broken.
 *
 * Run:  wp eval-file scripts/audit-acf-applied.php
 *       wp eval-file scripts/audit-acf-applied.php -- --verbose
 *
 * Exit code is 0 either way; this reports, it does not enforce.
 *
 * @package GerotechChild
 */

$verbose = in_array( '--verbose', (array) $args, true );

if ( ! function_exists( 'acf_get_field_groups' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

/**
 * Describe a value compactly for the report.
 *
 * @param mixed $v Value.
 * @return string
 */
function gerotech_audit_repr( $v ) {
	if ( is_array( $v ) ) {
		return 'array(' . count( $v ) . ')';
	}
	if ( is_bool( $v ) ) {
		return $v ? 'true' : 'false';
	}
	$s = trim( (string) $v );
	return '' === $s ? '(empty)' : mb_substr( $s, 0, 40 );
}

/**
 * Every page that has ACF groups attached, plus the options page.
 *
 * @return array Map of label => post id or 'option'.
 */
function gerotech_audit_targets() {
	$targets = array();
	$dupes   = array();

	$pages = get_posts(
		array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
		)
	);

	$seen = array();
	foreach ( $pages as $page ) {
		$slug = $page->post_name;

		// Some environments carry orphaned duplicate pages sharing a slug (e.g.
		// rotary-repair #194 and #1484). Only ONE of them is actually reachable:
		// whichever get_page_by_path() resolves to. Reporting the unreachable twin
		// produces phantom "not applied" rows, so skip it and surface it separately.
		$served = get_page_by_path( $slug );
		$served_id = $served ? (int) $served->ID : 0;

		if ( $served_id && $served_id !== (int) $page->ID ) {
			$dupes[ $slug ][] = (int) $page->ID;
			continue;
		}

		$targets[ $slug . ' (#' . $page->ID . ')' ] = $page->ID;
		$seen[ $slug ] = true;
	}

	$targets['OPTIONS: Site Content'] = 'option';
	$targets['__dupes__']             = $dupes;

	return $targets;
}

/**
 * Top-level fields that apply to a given target.
 *
 * Only top-level fields are reported: repeater/flexible sub-fields live inside
 * their parent, so "is the parent stored?" is the meaningful question.
 *
 * @param mixed $post_id Post ID or 'option'.
 * @return array
 */
function gerotech_audit_fields( $post_id ) {
	$out = array();

	$groups = acf_get_field_groups( 'option' === $post_id ? array( 'options_page' => 'gerotech-site-content' ) : array( 'post_id' => $post_id ) );

	foreach ( $groups as $group ) {
		// Only OUR groups. The parent theme ships its own DB-stored groups
		// (Home Options, Page Options, SEO fields, …) which our templates never
		// read and which gerotech_hide_legacy_field_groups() hides in the editor.
		// Reporting them would bury the real gaps. Ours are PHP-local.
		if ( empty( $group['local'] ) || 'php' !== $group['local'] ) {
			continue;
		}
		foreach ( (array) acf_get_fields( $group ) as $field ) {
			// Skip layout-only field types.
			if ( in_array( $field['type'], array( 'tab', 'message', 'accordion', 'clone' ), true ) ) {
				continue;
			}
			$out[] = $field;
		}
	}

	return $out;
}

echo "ACF applied-state audit\n";
echo str_repeat( '=', 60 ) . "\n\n";

$all_targets = gerotech_audit_targets();
$dupes       = isset( $all_targets['__dupes__'] ) ? $all_targets['__dupes__'] : array();
unset( $all_targets['__dupes__'] );

$total_fields  = 0;
$total_applied = 0;
$gaps          = array();

foreach ( $all_targets as $label => $post_id ) {
	$fields = gerotech_audit_fields( $post_id );
	if ( ! $fields ) {
		continue;
	}

	$missing = array();
	foreach ( $fields as $field ) {
		$total_fields++;
		$v = get_field( $field['name'], $post_id );
		$applied = ( null !== $v && '' !== $v && false !== $v && ! ( is_array( $v ) && empty( $v ) ) );
		if ( $applied ) {
			$total_applied++;
		} else {
			$missing[] = $field;
		}
	}

	if ( $missing ) {
		$gaps[ $label ] = $missing;
	}

	if ( $verbose ) {
		printf( "%-40s %3d fields, %3d applied, %3d blank\n", $label, count( $fields ), count( $fields ) - count( $missing ), count( $missing ) );
	}
}

if ( $dupes ) {
	echo "DUPLICATE SLUGS — unreachable pages excluded from the counts above:\n";
	foreach ( $dupes as $slug => $ids ) {
		$served = get_page_by_path( $slug );
		printf( "  %-24s orphaned: #%s   served: #%d\n", $slug, implode( ', #', $ids ), $served ? $served->ID : 0 );
	}
	echo "\n  These are stale duplicates that nothing links to. Worth deleting, but they are\n";
	echo "  NOT missing content — do not seed them.\n\n";
}

if ( ! $gaps ) {
	echo "Every ACF field on every page holds a stored value. Nothing to do.\n";
} else {
	echo "Fields DEFINED IN CODE but NOT APPLIED (no stored value):\n\n";
	foreach ( $gaps as $label => $missing ) {
		printf( "  %s\n", $label );
		foreach ( $missing as $field ) {
			printf( "     - %-38s %s\n", $field['name'], $field['label'] );
		}
	}
}

printf( "\n%d/%d top-level fields applied across %d targets.\n", $total_applied, $total_fields, count( gerotech_audit_targets() ) );
echo "\nNOTE: a blank accent-colour select is CORRECT — blank means \"keep the design\n";
echo "colour\". Blank text/repeater fields are the ones worth applying.\n";
