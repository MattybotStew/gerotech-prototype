<?php
/**
 * Testimonials section.
 *
 * Ported from partials/testimonials-block.html. Quotes are static for v1;
 * they become a global ACF repeater in a later phase (see handoff/acf-spec.md).
 *
 * @package GerotechChild
 */

?>
<section class="testimonial-section" aria-label="<?php esc_attr_e( 'Customer testimonials', 'gerotech-child' ); ?>">
	<div class="container">
		<div class="section-header section-header--centered">
			<p class="eyebrow"><?php esc_html_e( 'What Customers Say', 'gerotech-child' ); ?></p>
			<h2 class="section-title"><?php esc_html_e( 'Trusted by', 'gerotech-child' ); ?> <span class="accent--deep">Michigan</span> <?php esc_html_e( 'Manufacturers', 'gerotech-child' ); ?></h2>
		</div>

		<ul class="testimonial-grid">
			<li class="testimonial-card">
				<p class="testimonial-card__quote">I have never had such consistent, quality customer support from a company and an overall great experience. Every contact has been timely, there has been good communication, friendly service, and each time they are happy to educate me along the way.</p>
				<p class="testimonial-card__name">Michael Rudisill</p>
				<p class="testimonial-card__sub">Gerotech Customer</p>
			</li>
			<li class="testimonial-card">
				<p class="testimonial-card__quote">I wanted to communicate my deepest appreciation for your partnership. I very much enjoyed working with you. It was great to team up to overcome hurdles and accomplish different goals.</p>
				<p class="testimonial-card__name">Ford Motor Company</p>
				<p class="testimonial-card__sub">Gerotech Customer</p>
			</li>
			<li class="testimonial-card">
				<p class="testimonial-card__quote">The quality of service that Gerotech provided us with. I had the privilege, in a rough situation, to work with Don on our machine issue. What a knowledgeable and diligent technician. He was able to work through our difficult situation with software to machine function issues and I wanted to make sure he was recognized for his great work. Thank you.</p>
				<p class="testimonial-card__name">Kingbury Professional Services</p>
				<p class="testimonial-card__sub">Gerotech Customer</p>
			</li>
		</ul>
	</div>
</section>
