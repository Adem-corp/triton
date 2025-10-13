<?php
/**
 * Articles template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$articles    = get_sub_field( 'posts' );
?>

<section class="articles">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title articles__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $articles ) : ?>
			<div class="articles__body">
				<div class="swiper">
					<div class="swiper-wrapper">
						<?php
						foreach ( $articles as $post ) {
							setup_postdata( $post );

							get_template_part(
								'layouts/cards/post-card',
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
			</div>
		<?php endif; ?>
	</div>
</section>
