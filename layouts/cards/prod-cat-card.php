<?php
/**
 * Prod-cat-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

$card = $args['card'];

ob_start();

echo wp_get_attachment_image(
	$card['img'],
	'full',
	false,
	array(
		'class' => 'prod-cat-card__img',
	)
);

if ( $card['name'] ) {
	echo '<div class="prod-cat-card__name">' . wp_kses_post( $card['name'] ) . '</div>';
}

$card_content = ob_get_clean();

printf(
	'<%1$s %2$s class="prod-cat-card">%3$s</%1$s>',
	'#' === $card['link']['url'] ? 'div' : 'a',
	'#' !== $card['link']['url'] ? 'href="' . esc_url( $card['link']['url'] ) . '"' : '',
	wp_kses_post( $card_content )
);
