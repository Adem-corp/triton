<?php
/**
 * News-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

?>

<a href="<?php the_permalink(); ?>" class="news-card">
	<?php
	$excerpt = get_the_excerpt();

	echo wp_kses_post(
		adem_dynamic_thumbnail(
			get_post_thumbnail_id(),
			340,
			340,
			true,
			array(
				'class' => 'news-card__img',
			)
		)
	);
	?>
	<div class="news-card__body">
		<time class="news-card__date">
			<span class="news-card__d"><?php echo esc_html( get_the_date( 'd', get_the_ID() ) ); ?></span>
			<span class="news-card__my"><?php echo esc_html( get_the_date( 'F Y', get_the_ID() ) ); ?></span>
		</time>
		<div class="news-card__title"><?php the_title(); ?></div>
		<?php if ( $excerpt ) : ?>
			<div class="news-card__text"><?php echo esc_html( adem_excerpt( $excerpt, 150 ) ); ?></div>
		<?php endif; ?>
	</div>
</a>
