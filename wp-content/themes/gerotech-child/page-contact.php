<?php
/**
 * Contact page template.
 *
 * No static prototype page exists for Contact — built from the dev site's real
 * contact content (heading, contact groups, locations) using the project design
 * system. Form is static for v1; wire to CF7/WPForms in a later phase.
 *
 * @package GerotechChild
 */

get_header();
?>

<main id="main">

	<!-- ============================================================
		 Contact Hero
		 ============================================================ -->
	<section class="page-hero" aria-labelledby="contact-hero-headline">
		<img class="slide__bg slide__bg--right" src="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?q=80&w=1920&auto=format&fit=crop" alt="Gerotech facility" loading="eager" fetchpriority="high" decoding="async" /><!-- Stand-in: Unsplash — awaiting client photo -->
		<div class="slide__overlay slide__overlay--left" aria-hidden="true"></div>
		<div class="slide__content slide__content--left">
			<nav class="page-hero__breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'gerotech-child' ); ?>">
				<a class="page-hero__crumb-link" href="<?php gerotech_page_link( 'home' ); ?>">Home</a>
				<span class="page-hero__crumb-sep" aria-hidden="true">/</span>
				<span class="page-hero__crumb-current">Contact</span>
			</nav>
			<p class="slide__eyebrow">Contact</p>
			<h1 class="slide__headline" id="contact-hero-headline">
				Let's make manufacturing better. <span class="accent">Together.</span>
			</h1>
			<p class="slide__body">For service and parts, including emergency service, please call <a href="tel:+17343797788">(734) 379-7788</a> or complete a service request form. To learn how we can help improve your business with engineered solutions, share your contact information below.</p>
		</div>
	</section>

	<!-- ============================================================
		 Contact form + details
		 ============================================================ -->
	<section class="section section--white contact-section">
		<div class="container">
			<div class="contact-layout">

				<div class="contact-form-col">
					<div class="section-header">
						<p class="eyebrow">Send Us a Message</p>
						<h2 class="section-title">Tell us about your <span class="accent--deep">project</span></h2>
					</div>

					<!-- TODO: wire to Contact Form 7 / WPForms -->
					<form class="contact-form" action="#" method="post" novalidate>
						<div class="contact-form__row">
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-first">First Name</label>
								<input class="contact-form__input" id="contact-first" name="first_name" type="text" autocomplete="given-name" />
							</div>
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-last">Last Name</label>
								<input class="contact-form__input" id="contact-last" name="last_name" type="text" autocomplete="family-name" />
							</div>
						</div>
						<div class="contact-form__row">
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-company">Company</label>
								<input class="contact-form__input" id="contact-company" name="company" type="text" autocomplete="organization" />
							</div>
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-zip">Zip Code</label>
								<input class="contact-form__input" id="contact-zip" name="zip" type="text" inputmode="numeric" autocomplete="postal-code" />
							</div>
						</div>
						<div class="contact-form__row">
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-phone">Phone</label>
								<input class="contact-form__input" id="contact-phone" name="phone" type="tel" autocomplete="tel" />
							</div>
							<div class="contact-form__field">
								<label class="contact-form__label" for="contact-email">Email</label>
								<input class="contact-form__input" id="contact-email" name="email" type="email" autocomplete="email" required />
							</div>
						</div>
						<div class="contact-form__field">
							<label class="contact-form__label" for="contact-comments">Comments</label>
							<textarea class="contact-form__textarea" id="contact-comments" name="comments" rows="5"></textarea>
						</div>
						<label class="contact-form__check">
							<input type="checkbox" name="mailing_list" value="1" />
							<span>Please add me to your mailing list.</span>
						</label>
						<div class="contact-form__actions">
							<button class="btn btn--primary btn--lg" type="submit">Send Message</button>
						</div>
					</form>
				</div>

				<aside class="contact-details" aria-label="<?php esc_attr_e( 'Contact information', 'gerotech-child' ); ?>">
					<!-- TODO: verify @gerotech.com addresses (dev shows masked wpenginepowered.com addresses) -->
					<div class="contact-group">
						<p class="contact-group__title">Departments</p>
						<ul class="contact-group__list">
							<li class="contact-group__item">
								<span class="contact-group__role">Headquarters &amp; Sales</span>
								<span class="contact-group__meta"><a href="tel:+17343797788">734-379-7788</a> · <a href="mailto:sales@gerotech.com">sales@gerotech.com</a></span>
							</li>
							<li class="contact-group__item">
								<span class="contact-group__role">Engineering &amp; Automation</span>
								<span class="contact-group__meta"><a href="tel:+17343797788">734-379-7788</a> · <a href="mailto:sales@gerotech.com">sales@gerotech.com</a></span>
							</li>
							<li class="contact-group__item">
								<span class="contact-group__role">Service</span>
								<span class="contact-group__meta"><a href="tel:+12484768787">248-476-8787</a> · <a href="mailto:service@gerotech.com">service@gerotech.com</a></span>
							</li>
							<li class="contact-group__item">
								<span class="contact-group__role">Parts</span>
								<span class="contact-group__meta"><a href="tel:+17343797788">734-379-7788</a> · <a href="mailto:parts@gerotech.com">parts@gerotech.com</a></span>
							</li>
							<li class="contact-group__item">
								<span class="contact-group__role">Tooling</span>
								<span class="contact-group__meta"><a href="tel:+17343797788">734-379-7788</a> · <a href="mailto:sales@gerotech.com">sales@gerotech.com</a></span>
							</li>
							<li class="contact-group__item">
								<span class="contact-group__role">Grand Rapids Office</span>
								<span class="contact-group__meta"><a href="tel:+16167351100">616-735-1100</a> · <a href="mailto:sales@gerotech.com">sales@gerotech.com</a></span>
							</li>
						</ul>
					</div>

					<div class="contact-group">
						<p class="contact-group__title">Locations</p>
						<div class="contact-location">
							<p class="contact-location__name">Flat Rock, MI</p>
							<p class="contact-location__address">29220 Commerce Drive<br />Flat Rock, MI 48134</p>
							<p class="contact-location__meta">P: <a href="tel:+17343797788">734-379-7788</a> · F: 734-379-2244</p>
						</div>
						<div class="contact-location">
							<p class="contact-location__name">Grand Rapids, MI</p>
							<p class="contact-location__address">2716 Courier Court NW<br />Grand Rapids, MI 49544</p>
							<p class="contact-location__meta">P: <a href="tel:+16167351100">616-735-1100</a> · F: 616-735-0776</p>
						</div>
					</div>
				</aside>

			</div>
		</div>
	</section>

	<!-- ============================================================
		 CTA Band
		 ============================================================ -->
	<section class="cta-band cta-band--cinema cta-band--cinema-lockup" aria-label="<?php esc_attr_e( 'Call to action', 'gerotech-child' ); ?>">
		<img class="cta-band__bg" src="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?q=80&w=1920&auto=format&fit=crop" alt="Factory engineer inspecting industrial machinery" loading="lazy" /><!-- Stand-in: Unsplash — awaiting client photo -->
		<div class="cta-band__overlay" aria-hidden="true"></div>
		<div class="cta-band__content">
			<div class="cta-band__copy">
				<div class="eyebrow-row">
					<span class="eyebrow-row__rule" aria-hidden="true"></span>
					<p class="eyebrow eyebrow--orange">Get Started</p>
				</div>
				<h2 class="cta-band__headline">Put Gerotech to work on your project.</h2>
				<span class="cta-band__rule" aria-hidden="true"></span>
				<p class="cta-band__body">From Haas CNC machines to Engineered Solutions — tell us about your project and we'll connect you with the right expert.</p>
				<div class="cta-band__actions">
					<a class="btn btn--primary btn--lg" href="tel:+17343797788">Call (734) 379-7788</a>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================
		 Email Signup
		 ============================================================ -->
	<section class="email-signup" aria-label="<?php esc_attr_e( 'Mailing list signup', 'gerotech-child' ); ?>">
		<div class="email-signup__inner">
			<div class="email-signup__copy">
				<h2 class="email-signup__title">Join Our <span class="accent">Mailing List</span></h2>
				<p class="email-signup__sub">Projects, machine updates, and service news — delivered to your inbox.</p>
			</div>
			<form class="email-signup__form" action="#" method="post" novalidate>
				<label for="email-input-ct" class="sr-only">Email address</label>
				<input class="email-signup__input" id="email-input-ct" type="email" name="email" placeholder="your@email.com" required autocomplete="email" />
				<button class="email-signup__submit" type="submit">Sign Up</button>
			</form>
		</div>
	</section>

</main>

<?php
get_footer();
