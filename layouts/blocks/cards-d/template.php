<?php
/**
 * Cards-d template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$word_bg     = get_sub_field( 'word-bg' );
$left_text   = get_sub_field( 'left-text' );
$right_text  = get_sub_field( 'right-text' );
$cards       = get_sub_field( 'cards' );
?>

<section class="section cards-d">
	<?php if ( $word_bg ) : ?>
		<div class="cards-d__word-bg"><?php echo esc_html( $word_bg ); ?></div>
	<?php endif; ?>
	<div class="container">
		<?php if ( $block_title ) : ?>
			<div class="cards-d__title"><?php echo wp_kses_post( $block_title ); ?></div>
		<?php endif; ?>
		<?php if ( $left_text || $right_text ) : ?>
			<div class="cards-d__body">
				<?php if ( $left_text ) : ?>
					<div class="cards-d__text"><?php echo wp_kses_post( $left_text ); ?></div>
				<?php endif; ?>
				<?php if ( $right_text ) : ?>
					<div class="cards-d__text"><?php echo wp_kses_post( $right_text ); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ( $cards ) : ?>
			<div class="cards-d__grid">
				<?php
				foreach ( $cards as $card ) {
					get_template_part(
						'layouts/cards/card-d',
						null,
						array(
							'card' => $card,
						)
					);
				}
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
