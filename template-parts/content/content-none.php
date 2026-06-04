<?php
/**
 * No content partial.
 *
 * @package BMM_Tax
 */
?>
<section class="alignwide no-results">
	<?php if ( is_search() ) : ?>
		<p class="no-results__message"><?php esc_html_e( 'No results matched your search. Try different keywords.', 'bmm-tax' ); ?></p>
		<div class="no-results__search">
			<?php get_search_form(); ?>
		</div>
	<?php else : ?>
		<p class="no-results__message"><?php esc_html_e( 'Nothing found.', 'bmm-tax' ); ?></p>
	<?php endif; ?>
</section>
