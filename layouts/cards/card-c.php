<?php
/**
 * Card-c template.
 *
 * @package Triton
 * @since 1.0.0
 */

$card = $args['card'];
?>

<article class="card-c">
	<a href="<?php echo esc_url( wp_get_attachment_image_url( $card['img'], 'full' ) ); ?>" class="card-c__img-link" data-fancybox>
		<?php
		echo wp_get_attachment_image(
			$card['img'],
			'medium',
			false,
			array(
				'class' => 'card-c__img',
			)
		);
		?>
	</a>
	<?php if ( $card['name'] ) : ?>
		<div class="card-c__name"><?php echo esc_html( $card['name'] ); ?></div>
	<?php endif; ?>
	<?php if ( $card['text'] ) : ?>
		<div class="card-c__text"><?php echo wp_kses_post( $card['text'] ); ?></div>
	<?php endif; ?>
</article>
