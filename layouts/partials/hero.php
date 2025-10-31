<?php
/**
 * Hero template
 *
 * @package Triton
 * @since 1.0.0
 */

if ( is_category() ) {
	$term_object = get_queried_object();
	$acf_post_id = 'category_' . $term_object->term_id;
} else {
	$acf_post_id = get_the_ID();
}

$block_title = get_field( 'title', $acf_post_id );
$img         = get_field( 'img', $acf_post_id );
$bg          = get_field( 'bg', $acf_post_id );
$text        = get_field( 'text', $acf_post_id );

if ( is_404() ) {
	$block_title = 'Страница не найдена';
} elseif ( is_search() ) {
	$block_title = 'Результаты поиска';
} elseif ( is_category() && ! $block_title ) {
	$block_title = get_the_archive_title();
}
?>

<section class="hero">
	<div class="container hero__container">
		<?php get_template_part( 'layouts/partials/breadcrumbs' ); ?>
		<?php if ( $block_title ) : ?>
			<h1 class="title hero__title"><?php echo wp_kses_post( $block_title ); ?></h1>
		<?php endif; ?>
		<?php if ( $text ) : ?>
			<div class="hero__body">
				<figure class="hero__figure">
					<?php
					echo wp_kses_post(
						adem_dynamic_thumbnail(
							$img,
							200,
							200,
							true,
							array(
								'class' => 'hero__img',
							)
						)
					);
					?>
				</figure>
				<div class="hero__text"><?php echo wp_kses_post( $text ); ?></div>
			</div>
		<?php endif; ?>
	</div>
	<?php
	echo wp_get_attachment_image(
		$bg,
		'full',
		false,
		array(
			'class' => 'hero__bg',
		)
	);
	?>
</section>
