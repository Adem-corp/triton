<?php
/**
 * Products template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$products    = get_sub_field( 'products' );
?>

<section class="products">
	<div class="products__wrap">
		<div class="container">
			<?php if ( $block_title ) : ?>
				<h2 class="title products__title"><?php echo wp_kses_post( $block_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $products ) : ?>
				<div class="products__body">
					<div class="swiper">
						<div class="swiper-wrapper">
							<?php
							foreach ( $products as $post ) {
								setup_postdata( $post );

								get_template_part(
									'layouts/cards/prod-card',
									null,
									array(
										'class' => 'swiper-slide',
									)
								);
							}

							wp_reset_postdata();
							?>
						</div>
					</div>
					<div class="swiper-pagination"></div>
					<div class="products__nav">
						<div class="products__count"></div>
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
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
