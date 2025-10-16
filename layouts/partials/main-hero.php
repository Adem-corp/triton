<?php
/**
 * Main-hero template
 *
 * @package Triton
 * @since 1.0.0
 */

$slider = get_field( 'hero-sl' );
$video  = get_field( 'video' );
?>

<?php if ( $slider ) : ?>
	<section class="main-hero">
		<div class="main-hero__slider">
			<div class="swiper">
				<div class="swiper-wrapper">
					<?php foreach ( $slider as $item ) : ?>
						<div class="swiper-slide main-hero__slide">
							<div class="container main-hero__container">
								<div class="main-hero__content">
									<?php if ( $item['title'] ) : ?>
										<div class="main-hero__title"><?php echo wp_kses_post( $item['title'] ); ?></div>
									<?php endif; ?>
									<div class="main-hero__body">
										<figure class="main-hero__figure">
											<?php
											echo wp_kses_post(
												adem_dynamic_thumbnail(
													$item['img'],
													200,
													200,
													true,
													array(
														'class' => 'main-hero__img',
													)
												)
											);
											?>
										</figure>
										<div class="main-hero__info">
											<?php if ( $item['subtitle'] ) : ?>
												<div class="main-hero__subtitle"><?php echo wp_kses_post( $item['subtitle'] ); ?></div>
											<?php endif; ?>
											<button class="submit-btn main-hero__btn" type="button">
												<span class="submit-btn__text">ОФОРМИТЬ ЗАЯВКУ</span>
												<span class="submit-btn__icon">
													<svg width="20" height="20">
														<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
													</svg>
												</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="main-hero__bg" style="background-image: linear-gradient(to top, rgba(0,0,0, 0.3), rgba(0,0,0, 0.3)), url(<?php echo esc_url( $item['bg'] ); ?>);"></div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if ( count( $slider ) > 1 ) : ?>
				<div class="main-hero__footer">
					<div class="container main-hero__footer-container">
						<ul class="reset-list main-hero__nav js-main-hero-nav">
							<?php foreach ( $slider as $key => $item ) : ?>
								<li class="main-hero__nav-item">
									<button class="main-hero__nav-btn<?php echo esc_attr( 0 === $key ? ' active' : '' ); ?>" type="button" data-index="<?php echo esc_attr( $key ); ?>"><?php echo wp_kses_post( $item['title'] ); ?></button>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
			<div class="swiper-pagination main-hero__pagination"></div>
		</div>
		<?php if ( $video['img'] ) : ?>
			<a href="<?php echo esc_url( $video[ $video['type'] ] ); ?>" class="main-hero__video" data-fancybox>
				<?php
				echo wp_get_attachment_image(
					$video['img'],
					'full',
					false,
					array(
						'class' => 'main-hero__video-img',
					)
				);
				?>
				<div class="main-hero__video-btn">
					<svg width="32" height="36" class="main-hero__video-icon">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-play' ); ?>"></use>
					</svg>
				</div>
			</a>
		<?php endif; ?>
	</section>
<?php endif; ?>
