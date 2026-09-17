<?php
/**
 * Site header: alert banner, sticky header, mega-nav, mobile nav, search modal.
 *
 * Ported from partials/site-header.html. Navigation is hardcoded for v1 (see
 * implementation plan §7); machine-category hrefs remain "#" placeholders
 * pending client catalog URLs.
 *
 * @package GerotechChild
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'gerotech-child' ); ?></a>

	<!-- Alert Banner (Figma — black #000, centered links) -->
	<div class="alert-banner" aria-label="<?php esc_attr_e( 'Contact information', 'gerotech-child' ); ?>">
		<div class="alert-banner__inner">
			<div class="alert-banner__item">
				<span class="alert-banner__label"><?php esc_html_e( 'Headquarters & Sales:', 'gerotech-child' ); ?></span>
				<a class="alert-banner__link" href="tel:+17343797788">734-379-7788</a>
			</div>
			<div class="alert-banner__item">
				<span class="alert-banner__label"><?php esc_html_e( 'Service:', 'gerotech-child' ); ?></span>
				<a class="alert-banner__link" href="tel:+12484768787">248-476-8787</a>
			</div>
			<div class="alert-banner__item">
				<span class="alert-banner__label"><?php esc_html_e( 'Grand Rapids:', 'gerotech-child' ); ?></span>
				<a class="alert-banner__link" href="tel:+16167351100">616-735-1100</a>
			</div>
		</div>
	</div>

	<!-- Sticky Header (Figma — white bg, box shadow, bottom border) -->
	<header class="site-header" role="banner">
		<div class="site-header__inner">
			<a class="site-header__logo" href="<?php gerotech_page_link( 'home' ); ?>" aria-label="<?php esc_attr_e( 'Gerotech Home', 'gerotech-child' ); ?>">
				<img class="site-header__logo-img" src="<?php echo esc_url( GEROTECH_CHILD_URI . '/assets/images/gerotech-logo.svg' ); ?>" alt="Gerotech — Machines, Solutions, Support" width="188" height="30" />
			</a>

			<nav aria-label="<?php esc_attr_e( 'Main navigation', 'gerotech-child' ); ?>">
				<ul class="site-nav">
					<li class="site-nav__item has-mega has-mega--machines">
						<a class="site-nav__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer" aria-haspopup="true">
							<?php esc_html_e( 'Machines', 'gerotech-child' ); ?> <span class="arrow" aria-hidden="true">+</span>
						</a>
						<!-- TODO: machine category/model links pending — hrefs are "#" placeholders -->
						<div class="mega-nav mega-nav--machines" role="menu" aria-label="<?php esc_attr_e( 'Machines menu', 'gerotech-child' ); ?>">
							<div class="mega-nav__inner mega-nav__inner--machines">

								<!-- Col 1 -->
								<div class="mega-nav__machine-group">
									<p class="mega-nav__machine-title"><?php esc_html_e( 'Vertical Mills', 'gerotech-child' ); ?></p>
									<a class="mega-nav__machine-link" href="#" role="menuitem">VF Series</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Universal Machines</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">VR Series</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">VP-5 Prismatic</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Pallet-Changing VMCs</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Mini Mills</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Mold Machines</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">High-Speed Drill Centers</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Drill/Tap/Mill Series</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Toolroom Mills</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Pocket Mill</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Compact Mills</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Gantry Series</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">SR Sheet Routers</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Extra-Large VMC</a>
									<a class="mega-nav__machine-link" href="#" role="menuitem">Double-Column Mills</a>
								</div>

								<!-- Col 2 -->
								<div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Lathes', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">ST Series</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Dual-Spindle</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Box Way Series</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Toolroom Lathes</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Chucker Lathe</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Haas Bar Feeders</a>
									</div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Rotaries & Indexers', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Rotary Tables</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Indexers</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">5-Axis Rotaries</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Extra-Large Rotaries</a>
									</div>
								</div>

								<!-- Col 3 -->
								<div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Horizontal Mills', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">50-Taper</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">40-Taper</a>
									</div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Automation Systems', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Mill Automation</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Lathe Automation</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Automatic Parts Loaders</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Automation Models</a>
									</div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Desktop Machines', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Desktop Mill</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Desktop Lathe</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Control Simulator, Standard</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Control Simulator, Premium</a>
									</div>
								</div>

								<!-- Col 4 -->
								<div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Shop Equipment', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Knee Mill</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Haas Manual Lathes</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Haas Saws</a>
									</div>
									<div class="mega-nav__machine-group">
										<p class="mega-nav__machine-title"><?php esc_html_e( 'Fabrication Machines', 'gerotech-child' ); ?></p>
										<a class="mega-nav__machine-link" href="#" role="menuitem">Laser Cutting Machines</a>
										<a class="mega-nav__machine-link" href="#" role="menuitem">CNC Press Brakes</a>
									</div>
									<div class="mega-nav__machine-help">
										<p class="mega-nav__machine-help-title"><?php esc_html_e( 'Not sure which machine fits your job?', 'gerotech-child' ); ?></p>
										<a class="mega-nav__cta-btn" href="<?php gerotech_page_link( 'engineered-solutions' ); ?>"><?php esc_html_e( 'Talk to an Engineer', 'gerotech-child' ); ?></a>
									</div>
								</div>

								<div class="mega-nav__machines-footer">
									<a class="mega-nav__machines-footer-link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">
										<?php esc_html_e( 'Browse the full Haas catalog', 'gerotech-child' ); ?> <span aria-hidden="true">↗</span>
									</a>
								</div>

							</div><!-- /.mega-nav__inner -->
						</div>
					</li>
					<li class="site-nav__item has-mega">
						<a class="site-nav__link" href="<?php gerotech_page_link( 'engineered-solutions' ); ?>">
							<?php esc_html_e( 'Engineered Solutions', 'gerotech-child' ); ?> <span class="arrow" aria-hidden="true">+</span>
						</a>
						<div class="mega-nav mega-nav--es" role="menu" aria-label="<?php esc_attr_e( 'Engineered Solutions menu', 'gerotech-child' ); ?>">
							<div class="mega-nav__inner mega-nav__inner--es">
								<!-- Col 1: Categories -->
								<div class="mega-nav__col mega-nav__col--categories">
									<p class="mega-nav__col-title"><?php esc_html_e( 'By Category', 'gerotech-child' ); ?></p>
									<div class="mega-nav__category">
										<a class="mega-nav__cat-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem"><span class="mcs-name-split__lead">Machine</span> <span class="mcs-name-split__main">Custom Solutions</span></a>
										<p class="mega-nav__cat-desc">Column risers, auto doors, hydraulics, sheet metal, custom workholding, and specialty builds</p>
									</div>
									<div class="mega-nav__category">
										<a class="mega-nav__cat-link" href="<?php gerotech_page_link( 'application' ); ?>" role="menuitem">Applications</a>
										<p class="mega-nav__cat-desc">Part programming, process troubleshooting, optimization, tooling, demos, and training</p>
									</div>
									<div class="mega-nav__category mega-nav__category--last">
										<a class="mega-nav__cat-link" href="<?php gerotech_page_link( 'automation-integration' ); ?>" role="menuitem"><span class="mcs-name-split__lead">Automation</span> <span class="mcs-name-split__main">Controls Solutions</span></a>
										<p class="mega-nav__cat-desc">Electrical controls, HMI design, automation cells, EOAT, and pre-engineered packages</p>
									</div>
									<a class="mega-nav__cta-btn" href="<?php echo esc_url( gerotech_quote_mailto( 'Gerotech Quote Request' ) ); ?>"><?php esc_html_e( 'Talk to a Sales Engineer', 'gerotech-child' ); ?></a>
								</div>

								<!-- Col 2: All Services -->
								<div>
									<p class="mega-nav__col-title"><?php esc_html_e( 'All Services', 'gerotech-child' ); ?></p>
									<div class="mega-nav__services-group">
										<p class="mega-nav__services-label"><span class="mcs-name-split__lead">Machine</span> <span class="mcs-name-split__main">Custom Solutions</span></p>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Machine Column Risers</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Auto Doors</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Hydraulic – Pneumatics</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Custom Workholding</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Sheet Metal Modifications</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Process Engineering</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>" role="menuitem">Specialty Machine</a>
									</div>
									<div class="mega-nav__services-group">
										<p class="mega-nav__services-label">Applications</p>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'application' ); ?>" role="menuitem">Part Programming</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'application' ); ?>" role="menuitem">Process Optimization</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'application' ); ?>" role="menuitem">Tooling Recommendation</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'application' ); ?>" role="menuitem">Training</a>
									</div>
									<div class="mega-nav__services-group">
										<p class="mega-nav__services-label"><span class="mcs-name-split__lead">Automation</span> <span class="mcs-name-split__main">Controls Solutions</span></p>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'automation-integration' ); ?>" role="menuitem">Electrical – Controls Solutions</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'automation-integration' ); ?>" role="menuitem">HMI Design</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'automation-integration' ); ?>" role="menuitem">Automation Cell Design</a>
										<a class="mega-nav__service-link" href="<?php gerotech_page_link( 'automation-integration' ); ?>" role="menuitem">Pre-Engineered Solutions</a>
									</div>
								</div>

							</div><!-- /.mega-nav__inner -->
						</div>
					</li>
					<li class="site-nav__item">
						<a class="site-nav__link" href="<?php gerotech_page_link( 'training' ); ?>"><?php esc_html_e( 'Training', 'gerotech-child' ); ?></a>
					</li>
					<li class="site-nav__item">
						<a class="site-nav__link" href="<?php gerotech_page_link( 'support' ); ?>"><?php esc_html_e( 'Support', 'gerotech-child' ); ?></a>
					</li>
					<li class="site-nav__item">
						<a class="site-nav__link" href="<?php gerotech_page_link( 'about' ); ?>"><?php esc_html_e( 'About', 'gerotech-child' ); ?></a>
					</li>
					<li class="site-nav__item">
						<a class="site-nav__link" href="<?php gerotech_page_link( 'contact' ); ?>"><?php esc_html_e( 'Contact', 'gerotech-child' ); ?></a>
					</li>
				</ul>
			</nav>

			<a class="btn-get-quote" href="<?php echo esc_url( gerotech_quote_mailto( 'Gerotech Quote Request' ) ); ?>"><?php esc_html_e( 'Get a Quote', 'gerotech-child' ); ?></a>
			<button class="header-search" aria-label="<?php esc_attr_e( 'Search', 'gerotech-child' ); ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<path d="M8 13.5C11.0376 13.5 13.5 11.0376 13.5 8C13.5 4.96243 11.0376 2.5 8 2.5C4.96243 2.5 2.5 4.96243 2.5 8C2.5 11.0376 4.96243 13.5 8 13.5Z" stroke="currentColor" stroke-width="2"/>
					<path d="M12.2002 12.2L16.0002 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
				</svg>
			</button>
			<button class="mobile-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'gerotech-child' ); ?>" aria-expanded="false">&#9776;</button>
		</div>

		<nav class="mobile-nav" aria-label="<?php esc_attr_e( 'Mobile navigation', 'gerotech-child' ); ?>">
			<details class="mobile-nav__group">
				<summary class="mobile-nav__link mobile-nav__summary"><?php esc_html_e( 'Machines', 'gerotech-child' ); ?> <span class="arrow" aria-hidden="true">+</span></summary>
				<div class="mobile-nav__sublinks">
					<!-- TODO: machine category links pending — hrefs are "#" placeholders -->
					<a class="mobile-nav__sublink" href="#">Vertical Mills</a>
					<a class="mobile-nav__sublink" href="#">Lathes</a>
					<a class="mobile-nav__sublink" href="#">Horizontal Mills</a>
					<a class="mobile-nav__sublink" href="#">Rotaries & Indexers</a>
					<a class="mobile-nav__sublink" href="#">Automation Systems</a>
					<a class="mobile-nav__sublink" href="#">Desktop Machines</a>
					<a class="mobile-nav__sublink" href="#">Shop Equipment</a>
					<a class="mobile-nav__sublink" href="#">Fabrication Machines</a>
					<a class="mobile-nav__sublink mobile-nav__sublink--external" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">Full Haas Catalog ↗</a>
				</div>
			</details>
			<details class="mobile-nav__group">
				<summary class="mobile-nav__link mobile-nav__summary"><?php esc_html_e( 'Engineered Solutions', 'gerotech-child' ); ?> <span class="arrow" aria-hidden="true">+</span></summary>
				<div class="mobile-nav__sublinks">
					<p class="mobile-nav__sublink mobile-nav__sublabel"><span class="mcs-name-split__lead">Machine</span> <span class="mcs-name-split__main">Custom Solutions</span></p>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Column Risers</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Auto Doors</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Hydraulic – Pneumatics</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Custom Workholding</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Sheet Metal Modifications</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Process Engineering</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Specialty Machine</a>
					<p class="mobile-nav__sublink mobile-nav__sublabel">Applications</p>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'application' ); ?>">Part Programming</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'application' ); ?>">Process Optimization</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'application' ); ?>">Tooling Recommendation</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'application' ); ?>">Training</a>
					<p class="mobile-nav__sublink mobile-nav__sublabel"><span class="mcs-name-split__lead">Automation</span> <span class="mcs-name-split__main">Controls Solutions</span></p>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'automation-integration' ); ?>">Electrical – Controls Solutions</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'automation-integration' ); ?>">HMI Design</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'automation-integration' ); ?>">Automation Cell Design</a>
					<a class="mobile-nav__sublink" href="<?php gerotech_page_link( 'automation-integration' ); ?>">Pre-Engineered Solutions</a>
					<a class="mobile-nav__sublink mobile-nav__sublink--cta" href="<?php echo esc_url( gerotech_quote_mailto( 'Gerotech Quote Request' ) ); ?>">Talk to an Engineer →</a>
				</div>
			</details>
			<a class="mobile-nav__link" href="<?php gerotech_page_link( 'training' ); ?>"><?php esc_html_e( 'Training', 'gerotech-child' ); ?></a>
			<a class="mobile-nav__link" href="<?php gerotech_page_link( 'support' ); ?>"><?php esc_html_e( 'Support', 'gerotech-child' ); ?></a>
			<a class="mobile-nav__link" href="<?php gerotech_page_link( 'about' ); ?>"><?php esc_html_e( 'About', 'gerotech-child' ); ?></a>
			<a class="mobile-nav__link" href="<?php gerotech_page_link( 'contact' ); ?>"><?php esc_html_e( 'Contact', 'gerotech-child' ); ?></a>
			<a class="mobile-nav__link" href="<?php echo esc_url( gerotech_quote_mailto( 'Gerotech Quote Request' ) ); ?>"><?php esc_html_e( 'Get a Quote', 'gerotech-child' ); ?></a>
		</nav>
	</header>

	<div class="search-modal" id="search-modal" role="dialog" aria-modal="true" aria-labelledby="search-modal-title" hidden>
		<div class="search-modal__backdrop"></div>
		<div class="search-modal__panel">
			<button class="search-modal__close" type="button" aria-label="<?php esc_attr_e( 'Close search', 'gerotech-child' ); ?>">&times;</button>
			<h2 class="search-modal__title" id="search-modal-title"><?php esc_html_e( 'Search Gerotech', 'gerotech-child' ); ?></h2>
			<p class="search-modal__hint"><?php esc_html_e( 'Prototype site search — browse by section:', 'gerotech-child' ); ?></p>
			<input class="search-modal__input" type="search" placeholder="<?php esc_attr_e( 'Search pages and topics…', 'gerotech-child' ); ?>" aria-label="<?php esc_attr_e( 'Search', 'gerotech-child' ); ?>" />
			<nav class="search-modal__links" aria-label="<?php esc_attr_e( 'Quick links', 'gerotech-child' ); ?>">
				<a class="search-modal__link" href="https://gerotech.com/machines" target="_blank" rel="noopener noreferrer">Haas Machines ↗</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'engineered-solutions' ); ?>">Engineered Solutions</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'machine-custom-solutions' ); ?>">Machine Custom Solutions</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'automation-integration' ); ?>">Automation &amp; Controls</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'training' ); ?>">Training</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'support' ); ?>">Service &amp; Support</a>
				<a class="search-modal__link" href="<?php gerotech_page_link( 'about' ); ?>">About Gerotech</a>
			</nav>
		</div>
	</div>
