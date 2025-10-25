<?php
/**
 * Doc-card template.
 *
 * @package Triton
 * @since 1.0.0
 */

$card = $args['card'];
?>

<a href="<?php echo esc_url( $card['file']['url'] ); ?>" class="swiper-slide doc-card" data-fancybox="<?php echo esc_attr( 'docs_' . $args['block-id'] ); ?>">
	<span class="doc-card__name"><?php echo esc_html( $card['name'] ); ?></span>
	<span class="doc-card__link">Скачать</span>
</a>
