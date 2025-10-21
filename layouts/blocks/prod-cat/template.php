<?php
/**
 * Prod-cat template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title  = get_sub_field( 'title' );
$second_title = get_sub_field( 'second-title' );
$subtitle     = get_sub_field( 'subtitle' );
$categories   = get_sub_field( 'categories' );
?>

<section class="prod-cat">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title prod-cat__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $categories ) : ?>
			<div class="prod-cat__grid">
				<?php foreach ( $categories as $key => $item ) : ?>
					<?php if ( $second_title && 8 === $key ) : ?>
						<div class="prod-cat__second">
							<h2 class="title prod-cat__title"><?php echo wp_kses_post( $second_title ); ?></h2>
							<?php if ( $subtitle ) : ?>
								<div class="prod-cat__subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php
					get_template_part(
						'layouts/cards/prod-cat-card',
						null,
						array(
							'card' => $item,
						)
					);
					?>
				<?php endforeach; ?>
				<!--				TODO повесить что-то на кнопку -->
				<button class="catalog-btn prod-cat__btn" type="button">
					<span class="catalog-btn__text">Скачать каталог продукции</span>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>
