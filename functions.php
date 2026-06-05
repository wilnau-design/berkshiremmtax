<?php
/**
 * BMM Tax theme functions.
 *
 * @package BMM_Tax
 */

require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/fluentform-contact.php';

/**
 * Theme setup.
 */
function bmm_tax_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_editor_style( 'style.css' );
	load_theme_textdomain( 'bmm-tax', get_template_directory() . '/languages' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'bmm-tax' ),
			'footer'  => __( 'Footer', 'bmm-tax' ),
		)
	);
}
add_action( 'after_setup_theme', 'bmm_tax_setup' );

/**
 * Enqueue front-end assets.
 */
function bmm_tax_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'bmm-tax-style', get_stylesheet_uri(), array(), $version );

	$page_stylesheet = bmm_tax_page_stylesheet();
	if ( $page_stylesheet ) {
		wp_enqueue_style(
			'bmm-tax-' . $page_stylesheet,
			get_theme_file_uri( 'assets/css/' . $page_stylesheet . '.css' ),
			array( 'bmm-tax-style' ),
			$version
		);
	}

	wp_enqueue_script(
		'bmm-tax-navigation',
		get_theme_file_uri( 'assets/js/navigation.js' ),
		array(),
		$version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bmm_tax_enqueue_assets' );

/**
 * Preload the hero illustration on the front page (mobile + desktop variants).
 */
function bmm_tax_preload_hero_illustration() {
	if ( ! is_front_page() ) {
		return;
	}
	?>
	<link rel="preload" as="image" href="<?php echo bmm_tax_asset( 'images/hero-illustration-mobile.webp' ); ?>" media="(max-width: 900px)" type="image/webp" fetchpriority="high" />
	<link rel="preload" as="image" href="<?php echo bmm_tax_asset( 'images/hero-illustration.webp' ); ?>" media="(min-width: 901px)" type="image/webp" fetchpriority="high" />
	<?php
}
add_action( 'wp_head', 'bmm_tax_preload_hero_illustration', 1 );

/**
 * Preload the hero sun graphic on About and Recruitment pages.
 */
function bmm_tax_preload_page_hero_sun() {
	$is_about        = bmm_tax_is_page_template_file( 'page-about.php' );
	$is_recruitment  = bmm_tax_is_page_template_file( 'page-recruitment.php' );

	if ( ! $is_about && ! $is_recruitment ) {
		return;
	}
	?>
	<link rel="preload" as="image" href="<?php echo bmm_tax_asset( 'images/graphic-dotted-circle-orange-mobile.webp' ); ?>" media="(max-width: 900px)" type="image/webp" fetchpriority="high" />
	<link rel="preload" as="image" href="<?php echo bmm_tax_asset( 'images/graphic-dotted-circle-orange.webp' ); ?>" media="(min-width: 901px)" type="image/webp" fetchpriority="high" />
	<?php
}
add_action( 'wp_head', 'bmm_tax_preload_page_hero_sun', 1 );

/**
 * Preload critical local fonts (above-the-fold weights only).
 */
function bmm_tax_preload_fonts() {
	$fonts = array(
		'AlanSans-Regular.ttf',
		'DMSans-Regular.ttf',
		'DMSans-Medium.ttf',
	);

	foreach ( $fonts as $file ) {
		printf(
			'<link rel="preload" as="font" href="%s" type="font/ttf" crossorigin />' . "\n",
			bmm_tax_asset( 'fonts/' . $file )
		);
	}
}
add_action( 'wp_head', 'bmm_tax_preload_fonts', 1 );

/**
 * Scroll animation observer.
 */
function bmm_tax_scroll_animations() {
	?>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		var els = document.querySelectorAll('.animate-on-scroll');
		if (!els.length) return;

		function reveal(el) {
			el.classList.add('is-visible');
		}

		if (!('IntersectionObserver' in window)) {
			els.forEach(reveal);
			return;
		}

		var observer = new IntersectionObserver(function(entries) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting) {
					reveal(entry.target);
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.08, rootMargin: '0px 0px -5% 0px' });

		els.forEach(function(el) {
			observer.observe(el);
			var rect = el.getBoundingClientRect();
			if (rect.top < window.innerHeight * 0.92) {
				reveal(el);
			}
		});
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'bmm_tax_scroll_animations' );

