<?php
/**
 * News template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$news        = get_sub_field( 'news' );
$cat_url     = get_category_link( 6 );
?>

<section class="section section--white news">
	<div class="container news__container">
		<?php if ( $block_title ) : ?>
			<h2 class="title news__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php
		if ( $news ) {
			foreach ( $news as $post ) {
				setup_postdata( $post );

				get_template_part( 'layouts/cards/news-card' );
			}

			wp_reset_postdata();
		}
		?>
		<?php if ( $cat_url ) : ?>
			<a href="<?php echo esc_url( $cat_url ); ?>" class="news__btn">
				<span>Все новости</span>
				<svg width="85" height="85" class="news__btn-icon">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
				</svg>
			</a>
		<?php endif; ?>
	</div>
</section>
