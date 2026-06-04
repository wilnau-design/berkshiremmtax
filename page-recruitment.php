<?php
/**
 * Recruitment page template.
 *
 * @package BMM_Tax
 */

get_header();

$benefits = array(
	__( 'A real balanced schedule (not crazy work weeks).', 'bmm-tax' ),
	__( 'Client-facing work from day one.', 'bmm-tax' ),
	__( 'No audits, ever.', 'bmm-tax' ),
);

$fit_cards = array(
	array(
		'title' => __( 'You like the puzzle of it', 'bmm-tax' ),
		'text'  => __( 'You want to know what the story is, not just how to get through it.', 'bmm-tax' ),
		'icon'  => 'graphic-puzzles.webp',
	),
	array(
		'title' => __( 'You\'re good with people and numbers', 'bmm-tax' ),
		'text'  => __( 'You\'d rather be part of building something than waiting for your turn in an established hierarchy.', 'bmm-tax' ),
		'icon'  => 'graphic-dominoes.webp',
	),
	array(
		'title' => __( 'CPAs preferred', 'bmm-tax' ),
		'text'  => __( 'If you\'re motivated and working toward licensure, we also encourage you to reach out.', 'bmm-tax' ),
		'icon'  => 'graphic-id-card.webp',
	),
);
?>

<main id="primary" class="site-main page-recruitment">

	<section class="alignfull page-hero">
		<div class="alignwide page-hero__inner">
			<h1 class="page-hero__title"><?php esc_html_e( 'Why work with BMM Tax?', 'bmm-tax' ); ?></h1>
			<div class="page-hero__lede-block">
				<p><?php esc_html_e( 'Most accounting firms hand you audit files for years before you see a real client. Partnership is a decade away… and you go into debt when you get there.', 'bmm-tax' ); ?></p>
				<p><?php esc_html_e( 'We built BMM Tax to give you what you enjoy and deserve:', 'bmm-tax' ); ?></p>
			</div>
			<div class="benefit-boxes">
				<?php foreach ( $benefits as $benefit ) : ?>
					<article class="benefit-box">
						<p><?php echo esc_html( $benefit ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
			<p class="page-hero__note"><?php esc_html_e( 'And a clear path forward that doesn\'t make you wait decades for profits.', 'bmm-tax' ); ?></p>
		</div>
		<div class="page-hero__art" aria-hidden="true">
			<div class="page-hero__sun-group">
				<img class="page-hero__sun" src="<?php echo bmm_tax_asset( 'images/graphic-dotted-circle-orange.webp' ); ?>" alt="" width="501" height="502" />
				<img class="page-hero__cloud page-hero__cloud--5" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-5.webp' ); ?>" alt="" width="77" height="10" />
				<img class="page-hero__cloud page-hero__cloud--2" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-2.webp' ); ?>" alt="" width="318" height="14" />
			</div>
		</div>
	</section>

	<section class="alignfull recruitment-mid-cta animate-on-scroll">
		<div class="recruitment-mid-cta__clouds" aria-hidden="true">
			<img class="recruitment-mid-cta__cloud recruitment-mid-cta__cloud--left" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-1.webp' ); ?>" alt="" width="216" height="48" />
			<img class="recruitment-mid-cta__cloud recruitment-mid-cta__cloud--right" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-4.webp' ); ?>" alt="" width="347" height="57" />
		</div>
		<div class="recruitment-mid-cta__content">
			<h2 class="recruitment-mid-cta__title"><?php esc_html_e( 'If that sounds like what you want we\'d like to talk.', 'bmm-tax' ); ?></h2>
			<p class="recruitment-mid-cta__button">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
	</section>

	<section class="alignfull services-band recruitment-fit animate-on-scroll">
		<div class="alignwide">
			<h2 class="section-title"><?php esc_html_e( 'You might be a fit if…', 'bmm-tax' ); ?></h2>
			<div class="folder-cards">
				<?php foreach ( $fit_cards as $card ) : ?>
					<?php bmm_tax_folder_card( $card['title'], $card['text'], $card['icon'] ); ?>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="recruitment-fit__footer">
			<div class="recruitment-fit__landscape" aria-hidden="true">
				<img src="<?php echo bmm_tax_asset( 'images/graphic-mountains.svg' ); ?>" alt="" width="1440" height="248" />
			</div>
			<p class="recruitment-fit__cta">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
	</section>

</main>

<?php
get_footer();
