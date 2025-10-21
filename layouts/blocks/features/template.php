<?php
/**
 * Features template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$subtitle    = get_sub_field( 'subtitle' );
$features    = get_sub_field( 'features' );
$text        = get_sub_field( 'text' );
$bg          = get_sub_field( 'bg' );
?>

<section class="section section--white features" style="background-image: url(<?php echo esc_url( $bg ); ?>);">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title features__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $subtitle ) : ?>
			<div class="features__subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
		<?php endif; ?>
		<div class="features__body">
			<?php if ( $features ) : ?>
				<div class="features__grid">
					<?php foreach ( $features as $item ) : ?>
						<div class="features__item"><?php echo esc_html( $item['text'] ); ?></div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if ( $text ) : ?>
				<div class="features__text"><?php echo wp_kses_post( $text ); ?></div>
			<?php endif; ?>
		</div>
	</div>
</section>
