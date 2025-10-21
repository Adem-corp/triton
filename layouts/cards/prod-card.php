<?php
/**
 * Prod-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

$class    = 'prod-card';
$class   .= isset( $args['class'] ) ? " {$args['class']}" : '';
$caption  = get_field( 'caption' );
$badge    = get_field( 'badge' );
$discount = get_field( 'discount' );
?>

<article class="<?php echo esc_attr( $class ); ?>">
	<div class="prod-card__header">
		<div class="prod-card__info">
			<div class="prod-card__title"><?php the_title(); ?></div>
			<?php if ( $caption ) : ?>
				<div class="prod-card__caption"><?php echo wp_kses_post( $caption ); ?></div>
			<?php endif; ?>
		</div>
		<?php if ( $badge || $discount ) : ?>
			<div class="prod-card__promo">
				<?php if ( $badge ) : ?>
					<div class="prod-card__badge"><?php echo esc_html( $badge ); ?></div>
				<?php endif; ?>
				<!--				TODO переделать на автоматический расчет скидки-->
				<?php if ( $discount ) : ?>
					<div class="prod-card__discount"><?php echo esc_html( $discount ); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
	<?php
	the_post_thumbnail(
		'full',
		array(
			'class' => 'prod-card__img',
		)
	);
	?>
	<a href="<?php the_permalink(); ?>" class="prod-card__btn">Подробнее</a>
</article>
