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
	<?php
	echo wp_get_attachment_image(
		$card['img'],
		'full',
		false,
		array(
			'class' => 'card-c__img',
		)
	);
	?>
	<?php if ( $card['name'] ) : ?>
		<div class="card-c__name"><?php echo esc_html( $card['name'] ); ?></div>
	<?php endif; ?>
	<?php if ( $card['text'] ) : ?>
		<div class="card-c__text"><?php echo wp_kses_post( $card['text'] ); ?></div>
	<?php endif; ?>
</article>
