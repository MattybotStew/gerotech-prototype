<?php
/**
 * Planned Maintenance page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live planned-maintenance design exactly: hero, intro, the Planned
 * Maintenance form (CF7 321, swapped to its shortcode), and the Engage CTA.
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

<section id="page_title" style="display: none;">
		<div class="row clearfix">
			<h1>Planned Maintenance</h1>
		</div>
    </section>
	
    <section id="head_image" class="service hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/h_service.jpg' ); ?>);">

		<div class="row clearfix">
		
			<div class="head_text">
				<h1>PLANNED MAINTENANCE</h1>
				<h2>We are here to help.</h2>
			</div>
		
		</div>
		
    </section>
	
    <section id="head_image_mobile" class="service hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_service_mobile.jpg' ); ?>);">

		<div class="row clearfix">
		
			<div class="head_text">
				<h1>PREVENTIVE MAINTENEANCE</h1>
				<h2>We are here to help.</h2>
			</div>
		
		</div>
		
    </section>
	
	
	
	<section class="bkg_white service_content">
		<div class="row clearfix">
		
			<p><strong>PLANNED MAINTENANCE:</strong><br />
Gerotech is pleased to offer a comprehensive PM program that includes ball bar and vibration analysis to ensure your machine continues to produce precision parts with predictable uptime.</p>
<p>All systems are checked, and any conditions found are detailed, giving you a complete picture of your machine&#8217;s state of well- being. The process can take 1-2 days, depending upon the machine complexity.</p>
<p>Additional service, repairs, and parts for repairs are scheduled with Gerotech and are subject to standard service rates. The PM service provides a list of repairs and possible parts needed for future maintenance.</p>
<p>Contact <a href="mailto:service@gerotech.com">service@gerotech.com</a> to schedule your appointment today!</p>
			
			<div id="dowload_button">
				<a href="/wp-content/uploads/2021/07/Gerotech-Planned-Maintenance-Flyer_FINAL.pdf" >PM FLYER</a>
			</div>
			<br><br>
		</div>
	</section>
	



	<section class="bkg_white service_tabs">
		<div class="row_970 clearfix">
			<div class="service_tab" id="tf_plan" class="clearfix" style="display: block;">

				
				
<?php echo do_shortcode( '[contact-form-7 id="321"]' ); ?>
			
			</div>
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
