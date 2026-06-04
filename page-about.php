<?php
/**
 * About page template.
 *
 * @package BMM_Tax
 */

get_header();

$audience_cards = array(
	__( 'Own a business, medical practice or rental properties.', 'bmm-tax' ),
	__( 'Split time or have assets between two states.', 'bmm-tax' ),
	__( 'Received stock options, RSUs, or an inheritance.', 'bmm-tax' ),
	__( 'Have a revocable or irrevocable trust.', 'bmm-tax' ),
	__( 'Are starting to earn $250k+ per year.', 'bmm-tax' ),
);

$team_member = array(
	'id'          => 'allen-harris',
	'photo'       => 'images/image-allen@2x.webp',
	'name'        => 'Allen Harris',
	'credentials' => 'CEPA, CVB, CVGA',
	'title'       => 'CEO & Chief Investment Officer',
	'badges'      => array( 'CEPA', 'CVGA', 'CVB' ),
	'linkedin_url'   => 'https://www.linkedin.com/in/allenharris/',
	'linkedin_label' => 'linked-in',
	'bio_intro'   => "We can't say that Allen was born to manage money, but his interest in finance began at a very young age as investing was often a primary conversation topic between Allen and his father. His financial career began with an unpaid internship with a financial firm in 1995. Allen believes that investment portfolios shouldn't be left fully exposed to the dangers of a market crash, so in 2001, he launched BMM to help make sure his clients wouldn't run out of money in retirement. He has since helped hundreds of families build steadily toward retirement success throughout the best times and the worst.",
	'bio_extended' => array(
		"As Chief Investment Officer, Allen closely monitors markets so you don't have to, adjusting portfolios to drive growth and reduce risk. If you ask Allen, the point isn't to outpace short-term benchmarks, it's about winning in the long term by managing clients' money in a way that helps them achieve their “why”.",
		'As CEO and founder of BMM, Allen is committed to growing the business, creating a fun culture where employees love to work, and giving back to the community. Under his guidance, BMM gives more than $100,000 to local organizations and causes each year.',
		"Allen also consults with other business owners who want to maximize their company's value, beat their competition, or sell their business.",
		'Allen is passionate about animal welfare, and is an avid supporter of animal rescue, spay and neuter efforts, and local shelters. He has personally fostered scores of pets in his own house as they waited to find their forever homes.',
	),
	'education'    => 'BS, Economics, Finance, and Accounting, Massachusetts College of Liberal Arts',
	'designations' => array(
		'Certified Exit Planning Advisor',
		'Certified Value Builder™',
		'Certified Value Growth Advisor',
		'Certified Business Valuation Specialist',
	),
	'interests' => array( 'Business development', 'Increasing income', 'Avoiding taxes' ),
	'books'     => array(
		'Build It, Sell it, Profit: Taking Care Of Business Today To Get Top Dollar When You Retire',
		"Don't Run out of Money in Retirement: How to Increase Income, Avoid Taxes, and Keep More of What is Yours",
	),
);

// Two cards at launch; duplicate until a second member is added.
$team_cards = array( $team_member, $team_member );
?>

<main id="primary" class="site-main page-about">

	<section class="alignfull page-hero">
		<div class="alignwide page-hero__inner">
			<h1 class="page-hero__title">
				<span class="page-hero__title-split">
					<span class="page-hero__title-line"><?php esc_html_e( 'We get your return right,', 'bmm-tax' ); ?></span>
					<span class="page-hero__title-line page-hero__title-line--2"><?php esc_html_e( 'keep you in the loop,', 'bmm-tax' ); ?></span>
					<span class="page-hero__title-line page-hero__title-line--3"><?php esc_html_e( 'pick up when you call…', 'bmm-tax' ); ?></span>
				</span>
			</h1>
			<div class="page-hero__lede-block">
				<p><?php esc_html_e( 'Then, with Berkshire Money Management, help you cut your tax bill as low as possible in the future.', 'bmm-tax' ); ?></p>
				<p><?php esc_html_e( 'We work with you both in-person and virtually.', 'bmm-tax' ); ?></p>
			</div>
			<p class="page-hero__cta">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
		<div class="page-hero__art" aria-hidden="true">
			<img class="page-hero__cloud page-hero__cloud--3 page-hero__cloud--left" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-3.webp' ); ?>" alt="" width="291" height="56" />
			<div class="page-hero__sun-group">
				<img class="page-hero__sun" src="<?php echo bmm_tax_asset( 'images/graphic-dotted-circle-orange.webp' ); ?>" alt="" width="501" height="502" />
				<img class="page-hero__cloud page-hero__cloud--5" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-5.webp' ); ?>" alt="" width="77" height="10" />
				<img class="page-hero__cloud page-hero__cloud--2" src="<?php echo bmm_tax_asset( 'images/graphic-cloud-2.webp' ); ?>" alt="" width="318" height="14" />
			</div>
		</div>
		<div class="page-hero__mountains" aria-hidden="true">
			<img src="<?php echo bmm_tax_asset( 'images/graphic-mountains.svg' ); ?>" alt="" width="1440" height="248" />
		</div>
	</section>

	<section class="alignfull audience-section">
		<div class="alignwide audience-section__inner animate-on-scroll">
			<h2 class="audience-section__title"><?php esc_html_e( 'Who this is for', 'bmm-tax' ); ?></h2>
			<p class="audience-section__intro"><?php esc_html_e( 'If any of the following apply to you...', 'bmm-tax' ); ?></p>
			<div class="audience-cards">
				<?php
				$audience_rows = array(
					array_slice( $audience_cards, 0, 3 ),
					array_slice( $audience_cards, 3 ),
				);
				foreach ( $audience_rows as $row_index => $row_cards ) :
					$row_class = 0 === $row_index ? 'audience-cards__row--top' : 'audience-cards__row--bottom';
					?>
					<div class="audience-cards__row <?php echo esc_attr( $row_class ); ?>">
						<?php foreach ( $row_cards as $card ) : ?>
							<article class="audience-card">
								<p><?php echo esc_html( $card ); ?></p>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<div class="about-team-band alignfull animate-on-scroll">
	<section class="page-mid-cta">
		<div class="alignwide page-mid-cta__inner">
			<h2 class="page-mid-cta__title"><?php esc_html_e( 'You\'re the type of person who gets the most from what we do.', 'bmm-tax' ); ?></h2>
			<p class="page-mid-cta__cta">
				<?php bmm_tax_button_primary( __( 'GET IN TOUCH', 'bmm-tax' ), home_url( '/contact/' ) ); ?>
			</p>
		</div>
	</section>

	<section class="team-section animate-on-scroll">
		<div class="alignwide">
			<h2 class="section-title"><?php esc_html_e( 'Meet the team', 'bmm-tax' ); ?></h2>
			<div class="team-grid">
				<?php foreach ( $team_cards as $member ) : ?>
					<div class="team-card-wrap">
						<article class="team-card">
							<figure class="team-card__photo">
								<img src="<?php echo bmm_tax_asset( $member['photo'] ); ?>"
									alt="<?php echo esc_attr( $member['name'] ); ?>"
									width="301" height="315" />
							</figure>
							<div class="team-card__overlay">
								<div class="team-card__badges">
									<?php foreach ( $member['badges'] as $badge ) : ?>
										<span><?php echo esc_html( $badge ); ?></span>
									<?php endforeach; ?>
								</div>
								<h3 class="team-card__name"><?php echo esc_html( $member['name'] ); ?></h3>
								<p class="team-card__title"><?php echo esc_html( $member['title'] ); ?></p>
							</div>
						</article>
						<button class="team-card__bio-btn"
							data-bio-target="bio-<?php echo esc_attr( $member['id'] ); ?>"
							aria-haspopup="dialog">
							<?php esc_html_e( 'READ BIO', 'bmm-tax' ); ?>
							<?php echo bmm_tax_arrow_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</button>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="alignfull about-story">
	<!--
	<div class="about-story__photo">
		<img src="<?php echo bmm_tax_asset( 'images/about-subfooter-bg.webp' ); ?>" alt="" />
	</div>
	-->
	<div class="about-story__content animate-on-scroll">
		<h2 class="about-story__title"><?php esc_html_e( 'About BMM Tax', 'bmm-tax' ); ?></h2>
		<p><?php esc_html_e( 'BMM Tax collaborates with Berkshire Money Management — an investment and financial planning firm that\'s served the Berkshires for over 25 years. BMM created BMM Tax to be the tax planning firm they wanted for themselves.', 'bmm-tax' ); ?></p>
		<p><?php esc_html_e( 'Now, between the two, we\'re happy to help all our Berkshire neighbors get their returns done right and avoid unnecessary taxes… with tax professionals who actually call back.', 'bmm-tax' ); ?></p>
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

	</div><!-- .about-team-band -->

</main>

<?php
bmm_tax_team_bio_modal( $team_member );
get_footer();
