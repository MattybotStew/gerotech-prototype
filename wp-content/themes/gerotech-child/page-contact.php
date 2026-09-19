<?php
/**
 * Contact page template.
 *
 * Body content is ported from the live/dev site so the page matches the
 * production contact design exactly: "Contact" title, intro band, the Contact
 * Form (CF7 60, swapped to its shortcode), department details, and Locations
 * with Google Maps.
 *
 * Visible content is ACF-driven (inc/acf-legacy-fields.php) with the current
 * design as defaults. The form and Google Maps wiring stay hardcoded.
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

$intro_title = gerotech_field( 'contact_intro_title', 'Let’s make manufacturing better. Together.' );
$intro_body  = gerotech_field( 'contact_intro_body', 'For service and parts, including emergency service, please call (734) 379-7788 or complete a <a href="/service/">service request form</a>. To learn how we can help improve your business with engineered solutions, please share your contact information below.' );

$departments = gerotech_field(
	'contact_departments',
	array(
		array( 'title' => 'Headquarters &amp; Sales', 'phone' => '734-379-7788', 'email' => 'sales@gerotech.com' ),
		array( 'title' => 'Engineering &amp; Automation', 'phone' => '734-379-7788', 'email' => 'sales@gerotech.com' ),
		array( 'title' => 'Service', 'phone' => '248-476-8787', 'email' => 'service@gerotech.com' ),
		array( 'title' => 'Parts', 'phone' => '734-379-7788', 'email' => 'parts@gerotech.com' ),
		array( 'title' => 'Tooling', 'phone' => '734-379-7788', 'email' => 'sales@gerotech.com' ),
		array( 'title' => 'Grand Rapids Office', 'phone' => '616-735-1100', 'email' => 'sales@gerotech.com' ),
	)
);

$locations_title = gerotech_field( 'contact_locations_title', 'Locations' );
$locations       = gerotech_field(
	'contact_locations',
	array(
		array( 'name' => 'Flat Rock, MI', 'address' => '29220 Commerce Drive, Flat Rock, MI 48134', 'phone' => '734-379-7788', 'fax' => '734-379-2244' ),
		array( 'name' => 'Grand Rapids, MI', 'address' => '2716 Courier Court NW, Grand Rapids, MI 49544', 'phone' => '616-735-1100', 'fax' => '616-735-0776' ),
	)
);
?>

<div class="legacy">

<section id="page_title">
		<div class="row clearfix">
			<h1>Contact</h1>
		</div>
    </section>

	<section class="bkg_grey_shapes">

		<div class="row_970">

			<h3><?php echo esc_html( $intro_title ); ?></h3>
<p><?php echo wp_kses_post( $intro_body ); ?></p>

		</div>

	</section>

    <section class="bkg_white">
		<div class="row clearfix contact_form">

			<div class="contact_left">

				<h5>Contact Form</h5>


<?php echo do_shortcode( '[contact-form-7 id="60"]' ); ?>

			</div>

			<div class="contact_right">

				<?php foreach ( $departments as $dept ) : ?>
					<h5><?php echo wp_kses_post( $dept['title'] ); ?></h5>
<p><?php echo esc_html( $dept['phone'] ); ?><br />
<a href="mailto:<?php echo esc_attr( $dept['email'] ); ?>"><?php echo esc_html( $dept['email'] ); ?></a></p>
				<?php endforeach; ?>

			</div>

		</div>
    </section>

	<section id="locations">
		<div class="row clearfix centered">

			<h2><?php echo esc_html( $locations_title ); ?></h2>

			<div class="location_block">

				<?php foreach ( $locations as $i => $loc ) : ?>
					<div class="<?php echo 0 === $i % 2 ? 'location_left' : 'location_right'; ?>">
						<div id="location_<?php echo 0 === $i % 2 ? 'flat_rock' : 'grand_rapids'; ?>"></div>
						<div class="location_head"><?php echo esc_html( $loc['name'] ); ?></div>
						<div class="location_address"><?php echo esc_html( $loc['address'] ); ?></div>
						<div class="location_phone_fax">P: <span class="orange"><?php echo esc_html( $loc['phone'] ); ?></span> &nbsp; F: <span class="orange"><?php echo esc_html( $loc['fax'] ); ?></span></div>
					</div>
				<?php endforeach; ?>

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
