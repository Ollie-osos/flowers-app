<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="page">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/general'); ?>
		<?php endwhile; ?>
		<h1>Courses</h1>
	<?php else : ?>
		<?php get_template_part( 'template-parts/none' ); ?>

	<?php endif; // End have_posts() check. ?>
	<?php
	/* Display navigation to next/previous pages when applicable */
	if ( function_exists( 'foundationpress_pagination' ) ) :
		foundationpress_pagination();
	elseif ( is_paged() ) :
	?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php endif; ?>
</div>

<?php get_footer();
