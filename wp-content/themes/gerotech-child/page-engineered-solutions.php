<?php
/**
 * engineered-solutions page template.
 *
 * Content is driven by ACF (`inc/acf-fields.php`) with the current design as
 * defaults, so the page renders correctly whether or not fields are populated.
 *
 * @package GerotechChild
 */

get_header();

$pick = function ( $key, $default ) {
	return gerotech_field( $key, $default );
};

/* ── Hero ─────────────────────────────────────────────────── */
$hero_eyebrow    = $pick( 'es_hero_eyebrow', 'Engineering-Driven Manufacturing Solutions' );
$hero_headline   = $pick( 'es_hero_headline', 'Your Manufacturing <em>Solutions</em> Partner' );
$hero_body       = $pick( 'es_hero_body', "From machine modification and customization to full automation cells, Gerotech engineers solutions that keep manufacturers running faster, safer, and smarter — backed by decades of application expertise." );
$hero_cta1_label = $pick( 'es_hero_cta1_label', 'Get a Quote' );
$hero_cta1_url   = $pick( 'es_hero_cta1_url', gerotech_quote_mailto() );
$hero_cta2_label = $pick( 'es_hero_cta2_label', 'Explore Capabilities' );
$hero_cta2_url   = $pick( 'es_hero_cta2_url', '#why-headline' );
$hero_image      = gerotech_image_url( $pick( 'es_hero_image', 'assets/images/es-hero.png' ) );

/* ── Why Gerotech ─────────────────────────────────────────── */
$why_headline  = $pick( 'es_why_headline', 'Why Manufacturers <em>Trust Gerotech</em>' );
$why_body      = $pick( 'es_why_body', "Every manufacturing operation is unique. That's why our engineers don't start with a standard solution—they start by understanding your process. We work alongside your team to solve manufacturing challenges and develop practical solutions built around your operation." );
$why_cta_label = $pick( 'es_why_cta_label', 'Get A Quote' );
$why_cta_url   = $pick( 'es_why_cta_url', gerotech_quote_mailto() );
$why_features  = $pick(
	'es_why_features',
	array(
		array(
			'title'      => 'Machine Custom Solutions',
			'body'       => 'Column risers, auto doors, hydraulics, sheet metal, custom workholding, and specialty builds — we modify and customize your equipment to meet new production demands.',
			'link_label' => 'Explore Machine Custom Solutions →',
			'link_url'   => gerotech_page_url( 'machine-custom-solutions' ),
		),
		array(
			'title'      => 'Applications',
			'body'       => 'Part programming, process troubleshooting, optimization, tooling recommendations, demos, and training — we help you get the most from your existing equipment.',
			'link_label' => 'Explore Applications →',
			'link_url'   => gerotech_page_url( 'application' ),
		),
		array(
			'title'      => 'Automation controls solutions',
			'body'       => 'Electrical controls, HMI design, layered systems, full automation cell design, EOAT, and pre-engineered packages — complete integration from concept to production.',
			'link_label' => 'Explore Automation Controls Solutions →',
			'link_url'   => gerotech_page_url( 'automation-integration' ),
		),
	)
);
$why_icons = array(
	'<svg viewBox="0 0 24 24" focusable="false"><path d="M3 21V8l9-5 9 5v13"/><path d="M9 21v-6h6v6"/><path d="M9 10h6"/></svg>',
	'<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="3"/><path d="M12 2v3M12 19v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M2 12h3M19 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/></svg>',
	'<svg viewBox="0 0 24 24" focusable="false"><path d="M9 10a3 3 0 1 0 6 0"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/><path d="M7 14h10l1 6H6l1-6z"/><path d="M10 14V9a2 2 0 0 1 4 0v5"/></svg>',
);

/* ── FANUC ASI ───────────────────────────────────────────── */
$fanuc_eyebrow    = $pick( 'es_fanuc_eyebrow', 'FANUC Authorized System Integrator' );
$fanuc_headline   = $pick( 'es_fanuc_headline', 'Factory-Trained Robotics Integration — Certified by FANUC' );
$fanuc_body       = $pick( 'es_fanuc_body', "Gerotech is a FANUC Authorized System Integrator (ASI) — one of a select group of companies certified to design, build, and support complete FANUC robotic automation systems. That means factory-trained engineers, direct FANUC technical support, and proven cell methodology on every project." );
$fanuc_benefits   = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) $pick( 'es_fanuc_benefits', "Factory-trained FANUC robotics engineers on staff\nDirect access to FANUC technical resources\nComplete cell design, integration, and production support" ) ) ) ) );
$fanuc_cta1_label = $pick( 'es_fanuc_cta1_label', 'Talk to an Engineer' );
$fanuc_cta1_url   = $pick( 'es_fanuc_cta1_url', 'tel:+17343797788' );
$fanuc_cta2_label = $pick( 'es_fanuc_cta2_label', 'Explore Automation' );
$fanuc_cta2_url   = $pick( 'es_fanuc_cta2_url', gerotech_page_url( 'automation-integration' ) );
$fanuc_badge      = gerotech_image_url( $pick( 'es_fanuc_badge', 'assets/images/fanuc-asi-seal.png' ) );

/* ── Technology Partners ──────────────────────────────────── */
$partners_eyebrow   = $pick( 'es_partners_eyebrow', 'Our Technology Ecosystem' );
$partners_headline  = $pick( 'es_partners_headline', 'The Right Technology for <em>Every Application</em>' );
$partners_body      = $pick( 'es_partners_body', "Beyond our FANUC ASI credential, we work with leading automation and controls manufacturers to source the right components for every solution — engineering judgment matched to your application, not brand allegiance." );
$partners_cta_label = $pick( 'es_partners_cta_label', 'Explore Capabilities' );
$partners_cta_url   = $pick( 'es_partners_cta_url', '#why-headline' );
$partners_wordmarks = array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) $pick( 'es_partners_wordmarks', "FANUC\nHaas\nMidaco\nOnRobot\nRenishaw\nKeyence\nDynatect\nRoyal Products\n5th Axis" ) ) ) ) );

/* ── Capability band ──────────────────────────────────────── */
$cap_eyebrow    = $pick( 'es_cap_eyebrow', 'Beyond a Single Brand' );
$cap_headline   = $pick( 'es_cap_headline', "Your Machine.\nOur Solution." );
$cap_body       = $pick( 'es_cap_body', 'Whatever sits on your floor, any make and any control, our engineers modify, customize, and automate around it.' );
$cap_cta1_label = $pick( 'es_cap_cta1_label', 'Get a Quote' );
$cap_cta1_url   = $pick( 'es_cap_cta1_url', gerotech_quote_mailto() );
$cap_cta2_label = $pick( 'es_cap_cta2_label', 'Explore Capabilities' );
$cap_cta2_url   = $pick( 'es_cap_cta2_url', '#why-headline' );
$cap_cards      = $pick(
	'es_cap_cards',
	array(
		array( 'text' => 'Any make, any control — we engineer to your existing equipment' ),
		array( 'text' => 'In-house design, programming, and integration' ),
		array( 'text' => 'From a single modification to a full automation cell' ),
	)
);

/* ── FAQ ──────────────────────────────────────────────────── */
$faq_headline = $pick( 'es_faq_headline', 'Common <em>Questions</em>' );
$faq_items    = $pick(
	'es_faq_items',
	array(
		array(
			'question' => 'Do you work on machines from brands other than Haas?',
			'answer'   => 'Yes. Our engineering team modifies, retrofits, and automates equipment from any OEM and any control platform — not just the machines we sell.',
		),
		array(
			'question' => 'Can Gerotech handle design through installation in-house?',
			'answer'   => 'We provide concept development, electrical and mechanical design, controls programming, panel build, on-site commissioning, and production support — all under one roof in Michigan.',
		),
		array(
			'question' => 'How quickly can your service team respond to downtime?',
			'answer'   => 'Factory-trained technicians at three Michigan locations support same-day response for critical production issues. Call the Service line for immediate dispatch.',
		),
		array(
			'question' => 'What does FANUC Authorized System Integrator mean for my project?',
			'answer'   => "It certifies that Gerotech meets FANUC's standards for robotic cell design, integration methodology, and ongoing support — with direct access to FANUC technical resources.",
		),
		array(
			'question' => 'Do you offer training for operators and programmers?',
			'answer'   => 'Yes. Complimentary Haas operator and programming courses run at Gerotech-supported locations, including Macomb Community College. Custom on-site training is also available.',
		),
	)
);

/* ── News ─────────────────────────────────────────────────── */
$news_eyebrow    = $pick( 'es_news_eyebrow', 'Stay Informed' );
$news_headline   = $pick( 'es_news_headline', 'Latest <em>Projects &amp; News</em>' );
$news_lead_tag   = $pick( 'es_news_lead_tag', 'Project' );
$news_lead_date  = $pick( 'es_news_lead_date', 'June 2025' );
$news_lead_title = $pick( 'es_news_lead_title', 'Automated Robotic Cell Delivered to a Tier-1 Automotive Supplier' );
$news_lead_excerpt = $pick( 'es_news_lead_excerpt', 'Gerotech engineers designed and integrated a complete FANUC robotic automation cell, reducing cycle times by 38% for a major Michigan supplier.' );
$news_lead_image   = gerotech_image_url( $pick( 'es_news_lead_image', 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?q=80&w=1400&auto=format&fit=crop' ) );
$news_lead_stats   = $pick(
	'es_news_lead_stats',
	array(
		array( 'value' => '38%', 'label' => 'Cycle-time reduction' ),
		array( 'value' => 'FANUC', 'label' => 'Integration partner' ),
		array( 'value' => 'Turnkey', 'label' => 'Cell delivery' ),
	)
);
$news_items = $pick(
	'es_news_items',
	array(
		array(
			'tag'     => 'News',
			'date'    => 'May 2025',
			'title'   => 'Gerotech Expands Grand Rapids Service Territory',
			'excerpt' => 'Our Grand Rapids office is now fully staffed with factory-trained service technicians serving manufacturers across West Michigan.',
			'image'   => 'https://images.unsplash.com/photo-1647427060118-4911c9821b82?q=80&w=500&auto=format&fit=crop',
		),
		array(
			'tag'     => 'Project',
			'date'    => 'April 2025',
			'title'   => 'Hydraulic Workholding System Installed on Legacy Okuma',
			'excerpt' => "A custom hydraulic workholding and auto-door system extended a legacy machining center's productive life by years.",
			'image'   => 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?q=80&w=500&auto=format&fit=crop',
		),
		array(
			'tag'     => 'Training',
			'date'    => 'March 2025',
			'title'   => 'Spring Haas Operator Sessions Open at Macomb',
			'excerpt' => 'Complimentary operator and programming courses return to Macomb Community College for Haas owners across Southeast Michigan.',
			'image'   => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=500&auto=format&fit=crop',
		),
	)
);

/* ── CTA band ─────────────────────────────────────────────── */
$cta_eyebrow     = $pick( 'es_cta_eyebrow', 'Engineered Solutions' );
$cta_headline    = $pick( 'es_cta_headline', 'Engineering Solutions Built Around <em>Your Operation</em>' );
$cta_body        = $pick( 'es_cta_body', "Whether you're automating a manual process, modifying existing equipment, integrating robotics, or developing a custom manufacturing solution, our engineering team is ready to help. Tell us about your application, and we'll work with you to develop a practical solution built around your operation." );
$cta_button_label = $pick( 'es_cta_button_label', 'Get a Quote' );
$cta_button_url   = $pick( 'es_cta_button_url', gerotech_quote_mailto() );
$cta_image        = gerotech_image_url( $pick( 'es_cta_image', 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?q=80&w=1920&auto=format&fit=crop' ) );
$cta_call_label   = $pick( 'es_cta_call_label', 'Prefer to talk it through?' );
$cta_call_number  = $pick( 'es_cta_call_number', '(734) 379-7788' );
$cta_call_note    = $pick( 'es_cta_call_note', 'Talk to a person, not a form.' );

/* ── Email signup ─────────────────────────────────────────── */
$signup_title = $pick( 'es_signup_title', 'Join Our <em>Mailing List</em>' );
$signup_sub   = $pick( 'es_signup_sub', 'Projects, machine updates, and service news — delivered to your inbox.' );
?>

<main id="main">

    <!-- ===[ FIGMA ORDER_ID#57: "Please update these hero slides based on the content document" (Project Management) ]=== -->
    <!-- ============================================================
         SECTION 3: ES Hero
         ============================================================ -->
    <section class="page-hero" aria-label="Engineered Solutions hero">
      <img class="slide__bg slide__bg--right" src="<?php echo esc_url( $hero_image ); ?>" alt="Engineering-driven manufacturing on the shop floor" loading="eager" fetchpriority="high" decoding="async" />
      <div class="slide__overlay slide__overlay--left" aria-hidden="true"></div>
      <div class="slide__content slide__content--left">
        <p class="slide__eyebrow"><?php echo esc_html( $hero_eyebrow ); ?></p>
        <h1 class="slide__headline"><?php echo gerotech_accent( $hero_headline, 'accent' ); ?></h1>
        <?php if ( $hero_body ) : ?>
        <p class="slide__body"><?php echo esc_html( $hero_body ); ?></p>
        <?php endif; ?>
        <div class="page-hero__actions">
          <?php if ( $hero_cta1_label ) : ?>
          <a class="btn btn--primary btn--lg" href="<?php echo esc_url( $hero_cta1_url ); ?>"><?php echo esc_html( $hero_cta1_label ); ?></a>
          <?php endif; ?>
          <?php if ( $hero_cta2_label ) : ?>
          <a class="btn btn--outline-white btn--lg" href="<?php echo esc_url( $hero_cta2_url ); ?>"><?php echo esc_html( $hero_cta2_label ); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 4: Why Gerotech
         ============================================================ -->
    <section class="why-section" aria-labelledby="why-headline">
      <div class="why-section__inner">
        <div class="why-section__copy">
          <h2 class="why-section__copy-headline" id="why-headline">
            <?php echo gerotech_accent( $why_headline, 'accent--deep' ); ?>
          </h2>
          <span class="headline-rule headline-rule--deep" aria-hidden="true"></span>
          <p class="why-section__copy-body"><?php echo esc_html( $why_body ); ?></p>
          <?php if ( $why_cta_label ) : ?>
          <a class="btn btn--primary" href="<?php echo esc_url( $why_cta_url ); ?>"><?php echo esc_html( $why_cta_label ); ?></a>
          <?php endif; ?>
        </div>

        <div class="why-section__features">
          <?php foreach ( $why_features as $i => $f ) : ?>
          <?php $icon = isset( $why_icons[ $i ] ) ? $why_icons[ $i ] : $why_icons[0]; ?>
          <div class="why-feature">
            <div class="why-feature__icon" aria-hidden="true">
              <?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput -- static SVG. ?>
            </div>
            <div>
              <h3 class="why-feature__title"><?php echo esc_html( $f['title'] ); ?></h3>
              <p class="why-feature__body"><?php echo esc_html( $f['body'] ); ?></p>
              <?php if ( ! empty( $f['link_label'] ) ) : ?>
              <a class="why-feature__link" href="<?php echo esc_url( $f['link_url'] ); ?>"><?php echo esc_html( $f['link_label'] ); ?></a>
              <?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Client 2026-08: remove ES service grid; emphasize FANUC ASI (Mike / Tristien) -->
    <!-- ===[ FIGMA ORDER_ID#45: "We love this section. Is there any way to highlight this information in other areas. Such as the slider. Thoughts?" (tbridges) ]=== -->
    <!-- ===[ FIGMA ORDER_ID#59: "Please add some breathing room between this section and the next" (Project Management) ]=== -->
    <!-- ============================================================
         SECTION 6: FANUC ASI Featured
         ============================================================ -->
    <section class="credential-band credential-band--featured" id="fanuc" aria-labelledby="fanuc-headline">
      <div class="credential-band__inner credential-band__inner--featured">
        <div class="credential-band__badge credential-band__badge--featured">
          <img
            class="credential-band__badge-img"
            src="<?php echo esc_url( $fanuc_badge ); ?>"
            alt="FANUC Authorized System Integrator"
            width="196"
            height="196"
          />
        </div>
        <div class="credential-band__copy">
          <p class="eyebrow eyebrow--orange"><?php echo esc_html( $fanuc_eyebrow ); ?></p>
          <h2 class="credential-band__headline" id="fanuc-headline">
            <?php echo esc_html( $fanuc_headline ); ?>
          </h2>
          <p class="credential-band__body"><?php echo esc_html( $fanuc_body ); ?></p>
          <?php if ( $fanuc_benefits ) : ?>
          <ul class="credential-band__benefits">
            <?php foreach ( $fanuc_benefits as $b ) : ?>
            <li><?php echo esc_html( $b ); ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <div class="credential-band__actions">
            <?php if ( $fanuc_cta1_label ) : ?>
            <a class="btn btn--primary btn--lg" href="<?php echo esc_url( $fanuc_cta1_url ); ?>"><?php echo esc_html( $fanuc_cta1_label ); ?></a>
            <?php endif; ?>
            <?php if ( $fanuc_cta2_label ) : ?>
            <a class="btn btn--outline-white btn--lg" href="<?php echo esc_url( $fanuc_cta2_url ); ?>"><?php echo esc_html( $fanuc_cta2_label ); ?></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>


    <!-- ============================================================
         SECTION 7: Technology Partners
         ============================================================ -->
    <section class="tech-partners-section" aria-labelledby="tech-partners-headline">
      <div class="tech-partners-section__inner">
        <div>
          <p class="eyebrow"><?php echo esc_html( $partners_eyebrow ); ?></p>
          <h2 class="tech-partners-section__copy-headline" id="tech-partners-headline">
            <?php echo gerotech_accent( $partners_headline, 'accent--deep' ); ?>
          </h2>
          <span class="headline-rule headline-rule--deep" aria-hidden="true"></span>
          <p class="tech-partners-section__copy-body"><?php echo esc_html( $partners_body ); ?></p>
          <?php if ( $partners_cta_label ) : ?>
          <a class="btn btn--outline-dark" href="<?php echo esc_url( $partners_cta_url ); ?>"><?php echo esc_html( $partners_cta_label ); ?></a>
          <?php endif; ?>
        </div>

        <div class="tech-logo-grid">
          <?php foreach ( $partners_wordmarks as $w ) : ?>
          <div class="partner-wordmark"><?php echo esc_html( $w ); ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ===[ FIGMA ORDER_ID#46: "We love this content. Is there another design for the number sections. Maybe put that content into boxes to match the theme of the rest of the layout? We're open to ideas." (tbridges) ]=== -->
    <!-- ===[ FIGMA ORDER_ID#60: "Please update this section to display the numbered content in a different way." (Project Management) ]=== -->
    <!-- ===[ FIGMA ORDER_ID#10: "As much as we love this phrase, we'll need to change it to 'Your Machine. Our Solution.'" (tbridges) ]=== -->
    <!-- ===[ FIGMA ORDER_ID#9: "Since we can customize any machine, we'll need to remove the Haas information in this section." (tbridges) ]=== -->
    <!-- ============================================================
         SECTION 8: Capability Band
         ============================================================ -->
    <section class="capability-band" aria-labelledby="capability-headline">
      <div class="capability-band__inner">
        <div>
          <p class="eyebrow eyebrow--white"><?php echo esc_html( $cap_eyebrow ); ?></p>
          <h2 class="capability-band__headline" id="capability-headline">
            <?php echo gerotech_accent( $cap_headline, 'accent' ); ?>
          </h2>
          <p class="capability-band__body"><?php echo esc_html( $cap_body ); ?></p>
          <div class="capability-band__actions">
            <?php if ( $cap_cta1_label ) : ?>
            <a class="btn btn--primary btn--lg" href="<?php echo esc_url( $cap_cta1_url ); ?>"><?php echo esc_html( $cap_cta1_label ); ?></a>
            <?php endif; ?>
            <?php if ( $cap_cta2_label ) : ?>
            <a class="btn btn--outline-white btn--lg" href="<?php echo esc_url( $cap_cta2_url ); ?>"><?php echo esc_html( $cap_cta2_label ); ?></a>
            <?php endif; ?>
          </div>
        </div>

        <div class="capability-cards" aria-label="Key capabilities">
          <?php foreach ( $cap_cards as $i => $c ) : ?>
          <article class="capability-card">
            <span class="capability-card__num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
            <p class="capability-card__text"><?php echo esc_html( $c['text'] ); ?></p>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ============================================================
         SECTION 9: Common Questions
         ============================================================ -->
    <section class="trust-section" aria-labelledby="trust-headline">
      <div class="trust-section__inner">
        <div class="section-header">
          <h2 class="section-title" id="trust-headline"><?php echo gerotech_accent( $faq_headline, 'accent--deep' ); ?></h2>
          <span class="headline-rule headline-rule--deep" aria-hidden="true"></span>
        </div>
        <div class="trust-accordion">

          <?php foreach ( $faq_items as $item ) : ?>
          <details class="trust-item">
            <summary class="trust-item__q">
              <?php echo esc_html( $item['question'] ); ?>
              <span class="trust-item__icon" aria-hidden="true">+</span>
            </summary>
            <div class="trust-item__a"><p><?php echo esc_html( $item['answer'] ); ?></p></div>
          </details>
          <?php endforeach; ?>

        </div>
      </div>
    </section>

    <!-- ===[ FIGMA ORDER_ID#47: "Can there be a spot for more than two testimonials?" (tbridges)
               Reply: "Of course. We can create this as a slider to have as many testimonials as you need." (Project Management) ]=== -->
    <!-- ===[ FIGMA ORDER_ID#61: "Please add three dots under the testimonials to denote this is a carousel" (Project Management) ]=== -->
    <?php get_template_part( 'template-parts/sections/testimonials' ); ?>

    <!-- ===[ FIGMA ORDER_ID#48: "Where would this lead to? Determining if we want this CTA." (tbridges)
               Reply: "This would take the user to the News and Blogs page. If not needed, we can rethink what this section can be." (Project Management)
               Reply: "Typically we recommend updating the site with new case studies, blog posts around products and trends based on what customers are searching." (Project Management)
               Reply: "I am just wondering what type of news and what information we can frequently update to keep it fresh." (tbridges) ]=== -->
    <!-- ============================================================
         SECTION 12: News Feed — editorial split (matches homepage)
         ============================================================ -->
    <section class="news-section news-section--editorial section section--gray" aria-labelledby="news-headline">
      <div class="container container--es">
        <div class="section-header">
          <p class="eyebrow"><?php echo esc_html( $news_eyebrow ); ?></p>
          <h2 class="section-title" id="news-headline"><?php echo gerotech_accent( $news_headline, 'accent--deep' ); ?></h2>
          <span class="headline-rule headline-rule--deep" aria-hidden="true"></span>
        </div>

        <div class="news-editorial">
          <!-- Lead story — photo card, left gradient (matches hero + CTA treatment) -->
          <article class="news-feature">
            <img class="news-feature__bg" src="<?php echo esc_url( $news_lead_image ); ?>" alt="FANUC robotic automation cell on a Michigan production floor" loading="lazy" decoding="async" />
            <span class="news-feature__overlay" aria-hidden="true"></span>
            <div class="news-feature__content">
              <div class="news-feature__meta">
                <span class="news-tag"><?php echo esc_html( $news_lead_tag ); ?></span>
                <span class="news-feature__date"><?php echo esc_html( $news_lead_date ); ?></span>
              </div>
              <h3 class="news-feature__title"><?php echo esc_html( $news_lead_title ); ?></h3>
              <p class="news-feature__excerpt"><?php echo esc_html( $news_lead_excerpt ); ?></p>
              <?php if ( $news_lead_stats ) : ?>
              <ul class="news-feature__stats">
                <?php foreach ( $news_lead_stats as $st ) : ?>
                <li class="news-feature__stat">
                  <span class="news-feature__stat-value"><?php echo esc_html( $st['value'] ); ?></span>
                  <span class="news-feature__stat-label"><?php echo esc_html( $st['label'] ); ?></span>
                </li>
                <?php endforeach; ?>
              </ul>
              <?php endif; ?>
            </div>
          </article>

          <div class="news-list">
            <?php foreach ( $news_items as $i => $n ) : ?>
            <?php $thumb = gerotech_image_url( isset( $n['image'] ) ? $n['image'] : '' ); ?>
            <article class="news-item">
              <span class="news-item__index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $i + 2 ) ); ?></span>
              <div class="news-item__body">
                <div class="news-item__meta">
                  <span class="news-tag news-tag--light"><?php echo esc_html( $n['tag'] ); ?></span>
                  <span class="news-item__date"><?php echo esc_html( $n['date'] ); ?></span>
                </div>
                <h3 class="news-item__title"><?php echo esc_html( $n['title'] ); ?></h3>
                <p class="news-item__excerpt"><?php echo esc_html( $n['excerpt'] ); ?></p>
              </div>
              <div class="news-item__media">
                <img class="news-item__thumb" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $n['title'] ); ?>" loading="lazy" decoding="async" />
              </div>
            </article>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- Links + Show More pending dedicated news page — client TBD -->
      </div>
    </section>

    <!-- ===[ FIGMA ORDER_ID#49: "Remove 'Take Action Now'" (tbridges) - DONE ]=== -->
    <!-- ============================================================
         SECTION 13: CTA Band
         ============================================================ -->
    <section class="cta-band cta-band--cinema cta-band--cinema-lockup" aria-label="Call to action">
      <img class="cta-band__bg" src="<?php echo esc_url( $cta_image ); ?>" alt="Engineering blueprints and design" loading="lazy" />
      <div class="cta-band__overlay" aria-hidden="true"></div>
      <div class="cta-band__content">
        <div class="cta-band__copy">
          <div class="eyebrow-row">
            <span class="eyebrow-row__rule" aria-hidden="true"></span>
            <p class="eyebrow eyebrow--orange"><?php echo esc_html( $cta_eyebrow ); ?></p>
          </div>
          <h2 class="cta-band__headline"><?php echo gerotech_accent( $cta_headline, 'cta-band__accent' ); ?></h2>
          <span class="cta-band__rule" aria-hidden="true"></span>
          <p class="cta-band__body"><?php echo esc_html( $cta_body ); ?></p>
          <div class="cta-band__actions">
            <a class="btn btn--primary btn--lg" href="<?php echo esc_url( $cta_button_url ); ?>"><?php echo esc_html( $cta_button_label ); ?></a>
          </div>
        </div>
        <a class="cta-band__call" href="tel:+17343797788">
          <span class="cta-band__call-label"><?php echo esc_html( $cta_call_label ); ?></span>
          <span class="cta-band__call-number"><?php echo esc_html( $cta_call_number ); ?></span>
          <span class="cta-band__call-note"><?php echo esc_html( $cta_call_note ); ?></span>
        </a>
      </div>
    </section>

    <!-- ===[ FIGMA: "Update spacing" near y=7491 on frame 6861:989 — no specifics given; flag for visual inspection ]=== -->
    <!-- ============================================================
         SECTION 13.5: Email Signup
         ============================================================ -->
    <section class="email-signup" aria-label="Mailing list signup">
      <div class="email-signup__inner">
        <div class="email-signup__copy">
          <h2 class="email-signup__title"><?php echo gerotech_accent( $signup_title, 'accent' ); ?></h2>
          <p class="email-signup__sub"><?php echo esc_html( $signup_sub ); ?></p>
        </div>
        <form class="email-signup__form" action="#" method="post" novalidate>
        <label for="email-input-es" class="sr-only">Email address</label>
        <input class="email-signup__input" id="email-input-es" type="email" name="email" placeholder="your@email.com" required autocomplete="email" />
        <button class="email-signup__submit" type="submit">Sign Up</button>
      </form>
      </div>
    </section>

  </main>

<?php
get_footer();
