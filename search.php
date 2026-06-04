<?php
/**
 * Search results template.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main site-main--archive">
	<header class="page-header alignwide">
		<h1 class="page-title">
			<span class="page-title__label"><?php esc_html_e( 'Search results for:', 'bmm-tax' ); ?></span>
			<span class="page-title__query"><?php echo esc_html( get_search_query() ); ?></span>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<div class="alignwide posts-list">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'list' );
			endwhile;
			?>
		</div>
		<div class="alignwide posts-pagination">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => __( 'Previous', 'bmm-tax' ),
					'next_text' => __( 'Next', 'bmm-tax' ),
				)
			);
			?>
		</div>
	<?php else : ?>
		<?php get_template_part( 'template-parts/content/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
