<?php
/**
 * Cards-b template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$products    = get_sub_field( 'products' );
?>

<section class="section section--white cards-b">
	<div class="container">
		<?php if ( $block_title ) : ?>
			<h2 class="title cards-b__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( $products ) : ?>
			<div class="cards-b__body">
				<?php
				foreach ( $products as $post ) {
					setup_postdata( $post );

					get_template_part( 'layouts/cards/card-b' );
				}

				wp_reset_postdata();
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
