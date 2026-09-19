<?php
/**
 * Gerotech Child — theme bootstrap.
 *
 * Front-end build of the Gerotech prototype as a WordPress child theme.
 * No page builder: section markup is ported verbatim from the static prototype
 * and client-editable content is wired to ACF fields.
 *
 * @package GerotechChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GEROTECH_CHILD_VERSION', '1.0.0' );
define( 'GEROTECH_CHILD_DIR', get_stylesheet_directory() );
define( 'GEROTECH_CHILD_URI', get_stylesheet_directory_uri() );

require_once GEROTECH_CHILD_DIR . '/inc/helpers.php';
require_once GEROTECH_CHILD_DIR . '/inc/enqueue.php';
require_once GEROTECH_CHILD_DIR . '/inc/acf-fields.php';
require_once GEROTECH_CHILD_DIR . '/inc/acf-legacy-fields.php';

/**
 * Theme supports.
 */
function gerotech_child_setup() {
	load_child_theme_textdomain( 'gerotech-child', GEROTECH_CHILD_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	// Navigation is hardcoded in header.php for v1 (see implementation plan §7).
	// Menus are registered so they can be swapped to client-editable later.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'gerotech-child' ),
			'footer'  => __( 'Footer Navigation', 'gerotech-child' ),
		)
	);
}
add_action( 'after_setup_theme', 'gerotech_child_setup' );

/**
 * Excerpt / content helpers are intentionally absent — v1 templates are static.
 */
