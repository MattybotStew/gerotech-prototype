<?php
/**
 * About page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live about design exactly: hero, "Since 1987" intro, Our People,
 * Our Facilities, and the Engage CTA.
 *
 * Visible content is ACF-driven (inc/acf-legacy-fields.php) with the current
 * design as defaults.
 *
 * The parent theme's stylesheet is loaded scoped to `.legacy`
 * (assets/css/legacy.css) so it cannot leak into our new header/footer.
 * Header/footer are the child theme's (new design).
 *
 * @package GerotechChild
 */

get_header();

$legacy_img = GEROTECH_CHILD_URI . '/assets/images/legacy';

$hero_title    = gerotech_field( 'about_hero_title', 'ABOUT GEROTECH' );
$hero_subtitle = gerotech_field( 'about_hero_subtitle', 'Your source for advanced manufacturing solutions.' );
$hero_image    = gerotech_image_url( gerotech_field( 'about_hero_image', 'assets/images/legacy/h_about.jpg' ) );

$intro = gerotech_field( 'about_intro', 'Since 1987, we have engineered and serviced CNC machines for a broad spectrum of manufacturers nationwide. We do it through people who listen, respond, build, deliver, and support as committed partners in order to <span class="orange">transform your manufacturing challenges into competitive advantages.</span>' );

$people_title = gerotech_field( 'about_people_title', 'Our People' );
$people_body  = gerotech_field( 'about_people_body', 'No matter your situation, our team of advanced process engineers, tooling engineers, CAD/CAM specialists, machine tool designers, and service engineers work to design the right CNC solution for you.' );
$people_image = gerotech_image_url( gerotech_field( 'about_people_image', 'assets/images/legacy/about-people.jpg' ) );

$facilities_title = gerotech_field( 'about_facilities_title', 'Our Facilities' );
$facilities_body  = gerotech_field( 'about_facilities_body', 'We opened our Flat Rock Engineering Facility in 1995. At 30,000 square feet, it is designed with all the resources, space, machine handling equipment, tooling, test equipment, and flexibility to efficiently build, setup, test, and runoff your engineered system prior to installation on your floor. At our 6,000 square foot Grand Rapids Technical Showroom, we provide local facilities, resources, people, and services for customers in the West Michigan area.' );

$cta_text  = gerotech_field( 'about_cta_text', 'Put our engineers to work on your project' );
$cta_label = gerotech_field( 'about_cta_label', 'Engage with us today' );
$cta_url   = gerotech_field( 'about_cta_url', gerotech_page_url( 'contact' ) );
?>

<div class="legacy">

<section id="page_title"  style="display: none;">
		<div class="row clearfix">
			<h1>About</h1>
		</div>
    </section>

    <section id="head_image" class="about_page hide_on_mobile" style="background-image: url(<?php echo esc_url( $hero_image ); ?>);">
		<div class="row clearfix">

			<div class="head_text">
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<h2><?php echo esc_html( $hero_subtitle ); ?></h2>
			</div>

		</div>
    </section>

    <section id="head_image_mobile" class="about_page hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_about_mobile.jpg' ); ?>);">
		<div class="row clearfix">

			<div class="head_text">
				<h1><?php echo esc_html( $hero_title ); ?></h1>
				<h2><?php echo esc_html( $hero_subtitle ); ?></h2>
			</div>

		</div>
    </section>

	<section id="main_content">
		<div class="row_970 centered clearfix">

			<h3><?php echo wp_kses_post( $intro ); ?></h3>

		</div>
	</section>

	<section>
		<div class="row_970 pt100 centered clearfix">

			<h3><?php echo esc_html( $people_title ); ?></h3>

			<h5><?php echo wp_kses_post( $people_body ); ?></h5>

		</div>
	</section>

	<section>
		<div class="row centered clearfix">

			<img src="<?php echo esc_url( $people_image ); ?>" alt="<?php echo esc_attr( $people_title ); ?>" class="pt70 people_image" />

		</div>
	</section>



	<section>
		<div class="row_970 pt100 pb70 centered clearfix">

			<h3><?php echo esc_html( $facilities_title ); ?></h3>

			<h5><?php echo wp_kses_post( $facilities_body ); ?></h5>

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
