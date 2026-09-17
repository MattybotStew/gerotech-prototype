<?php
/**
 * Rotary Repair page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live rotary-repair design exactly: hero, intro, the Rotary Repair form
 * (CF7 299, swapped to its shortcode), and the Engage CTA.
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
			<h1>Rotary Repair</h1>
		</div>
    </section>
	
    <section id="head_image" class="service hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/rotary-hero.jpg' ); ?>);">

		<div class="row clearfix">
		
			<div class="head_text">
				<h1>ROTARY REPAIR</h1>
				<h2>Gerotech offers world class repair of your HAAS rotary table.</h2>
			</div>
		
		</div>
		
    </section>
	
    <section id="head_image_mobile" class="service hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/rotary-hero.jpg' ); ?>);">

		<div class="row clearfix">
		
			<div class="head_text">
				<h1>ROTARY REPAIR</h1>
				<h2>We are here to help.</h2>
			</div>
		
		</div>
		
    </section>
	
	
	
	<section class="bkg_white service_content">
		<div class="row clearfix">
		
			<p>Gerotech provides Haas certified rotary and indexer repair capabilities.  With more than 15 years of experience, our experts will provide comprehensive and quality service for all of your rotary maintenance needs.  Fill out the form below to contact the repair experts at Gerotech.</p>

		
		</div>
	</section>
	



	<section class="bkg_white service_tabs">
		<div class="row_970 clearfix">
			<div class="service_tab" id="tf_rotary" class="clearfix">
				<h3>Request for Return Authorization</h3>
<p>Please complete as much information as possible. You will be contacted with a repair authorization number that must be attached to the indexer/rotary unit before it is shipped for repair.</p>
				
<?php echo do_shortcode( '[contact-form-7 id="299"]' ); ?>
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
