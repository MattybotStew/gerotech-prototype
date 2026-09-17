<?php
/**
 * Fallback template.
 *
 * Child themes normally inherit index.php from the parent, but this provides a
 * safe default (used until page templates are converted in Phase 3).
 *
 * @package GerotechChild
 */

get_header();
?>

<main id="main" class="container">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 class="section-title"><?php the_title(); ?></h1>
				<div class="section-body"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<h1 class="section-title"><?php esc_html_e( 'Nothing found', 'gerotech-child' ); ?></h1>
	<?php endif; ?>
</main>

<?php
get_footer();
