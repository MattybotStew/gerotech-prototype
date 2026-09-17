<?php
/**
 * About page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live about design exactly: hero, "Since 1987" intro, Our People,
 * Our Facilities, and the Engage CTA.
 *
 * The parent theme's stylesheet is loaded scoped to `.legacy`
 * (assets/css/legacy.css) so it cannot leak into our new header/footer.
 * Header/footer are the child theme's (new design).
 *
 * @package GerotechChild
 */

get_header();

$legacy_img = GEROTECH_CHILD_URI . '/assets/images/legacy';
?>

<div class="legacy">

<section id="page_title"  style="display: none;">
		<div class="row clearfix">
			<h1>About</h1>
		</div>
    </section>

    <section id="head_image" class="about_page hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/h_about.jpg' ); ?>);">
		<div class="row clearfix">

			<div class="head_text">
				<h1>ABOUT GEROTECH</h1>
				<h2>Your source for advanced manufacturing solutions.</h2>
			</div>
		
		</div>
    </section>
	
    <section id="head_image_mobile" class="about_page hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_about_mobile.jpg' ); ?>);">
		<div class="row clearfix">

			<div class="head_text">
				<h1>ABOUT GEROTECH</h1>
				<h2>Your source for advanced manufacturing solutions.</h2>
			</div>
		
		</div>
    </section>

	<section id="main_content">
		<div class="row_970 centered clearfix">

			<h3>Since 1987, we have engineered and serviced CNC machines for a broad spectrum of manufacturers nationwide. We do it through people who listen, respond, build, deliver, and support as committed partners in order to <span class="orange">transform your manufacturing challenges into competitive advantages.</span></h3>
		
		</div>
	</section>
	
	<section>
		<div class="row_970 pt100 centered clearfix">

			<h3>Our People</h3>
			
			<h5>No matter your situation, our team of advanced process engineers, tooling engineers, CAD/CAM specialists, machine tool designers, and service engineers work to design the right CNC solution for you.</h5>

		</div>
	</section>
	
	<section>
		<div class="row centered clearfix">

			<img src="<?php echo esc_url( $legacy_img . '/about-people.jpg' ); ?>" alt="Our People" class="pt70 people_image" />
		
		</div>
	</section>

	

	<section>
		<div class="row_970 pt100 pb70 centered clearfix">
			
			<h3>Our Facilities</h3>
			
			<h5>We opened our Flat Rock Engineering Facility in 1995. At 30,000 square feet, it is designed with all the resources, space, machine handling equipment, tooling, test equipment, and flexibility to efficiently build, setup, test, and runoff your engineered system prior to installation on your floor. At our 6,000 square foot Grand Rapids Technical Showroom, we provide local facilities, resources, people, and services for customers in the West Michigan area.</h5>
		
		</div>
	</section>


		<section id="engage">
	
		<div class="row clearfix">
		
			<p><span>Put our engineers to work on your project</span></p>
			
			<a href="/contact/" class="btn_engage">Engage with us today</a>
		
		</div>

	</section>
</div><!-- /.legacy -->

<?php
get_footer();
