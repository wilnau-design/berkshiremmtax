<?php
/**
 * Site branding partial.
 *
 * @package BMM_Tax
 */

$is_footer = ! empty( $args['footer'] );
$class     = $is_footer ? 'site-branding site-branding--footer' : 'site-branding';
?>
<div class="<?php echo esc_attr( $class ); ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding__link" rel="home">
		<img
			class="site-branding__logo"
			src="<?php echo bmm_tax_asset( 'images/bmm-tax-logo.svg' ); ?>"
			alt="<?php esc_attr_e( 'Berkshire Money Management Tax and Accounting', 'bmm-tax' ); ?>"
			width="250"
			height="37"
		/>
	</a>
</div>
