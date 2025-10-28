<?php
/**
 * Variants template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$variants    = get_sub_field( 'variants' );
?>

<section class="section section--white variants">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title variants__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $variants ) : ?>
			<?php foreach ( $variants as $item ) : ?>
				<div class="variants__item">
					<?php
					echo wp_get_attachment_image(
						$item['img'],
						'large',
						false,
						array(
							'class' => 'variants__img',
						)
					);
					?>
					<?php if ( $item['name'] ) : ?>
						<div class="variants__name"><?php echo esc_html( $item['name'] ); ?></div>
					<?php endif; ?>
					<?php if ( $item['text'] ) : ?>
						<div class="variants__text"><?php echo wp_kses_post( $item['text'] ); ?></div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
