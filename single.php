<?php
/**
 * Single post template.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main site-main--page">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'single' );
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	endwhile;
	?>
</main>

<?php
get_footer();
