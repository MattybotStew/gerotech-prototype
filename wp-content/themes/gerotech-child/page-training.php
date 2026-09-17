<?php
/**
 * Training page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live training design exactly (hero, 8 course cards, custom-training
 * block, Locations with Google Maps, Engage CTA). Links to dev are made
 * root-relative; hero images are bundled in assets/images/legacy/.
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

$legacy_img = GEROTECH_CHILD_URI . '/assets/images/legacy';
?>

<div class="legacy">

<section id="page_title" style="display: none;">
		<div class="row clearfix">
			<h1>Training</h1>
		</div>
    </section>
	
    <section id="head_image" class="video_t hide_on_mobile" style="background-image: url(<?php echo esc_url( $legacy_img . '/h_training.jpg' ); ?>);">
		<div class="row clearfix">
			<div class="head_text">
				<h1>TRAINING</h1>
				<h2>Sharpen your skills.</h2>
			</div>
		
		</div>
    </section>
	
    <section id="head_image_mobile" class="video_t hide_on_desktop" style="background-image: url(<?php echo esc_url( $legacy_img . '/bkg_training_mobile.jpg' ); ?>);">
	
		<div class="row clearfix">

			<div class="head_text">
				<h1>TRAINING</h1>
				<h2>Sharpen your skills.</h2>
			</div>
		
		</div>
    </section>
	
    <section class="bkg_grey_shapes">
		<div class="row_970 clearfix centered">
		
						
			<p><a href="/scheduled-training/" class="btn_orange_outline training_page">View all upcoming training sessions</a></p>

		</div>
    </section>
	
    <section class="bkg_white">
		<div class="row clearfix">

			<h2 class="centered">Training Opportunities</h2>
		
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/lathe-operator/">Haas Lathe 101</a></h5>
					<p>This one day course covers power-up, keyboard layout - modes &amp; displays, tooling - loading &amp; lengths and offsets. Also includes work offsets, mid-program start, overrides, alarms, and power down. This class is developed around the new NGC control implemented around 2012.  Attendees for non-NGC controls are welcome but will find many new features and navigation of the NGC do not apply to the CHC control.</p>
					<a href="/training/lathe-operator/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/vps-lathe-programming/">VPS Lathe Programming</a></h5>
					<p>This one day course will cover the use of the Tool Setting Probe to find tool geometry. Along with the use of the probe, students will learn the use of the all machining functions that are part of the VPS. Each student will have the opportunity to use the Tool Probe for setting tool geometry. This class is only for Lathes purchased since February 2016 that have Next Generation Control.</p>
					<a href="/training/vps-lathe-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/lathe-intro-to-gm-code-programming/">Lathe-Intro to G&#038;M Code Programming</a></h5>
					<p>This one day course covers the most commonly used G&amp;M codes for Lathe part programming. This is a prerequisite for Lathe programming class. This class is only for Lathes purchased since February 2016 that have Next Generation Control.</p>
					<a href="/training/lathe-intro-to-gm-code-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/lathe-programming/">Lathe Programming</a></h5>
					<p>This one day course covers program structure, including tool setup, part setup, along with subprograms and sub routines. Must have completed the Intro to Lathe G&amp;M code class. This class is only for Lathes purchased since February 2016 that have Next Generation Control.</p>
					<a href="/training/lathe-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/mill-operator/">Haas Mill 101</a></h5>
					<p>This one day course covers power-up, keyboard layout - modes and displays, tooling - loading &amp; lengths and offsets. Also includes work offsets, mid-program start, overrides, alarms, and power down.</p>
					<a href="/training/mill-operator/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/vps-mill-programming/">VPS Mill Programming</a></h5>
					<p>This is a one day course will cover the use of the Table Probe to set tools and the Spindle Probe to find work offsets on a part. Along with the use of the probe, students will learn the use of the all machining functions that are part of the VPS. Each student will have the opportunity to use both the Table Probe for setting different tools and the Spindle Probe to find offsets on different types of work geometry.</p>
					<a href="/training/vps-mill-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/advanced-mill-programming/">Mill-Intro to G&#038;M Code Programming</a></h5>
					<p>This one day course covers the most commonly used G&amp;M codes for Mill part programming. This is a prerequisite for Mill programming class.</p>
					<a href="/training/advanced-mill-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
							
				<div class="quad">
				
					<h5 class="orange"><a href="/training/basic-mill-programming/">Mill Programming</a></h5>
					<p>This one day course covers program structure, including tool setup, part setup, along with subprograms and sub routines. Must have completed the Intro to Mill G&amp;M code class.</p>
					<a href="/training/basic-mill-programming/" class="learn_more">LEARN MORE</a>
				
				</div>
				
					
		</div>
    </section>
	
    <section class="bkg_grey_shapes">
		<div class="row_970 clearfix">
		
			<h2 class="centered">Upcoming Training Sessions</h2>
			
						
			<div class="cl"></div>
			
			<p class="centered"><a href="/scheduled-training/" class="learn_more">VIEW ALL UPCOMING CLASSROOM TRAINING SESSIONS</a></p>

		</div>
    </section>
	
    <section class="bkg_white">
		<div class="row_970 clearfix centered">

			<p><span style="font-family: helvetica, arial, sans-serif;font-size: 36pt">Custom Training </span></p>
<p style="text-align: left"><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt"><strong data-start="172" data-end="216">Custom Training – Tailored to Your Needs</strong></span><br data-start="216" data-end="219" /><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt">In addition to our regularly scheduled Haas Basic 101 and programming classes, we offer on-site <a href="/training/custom-classes/">custom training</a> at your facility. Our expert instructors can cover advanced topics such as, Multi-Axis Machining, </span><span style="font-family: helvetica, arial, sans-serif;font-size: 14pt">Live Tooling, Sub-Spindle Operations, Custom Macros &amp; Programming Routines, Process Development, and more. Each training session is designed to meet your specific goals, skill levels, and production requirements.</span></p>
<p>&nbsp;</p>
		
		</div>
    </section>
	
	<section id="locations">
		<div class="row clearfix centered">
		
			<h2>Locations</h2>
			
			<div class="location_block">
			
				<div class="location_left">
					<div id="location_flat_rock"></div>
					<div class="location_head">Flat Rock, MI</div>
					<div class="location_address">29220 Commerce Drive, Flat Rock, MI 48134</div>
					<div class="location_phone_fax">P: <span class="orange">734-379-7788</span> &nbsp; F: <span class="orange">734-379-2244</span></div>
				</div>

				<div class="location_right">
					<div id="location_grand_rapids"></div>
					<div class="location_head">Grand Rapids, MI</div>
					<div class="location_address">2716 Courier Court NW, Grand Rapids, MI 49544</div>
					<div class="location_phone_fax">P: <span class="orange">616-735-1100</span> &nbsp; F: <span class="orange">616-735-0776</span></div>
				</div>
			
			</div>
		
		</div>
	</section>
	
	<script>

      function initMap() {
		  
        var flat_rock = {lat: 42.0933039, lng: -83.2480333};
        var map = new google.maps.Map(document.getElementById('location_flat_rock'), {
          zoom: 16,
          center: flat_rock
        });
        var marker = new google.maps.Marker({
          position: flat_rock,
          map: map
        });
		
        var grand_rapids = {lat: 43.014185, lng: -85.7591209};
        var map2 = new google.maps.Map(document.getElementById('location_grand_rapids'), {
          zoom: 15,
          center: grand_rapids
        });
        var marker = new google.maps.Marker({
          position: grand_rapids,
          map: map2
        });
		
      }

    </script>
	
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr( apply_filters( 'gerotech_google_maps_key', 'AIzaSyCkwtPM8ZrwMbcJ0cSz2J-4IDbMLnUZU8Q' ) ); ?>&callback=initMap">
    </script>
	
	


		<section id="engage">
	
		<div class="row clearfix">
		
			<p><span>Put our engineers to work on your project</span></p>
			
			<a href="/contact/" class="btn_engage">Engage with us today</a>
		
		</div>

	</section>
</div><!-- /.legacy -->

<?php
get_footer();
