<?php
/**
 * Cta template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$subtitle    = get_sub_field( 'subtitle' );
$btn_text    = get_sub_field( 'btn-text' );
$img         = get_sub_field( 'img' );
?>

<section class="section section--white cta">
	<div class="container cta__container">
		<div class="cta__body">
			<?php if ( $block_title ) : ?>
				<h2 class="title cta__title"><?php echo wp_kses_post( $block_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $subtitle ) : ?>
				<div class="cta__subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
			<?php endif; ?>
			<button class="submit-btn cta__btn" type="button" data-src="modal-call" data-fancybox>
				<span class="submit-btn__text"><?php echo esc_html( $btn_text ); ?></span>
				<span class="submit-btn__icon">
					<svg width="20" height="20">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
					</svg>
				</span>
			</button>
		</div>
		<?php if ( $img ) : ?>
			<figure class="cta__figure">
				<?php
				echo wp_get_attachment_image(
					$img,
					'full',
					false,
					array(
						'class' => 'cta__img',
					)
				);
				?>
			</figure>
		<?php endif; ?>
	</div>
</section>
