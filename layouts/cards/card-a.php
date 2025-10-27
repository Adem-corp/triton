<?php
/**
 * Card-a template.
 *
 * @package Triton
 * @since 1.0.0
 */

$scheme  = get_field( 'scheme' );
$gallery = get_field( 'gallery' );
?>

<article class="card-a">
	<?php if ( $scheme ) : ?>
		<a href="<?php echo esc_url( wp_get_attachment_image_url( $scheme, 'full' ) ); ?>" class="card-a__scheme" data-fancybox>
			<?php
			echo wp_get_attachment_image(
				$scheme,
				'medium',
				false,
				array(
					'class' => 'card-a__s-img',
				)
			);
			?>
		</a>
	<?php endif; ?>
	<div class="card-a__body">
		<a href="<?php the_permalink(); ?>" class="card-a__title"><?php the_title(); ?></a>
		<?php if ( get_the_excerpt() ) : ?>
			<div class="card-a__caption"><?php echo esc_html( get_the_excerpt() ); ?></div>
		<?php endif; ?>
	</div>
	<?php if ( $gallery ) : ?>
		<div class="card-a__slider">
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $gallery as $img ) : ?>
						<a href="<?php echo esc_url( wp_get_attachment_image_url( $img, 'full' ) ); ?>" class="swiper-slide card-a__slide" data-fancybox="<?php echo esc_attr( 'card-a_' . get_the_ID() ); ?>">
							<?php
							echo wp_get_attachment_image(
								$img,
								'thumbnail',
								false,
								array(
									'class' => 'card-a__g-img',
								)
							);
							?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	<?php endif; ?>
</article>
