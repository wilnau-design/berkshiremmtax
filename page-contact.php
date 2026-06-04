<?php
/**
 * Contact page template.
 *
 * @package BMM_Tax
 */

get_header();
?>

<main id="primary" class="site-main page-contact">

	<div class="page-contact__scene">
		<div class="page-contact__clouds" aria-hidden="true">
			<img class="page-contact__cloud page-contact__cloud--left" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-1.webp' ); ?>" alt="" width="144" height="32" />
			<img class="page-contact__cloud page-contact__cloud--right" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-1.webp' ); ?>" alt="" width="265" height="17" />
		</div>

		<section class="alignfull contact-hero">
			<div class="alignwide contact-hero__inner">
				<h1 class="contact-hero__title"><?php esc_html_e( 'Contact BMM Tax', 'bmm-tax' ); ?></h1>
				<p class="contact-hero__subtitle"><?php esc_html_e( 'Just fill it in and hit \'Submit\'', 'bmm-tax' ); ?></p>
			</div>
		</section>
	</div>

	<section class="alignfull contact-card-section">
		<div class="alignwide">
			<div class="contact-card">
				<div class="contact-card__info">
					<ul class="contact-details">
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-pin.svg' ); ?>" alt="" width="20" height="20" />
							<div>
								<strong><?php esc_html_e( 'BMM TAX, LLC', 'bmm-tax' ); ?></strong><br>
								<a href="https://maps.google.com/maps?q=72+Stockbridge+Road+Great+Barrington+MA+01230" target="_blank" rel="noopener noreferrer">
									<?php esc_html_e( '72 Stockbridge Road,', 'bmm-tax' ); ?><br>
									<?php esc_html_e( 'Great Barrington, MA 01230', 'bmm-tax' ); ?>
								</a>
							</div>
						</li>
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-telephone.svg' ); ?>" alt="" width="20" height="20" />
							<a href="tel:+14132009007">(413) 200-9007</a>
						</li>
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-mail.svg' ); ?>" alt="" width="20" height="20" />
							<a href="mailto:advisor@berkshiremmtax.com">advisor@berkshiremmtax.com</a>
						</li>
					</ul>
					<div class="contact-map">
						<iframe
							title="<?php esc_attr_e( 'BMM Tax office location', 'bmm-tax' ); ?>"
							src="https://maps.google.com/maps?q=72+Stockbridge+Road+Great+Barrington+MA+01230&amp;output=embed"
							width="100%"
							height="308"
							style="border:0;"
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade"
						></iframe>
					</div>
				</div>

				<div class="contact-card__form">
					<?php bmm_tax_render_contact_form(); ?>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
