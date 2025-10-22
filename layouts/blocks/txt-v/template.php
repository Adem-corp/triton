<?php
/**
 * Txt-v template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$text        = get_sub_field( 'text' );
$video       = get_sub_field( 'video' );
?>

<section class="section section--white txt-v">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title txt-v__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $text ) : ?>
			<div class="txt-v__body">
				<div class="txt-v__text"><?php echo wp_kses_post( $text ); ?></div>
				<?php if ( $video['img'] ) : ?>
					<a href="<?php echo esc_url( $video[ $video['type'] ] ); ?>" class="txt-v__video" data-fancybox>
						<?php
						echo wp_kses_post(
							adem_dynamic_thumbnail(
								$video['img'],
								515,
								495,
								true,
								array(
									'class' => 'txt-v__img',
								)
							)
						);
						?>
						<div class="txt-v__btn">
							<svg width="22" height="19" class="txt-v__icon">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-play' ); ?>"></use>
							</svg>
						</div>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
