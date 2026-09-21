<?php
/**
 * application page template.
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

$uri = GEROTECH_CHILD_URI;

/* ── Hero ─────────────────────────────────────────────────── */
$hero_headline = $pick( 'app_hero_headline', 'Applications <em>Solutions</em>' );
$hero_accent   = $pick( 'app_hero_accent_color', 'orange' ); // Blank (no stored choice) keeps the design colour.
$hero_image    = gerotech_image_url( $pick( 'app_hero_image', 'https://images.unsplash.com/photo-1666634157070-6fd830fb5672?q=80&w=1920&auto=format&fit=crop' ) );

/* ── Services grid ────────────────────────────────────────── */
$grid_eyebrow = $pick( 'app_grid_eyebrow', 'What We Offer' );
$grid_title   = $pick( 'app_grid_title', '<em>Application</em> Services' );
$cards        = $pick(
	'app_cards',
	array(
		array(
			'title'  => 'Part Programming',
			'image'  => 'assets/images/app-gallery-umc750.jpg',
			'detail' => '<p>Custom part programs and CNC code development to get the most from your equipment, optimized for your specific materials, operations, and machine control.</p>',
		),
		array(
			'title'  => 'Process Troubleshooting',
			'image'  => 'https://images.unsplash.com/photo-1713371398485-7bde1bde9def?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>Hands-on diagnosis of machining process problems — tool life, surface finish, dimensional variation, and cycle inefficiencies resolved by experienced application engineers.</p>',
		),
		array(
			'title'  => 'Process Optimization',
			'image'  => 'https://images.unsplash.com/photo-1713371398484-cc4e4f6a262a?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>Systematic analysis and improvement of existing processes to reduce cycle time, extend tool life, and increase overall throughput without new equipment investment.</p>',
		),
		array(
			'title'  => 'Tooling Recommendation',
			'image'  => 'https://images.unsplash.com/photo-1666618090858-fbcee636bd3e?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>Expert tooling selection matched to your material, machine, and application — ensuring the right tool is always in the spindle for optimal performance and tool life.</p>',
		),
		array(
			'title'  => 'Demo',
			'image'  => 'https://images.unsplash.com/photo-1727292485858-588c7652ad69?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>Live demonstrations of application capabilities, software, and processes at your facility or at a Gerotech-supported location — see the solution before you commit.</p>',
		),
		array(
			'title'  => 'Training',
			'image'  => 'https://images.unsplash.com/photo-1647427060118-4911c9821b82?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>Instructor-led operator and programming training tailored to your team\'s skill level and equipment — available at your facility or at a Gerotech-supported location.</p>',
		),
		array(
			'title'  => 'Fire Suppression',
			'image'  => 'assets/images/mcs-gallery/fire-suppression.jpg',
			'detail' => '<p>Machine-integrated fire suppression that detects and knocks down a fire at the source — inside the enclosure, before it spreads. Gerotech specifies, installs, and services systems engineered for CNC machining environments to protect your machine, your people, and your uptime.</p>',
		),
		array(
			'title'  => 'RFID',
			'image'  => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=800&auto=format&fit=crop',
			'detail' => '<p>RFID tool and workholding identification that takes manual data entry out of the setup. Tools, fixtures, and offsets are read automatically and tied to the job — cutting setup time and eliminating costly data-entry errors.</p>',
		),
	)
);

/* ── Gallery ──────────────────────────────────────────────── */
$gallery_title = $pick( 'app_gallery_title', 'Applications — Product <em>Gallery</em>' );
$collections   = $pick(
	'app_collections',
	array(
		array(
			'title' => 'Part Programming',
			'meta'  => 'UMC-750 · 5-axis machining',
			'media' => "image | {$uri}/assets/images/app-gallery-umc750.jpg | | Haas UMC-750 5-axis machining | UMC-750 · 5-axis machining",
		),
		array(
			'title' => 'Process Troubleshooting',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1713371398485-7bde1bde9def?q=80&w=1600&auto=format&fit=crop | | Process Troubleshooting | Process Troubleshooting',
		),
		array(
			'title' => 'Process Optimization',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1713371398484-cc4e4f6a262a?q=80&w=1600&auto=format&fit=crop | | Process Optimization | Process Optimization',
		),
		array(
			'title' => 'Tooling Recommendation',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1666618090858-fbcee636bd3e?q=80&w=1600&auto=format&fit=crop | | Tooling Recommendation | Tooling Recommendation',
		),
		array(
			'title' => 'Demo',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1727292485858-588c7652ad69?q=80&w=1600&auto=format&fit=crop | | Demo | Demo',
		),
		array(
			'title' => 'Training',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1647427060118-4911c9821b82?q=80&w=1600&auto=format&fit=crop | | Training | Training',
		),
		array(
			'title' => 'Fire Suppression',
			'meta'  => 'Machine-integrated fire protection',
			'media' => "image | {$uri}/assets/images/mcs-gallery/fire-suppression.jpg | | Kidde machine-integrated fire suppression | Kidde system · machine-integrated",
		),
		array(
			'title' => 'RFID',
			'meta'  => '',
			'media' => 'image | https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1600&auto=format&fit=crop | | RFID | RFID',
		),
	)
);

/* ── CTA band ─────────────────────────────────────────────── */
$cta_eyebrow      = $pick( 'app_cta_eyebrow', 'Applications' );
$cta_headline     = $pick( 'app_cta_headline', 'Need <em>application support</em> for your shop floor?' );
$cta_body         = $pick( 'app_cta_body', '' );
$cta_button_label = $pick( 'app_cta_button_label', 'Get a Quote' );
$cta_button_url   = $pick( 'app_cta_button_url', gerotech_quote_mailto() );
$cta_image        = gerotech_image_url( $pick( 'app_cta_image', 'https://images.unsplash.com/photo-1716191299980-a6e8827ba10b?q=80&w=1920&auto=format&fit=crop' ) );
$cta_call_label   = $pick( 'app_cta_call_label', 'Prefer to talk it through?' );
$cta_call_number  = $pick( 'app_cta_call_number', '(734) 379-7788' );
$cta_call_note    = $pick( 'app_cta_call_note', 'Talk to a person, not a form.' );

/* ── Email signup ─────────────────────────────────────────── */
$signup_title = $pick( 'app_signup_title', 'Join Our <em>Mailing List</em>' );
$signup_sub   = $pick( 'app_signup_sub', 'Projects, machine updates, and service news — delivered to your inbox.' );
?>

<main id="main">
    <section class="page-hero" aria-labelledby="app-hero-headline">
      <img class="slide__bg slide__bg--right" src="<?php echo esc_url( $hero_image ); ?>" alt="CNC machining application" loading="eager" decoding="async" />
      <div class="slide__overlay slide__overlay--left" aria-hidden="true"></div>
      <div class="slide__content slide__content--left">
        <nav class="page-hero__breadcrumb" aria-label="Breadcrumb">
          <a class="page-hero__crumb-link" href="<?php gerotech_page_link( 'home' ); ?>">Home</a>
          <span class="page-hero__crumb-sep" aria-hidden="true">/</span>
          <a class="page-hero__crumb-link" href="<?php gerotech_page_link( 'engineered-solutions' ); ?>">Engineered Solutions</a>
          <span class="page-hero__crumb-sep" aria-hidden="true">/</span>
          <span class="page-hero__crumb-current">Applications</span>
        </nav>
        <h1 class="slide__headline" id="app-hero-headline"><?php echo gerotech_accent( $hero_headline, gerotech_accent_class( $hero_accent ) ); ?></h1>
      </div>
    </section>


    <section class="mcs-grid-section" id="app-grid" aria-labelledby="app-grid-headline">
      <div class="container container--es">
        <div class="section-header"><p class="eyebrow"><?php echo esc_html( $grid_eyebrow ); ?></p><h2 class="section-title" id="app-grid-headline"><?php echo gerotech_accent( $grid_title, 'accent--deep' ); ?></h2><span class="headline-rule headline-rule--deep" aria-hidden="true"></span></div>
        <div class="mcs-grid">
          <?php foreach ( $cards as $card ) : ?>
          <?php $card_image = gerotech_image_url( isset( $card['image'] ) ? $card['image'] : '' ); ?>
          <article class="mcs-card" role="button" tabindex="0" aria-haspopup="dialog">
            <img class="mcs-card__image" src="<?php echo esc_url( $card_image ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" loading="lazy" />
            <div class="mcs-card__content"><h3 class="mcs-card__title"><?php echo esc_html( $card['title'] ); ?></h3><span class="mcs-card__cue">View Details →</span></div>
            <template><?php echo wp_kses_post( $card['detail'] ); ?><div class="mcs-modal__actions"><a class="btn btn--outline-orange" href="tel:+17343797788">Talk to an Engineer</a></div></template>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- ============================================================
         Product Gallery
         ============================================================ -->
    <section class="mcs-gallery-section" aria-labelledby="app-gallery-headline">
      <div class="container container--es">
        <div class="section-header">
          <h2 class="section-title" id="app-gallery-headline"><?php echo gerotech_accent( $gallery_title, 'accent--deep' ); ?></h2>
          <span class="headline-rule headline-rule--deep" aria-hidden="true"></span>
        </div>
        <div class="gallery-collections" data-gallery>

          <?php foreach ( $collections as $col ) : ?>
          <?php
          $media      = gerotech_parse_media( isset( $col['media'] ) ? $col['media'] : '' );
          $first      = isset( $media[0] ) ? $media[0] : null;
          $cover      = '';
          $cover_alt  = '';
          if ( $first ) {
              $cover     = ( 'video' === $first['type'] && ! empty( $first['poster'] ) ) ? $first['poster'] : $first['src'];
              $cover_alt = $first['alt'];
          }
          ?>
          <article class="gallery-collection">
            <span class="gallery-collection__media">
              <img class="gallery-collection__cover" src="<?php echo esc_url( $cover ); ?>" alt="<?php echo esc_attr( $cover_alt ); ?>" loading="lazy" />
              <span class="gallery-collection__badge"></span>
              <span class="gallery-collection__play" aria-hidden="true"><svg viewBox="0 0 12 12" focusable="false"><path fill="currentColor" d="M2 1.2 10.4 6 2 10.8z"/></svg></span>
            </span>
            <div class="gallery-collection__label">
              <h3><button type="button" class="gallery-collection__trigger" aria-haspopup="dialog"><?php echo esc_html( $col['title'] ); ?></button></h3>
              <?php if ( ! empty( $col['meta'] ) ) : ?>
              <p class="gallery-collection__meta"><?php echo esc_html( $col['meta'] ); ?></p>
              <?php endif; ?>
            </div>
            <template class="gallery-collection__data">
              <?php foreach ( $media as $m ) : ?>
                <?php if ( 'video' === $m['type'] ) : ?>
              <span data-type="video" data-src="<?php echo esc_url( $m['src'] ); ?>" data-poster="<?php echo esc_url( $m['poster'] ); ?>" data-alt="<?php echo esc_attr( $m['alt'] ); ?>" data-caption="<?php echo esc_attr( $m['caption'] ); ?>"></span>
                <?php else : ?>
              <span data-type="image" data-src="<?php echo esc_url( $m['src'] ); ?>" data-alt="<?php echo esc_attr( $m['alt'] ); ?>" data-caption="<?php echo esc_attr( $m['caption'] ); ?>"></span>
                <?php endif; ?>
              <?php endforeach; ?>
            </template>
          </article>
          <?php endforeach; ?>

        </div>
      </div>
    </section>

    <!-- Customer testimonials (shared partial) -->
    <?php get_template_part( 'template-parts/sections/testimonials' ); ?>

    <section class="cta-band cta-band--cinema cta-band--cinema-lockup" aria-label="Call to action">
      <img class="cta-band__bg" src="<?php echo esc_url( $cta_image ); ?>" alt="CNC machining and applications" loading="lazy" />
      <div class="cta-band__overlay" aria-hidden="true"></div>
      <div class="cta-band__content">
        <div class="cta-band__copy">
          <div class="eyebrow-row">
            <span class="eyebrow-row__rule" aria-hidden="true"></span>
            <p class="eyebrow eyebrow--orange"><?php echo esc_html( $cta_eyebrow ); ?></p>
          </div>
          <h2 class="cta-band__headline"><?php echo gerotech_accent( $cta_headline, 'cta-band__accent' ); ?></h2>
          <span class="cta-band__rule" aria-hidden="true"></span>
          <?php if ( $cta_body ) : ?>
          <p class="cta-band__body"><?php echo esc_html( $cta_body ); ?></p>
          <?php endif; ?>
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

    <section class="email-signup" aria-label="Mailing list signup">
      <div class="email-signup__inner">
        <div class="email-signup__copy">
          <h2 class="email-signup__title"><?php echo gerotech_accent( $signup_title, 'accent' ); ?></h2>
          <p class="email-signup__sub"><?php echo esc_html( $signup_sub ); ?></p>
        </div>
        <form class="email-signup__form" action="#" method="post" novalidate>
          <label for="email-input-app" class="sr-only">Email address</label>
          <input class="email-signup__input" id="email-input-app" type="email" name="email" placeholder="your@email.com" required autocomplete="email" />
          <button class="email-signup__submit" type="submit">Sign Up</button>
        </form>
      </div>
    </section>
  </main>

<?php
get_footer();
