<?php
/**
 * Single post content partial.
 *
 * @package BMM_Tax
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'aligncontent' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<?php if ( has_post_thumbnail() ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'large' ); ?>
		</figure>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
