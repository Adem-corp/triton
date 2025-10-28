<?php
/**
 * Cards-c template.
 *
 * @package Triton
 * @since 1.0.0
 */

$blocks = get_sub_field( 'blocks' );
?>

<?php if ( $blocks ) : ?>
	<section class="section section--white cards-c">
		<div class="container cards-c__container">
			<?php foreach ( $blocks as $block ) : ?>
				<div class="cards-c__block">
					<div class="cards-c__header">
						<?php if ( $block['title'] ) : ?>
							<h2 class="title cards-c__title"><?php echo wp_kses_post( $block['title'] ); ?></h2>
						<?php endif; ?>
						<?php if ( $block['chars'] ) : ?>
							<ul class="reset-list cards-c__chars">
								<?php foreach ( $block['chars'] as $item ) : ?>
									<li class="cards-c__c-item">
										<?php if ( $item['name'] ) : ?>
											<div class="cards-c__c-name"><?php echo esc_html( $item['name'] ); ?></div>
										<?php endif; ?>
										<?php if ( $item['value'] ) : ?>
											<div class="cards-c__c-value"><?php echo wp_kses_post( $item['value'] ); ?></div>
										<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( $block['text'] ) : ?>
							<div class="cards-c__text"><?php echo wp_kses_post( $block['text'] ); ?></div>
						<?php endif; ?>
					</div>
					<?php if ( $block['cards'] ) : ?>
						<div class="<?php echo esc_attr( 'cards-c__grid cards-c__grid--' . $block['cards-count'] ); ?>">
							<?php
							foreach ( $block['cards'] as $card ) {
								get_template_part(
									'layouts/cards/card-c',
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
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>
