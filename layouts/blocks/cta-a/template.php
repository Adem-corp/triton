<?php
/**
 * Cta-a template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$subtitle    = get_sub_field( 'subtitle' );
$btn_text    = get_sub_field( 'btn-text' );
$img         = get_sub_field( 'img' );
$bg          = get_sub_field( 'bg' );
?>

<section class="<?php echo esc_attr( 'section section--' . $bg . ' cta-a' ); ?>">
	<div class="container cta-a__container">
		<div class="cta-a__body">
			<?php if ( $block_title ) : ?>
				<h2 class="title cta-a__title"><?php echo wp_kses_post( $block_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $subtitle ) : ?>
				<div class="cta-a__subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
			<?php endif; ?>
			<!--			TODO modal-->
			<button class="submit-btn cta-a__btn" type="button" data-fancybox>
				<span class="submit-btn__text"><?php echo esc_html( $btn_text ); ?></span>
				<span class="submit-btn__icon">
					<svg width="20" height="20">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
					</svg>
				</span>
			</button>
		</div>
		<?php if ( $img ) : ?>
			<figure class="cta-a__figure">
				<?php
				echo wp_get_attachment_image(
					$img,
					'full',
					false,
					array(
						'class' => 'cta-a__img',
					)
				);
				?>
			</figure>
		<?php endif; ?>
	</div>
</section>
