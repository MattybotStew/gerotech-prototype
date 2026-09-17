<?php
/**
 * Contact page template.
 *
 * Body content is ported from the live/dev site so the page matches the
 * production contact design exactly: "Contact" title, intro band, the Contact
 * Form (CF7 60, swapped to its shortcode), department details, and Locations
 * with Google Maps.
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
?>

<div class="legacy">

<section id="page_title">
		<div class="row clearfix">
			<h1>Contact</h1>
		</div>
    </section>

	<section class="bkg_grey_shapes">
	
		<div class="row_970">
	
			<h3>Let’s make manufacturing better. Together.</h3>
<p>For service and parts, including emergency service, please call (734) 379-7788 or complete a <a href="/service/">service request form</a>. To learn how we can help improve your business with engineered solutions, please share your contact information below.</p>
	
		</div>
	
	</section>

    <section class="bkg_white">
		<div class="row clearfix contact_form">
		
			<div class="contact_left">
			
				<h5>Contact Form</h5>
				
				
<?php echo do_shortcode( '[contact-form-7 id="60"]' ); ?>
				
			</div>
			
			<div class="contact_right">
			
				<h5>Headquarters &amp; Sales</h5>
<p>734-379-7788<br />
<a href="mailto:sales@gerotech.com">sales@gerotech.com</a></p>
<h5></h5>
<h5>Engineering &amp; Automation</h5>
<p>734-379-7788<br />
<a href="mailto:sales@gerotech.com">sales@gerotech.com</a></p>
<h5>Service</h5>
<p>248-476-8787<br />
<a href="mailto:service@gerotech.com">service@gerotech.com</a></p>
<h5>Parts</h5>
<p>734-379-7788<br />
<a href="mailto:parts@gerotech.com">parts@gerotech.com</a></p>
<h5>Tooling</h5>
<p>734-379-7788<br />
<a href="mailto:sales@gerotech.com">sales@gerotech.com</a></p>
<h5>Grand Rapids Office</h5>
<p>616-735-1100<br />
<a href="mailto:sales@gerotech.com">sales@gerotech.com</a></p>
				
			</div>
		
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
</div><!-- /.legacy -->

<?php
get_footer();
