<?php
/**
 * ACF field groups — legacy (dev-ported) pages.
 *
 * Phase 2: Training, Support, Service, Rotary Repair, Planned Maintenance,
 * About, Contact. These pages carry the old dev design (scoped to `.legacy`)
 * but the visible copy is now client-editable.
 *
 * Same editor model as the rest of the theme: plain text/textarea, accent via
 * <em>…</em> (gerotech_accent()), line breaks become the design's breaks.
 * Form internals (CF7 shortcodes), Google Maps wiring, and tab chrome stay
 * hardcoded — only the visible content is editable.
 *
 * @package GerotechChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

/**
 * Training.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_training_content',
		'title'    => 'Training — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'training' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			// Page title + headings that used to be hardcoded in the template.
			array( 'key' => 'field_training_page_title', 'label' => 'Page title', 'name' => 'training_page_title', 'type' => 'text', 'instructions' => 'Default: “Training”.' ),
			array( 'key' => 'field_training_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_hero_title', 'label' => 'Hero title', 'name' => 'training_hero_title', 'type' => 'text' ),
			array( 'key' => 'field_training_hero_subtitle', 'label' => 'Hero subtitle', 'name' => 'training_hero_subtitle', 'type' => 'text' ),

			array( 'key' => 'field_training_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_intro_label', 'label' => 'Intro button label', 'name' => 'training_intro_label', 'type' => 'text' ),
			array( 'key' => 'field_training_intro_url', 'label' => 'Intro button URL', 'name' => 'training_intro_url', 'type' => 'text' ),

			array( 'key' => 'field_training_courses_tab', 'label' => 'Courses', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_courses_title', 'label' => 'Heading', 'name' => 'training_courses_title', 'type' => 'text' ),
			array(
				'key'          => 'field_training_courses',
				'label'        => 'Courses',
				'name'         => 'training_courses',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add course',
				'sub_fields'   => array(
					array( 'key' => 'field_training_course_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
					array( 'key' => 'field_training_course_url', 'label' => 'URL', 'name' => 'url', 'type' => 'text' ),
					array( 'key' => 'field_training_course_body', 'label' => 'Body', 'name' => 'body', 'type' => 'textarea', 'rows' => 4 ),
				),
			),

			array( 'key' => 'field_training_sessions_tab', 'label' => 'Upcoming Sessions', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_sessions_title', 'label' => 'Heading', 'name' => 'training_sessions_title', 'type' => 'text' ),
			array( 'key' => 'field_training_sessions_label', 'label' => 'Link label', 'name' => 'training_sessions_label', 'type' => 'text' ),
			array( 'key' => 'field_training_sessions_url', 'label' => 'Link URL', 'name' => 'training_sessions_url', 'type' => 'text' ),

			array( 'key' => 'field_training_custom_tab', 'label' => 'Custom Training', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_custom_body', 'label' => 'Body', 'name' => 'training_custom_body', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),

			array( 'key' => 'field_training_locations_tab', 'label' => 'Locations', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_locations_title', 'label' => 'Heading', 'name' => 'training_locations_title', 'type' => 'text' ),
			array(
				'key'          => 'field_training_locations',
				'label'        => 'Locations',
				'name'         => 'training_locations',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Add location',
				'sub_fields'   => array(
					array( 'key' => 'field_training_loc_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text' ),
					array( 'key' => 'field_training_loc_address', 'label' => 'Address', 'name' => 'address', 'type' => 'text' ),
					array( 'key' => 'field_training_loc_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text' ),
					array( 'key' => 'field_training_loc_fax', 'label' => 'Fax', 'name' => 'fax', 'type' => 'text' ),
				),
			),

			array( 'key' => 'field_training_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_training_cta_text', 'label' => 'CTA text', 'name' => 'training_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_training_cta_label', 'label' => 'Button label', 'name' => 'training_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_training_cta_url', 'label' => 'Button URL', 'name' => 'training_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * Support.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_support_content',
		'title'    => 'Support — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'support' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			array( 'key' => 'field_support_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_support_hero_title', 'label' => 'Hero title', 'name' => 'support_hero_title', 'type' => 'text' ),
			array( 'key' => 'field_support_hero_subtitle', 'label' => 'Hero subtitle', 'name' => 'support_hero_subtitle', 'type' => 'text' ),

			array( 'key' => 'field_support_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_support_intro', 'label' => 'Intro (h3)', 'name' => 'support_intro', 'type' => 'textarea', 'rows' => 4 ),

			array( 'key' => 'field_support_services_tab', 'label' => 'Services', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_support_services_title', 'label' => 'Heading', 'name' => 'support_services_title', 'type' => 'text' ),
			array( 'key' => 'field_support_services_intro', 'label' => 'Subtext', 'name' => 'support_services_intro', 'type' => 'textarea', 'rows' => 2 ),
			array(
				'key'          => 'field_support_services',
				'label'        => 'Service columns',
				'name'         => 'support_services',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add column',
				'sub_fields'   => array(
					array( 'key' => 'field_support_service_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
					array( 'key' => 'field_support_service_body', 'label' => 'Body', 'name' => 'body', 'type' => 'textarea', 'rows' => 4 ),
				),
			),
			array( 'key' => 'field_support_assist_title', 'label' => 'Assistance heading', 'name' => 'support_assist_title', 'type' => 'text' ),
			array( 'key' => 'field_support_assist_body', 'label' => 'Assistance body', 'name' => 'support_assist_body', 'type' => 'textarea', 'rows' => 2 ),

			array( 'key' => 'field_support_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_support_cta_text', 'label' => 'CTA text', 'name' => 'support_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_support_cta_label', 'label' => 'Button label', 'name' => 'support_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_support_cta_url', 'label' => 'Button URL', 'name' => 'support_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * Service.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_service_content',
		'title'    => 'Service — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'service' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			array( 'key' => 'field_service_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_service_intro_title', 'label' => 'Intro heading', 'name' => 'service_intro_title', 'type' => 'text' ),
			array( 'key' => 'field_service_intro_body', 'label' => 'Intro body', 'name' => 'service_intro_body', 'type' => 'textarea', 'rows' => 3 ),
			array(
				'key'          => 'field_service_services',
				'label'        => 'Service columns',
				'name'         => 'service_services',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add column',
				'sub_fields'   => array(
					array( 'key' => 'field_service_service_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
					array( 'key' => 'field_service_service_body', 'label' => 'Body', 'name' => 'body', 'type' => 'textarea', 'rows' => 4 ),
				),
			),
			array( 'key' => 'field_service_assist_title', 'label' => 'Assistance heading', 'name' => 'service_assist_title', 'type' => 'text' ),
			array( 'key' => 'field_service_assist_body', 'label' => 'Assistance body', 'name' => 'service_assist_body', 'type' => 'textarea', 'rows' => 2 ),

			array( 'key' => 'field_service_tabs_tab', 'label' => 'Form Tabs', 'type' => 'tab', 'placement' => 'top' ),
			// Tab strip labels. Kept as six explicit fields rather than a repeater: each one is
			// bound to a fixed tab id (tf_service, tf_general, …), so reordering a repeater
			// would silently break the tab wiring.
			array( 'key' => 'field_service_tab_label_service', 'label' => 'Tab 1 — Service Request', 'name' => 'service_tab_label_service', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_label_general', 'label' => 'Tab 2 — General Inquiry', 'name' => 'service_tab_label_general', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_label_parts', 'label' => 'Tab 3 — Parts Order', 'name' => 'service_tab_label_parts', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_label_rotary', 'label' => 'Tab 4 — Rotary Repair', 'name' => 'service_tab_label_rotary', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_label_plan', 'label' => 'Tab 5 — Preventive Maintenance', 'name' => 'service_tab_label_plan', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_label_support', 'label' => 'Tab 6 — Application Support', 'name' => 'service_tab_label_support', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_service', 'label' => 'Service Request intro', 'name' => 'service_tab_service_intro', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_service_tab_general', 'label' => 'General Inquiry intro', 'name' => 'service_tab_general_intro', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_service_tab_parts', 'label' => 'Parts Order intro', 'name' => 'service_tab_parts_intro', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_service_tab_rotary_title', 'label' => 'Rotary heading', 'name' => 'service_tab_rotary_title', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_rotary_intro', 'label' => 'Rotary intro', 'name' => 'service_tab_rotary_intro', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_service_tab_plan_title', 'label' => 'Planned Maintenance heading', 'name' => 'service_tab_plan_title', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_plan_intro', 'label' => 'Planned Maintenance intro', 'name' => 'service_tab_plan_intro', 'type' => 'textarea', 'rows' => 4 ),
			array( 'key' => 'field_service_tab_support_title', 'label' => 'Application Support heading', 'name' => 'service_tab_support_title', 'type' => 'text' ),
			array( 'key' => 'field_service_tab_support_intro', 'label' => 'Application Support intro', 'name' => 'service_tab_support_intro', 'type' => 'textarea', 'rows' => 3 ),

			/* ── Planned Maintenance checklist ───────────────────────────────
			   This checklist used to be hardcoded HTML (12 groups, ~60 lines) that the
			   client could not touch. It is now two repeaters. `items` is one entry per
			   line — a textarea rather than a nested repeater because the legacy
			   two-column layout is driven by .t_left/.t_right, and ACF nested repeaters
			   are not available here. */
			array( 'key' => 'field_service_plan_tab', 'label' => 'Planned Maintenance', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_service_plan_inspect_title', 'label' => 'Checklist heading', 'name' => 'service_plan_inspect_title', 'type' => 'text' ),
			array( 'key' => 'field_service_plan_inspect_intro', 'label' => 'Checklist intro', 'name' => 'service_plan_inspect_intro', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Basic HTML is allowed (e.g. &lt;b&gt;).' ),
			array(
				'key'          => 'field_service_plan_inspect_groups',
				'label'        => 'Inspection items',
				'name'         => 'service_plan_inspect_groups',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add inspection group',
				'instructions' => 'Each group is a bold heading with its checklist lines beneath it.',
				'sub_fields'   => array(
					array( 'key' => 'field_service_plan_inspect_heading', 'label' => 'Group heading', 'name' => 'heading', 'type' => 'text' ),
					array( 'key' => 'field_service_plan_inspect_items', 'label' => 'Checklist lines', 'name' => 'items', 'type' => 'textarea', 'rows' => 6, 'instructions' => 'One item per line.' ),
					array(
						'key'           => 'field_service_plan_inspect_column',
						'label'         => 'Column',
						'name'          => 'column',
						'type'          => 'select',
						'choices'       => array( 'left' => 'Left', 'right' => 'Right' ),
						'default_value' => 'left',
						'allow_null'    => 0,
					),
				),
			),
			array( 'key' => 'field_service_plan_inspect_footnote', 'label' => 'Checklist footnote', 'name' => 'service_plan_inspect_footnote', 'type' => 'text', 'instructions' => 'Shown in small type under the left column, e.g. “* if applicable”. Leave empty to hide.' ),
			array( 'key' => 'field_service_plan_optional_title', 'label' => 'Optional services heading', 'name' => 'service_plan_optional_title', 'type' => 'text' ),
			array(
				'key'          => 'field_service_plan_optional_groups',
				'label'        => 'Optional special services',
				'name'         => 'service_plan_optional_groups',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add optional service',
				'sub_fields'   => array(
					array( 'key' => 'field_service_plan_optional_heading', 'label' => 'Group heading', 'name' => 'heading', 'type' => 'text' ),
					array( 'key' => 'field_service_plan_optional_items', 'label' => 'Body lines', 'name' => 'items', 'type' => 'textarea', 'rows' => 4, 'instructions' => 'One item per line.' ),
					array(
						'key'           => 'field_service_plan_optional_column',
						'label'         => 'Column',
						'name'          => 'column',
						'type'          => 'select',
						'choices'       => array( 'left' => 'Left', 'right' => 'Right' ),
						'default_value' => 'left',
						'allow_null'    => 0,
					),
				),
			),
			array( 'key' => 'field_service_plan_cta_title', 'label' => 'Request heading', 'name' => 'service_plan_cta_title', 'type' => 'text' ),
			array( 'key' => 'field_service_plan_cta_body', 'label' => 'Request body', 'name' => 'service_plan_cta_body', 'type' => 'text' ),

			/* ── Application Support note + office locations ──────────────────
			   The locations list mirrors the Contact page's, which was already ACF-driven;
			   on this template it was hardcoded. */
			array( 'key' => 'field_service_support_note', 'label' => 'Application Support note', 'name' => 'service_support_note', 'type' => 'text' ),
			array( 'key' => 'field_service_locations_title', 'label' => 'Locations heading', 'name' => 'service_locations_title', 'type' => 'text' ),
			array(
				'key'          => 'field_service_locations',
				'label'        => 'Office locations',
				'name'         => 'service_locations',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add location',
				'sub_fields'   => array(
					array( 'key' => 'field_service_loc_anchor', 'label' => 'Anchor ID', 'name' => 'anchor', 'type' => 'text', 'instructions' => 'Lowercase, underscores. The legacy stylesheet targets #location_grand_rapids and #location_flat_rock, so change these only with care.' ),
					array( 'key' => 'field_service_loc_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text' ),
					array( 'key' => 'field_service_loc_address', 'label' => 'Address', 'name' => 'address', 'type' => 'text' ),
					array( 'key' => 'field_service_loc_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text' ),
					array( 'key' => 'field_service_loc_fax', 'label' => 'Fax', 'name' => 'fax', 'type' => 'text' ),
				),
			),

			array( 'key' => 'field_service_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_service_cta_text', 'label' => 'CTA text', 'name' => 'service_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_service_cta_label', 'label' => 'Button label', 'name' => 'service_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_service_cta_url', 'label' => 'Button URL', 'name' => 'service_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * Rotary Repair.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_rotary_content',
		'title'    => 'Rotary Repair — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'rotary-repair' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			array( 'key' => 'field_rotary_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_rotary_hero_title', 'label' => 'Hero title', 'name' => 'rotary_hero_title', 'type' => 'text' ),
			array( 'key' => 'field_rotary_hero_subtitle', 'label' => 'Hero subtitle', 'name' => 'rotary_hero_subtitle', 'type' => 'text' ),
			array( 'key' => 'field_rotary_hero_subtitle_mobile', 'label' => 'Hero subtitle (mobile)', 'name' => 'rotary_hero_subtitle_mobile', 'type' => 'text' ),

			array( 'key' => 'field_rotary_body_tab', 'label' => 'Body', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_rotary_intro', 'label' => 'Intro', 'name' => 'rotary_intro', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_rotary_form_title', 'label' => 'Form heading', 'name' => 'rotary_form_title', 'type' => 'text' ),
			array( 'key' => 'field_rotary_form_body', 'label' => 'Form intro', 'name' => 'rotary_form_body', 'type' => 'textarea', 'rows' => 2 ),

			array( 'key' => 'field_rotary_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_rotary_cta_text', 'label' => 'CTA text', 'name' => 'rotary_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_rotary_cta_label', 'label' => 'Button label', 'name' => 'rotary_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_rotary_cta_url', 'label' => 'Button URL', 'name' => 'rotary_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * Planned Maintenance.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_planned_content',
		'title'    => 'Planned Maintenance — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'planned-maintenance' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			array( 'key' => 'field_planned_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_planned_hero_title', 'label' => 'Hero title', 'name' => 'planned_hero_title', 'type' => 'text' ),
			array( 'key' => 'field_planned_hero_subtitle', 'label' => 'Hero subtitle', 'name' => 'planned_hero_subtitle', 'type' => 'text' ),
			array( 'key' => 'field_planned_hero_title_mobile', 'label' => 'Hero title (mobile)', 'name' => 'planned_hero_title_mobile', 'type' => 'text' ),

			array( 'key' => 'field_planned_body_tab', 'label' => 'Body', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_planned_intro', 'label' => 'Intro', 'name' => 'planned_intro', 'type' => 'wysiwyg', 'tabs' => 'all', 'toolbar' => 'full', 'media_upload' => 0 ),
			array( 'key' => 'field_planned_flyer_label', 'label' => 'Flyer button label', 'name' => 'planned_flyer_label', 'type' => 'text' ),
			array( 'key' => 'field_planned_flyer_url', 'label' => 'Flyer URL', 'name' => 'planned_flyer_url', 'type' => 'text' ),

			array( 'key' => 'field_planned_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_planned_cta_text', 'label' => 'CTA text', 'name' => 'planned_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_planned_cta_label', 'label' => 'Button label', 'name' => 'planned_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_planned_cta_url', 'label' => 'Button URL', 'name' => 'planned_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * About.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_about_content',
		'title'    => 'About — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'about' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			// Page title + headings that used to be hardcoded in the template.
			array( 'key' => 'field_about_page_title', 'label' => 'Page title', 'name' => 'about_page_title', 'type' => 'text', 'instructions' => 'Default: “About”.' ),
			array( 'key' => 'field_about_hero_tab', 'label' => 'Hero', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_about_hero_title', 'label' => 'Hero title', 'name' => 'about_hero_title', 'type' => 'text' ),
			array( 'key' => 'field_about_hero_subtitle', 'label' => 'Hero subtitle', 'name' => 'about_hero_subtitle', 'type' => 'text' ),
			array( 'key' => 'field_about_hero_image', 'label' => 'Hero image', 'name' => 'about_hero_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

			array( 'key' => 'field_about_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_about_intro', 'label' => 'Intro (h3)', 'name' => 'about_intro', 'type' => 'textarea', 'rows' => 4, 'instructions' => 'HTML allowed (e.g. &lt;span class="orange"&gt;…&lt;/span&gt;).' ),

			array( 'key' => 'field_about_people_tab', 'label' => 'Our People', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_about_people_title', 'label' => 'Heading', 'name' => 'about_people_title', 'type' => 'text' ),
			array( 'key' => 'field_about_people_body', 'label' => 'Body', 'name' => 'about_people_body', 'type' => 'textarea', 'rows' => 3 ),
			array( 'key' => 'field_about_people_image', 'label' => 'Image', 'name' => 'about_people_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

			array( 'key' => 'field_about_facilities_tab', 'label' => 'Our Facilities', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_about_facilities_title', 'label' => 'Heading', 'name' => 'about_facilities_title', 'type' => 'text' ),
			array( 'key' => 'field_about_facilities_body', 'label' => 'Body', 'name' => 'about_facilities_body', 'type' => 'textarea', 'rows' => 4 ),

			array( 'key' => 'field_about_cta_tab', 'label' => 'CTA', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_about_cta_text', 'label' => 'CTA text', 'name' => 'about_cta_text', 'type' => 'text' ),
			array( 'key' => 'field_about_cta_label', 'label' => 'Button label', 'name' => 'about_cta_label', 'type' => 'text' ),
			array( 'key' => 'field_about_cta_url', 'label' => 'Button URL', 'name' => 'about_cta_url', 'type' => 'text' ),
		),
	)
);

/**
 * Contact.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_contact_content',
		'title'    => 'Contact — Content',
		'location' => array(
			array( array( 'param' => 'post_name', 'operator' => '==', 'value' => 'contact' ) ),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(
			// Page title + headings that used to be hardcoded in the template.
			array( 'key' => 'field_contact_page_title', 'label' => 'Page title', 'name' => 'contact_page_title', 'type' => 'text', 'instructions' => 'Default: “Contact”.' ),
			array( 'key' => 'field_contact_form_title', 'label' => 'Form heading', 'name' => 'contact_form_title', 'type' => 'text', 'instructions' => 'Default: “Contact Form”.' ),
			array( 'key' => 'field_contact_intro_tab', 'label' => 'Intro', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_contact_intro_title', 'label' => 'Intro heading', 'name' => 'contact_intro_title', 'type' => 'text' ),
			array( 'key' => 'field_contact_intro_body', 'label' => 'Intro body', 'name' => 'contact_intro_body', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'HTML allowed (e.g. links).' ),

			array( 'key' => 'field_contact_depts_tab', 'label' => 'Departments', 'type' => 'tab', 'placement' => 'top' ),
			array(
				'key'          => 'field_contact_departments',
				'label'        => 'Departments',
				'name'         => 'contact_departments',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add department',
				'sub_fields'   => array(
					array( 'key' => 'field_contact_dept_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
					array( 'key' => 'field_contact_dept_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text' ),
					array( 'key' => 'field_contact_dept_email', 'label' => 'Email', 'name' => 'email', 'type' => 'email' ),
				),
			),

			array( 'key' => 'field_contact_locations_tab', 'label' => 'Locations', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_contact_locations_title', 'label' => 'Heading', 'name' => 'contact_locations_title', 'type' => 'text' ),
			array(
				'key'          => 'field_contact_locations',
				'label'        => 'Locations',
				'name'         => 'contact_locations',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Add location',
				'sub_fields'   => array(
					array( 'key' => 'field_contact_loc_name', 'label' => 'Name', 'name' => 'name', 'type' => 'text' ),
					array( 'key' => 'field_contact_loc_address', 'label' => 'Address', 'name' => 'address', 'type' => 'text' ),
					array( 'key' => 'field_contact_loc_phone', 'label' => 'Phone', 'name' => 'phone', 'type' => 'text' ),
					array( 'key' => 'field_contact_loc_fax', 'label' => 'Fax', 'name' => 'fax', 'type' => 'text' ),
				),
			),
		),
	)
);
