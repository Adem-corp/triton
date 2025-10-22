<?php
/**
 * Offers template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$offers      = get_sub_field( 'offers' );
$all_link    = get_sub_field( 'link' );
?>

<section class="section offers">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title offers__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $offers ) : ?>
			<div class="offers__grid">
				<?php
				foreach ( $offers as $item ) {
					get_template_part(
						'layouts/cards/offer-card',
						null,
						array(
							'card' => $item,
						)
					);
				}
				?>
				<?php if ( $all_link ) : ?>
					<a href="<?php echo esc_url( $all_link['url'] ); ?>" class="all-btn offers__btn">
						<span><?php echo esc_html( $all_link['title'] ); ?></span>
						<svg width="85" height="85" class="all-btn__icon">
							<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
						</svg>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
