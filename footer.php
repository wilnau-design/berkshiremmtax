	<footer id="colophon" class="site-footer alignfull">
		<div class="alignwide site-footer__inner">
			<?php get_template_part( 'template-parts/header/site-branding', null, array( 'footer' => true ) ); ?>

			<div class="site-footer__grid">
				<div class="site-footer__column">
					<h2 class="site-footer__heading"><?php esc_html_e( 'BMM TAX OFFICE', 'bmm-tax' ); ?></h2>
					<p>
						<a href="https://maps.google.com/maps?q=161+North+Street+Suite+202+Pittsfield+MA+01201" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( '161 North Street, Suite 202', 'bmm-tax' ); ?><br><?php esc_html_e( 'Pittsfield, MA 01201', 'bmm-tax' ); ?>
						</a>
					</p>
					<h2 class="site-footer__heading"><?php esc_html_e( 'BMM TAX NEW OFFICE', 'bmm-tax' ); ?></h2>
					<p>
						<a href="https://maps.google.com/maps?q=72+Stockbridge+Road+Great+Barrington+MA+01230" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( '72 Stockbridge Road', 'bmm-tax' ); ?><br><?php esc_html_e( 'Great Barrington, MA 01230', 'bmm-tax' ); ?>
						</a>
					</p>
				</div>

				<div class="site-footer__column">
					<h2 class="site-footer__heading"><?php esc_html_e( 'BMM OFFICES', 'bmm-tax' ); ?></h2>
					<p>
						<a href="https://maps.google.com/maps?q=68+Main+Street+Lenox+MA+01240" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( '68 Main Street', 'bmm-tax' ); ?><br><?php esc_html_e( 'Lenox, MA 01240', 'bmm-tax' ); ?>
						</a>
					</p>
					<p>
						<a href="https://maps.google.com/maps?q=136+Water+Street+Williamstown+MA+01267" target="_blank" rel="noopener noreferrer">
							<?php esc_html_e( '136 Water Street', 'bmm-tax' ); ?><br><?php esc_html_e( 'Williamstown, MA 01267', 'bmm-tax' ); ?>
						</a>
					</p>
				</div>

				<div class="site-footer__column site-footer__column--contact">
					<ul class="site-footer__contact">
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-telephone.svg' ); ?>" alt="" width="16" height="16" />
							<a href="tel:+14132364000">(413) 236-4000</a>
						</li>
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-mail.svg' ); ?>" alt="" width="16" height="16" />
							<a href="mailto:admin-p@berkshiremmtax.com">admin-p@berkshiremmtax.com</a>
						</li>
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-facebook.svg' ); ?>" alt="" width="16" height="16" />
							<a href="https://facebook.com/" target="_blank" rel="noopener noreferrer">/facebook</a>
						</li>
						<li>
							<img src="<?php echo bmm_tax_asset( 'images/icon-linkedin.svg' ); ?>" alt="" width="16" height="16" />
							<a href="https://linkedin.com/" target="_blank" rel="noopener noreferrer">/linked-in</a>
						</li>
					</ul>
				</div>

				<div class="site-footer__column site-footer__links">
					<div>
						<h2 class="site-footer__heading"><?php esc_html_e( 'MORE FROM US', 'bmm-tax' ); ?></h2>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/recruitment/' ) ); ?>"><?php esc_html_e( 'Recruitment', 'bmm-tax' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'bmm-tax' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'bmm-tax' ); ?></a></li>
						</ul>
					</div>
					<div>
						<h2 class="site-footer__heading"><?php esc_html_e( 'LEGAL', 'bmm-tax' ); ?></h2>
						<ul>
							<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'bmm-tax' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/disclosures/' ) ); ?>"><?php esc_html_e( 'Disclosures', 'bmm-tax' ); ?></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="site-footer__bottom">
				<p class="site-info">
					&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php esc_html_e( 'BMM Tax LLC | All rights reserved.', 'bmm-tax' ); ?>
				</p>
				<p class="site-footer__credit"><?php esc_html_e( 'Made with', 'bmm-tax' ); ?> <span aria-hidden="true">&hearts;</span> <?php esc_html_e( 'by Wilnau Design', 'bmm-tax' ); ?></p>
			</div>

			<p class="site-footer__disclaimer">
				<?php esc_html_e( 'All investment advice and recommendations are provided through Berkshire Money Management Inc.', 'bmm-tax' ); ?>
			</p>
		</div>
	</footer>

	<button type="button" class="scroll-top" aria-label="<?php esc_attr_e( 'Back to top', 'bmm-tax' ); ?>" hidden>
		<svg width="25" height="25" viewBox="0 0 25 25" fill="none" aria-hidden="true"><path d="M12.25 1.25V23.25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.25 12.25L12.25 1.25L23.25 12.25" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
	</button>

<?php wp_footer(); ?>
</body>
</html>
