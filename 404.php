<?php
/**
 * 404 template.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="alignwide error-404">
		<h1 class="page-title"><?php esc_html_e( 'Page not found', 'bmm-tax' ); ?></h1>
		<p><?php esc_html_e( 'The page you are looking for does not exist.', 'bmm-tax' ); ?></p>
		<p><a class="wp-element-button bmm-button bmm-button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to home', 'bmm-tax' ); ?></a></p>
		<div class="error-404__search">
			<?php get_search_form(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
