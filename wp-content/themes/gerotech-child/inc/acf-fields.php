<?php
/**
 * ACF field groups (registered in PHP — version-controlled, not admin-UI).
 *
 * Phase 4: homepage first. Editors write plain text; wrap the accent phrase in
 * <em>…</em> and use line breaks for the design's forced breaks (see
 * gerotech_accent() in helpers.php).
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
 * Homepage content.
 */
acf_add_local_field_group(
	array(
		'key'      => 'group_home_content',
		'title'    => 'Homepage — Content',
		'location' => array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		),
		'position' => 'normal',
		'style'    => 'default',
		'fields'   => array(

			/* ── Hero slides ───────────────────────────────────── */
			array(
				'key'          => 'field_home_hero_tab',
				'label'        => 'Hero slides',
				'type'         => 'tab',
				'placement'    => 'top',
			),
			array(
				'key'          => 'field_home_hero_slides',
				'label'        => 'Slides',
				'name'         => 'home_hero_slides',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add slide',
				'sub_fields'   => array(
					array( 'key' => 'field_home_hero_eyebrow', 'label' => 'Eyebrow', 'name' => 'eyebrow', 'type' => 'text' ),
					array(
						'key'   => 'field_home_hero_headline',
						'label' => 'Headline',
						'name'  => 'headline',
						'type'  => 'textarea',
						'rows'  => 3,
						'instructions' => 'Use line breaks for the design breaks. Wrap the accent phrase in &lt;em&gt;…&lt;/em&gt;.',
					),
					array(
						'key'     => 'field_home_hero_accent',
						'label'   => 'Accent colour',
						'name'    => 'accent_class',
						'type'    => 'select',
						'choices' => array( 'accent' => 'Orange', 'accent--haas' => 'Haas red', 'accent--deep' => 'Deep orange' ),
						'default_value' => 'accent',
					),
					array( 'key' => 'field_home_hero_body', 'label' => 'Body', 'name' => 'body', 'type' => 'textarea', 'rows' => 2 ),
					array( 'key' => 'field_home_hero_cta_label', 'label' => 'Button label', 'name' => 'cta_label', 'type' => 'text' ),
					array( 'key' => 'field_home_hero_cta_url', 'label' => 'Button URL', 'name' => 'cta_url', 'type' => 'text' ),
					array( 'key' => 'field_home_hero_image', 'label' => 'Image', 'name' => 'image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
					array(
						'key'     => 'field_home_hero_image_position',
						'label'   => 'Image crop bias',
						'name'    => 'image_position',
						'type'    => 'select',
						'choices' => array( 'default' => 'Default', 'right' => 'Right' ),
						'default_value' => 'default',
					),
					array( 'key' => 'field_home_hero_peek_eyebrow', 'label' => 'Peek eyebrow', 'name' => 'peek_eyebrow', 'type' => 'text' ),
					array( 'key' => 'field_home_hero_peek_title', 'label' => 'Peek title', 'name' => 'peek_title', 'type' => 'text' ),
				),
			),

			/* ── Stats ─────────────────────────────────────────── */
			array( 'key' => 'field_home_stats_tab', 'label' => 'Stats', 'type' => 'tab', 'placement' => 'top' ),
			array(
				'key'          => 'field_home_stats',
				'label'        => 'Stats',
				'name'         => 'home_stats',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Add stat',
				'sub_fields'   => array(
					array( 'key' => 'field_home_stat_value', 'label' => 'Display value', 'name' => 'value', 'type' => 'text', 'instructions' => 'e.g. 39+ or 14,000' ),
					array( 'key' => 'field_home_stat_count', 'label' => 'Count-to', 'name' => 'count', 'type' => 'number', 'instructions' => 'Numeric target for the count-up (e.g. 39, 14000).' ),
					array( 'key' => 'field_home_stat_suffix', 'label' => 'Suffix', 'name' => 'suffix', 'type' => 'text', 'instructions' => 'e.g. +' ),
					array( 'key' => 'field_home_stat_label', 'label' => 'Label', 'name' => 'label', 'type' => 'text' ),
				),
			),

			/* ── Haas relationship ─────────────────────────────── */
			array( 'key' => 'field_home_haas_tab', 'label' => 'Haas Relationship', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_home_haas_eyebrow', 'label' => 'Eyebrow', 'name' => 'haas_eyebrow', 'type' => 'text' ),
			array(
				'key'   => 'field_home_haas_headline',
				'label' => 'Headline',
				'name'  => 'haas_headline',
				'type'  => 'textarea',
				'rows'  => 2,
				'instructions' => 'Line breaks + &lt;em&gt; accent supported.',
			),
			array( 'key' => 'field_home_haas_lede', 'label' => 'Lede', 'name' => 'haas_lede', 'type' => 'textarea', 'rows' => 5 ),
			array( 'key' => 'field_home_haas_brand_logo', 'label' => 'Brand logo (F1 lockup)', 'name' => 'haas_brand_logo', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

			/* ── Machine lineup ────────────────────────────────── */
			array( 'key' => 'field_home_lineup_tab', 'label' => 'Machine Lineup', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_home_lineup_eyebrow', 'label' => 'Eyebrow', 'name' => 'lineup_eyebrow', 'type' => 'text' ),
			array( 'key' => 'field_home_lineup_headline', 'label' => 'Headline', 'name' => 'lineup_headline', 'type' => 'textarea', 'rows' => 2 ),
			array(
				'key'          => 'field_home_lineup_panels',
				'label'        => 'Panels',
				'name'         => 'lineup_panels',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add panel',
				'sub_fields'   => array(
					array( 'key' => 'field_home_panel_tab_label', 'label' => 'Tab label', 'name' => 'tab_label', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_badge', 'label' => 'Badge', 'name' => 'badge', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_category', 'label' => 'Category (small label)', 'name' => 'category', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_title', 'label' => 'Title', 'name' => 'title', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_description', 'label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'rows' => 2 ),
					array( 'key' => 'field_home_panel_tags_label', 'label' => 'Tags label', 'name' => 'tags_label', 'type' => 'text', 'instructions' => 'e.g. Featured series' ),
					array(
						'key'          => 'field_home_panel_tags',
						'label'        => 'Tags',
						'name'         => 'tags',
						'type'         => 'textarea',
						'rows'         => 4,
						'instructions' => 'One per line: Label | https://url  (URL optional)',
					),
					array( 'key' => 'field_home_panel_cta_label', 'label' => 'Button label', 'name' => 'cta_label', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_cta_url', 'label' => 'Button URL', 'name' => 'cta_url', 'type' => 'text' ),
					array( 'key' => 'field_home_panel_cta2_label', 'label' => 'Second button label', 'name' => 'cta2_label', 'type' => 'text', 'instructions' => 'Optional (e.g. Winner\'s Circle).' ),
					array( 'key' => 'field_home_panel_cta2_url', 'label' => 'Second button URL', 'name' => 'cta2_url', 'type' => 'text' ),
					array(
						'key'     => 'field_home_panel_photo_style',
						'label'   => 'Photo style',
						'name'    => 'photo_style',
						'type'    => 'select',
						'choices' => array( 'default' => 'Photo', 'logo' => 'Logo on white' ),
						'default_value' => 'default',
					),
					array( 'key' => 'field_home_panel_photo', 'label' => 'Photo', 'name' => 'photo', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
				),
			),

			/* ── CTA band ──────────────────────────────────────── */
			array( 'key' => 'field_home_cta_tab', 'label' => 'CTA Band', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_home_cta_eyebrow', 'label' => 'Eyebrow', 'name' => 'cta_eyebrow', 'type' => 'text' ),
			array( 'key' => 'field_home_cta_headline', 'label' => 'Headline', 'name' => 'cta_headline', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_home_cta_body', 'label' => 'Body', 'name' => 'cta_body', 'type' => 'textarea', 'rows' => 2 ),
			array( 'key' => 'field_home_cta_button_label', 'label' => 'Button label', 'name' => 'cta_button_label', 'type' => 'text' ),
			array( 'key' => 'field_home_cta_button_url', 'label' => 'Button URL', 'name' => 'cta_button_url', 'type' => 'text' ),
			array( 'key' => 'field_home_cta_image', 'label' => 'Background image', 'name' => 'cta_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

			/* ── Email signup ──────────────────────────────────── */
			array( 'key' => 'field_home_signup_tab', 'label' => 'Mailing List', 'type' => 'tab', 'placement' => 'top' ),
			array( 'key' => 'field_home_signup_title', 'label' => 'Title', 'name' => 'signup_title', 'type' => 'textarea', 'rows' => 1, 'instructions' => '&lt;em&gt; accent supported.' ),
			array( 'key' => 'field_home_signup_sub', 'label' => 'Subtext', 'name' => 'signup_sub', 'type' => 'text' ),
		),
	)
);
