<?php
/**
 * Service page template.
 *
 * Body content is ported from the dev site (gerotechdev) so the page matches
 * the live service design exactly, including the six tabbed CF7 forms. Each
 * rendered form was replaced with its CF7 shortcode so submissions work.
 *
 * Visible content is ACF-driven (inc/acf-legacy-fields.php) with the current
 * design as defaults. The inspection checklists and form internals stay
 * hardcoded.
 *
 * The parent theme's stylesheet is loaded scoped to `.legacy`
 * (assets/css/legacy.css) so it cannot leak into our new header/footer.
 * Header/footer are the child theme's (new design).
 *
 * @package GerotechChild
 */

get_header();

$intro_title = gerotech_field( 'service_intro_title', 'World Class Service and Support' );
$intro_body  = gerotech_field( 'service_intro_body', 'Gerotech has the best service technicians in the industry located right here in Michigan. We offer telephone support during business hours and 24/7 emergency service. From installation and training, to service and applications support—Gerotech is here to help.' );

$services = gerotech_field(
	'service_services',
	array(
		array( 'title' => 'Factory-trained Technicians', 'body' => 'Our service department is staffed with factory-trained and certified personnel. Every one of our technicians receives comprehensive training on a variety of topics, including new machine installation, electrical and mechanical repair, ball bar testing, and software upgrades.' ),
		array( 'title' => 'Telephone Support', 'body' => 'Gerotech always has telephone support personnel available during business hours to provide the information and assistance you need to maintain and service your equipment.' ),
		array( 'title' => 'After-Hours Service', 'body' => 'We are here to assist our customers 24/7. If you need after-hours support, call our service hotline at (248) 476-8787, then press 3 to leave a message for after-hours service. One of our factory-trained technicians will contact you within a half-hour.' ),
		array( 'title' => 'Immediate Parts Availability', 'body' => 'We stock replacement parts and maintenance items for every machine brand we represent. When it comes to replacement parts, we have you covered.' ),
		array( 'title' => 'Applications Support', 'body' => 'Gerotech has a fully staffed engineering and applications department and offers a wide variety of capabilities to our customers, including machine recommendations, time estimates, systems integration, project management, and focused onsite assistance with programming, tooling selection, process optimization, and/or runoff.' ),
	)
);

$assist_title = gerotech_field( 'service_assist_title', 'Need Assistance?' );
$assist_body  = gerotech_field( 'service_assist_body', 'Contact us for help with whatever issue or question you may have.' );

$tab_service_intro = gerotech_field( 'service_tab_service_intro', 'Please use the form below to submit a service request or call (248) 476-8787.' );
$tab_general_intro = gerotech_field( 'service_tab_general_intro', 'Use the form below to contact us, or call (248) 476-8787. Please complete as much information as possible.' );
$tab_parts_intro   = gerotech_field( 'service_tab_parts_intro', 'Use the form below to contact us, or call (734) 379-7788. Please complete as much information as possible.' );
$tab_rotary_title  = gerotech_field( 'service_tab_rotary_title', 'Request for Return Authorization' );
$tab_rotary_intro  = gerotech_field( 'service_tab_rotary_intro', 'Please complete as much information as possible. You will be contacted with a repair authorization number that must be attached to the indexer/rotary unit before it is shipped for repair.' );
$tab_plan_title    = gerotech_field( 'service_tab_plan_title', 'Platinum Total Care System' );
$tab_plan_intro    = gerotech_field( 'service_tab_plan_intro', 'We are pleased to offer Haas customers a comprehensive Planned Maintenance Program carried out by our Haas factory-certified service engineers. Protect your Haas investment and maximize your productivity by utilizing locally available Haas factory-certified professionals to keep your machine in the best possible condition. Essential items addressed at every planned inspection are listed below.' );
$tab_support_title = gerotech_field( 'service_tab_support_title', 'Applications Support' );
$tab_support_intro = gerotech_field( 'service_tab_support_intro', 'Our Applications Engineering Department is designed to provide both pre- and post-sale support to our customers. Pre-sale consists of machine recommendations, time estimates, and demonstrations. Post-sale support consists of programmer training, operator training, part programming, runoff, program optimization, and turnkey projects.' );

$cta_text  = gerotech_field( 'service_cta_text', 'Put our engineers to work on your project' );
$cta_label = gerotech_field( 'service_cta_label', 'Engage with us today' );
$cta_url   = gerotech_field( 'service_cta_url', gerotech_page_url( 'contact' ) );
?>

<div class="legacy">

<section id="page_title" style="display: none;">
		<div class="row clearfix">
			<h1>Service</h1>
		</div>
    </section>

	<section class="bkg_white service_content">
		<div class="row clearfix">

			<div class="centered pb30">
<h3><?php echo esc_html( $intro_title ); ?></h3>
<p><?php echo wp_kses_post( $intro_body ); ?></p>
</div>
<div class="clearfix">
<?php foreach ( $services as $service ) : ?>
<div class="fifth">
<h5 class="orange"><?php echo esc_html( $service['title'] ); ?></h5>
<p><?php echo wp_kses_post( $service['body'] ); ?></p>
</div>
<?php endforeach; ?>
<h3><?php echo esc_html( $assist_title ); ?></h3>
<p><?php echo wp_kses_post( $assist_body ); ?></p>
</div>

			<div class="clearfix">
				<a class="to to_active" data-tab="tf_service">Submit a Service Request</a><a class="to to_not_active" data-tab="tf_general">General Service Inquiry</a><a class="to to_not_active" data-tab="tf_parts">Parts Order</a><a class="to to_not_active" data-tab="tf_rotary">Rotary Repair</a><a class="to to_not_active" data-tab="tf_plan">Preventive Maintenance</a><a class="to to_not_active" data-tab="tf_support">Application Support</a>
			</div>

		</div>
	</section>

	<section class="bkg_white service_tabs">
		<div class="row_970 clearfix">

			<div class="service_tab" id="tf_service" class="clearfix" >

				<p><?php echo wp_kses_post( $tab_service_intro ); ?></p>


<?php echo do_shortcode( '[contact-form-7 id="317"]' ); ?>

			</div>

			<div class="service_tab" id="tf_general" class="clearfix" style="display: none;">

				<p><?php echo wp_kses_post( $tab_general_intro ); ?></p>


<?php echo do_shortcode( '[contact-form-7 id="500"]' ); ?>

			</div>

			<div class="service_tab" id="tf_parts" class="clearfix" style="display: none;">

				<p><?php echo wp_kses_post( $tab_parts_intro ); ?></p>


<?php echo do_shortcode( '[contact-form-7 id="322"]' ); ?>

			</div>

			<div class="service_tab" id="tf_rotary" class="clearfix" style="display: none;">

				<h3><?php echo esc_html( $tab_rotary_title ); ?></h3>
<p><?php echo wp_kses_post( $tab_rotary_intro ); ?></p>


<?php echo do_shortcode( '[contact-form-7 id="299"]' ); ?>

			</div>

			<div class="service_tab" id="tf_plan" class="clearfix" style="display: none;">

				<h3><?php echo esc_html( $tab_plan_title ); ?></h3>
<p><?php echo wp_kses_post( $tab_plan_intro ); ?></p>
<h3>Planned Maintenance Inspection Items</h3>
<p>Typical inspection items are noted below. Planned maintenance plans are available for all Haas machines. Additional service, repairs, and parts for repairs are scheduled with the HFO and are subject to standard service rates. <b>The Planned Maintenance Service provides a list of necessary repairs and possible parts needed for future maintenance.</b></p>
<div class="t_left">
<p><b>Electrical System</b><br />
Check incoming voltage<br />
DC buss voltage<br />
Logic voltages<br />
Condition of wires and connections<br />
Ensure fans are working<br />
Check regen resistors<br />
Check vector drive<br />
Check transformers<br />
Check cabinet filter<br />
Check motor connections and brushes*</p>
<p><b>Operator Panel</b><br />
Condition of keypad<br />
Function of keys, buttons, remote handle jog*<br />
Condition of floppy drive*<br />
Adjust CRT if needed<br />
Check door rollers, switches, rails<br />
Operation of chip auger/conveyor</p>
<p><b>Wipers/Seals/Windows/Bellows</b><br />
Check if in good working condition</p>
<p><b>Geometry</b><br />
Check level<br />
Check backlash in axis&#8217; with ballscrews<br />
Complete an alignment report</p>
<p><b>Pneumatic System</b><br />
Check filters*<br />
Check hoses and fittings<br />
Check for leaks<br />
Check pressure switch</p>
<p>* if applicable</p>
</div>
<div class="t_right">
<p><b>Way Lube System</b><br />
Inspect filters<br />
Inspect lines and fittings<br />
Check proper pump operation</p>
<p><b>Spindle/Transmission</b><br />
Check transmission oil<br />
Condition of belts<br />
Condition of air lube lines<br />
Condition of spindle taper or chuck</p>
<p><b>Hydraulic Power Unit*</b><br />
Check oil level and condition of oil<br />
Check for leak<br />
Check max pressure<br />
Check low pressure switch<br />
Check gauges<br />
Check that filter has been changed</p>
<p><b>Coolant</b><br />
Check condition of hoses<br />
Check for leaks<br />
Coolant pump and filters<br />
P-cool operation</p>
<p><b>Counterbalance*</b><br />
Check hoses and fill if necessary<br />
Check chains, rollers, and weight</p>
</div>
<div class="cl"></div>
<div class="hr"></div>
<h3>Optional Special Services</h3>
<div class="t_left">
<p><b>Through Spindle Coolant (mills) High Pressure Coolant (lathes)</b><br />
Check pre-charge pressure, hoses, pressure at pump, seal housing, and filters.</p>
<p><b>Pallet Changer or Parts Loader</b><br />
Check for wear on rollers, status of switches, alignment to machine, condition of bumpers, and remote operator panel.</p>
<p><b>Bar Feed (Haas brand only)</b><br />
Check alignment, switches, and repeatability.</p>
</div>
<div class="t_right">
<p><b>Vibration Analyzer Plot</b><br />
Verifies machine vibration against established criteria. Isolates potential problems while still manageable.</p>
<p><b>Ball Bar Plot</b><br />
Used as a diagnostic tool, the ball bar tests circularity and verifies the positioning accuracy and repeatability of your machine tool. Only available on mills at this time.</p>
<p><b>Probe Calibration</b><br />
By recalibrating your Visual Quick Code Probing System, you ensure the integrity of your measuring system.</p>
</div>
<div class="cl"></div>
<div class="hr"></div>
<h3>Request a Planned Maintenance Plan</h3>
<p>Please use the form below or call (248) 476-8787.</p>


<?php echo do_shortcode( '[contact-form-7 id="321"]' ); ?>

			</div>

			<div class="service_tab" id="tf_support" class="clearfix" style="display: none;">

				<h3><?php echo esc_html( $tab_support_title ); ?></h3>
<p><?php echo wp_kses_post( $tab_support_intro ); ?></p>
<p>Please use the form below to contact our applications engineering department.</p>


<?php echo do_shortcode( '[contact-form-7 id="300"]' ); ?>

			</div>

		</div>
	</section>

	<section id="locations" style="display: none;">
		<div class="row clearfix">

			<h2>Locations</h2>

			<div class="location_block">

				<div class="location_left">
					<div id="location_grand_rapids"></div>
					<div class="location_head">Grand Rapids, MI</div>
					<div class="location_address">2716 Courier Court NW, Grand Rapids, MI 49544</div>
					<div class="location_phone_fax">P: <span class="orange">616-735-1100</span> &nbsp; F: <span class="orange">616-735-0776</span></div>
				</div>

				<div class="location_right">
					<div id="location_flat_rock"></div>
					<div class="location_head">Flat Rock, MI</div>
					<div class="location_address">29220 Commerce Drive, Flat Rock, MI 48134</div>
					<div class="location_phone_fax">P: <span class="orange">734-379-7788</span> &nbsp; F: <span class="orange">734-379-2244</span></div>
				</div>

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
