<?php
/**
 * Txt template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$txt         = get_sub_field( 'txt' );
$footer      = get_sub_field( 'footer' );
?>

<section class="section section--white txt">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title txt__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $txt ) : ?>
			<?php foreach ( $txt as $item ) : ?>
				<div class="txt__block">
					<?php if ( $item['title'] ) : ?>
						<div class="txt__b-title" data-title="<?php echo wp_kses_post( $item['title'] ); ?>"><?php echo wp_kses_post( $item['title'] ); ?></div>
					<?php endif; ?>
					<?php if ( $item['text'] ) : ?>
						<div class="txt__b-text"><?php echo wp_kses_post( $item['text'] ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php if ( $footer && $footer['text'] ) : ?>
			<div class="txt__footer">
				<div class="txt__f-text"><?php echo wp_kses_post( $footer['text'] ); ?></div>
				<?php
				echo wp_get_attachment_image(
					$footer['img'],
					'full',
					false,
					array(
						'class' => 'txt__f-img',
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
