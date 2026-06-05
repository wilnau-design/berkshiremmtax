<?php
/**
 * Front page template.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main front-page">

	<section class="alignfull hero">
		<div class="hero__illustration-wrap" aria-hidden="true">
			<picture>
				<source media="(min-width: 901px)" srcset="<?php echo bmm_tax_asset( 'images/hero-illustration.webp' ); ?>" type="image/webp" width="1440" height="520" />
				<img
					class="hero__illustration"
					src="<?php echo bmm_tax_asset( 'images/hero-illustration-mobile.webp' ); ?>"
					alt=""
					width="768"
					height="280"
					fetchpriority="high"
					decoding="async"
				/>
			</picture>
		</div>
		<div class="alignwide hero__inner">
			<h1 class="hero__title<?php echo wp_is_mobile() ? ' hero__title--mobile' : ' hero__title--desktop'; ?>">
				<?php if ( wp_is_mobile() ) : ?>
					<span class="hero__title-default"><?php esc_html_e( 'Get accurate tax filing today, and a plan to pay less tomorrow.', 'bmm-tax' ); ?></span>
				<?php else : ?>
					<span class="hero__title-split">
						<span class="hero__title-line hero__title-line--start"><?php esc_html_e( 'Get accurate tax filing today', 'bmm-tax' ); ?></span>
						<span class="hero__title-line hero__title-line--end"><?php esc_html_e( 'and a plan to pay less tomorrow.', 'bmm-tax' ); ?></span>
					</span>
				<?php endif; ?>
			</h1>
			<p class="hero__lede"><?php esc_html_e( 'BMM Tax gets your return right, picks up when you call, and works with Berkshire Money Management to shrink your tax bill.', 'bmm-tax' ); ?></p>
			<p class="hero__cta">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
	</section>

	<section class="alignfull why-section">
		<div class="alignwide why-section__inner animate-on-scroll">
			<h2 class="why-section__title"><?php esc_html_e( 'Why hard-working Berkshire families choose BMM Tax', 'bmm-tax' ); ?></h2>
			<div class="why-section__cards">
				<blockquote class="quote-card">
					<p><?php esc_html_e( 'If you own a business, multiple properties, have rental income, or your return involves more than a W-2…', 'bmm-tax' ); ?></p>
				</blockquote>
				<blockquote class="quote-card">
					<p><?php esc_html_e( 'You\'re familiar with how that tax bill stings. But is anyone actually working to lower that number?', 'bmm-tax' ); ?></p>
				</blockquote>
			</div>
			<p class="why-section__text"><?php esc_html_e( 'BMM Tax works with Berkshire Money Management to plan ahead and keep more of your hard-earned money out of the IRS\'s pocket.', 'bmm-tax' ); ?></p>
			<p class="why-section__cta">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
	</section>

	<section class="alignfull services-band">
		<div class="alignwide">
			<div class="animate-on-scroll">
			<h2 class="section-title"><?php esc_html_e( 'What we do', 'bmm-tax' ); ?></h2>
			<div class="folder-cards">
				<?php
				bmm_tax_folder_card(
					__( 'Tax preparation', 'bmm-tax' ),
					__( 'Your tax return done right by a team growing with you.', 'bmm-tax' ),
					'graphic-cabinet.webp'
				);
				bmm_tax_folder_card(
					__( 'Bookkeeping', 'bmm-tax' ),
					__( 'Clean books year-round, so nothing surprises you in April.', 'bmm-tax' ),
					'graphic-notebook.webp'
				);
				bmm_tax_folder_card(
					__( 'Tax planning', 'bmm-tax' ),
					__( 'Working with Berkshire Money Management to shrink your lifetime tax liability.', 'bmm-tax' ),
					'graphic-calendar.webp'
				);
				?>
			</div>
			</div>

			<div class="animate-on-scroll">
			<h2 class="section-title section-title--spaced"><?php esc_html_e( 'What we DON\'T do', 'bmm-tax' ); ?></h2>
			<div class="folder-cards">
				<?php
				bmm_tax_folder_card(
					__( 'Simple returns', 'bmm-tax' ),
					__( 'If your taxes take 20 minutes on TurboTax, you don\'t need us.', 'bmm-tax' ),
					'graphic-hourglass.webp',
					'dont'
				);
				bmm_tax_folder_card(
					__( 'Audits, review, or compilation', 'bmm-tax' ),
					__( 'We focus on getting your return right and your future tax bill down.', 'bmm-tax' ),
					'graphic-magnifyingglass.webp',
					'dont'
				);
				bmm_tax_folder_card(
					__( 'Set it and forget it', 'bmm-tax' ),
					__( 'We\'re not the firm that files your return and disappears until next year.', 'bmm-tax' ),
					'graphic-airplane.webp',
					'dont'
				);
				?>
			</div>
			</div>
		</div>
	</section>

	<section class="alignfull story-photo">
		<div class="story-photo__clouds" aria-hidden="true">
			<img class="story-photo__cloud story-photo__cloud--top-left" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-1.webp' ); ?>" alt="" width="216" height="48" />
		</div>
		<div class="story-photo__cta">
			<div class="alignwide story-photo__cta-inner animate-on-scroll">
				<h2 class="story-photo__mid-title"><?php esc_html_e( 'Ready for a tax team that actually picks up the phone?', 'bmm-tax' ); ?></h2>
				<p class="story-photo__mid-button">
					<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
				</p>
			</div>
		</div>
		<div class="story-photo__image">
			<img class="story-photo__cloud story-photo__cloud--horizon" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-4.webp' ); ?>" alt="" width="347" height="57" aria-hidden="true" />
			<div class="story-photo__overlay">
				<div class="alignwide story-photo__about animate-on-scroll">
					<p class="about-banner__eyebrow"><?php esc_html_e( 'About BMM Tax', 'bmm-tax' ); ?></p>
					<h2 class="about-banner__title"><?php esc_html_e( 'We built the tax firm we wanted for ourselves…', 'bmm-tax' ); ?></h2>
					<div class="about-banner__collab">
						<img class="about-banner__collab-logo" src="<?php echo bmm_tax_asset( 'images/logo-BMM-white.svg' ); ?>" alt="" width="43" height="39" />
						<p>
							<?php esc_html_e( 'IN COLLABORATION WITH', 'bmm-tax' ); ?>
							<span><?php esc_html_e( 'BERKSHIRE MONEY MANAGEMENT', 'bmm-tax' ); ?></span>
						</p>
					</div>
					<p class="about-banner__cta">
						<?php bmm_tax_button_primary( __( 'LEARN THE STORY', 'bmm-tax' ), home_url( '/about/' ) ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="alignfull cta-card-section">
		<div class="alignwide">
			<div class="cta-card">
				<h2 class="cta-card__title"><?php esc_html_e( 'Want to avoid as much tax as possible?', 'bmm-tax' ); ?></h2>
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
