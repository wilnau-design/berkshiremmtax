<?php
/**
 * List item for search, archives, and blog index.
 *
 * @package BMM_Tax
 */

$post_type_object = get_post_type_object( get_post_type() );
$post_type_label  = $post_type_object ? $post_type_object->labels->singular_name : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list-item' ); ?>>
	<header class="post-list-item__header">
		<?php if ( is_search() && $post_type_label ) : ?>
			<p class="post-list-item__type"><?php echo esc_html( $post_type_label ); ?></p>
		<?php endif; ?>
		<?php
		the_title(
			sprintf(
				'<h2 class="entry-title"><a href="%s" rel="bookmark">',
				esc_url( get_permalink() )
			),
			'</a></h2>'
		);
		?>
	</header>
	<?php if ( has_excerpt() || get_the_content() ) : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php endif; ?>
</article>
