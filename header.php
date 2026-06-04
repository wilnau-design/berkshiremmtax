<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bmm-tax' ); ?></a>

<header id="masthead" class="site-header alignfull">
	<div class="alignwide site-header__inner">
		<?php get_template_part( 'template-parts/header/site-branding' ); ?>

		<button
			class="menu-toggle"
			type="button"
			aria-controls="primary-menu-panel"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle menu', 'bmm-tax' ); ?>"
		>
			<span class="menu-toggle__line"></span>
			<span class="menu-toggle__line"></span>
			<span class="menu-toggle__line"></span>
		</button>

		<nav class="site-navigation" aria-label="<?php esc_attr_e( 'Primary', 'bmm-tax' ); ?>">
			<div id="primary-menu-panel" class="primary-menu-panel">
				<a class="primary-menu__link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'ABOUT', 'bmm-tax' ); ?></a>
				<?php bmm_tax_button_outline( __( 'CONTACT US', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</div>
		</nav>
	</div>
</header>
