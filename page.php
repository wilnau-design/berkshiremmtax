<?php
/**
 * Page template fallback.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main site-main--page">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content/content', 'page' );
	endwhile;
	?>
</main>

<?php
get_footer();
