<?php
/**
 * Faq template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$faq         = get_sub_field( 'faq' );
?>

<section class="section section--white faq">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title faq__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $faq ) : ?>
			<ul class="reset-list faq__list js-accord">
				<?php foreach ( $faq as $item ) : ?>
					<li class="faq__item">
						<div class="faq__i-question js-accord-name">
							<?php echo esc_html( $item['question'] ); ?>
							<div class="faq__i-btn">
								<svg width="20" height="20" class="faq__i-icon">
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
								</svg>
							</div>
						</div>
						<div class="faq__i-answer">
							<div class="faq__i-inner">
								<div class="faq__i-caption">Ответ</div>
								<div class="faq__i-text"><?php echo wp_kses_post( $item['answer'] ); ?></div>
								<?php if ( $item['gallery'] ) : ?>
									<div class="faq__i-gallery">
										<?php foreach ( $item['gallery'] as $img_id ) : ?>
											<a href="<?php echo esc_url( wp_get_attachment_image_url( $img_id, 'full' ) ); ?>" class="faq__i-link">
												<?php
												echo wp_kses_post(
													adem_dynamic_thumbnail(
														$img_id,
														160,
														150,
														true,
														array(
															'class' => 'faq__i-img',
														)
													)
												);
												?>
											</a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
