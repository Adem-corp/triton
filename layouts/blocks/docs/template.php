<?php
/**
 * Docs template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$docs        = get_sub_field( 'docs' );
?>

<section class="section section--white docs">
	<div class="container docs__container">
		<?php if ( $block_title ) : ?>
			<h2 class="title docs__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $docs ) : ?>
			<div class="docs__slider">
				<div class="swiper">
					<div class="swiper-wrapper">
						<?php
						foreach ( $docs as $item ) {
							get_template_part(
								'layouts/cards/doc-card',
								null,
								array(
									'card'     => $item,
									'block-id' => $args['block_id'],
								)
							);
						}
						?>
					</div>
				</div>
			</div>
			<div class="arrows">
				<button class="arrow arrow--prev" type="button">
					<svg width="17" height="16">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-prev' ); ?>"></use>
					</svg>
				</button>
				<button class="arrow arrow--next" type="button">
					<svg width="17" height="16">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-next' ); ?>"></use>
					</svg>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>
