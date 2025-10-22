<?php
/**
 * Offer-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

$card = $args['card'];

ob_start();

echo wp_get_attachment_image(
	$card['bg'],
	'full',
	false,
	array(
		'class' => 'offer-card__img',
	)
);

$card_content = ob_get_clean();

printf(
	'<%1$s %2$s class="offer-card">%3$s</%1$s>',
	$card['link'] && $card['link']['url'] ? 'a' : 'div',
	$card['link'] && $card['link']['url'] ? 'href="' . esc_url( $card['link']['url'] ) . '"' : '',
	wp_kses_post( $card_content )
);
