<?php
/**
 * Card-b template.
 *
 * @package Triton
 * @since 1.0.0
 */

$scheme  = get_field( 'scheme' );
$gallery = get_field( 'gallery' );
?>

<a href="<?php the_permalink(); ?>" class="card-b">
	<div class="card-b__header">
		<div class="card-b__title"><?php the_title(); ?></div>
		<?php
		the_post_thumbnail(
			'medium',
			array(
				'class' => 'card-b__img',
			)
		);
		?>
	</div>
	<?php if ( get_the_content() ) : ?>
		<div class="card-b__body"><?php the_content(); ?></div>
	<?php endif; ?>
</a>
