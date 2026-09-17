<?php
/**
 * Support page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live support design exactly. The parent theme's stylesheet is loaded
 * scoped to `.legacy` (assets/css/legacy.css) so it cannot leak into our new
 * header/footer.
 *
 * Header/footer are the child theme's (new design).
 *
 * @package GerotechChild
 */

get_header();

$legacy_img = GEROTECH_CHILD_URI . '/assets/images/legacy';
?>

<div class="legacy">

	<section id="head_image" class="service hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/h_service.jpg' ); ?>);">
		<div class="row clearfix">
			<div class="head_text">
				<h1>SERVICE</h1>
				<h2>We are here to help.</h2>
			</div>
		</div>
	</section>

	<section id="head_image_mobile" class="service hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_service_mobile.jpg' ); ?>);">
		<div class="row clearfix">
			<div class="head_text">
				<h1>SERVICE</h1>
				<h2>We are here to help.</h2>
			</div>
		</div>
	</section>

	<section class="bkg_grey_shapes">
		<div class="row_970 clearfix centered">
			<h3>Gerotech has the best service technicians in the industry located right here in Michigan. We offer telephone support during business hours and 24/7 emergency service. From installation and training, to service and applications support&mdash;Gerotech is here to help.</h3>
		</div>
	</section>

	<section class="bkg_white service_content">
		<div class="row clearfix">

			<div class="centered pb30">
				<h3>World Class Service and Support</h3>
				<p>Gerotech has service technicians strategically located throughout Michigan, allowing us to respond quickly to our customers.</p>
			</div>

			<div class="clearfix">
				<div class="fifth">
					<h5 class="orange">Factory-trained Technicians</h5>
					<p>Our service department is staffed with factory-trained and certified personnel. Every one of our technicians receives comprehensive training on a variety of topics, including new machine installation, electrical and mechanical repair, ball bar testing, and software upgrades.</p>
				</div>
				<div class="fifth">
					<h5 class="orange">Telephone Support</h5>
					<p>Gerotech always has telephone support personnel available during business hours to provide the information and assistance you need to maintain and service your equipment.</p>
				</div>
				<div class="fifth">
					<h5 class="orange">After-Hours Service</h5>
					<p>We are here to assist our customers 24/7. If you need after-hours support, call our service hotline at (248) 476-8787, then press 3 to leave a message for after-hours service. One of our factory-trained technicians will contact you within a half-hour.</p>
				</div>
				<div class="fifth">
					<h5 class="orange">Immediate Parts Availability</h5>
					<p>We stock replacement parts and maintenance items for every machine brand we represent. When it comes to replacement parts, we have you covered.</p>
				</div>
				<div class="fifth">
					<h5 class="orange">Applications Support</h5>
					<p>Gerotech has a fully staffed engineering and applications department and offers a wide variety of capabilities to our customers, including machine recommendations, time estimates, systems integration, project management, and focused onsite assistance with programming, tooling selection, process optimization, and/or runoff.</p>
				</div>
			</div>

			<h3>Need Assistance?</h3>
			<p>Contact us for help with whatever issue or question you may have.</p>

		</div>
	</section>

	<section id="engage">
		<div class="row clearfix">
			<p><span>Put our engineers to work on your project</span></p>
			<a href="<?php echo esc_url( gerotech_page_url( 'contact' ) ); ?>" class="btn_engage">Engage with us today</a>
		</div>
	</section>

</div>

<?php
get_footer();
