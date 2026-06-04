<?php
/**
 * Search form markup (matches contact form styles).
 *
 * @package BMM_Tax
 */

$unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="contact-form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form__label" for="<?php echo esc_attr( $unique_id ); ?>"><?php esc_html_e( 'Search', 'bmm-tax' ); ?></label>
	<div class="search-form__control">
		<input
			type="search"
			id="<?php echo esc_attr( $unique_id ); ?>"
			class="search-field"
			name="s"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder', 'bmm-tax' ); ?>"
		/>
		<button type="submit" class="search-form__submit search-submit" aria-label="<?php esc_attr_e( 'Search', 'bmm-tax' ); ?>">
			<?php echo bmm_tax_search_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG markup. ?>
		</button>
	</div>
</form>
