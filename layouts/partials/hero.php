<?php
/**
 * Hero template
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_field( 'title' );
$img         = get_field( 'img' );
$bg          = get_field( 'bg' );
$text        = get_field( 'text' );
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
