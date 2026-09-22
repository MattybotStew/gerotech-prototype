<?php
/**
 * Seed the content fields that were newly made ACF-editable (2026-09-22).
 *
 * WHY THIS EXISTS
 * ---------------
 * The templates carry these strings as PHP defaults, so the front end is correct
 * with NO database changes at all. But a blank ACF text field shows as empty in
 * the editor, which makes editors think the content is missing. So — matching how
 * the 2026-09-18 seeding worked — we materialise the current copy into the DB once.
 *
 * Safeness:
 *   - Idempotent. Writes only when nothing is stored yet, so re-running never
 *     clobbers an editor's changes.
 *   - Environment-agnostic. Pages are looked up by slug, never by ID.
 *   - Deliberately does NOT seed any *_hero_accent_color select. Those are blank
 *     by design ("blank = keep the design colour"), which is also how Local and
 *     Dev already store them. Seeding one would freeze the design colour.
 *
 * Run:  wp eval-file scripts/seed-acf-content.php
 *
 * @package GerotechChild
 */

if ( ! function_exists( 'update_field' ) || ! function_exists( 'get_field' ) ) {
	echo "ACF is not loaded — aborting.\n";
	return;
}

/**
 * Set a field only when it holds nothing yet.
 *
 * @param string $selector Field key or name.
 * @param mixed  $value    Value to store.
 * @param mixed  $post_id  Post ID or 'option'.
 * @param string $label    Human label for the log.
 * @return bool True when written.
 */
function gerotech_seed_once( $selector, $value, $post_id, $label ) {
	$current = get_field( $selector, $post_id );
	if ( null !== $current && '' !== $current && false !== $current && ! ( is_array( $current ) && empty( $current ) ) ) {
		echo "  skip   {$label} (already set)\n";
		return false;
	}
	update_field( $selector, $value, $post_id );
	echo "  set    {$label}\n";
	return true;
}

/**
 * Look up a page ID by slug, or 0.
 *
 * @param string $slug Page slug.
 * @return int
 */
function gerotech_seed_page( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? (int) $page->ID : 0;
}

echo "Seeding newly ACF-editable content…\n\n";

/* ── Service page ─────────────────────────────────────────────── */
$service_id = gerotech_seed_page( 'service' );
if ( $service_id ) {
	echo "Service (ID {$service_id}):\n";

	foreach ( array(
		'field_service_tab_label_service' => array( 'Submit a Service Request', 'tab label — service request' ),
		'field_service_tab_label_general' => array( 'General Service Inquiry', 'tab label — general inquiry' ),
		'field_service_tab_label_parts'   => array( 'Parts Order', 'tab label — parts order' ),
		'field_service_tab_label_rotary'  => array( 'Rotary Repair', 'tab label — rotary repair' ),
		'field_service_tab_label_plan'    => array( 'Preventive Maintenance', 'tab label — preventive maintenance' ),
		'field_service_tab_label_support' => array( 'Application Support', 'tab label — application support' ),
	) as $key => $data ) {
		gerotech_seed_once( $key, $data[0], $service_id, $data[1] );
	}

	gerotech_seed_once( 'field_service_plan_inspect_title', 'Planned Maintenance Inspection Items', $service_id, 'checklist heading' );
	gerotech_seed_once(
		'field_service_plan_inspect_intro',
		'Typical inspection items are noted below. Planned maintenance plans are available for all Haas machines. Additional service, repairs, and parts for repairs are scheduled with the HFO and are subject to standard service rates. <b>The Planned Maintenance Service provides a list of necessary repairs and possible parts needed for future maintenance.</b>',
		$service_id,
		'checklist intro'
	);
	gerotech_seed_once( 'field_service_plan_inspect_footnote', '* if applicable', $service_id, 'checklist footnote' );
	gerotech_seed_once( 'field_service_plan_optional_title', 'Optional Special Services', $service_id, 'optional services heading' );
	gerotech_seed_once( 'field_service_plan_cta_title', 'Request a Planned Maintenance Plan', $service_id, 'request heading' );
	gerotech_seed_once( 'field_service_plan_cta_body', 'Please use the form below or call (248) 476-8787.', $service_id, 'request body' );
	gerotech_seed_once(
		'field_service_support_note',
		'Please use the form below to contact our applications engineering department.',
		$service_id,
		'application support note'
	);
	gerotech_seed_once( 'field_service_locations_title', 'Locations', $service_id, 'locations heading' );

	gerotech_seed_once(
		'field_service_plan_inspect_groups',
		array(
			array( 'heading' => 'Electrical System', 'column' => 'left', 'items' => "Check incoming voltage\nDC buss voltage\nLogic voltages\nCondition of wires and connections\nEnsure fans are working\nCheck regen resistors\nCheck vector drive\nCheck transformers\nCheck cabinet filter\nCheck motor connections and brushes*" ),
			array( 'heading' => 'Operator Panel', 'column' => 'left', 'items' => "Condition of keypad\nFunction of keys, buttons, remote handle jog*\nCondition of floppy drive*\nAdjust CRT if needed\nCheck door rollers, switches, rails\nOperation of chip auger/conveyor" ),
			array( 'heading' => 'Wipers/Seals/Windows/Bellows', 'column' => 'left', 'items' => 'Check if in good working condition' ),
			array( 'heading' => 'Geometry', 'column' => 'left', 'items' => "Check level\nCheck backlash in axis’ with ballscrews\nComplete an alignment report" ),
			array( 'heading' => 'Pneumatic System', 'column' => 'left', 'items' => "Check filters*\nCheck hoses and fittings\nCheck for leaks\nCheck pressure switch" ),
			array( 'heading' => 'Way Lube System', 'column' => 'right', 'items' => "Inspect filters\nInspect lines and fittings\nCheck proper pump operation" ),
			array( 'heading' => 'Spindle/Transmission', 'column' => 'right', 'items' => "Check transmission oil\nCondition of belts\nCondition of air lube lines\nCondition of spindle taper or chuck" ),
			array( 'heading' => 'Hydraulic Power Unit*', 'column' => 'right', 'items' => "Check oil level and condition of oil\nCheck for leak\nCheck max pressure\nCheck low pressure switch\nCheck gauges\nCheck that filter has been changed" ),
			array( 'heading' => 'Coolant', 'column' => 'right', 'items' => "Check condition of hoses\nCheck for leaks\nCoolant pump and filters\nP-cool operation" ),
			array( 'heading' => 'Counterbalance*', 'column' => 'right', 'items' => "Check hoses and fill if necessary\nCheck chains, rollers, and weight" ),
		),
		$service_id,
		'inspection checklist (10 groups)'
	);
	gerotech_seed_once(
		'field_service_plan_optional_groups',
		array(
			array( 'heading' => 'Through Spindle Coolant (mills) High Pressure Coolant (lathes)', 'column' => 'left', 'items' => 'Check pre-charge pressure, hoses, pressure at pump, seal housing, and filters.' ),
			array( 'heading' => 'Pallet Changer or Parts Loader', 'column' => 'left', 'items' => 'Check for wear on rollers, status of switches, alignment to machine, condition of bumpers, and remote operator panel.' ),
			array( 'heading' => 'Bar Feed (Haas brand only)', 'column' => 'left', 'items' => 'Check alignment, switches, and repeatability.' ),
			array( 'heading' => 'Vibration Analyzer Plot', 'column' => 'right', 'items' => 'Verifies machine vibration against established criteria. Isolates potential problems while still manageable.' ),
			array( 'heading' => 'Ball Bar Plot', 'column' => 'right', 'items' => 'Used as a diagnostic tool, the ball bar tests circularity and verifies the positioning accuracy and repeatability of your machine tool. Only available on mills at this time.' ),
			array( 'heading' => 'Probe Calibration', 'column' => 'right', 'items' => 'By recalibrating your Visual Quick Code Probing System, you ensure the integrity of your measuring system.' ),
		),
		$service_id,
		'optional special services (6 groups)'
	);
	gerotech_seed_once(
		'field_service_locations',
		array(
			array( 'anchor' => 'location_grand_rapids', 'name' => 'Grand Rapids, MI', 'address' => '2716 Courier Court NW, Grand Rapids, MI 49544', 'phone' => '616-735-1100', 'fax' => '616-735-0776' ),
			array( 'anchor' => 'location_flat_rock', 'name' => 'Flat Rock, MI', 'address' => '29220 Commerce Drive, Flat Rock, MI 48134', 'phone' => '734-379-7788', 'fax' => '734-379-2244' ),
		),
		$service_id,
		'office locations (2)'
	);
	echo "\n";
} else {
	echo "Service page not found — skipped.\n\n";
}

/* ── Careers column headers ───────────────────────────────────── */
$careers_id = gerotech_seed_page( 'careers' );
if ( $careers_id ) {
	echo "Careers (ID {$careers_id}):\n";
	gerotech_seed_once( 'field_careers_col_job', 'Job Title', $careers_id, 'column — job title' );
	gerotech_seed_once( 'field_careers_col_location', 'Location', $careers_id, 'column — location' );
	gerotech_seed_once( 'field_careers_col_department', 'Department', $careers_id, 'column — department' );
	gerotech_seed_once( 'field_careers_col_date', 'Post Date', $careers_id, 'column — post date' );
	echo "\n";
}

/* ── Simple page titles ───────────────────────────────────────── */
$titles = array(
	'contact'  => array( 'field_contact_page_title', 'Contact', 'contact form heading', 'field_contact_form_title', 'Contact Form' ),
	'training' => array( 'field_training_page_title', 'Training', null, null ),
	'about'    => array( 'field_about_page_title', 'About', null, null ),
);
foreach ( $titles as $slug => $spec ) {
	$pid = gerotech_seed_page( $slug );
	if ( ! $pid ) {
		echo ucfirst( $slug ) . " page not found — skipped.\n";
		continue;
	}
	echo ucfirst( $slug ) . " (ID {$pid}):\n";
	gerotech_seed_once( $spec[0], $spec[1], $pid, 'page title' );
	if ( $spec[2] ) {
		gerotech_seed_once( $spec[3], $spec[4], $pid, $spec[2] );
	}
	echo "\n";
}

/* ── Global forms (options) ───────────────────────────────────── */
echo "Site Content — Forms (options):\n";
gerotech_seed_once( 'field_signup_email_label', 'Email address', 'option', 'signup email label' );
gerotech_seed_once( 'field_signup_email_placeholder', 'your@email.com', 'option', 'signup email placeholder' );
gerotech_seed_once( 'field_signup_submit_label', 'Sign Up', 'option', 'signup button label' );
echo "\n";

/* ── Verification ─────────────────────────────────────────────── */
echo "Verification:\n";
if ( $service_id ) {
	$groups = get_field( 'field_service_plan_inspect_groups', $service_id );
	echo '  service inspection groups: ' . ( is_array( $groups ) ? count( $groups ) : 0 ) . " (expect 10)\n";
	echo '  service tab label 1: ' . get_field( 'field_service_tab_label_service', $service_id ) . "\n";
}
echo '  signup submit label: ' . get_field( 'field_signup_submit_label', 'option' ) . "\n";
if ( $careers_id ) {
	echo '  careers column 1: ' . get_field( 'field_careers_col_job', $careers_id ) . "\n";
}
echo "\nDone.\n";
