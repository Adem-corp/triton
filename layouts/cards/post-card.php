<?php
/**
 * Post-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

$class  = 'post-card';
$class .= isset( $args['class'] ) ? " {$args['class']}" : '';
?>

<article class="<?php echo esc_attr( $class ); ?>">
	<?php
	$excerpt = get_the_excerpt();

	echo wp_kses_post(
		adem_dynamic_thumbnail(
			get_post_thumbnail_id(),
			340,
			340,
			true,
			array(
				'class' => 'post-card__img',
			)
		)
	);
	?>
	<div class="post-card__body">
		<div class="post-card__title"><?php the_title(); ?></div>
		<?php if ( $excerpt ) : ?>
			<div class="post-card__text"><?php echo esc_html( adem_excerpt( $excerpt, 100 ) ); ?></div>
		<?php endif; ?>
	</div>
	<a href="<?php the_permalink(); ?>" class="post-card__btn">ЧИТАТЬ СТАТЬЮ</a>
</article>
