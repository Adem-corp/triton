<?php
/**
 * Card-d template.
 *
 * @package Triton
 * @since 1.0.0
 */

$card = $args['card'];
?>

<article class="card-d">
	<figure class="card-d__figure">
		<?php
		echo wp_get_attachment_image(
			$card['img'],
			'full',
			false,
			array(
				'class' => 'card-d__img',
			)
		);
		?>
		<?php if ( $card['caption'] ) : ?>
			<div class="card-d__caption"><?php echo wp_kses_post( $card['caption'] ); ?></div>
		<?php endif; ?>
	</figure>
	<?php
	if ( $card['name'] ) {
		printf(
			'<%1$s %2$s class="card-d__name">%3$s</%1$s>',
			$card['link'] && $card['link']['url'] ? 'a' : 'div',
			$card['link'] && $card['link']['url'] ? 'href="' . esc_url( $card['link']['url'] ) . '"' : '',
			wp_kses_post( $card['name'] )
		);
	}
	?>
	<?php if ( $card['text'] ) : ?>
		<div class="card-d__text"><?php echo wp_kses_post( $card['text'] ); ?></div>
	<?php endif; ?>
</article>
