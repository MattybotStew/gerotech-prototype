<?php
/**
 * Training page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live training design exactly (hero, 8 course cards, custom-training
 * block, Locations with Google Maps, Engage CTA). Links to dev are made
 * root-relative; hero images are bundled in assets/images/legacy/.
 *
 * Visible content is ACF-driven (inc/acf-legacy-fields.php) with the current
 * design as defaults. Google Maps wiring stays hardcoded.
 *
 * The parent theme's stylesheet is loaded scoped to `.legacy`
 * (assets/css/legacy.css) so it cannot leak into our new header/footer.
 * Header/footer are the child theme's (new design).
 *
 * NOTE: the Google Maps API key is the dev key, overridable via the
 * `gerotech_google_maps_key` filter — replace before production.
 *
 * @package GerotechChild
 */

get_header();

// Page title was hardcoded here.
$page_title = gerotech_field( 'training_page_title', 'Training' );

$legacy_img = GEROTECH_CHILD_URI . '/assets/images/legacy';

$hero_title    = gerotech_field( 'training_hero_title', 'TRAINING' );
$hero_subtitle = gerotech_field( 'training_hero_subtitle', 'Sharpen your skills.' );

$intro_label = gerotech_field( 'training_intro_label', 'View all upcoming training sessions' );
$intro_url   = gerotech_field( 'training_intro_url', '/scheduled-training/' );

$courses_title = gerotech_field( 'training_courses_title', 'Training Opportunities' );
$courses       = gerotech_field(
	'training_courses',
	array(
		array( 'title' => 'Haas Lathe 101', 'url' => '/training/lathe-operator/', 'body' => 'This one day course covers power-up, keyboard layout - modes & displays, tooling - loading & lengths and offsets. Also includes work offsets, mid-program start, overrides, alarms, and power down. This class is developed around the new NGC control implemented around 2012.  Attendees for non-NGC controls are welcome but will find many new features and navigation of the NGC do not apply to the CHC control.' ),
		array( 'title' => 'VPS Lathe Programming', 'url' => '/training/vps-lathe-programming/', 'body' => 'This one day course will cover the use of the Tool Setting Probe to find tool geometry. Along with the use of the probe, students will learn the use of the all machining functions that are part of the VPS. Each student will have the opportunity to use the Tool Probe for setting tool geometry. This class is only for Lathes purchased since February 2016 that have Next Generation Control.' ),
		array( 'title' => 'Lathe-Intro to G&#038;M Code Programming', 'url' => '/training/lathe-intro-to-gm-code-programming/', 'body' => 'This one day course covers the most commonly used G&amp;M codes for Lathe part programming. This is a prerequisite for Lathe programming class. This class is only for Lathes purchased since February 2016 that have Next Generation Control.' ),
		array( 'title' => 'Lathe Programming', 'url' => '/training/lathe-programming/', 'body' => 'This one day course covers program structure, including tool setup, part setup, along with subprograms and sub routines. Must have completed the Intro to Lathe G&amp;M code class. This class is only for Lathes purchased since February 2016 that have Next Generation Control.' ),
		array( 'title' => 'Haas Mill 101', 'url' => '/training/mill-operator/', 'body' => 'This one day course covers power-up, keyboard layout - modes and displays, tooling - loading &amp; lengths and offsets. Also includes work offsets, mid-program start, overrides, alarms, and power down.' ),
		array( 'title' => 'VPS Mill Programming', 'url' => '/training/vps-mill-programming/', 'body' => 'This is a one day course will cover the use of the Table Probe to set tools and the Spindle Probe to find work offsets on a part. Along with the use of the probe, students will learn the use of the all machining functions that are part of the VPS. Each student will have the opportunity to use both the Table Probe for setting different tools and the Spindle Probe to find offsets on different types of work geometry.' ),
		array( 'title' => 'Mill-Intro to G&#038;M Code Programming', 'url' => '/training/advanced-mill-programming/', 'body' => 'This one day course covers the most commonly used G&amp;M codes for Mill part programming. This is a prerequisite for Mill programming class.' ),
		array( 'title' => 'Mill Programming', 'url' => '/training/basic-mill-programming/', 'body' => 'This one day course covers program structure, including tool setup, part setup, along with subprograms and sub routines. Must have completed the Intro to Mill G&amp;M code class.' ),
	)
);

$sessions_title = gerotech_field( 'training_sessions_title', 'Upcoming Training Sessions' );
$sessions_label = gerotech_field( 'training_sessions_label', 'VIEW ALL UPCOMING CLASSROOM TRAINING SESSIONS' );
$sessions_url   = gerotech_field( 'training_sessions_url', '/scheduled-training/' );

$custom_body = gerotech_field(
	'training_custom_body',
	'<p><span style="font-family: helvetica, arial, sans-serif;font-size: 36pt">Custom Training </span></p>
<p style="text-align: left"><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt"><strong data-start="172" data-end="216">Custom Training – Tailored to Your Needs</strong></span><br data-start="216" data-end="219" /><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt">In addition to our regularly scheduled Haas Basic 101 and programming classes, we offer on-site <a href="/training/custom-classes/">custom training</a> at your facility. Our expert instructors can cover advanced topics such as, Multi-Axis Machining, </span><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt">Live Tooling, Sub-Spindle Operations, Custom Macros &amp; Programming Routines, Process Development, and more. Each training session is designed to meet your specific goals, skill levels, and production requirements.</span></p>
<p>&nbsp;</p>'
);

$locations_title = gerotech_field( 'training_locations_title', 'Locations' );
$locations       = gerotech_field(
	'training_locations',
	array(
		array( 'name' => 'Flat Rock, MI', 'address' => '29220 Commerce Drive, Flat Rock, MI 48134', 'phone' => '734-379-7788', 'fax' => '734-379-2244' ),
		array( 'name' => 'Grand Rapids, MI', 'address' => '2716 Courier Court NW, Grand Rapids, MI 49544', 'phone' => '616-735-1100', 'fax' => '616-735-0776' ),
	)
);

$cta_text  = gerotech_field( 'training_cta_text', 'Put our engineers to work on your project' );
$cta_label = gerotech_field( 'training_cta_label', 'Engage with us today' );
$cta_url   = gerotech_field( 'training_cta_url', gerotech_page_url( 'contact' ) );
?>

<div class="legacy">

<section id="page_title" style="display: none;">
		<div class="row clearfix">
			<h1><?php echo esc_html( $page_title ); ?></h1>
		</div>
    </section>

    <section id="head_image" class="video_t hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/h_training.jpg' ); ?>);">
		<div class="row clearfix">
			<div class="head_text">
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<h2><?php echo esc_html( $hero_subtitle ); ?></h2>
			</div>

		</div>
    </section>

    <section id="head_image_mobile" class="video_t hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_training_mobile.jpg' ); ?>);">

		<div class="row clearfix">

			<div class="head_text">
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<h2><?php echo esc_html( $hero_subtitle ); ?></h2>
			</div>

		</div>
    </section>

    <section class="bkg_grey_shapes">
		<div class="row_970 clearfix centered">


			<p><a href="<?php echo esc_url( $intro_url ); ?>" class="btn_orange_outline training_page"><?php echo esc_html( $intro_label ); ?></a></p>

		</div>
    </section>

    <section class="bkg_white">
		<div class="row clearfix">

			<h2 class="centered"><?php echo esc_html( $courses_title ); ?></h2>

			<?php foreach ( $courses as $course ) : ?>
				<div class="quad">

					<h5 class="orange"><a href="<?php echo esc_url( $course['url'] ); ?>"><?php echo wp_kses_post( $course['title'] ); ?></a></h5>
					<p><?php echo wp_kses_post( $course['body'] ); ?></p>
					<a href="<?php echo esc_url( $course['url'] ); ?>" class="learn_more">LEARN MORE</a>

				</div>
			<?php endforeach; ?>

		</div>
    </section>

    <section class="bkg_grey_shapes">
		<div class="row_970 clearfix">

			<h2 class="centered"><?php echo esc_html( $sessions_title ); ?></h2>


			<div class="cl"></div>

			<p class="centered"><a href="<?php echo esc_url( $sessions_url ); ?>" class="learn_more"><?php echo esc_html( $sessions_label ); ?></a></p>

		</div>
    </section>

    <section class="bkg_white">
		<div class="row_970 clearfix centered">

			<?php echo wp_kses_post( $custom_body ); ?>

		</div>
    </section>

	<section id="locations">
		<div class="row clearfix centered">

			<h2><?php echo esc_html( $locations_title ); ?></h2>

			<div class="location_block">

				<?php foreach ( $locations as $i => $loc ) : ?>
					<div class="<?php echo 0 === $i % 2 ? 'location_left' : 'location_right'; ?>">
						<iframe
							id="location_<?php echo 0 === $i % 2 ? 'flat_rock' : 'grand_rapids'; ?>"
							class="location_map"
							src="https://www.google.com/maps?q=<?php echo rawurlencode( $loc['address'] ); ?>&amp;output=embed"
							style="border:0;display:block;"
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"
							title="<?php echo esc_attr( $loc['name'] . ' map' ); ?>"
						></iframe>
						<div class="location_head"><?php echo esc_html( $loc['name'] ); ?></div>
						<div class="location_address"><?php echo esc_html( $loc['address'] ); ?></div>
						<div class="location_phone_fax">P: <span class="orange"><?php echo esc_html( $loc['phone'] ); ?></span> &nbsp; F: <span class="orange"><?php echo esc_html( $loc['fax'] ); ?></span></div>
					</div>
				<?php endforeach; ?>

			</div>

		</div>
	</section>




		<section id="engage">

		<div class="row clearfix">

			<p><span><?php echo esc_html( $cta_text ); ?></span></p>

			<a href="<?php echo esc_url( $cta_url ); ?>" class="btn_engage"><?php echo esc_html( $cta_label ); ?></a>

		</div>

	</section>
</div><!-- /.legacy -->

<?php
get_footer();
