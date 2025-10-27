<?php
/**
 * Txt-t template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$block_tabs  = get_sub_field( 'tabs' );
?>

<section class="section section--white txt-t">
	<div class="container txt-t__container">
		<?php if ( $block_title ) : ?>
			<h2 class="title txt-t__title"><?php echo wp_kses_post( $block_title ); ?></h2>
		<?php endif; ?>
		<?php if ( count( $block_tabs ) > 1 ) : ?>
			<ul class="reset-list txt-t__tabs js-tabs">
				<?php foreach ( $block_tabs as $key => $tab_item ) : ?>
					<li class="txt-t__tab-item<?php echo 0 === $key ? ' active' : ''; ?>" data-tab="<?php echo esc_attr( 'txt-t_' . $args['block_id'] . $key ); ?>">
						<?php echo esc_html( $tab_item['name'] ); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<?php if ( $block_tabs ) : ?>
			<?php foreach ( $block_tabs as $key => $tab_item ) : ?>
				<div class="txt-t__content<?php echo 0 === $key ? ' active' : ''; ?>" data-tab-container="<?php echo esc_attr( 'txt-t_' . $args['block_id'] . $key ); ?>">
					<?php if ( $tab_item['header']['title'] ) : ?>
						<div class="txt-t__t-header">
							<div class="txt-t__h-title"><?php echo esc_html( $tab_item['header']['title'] ); ?></div>
							<?php if ( $tab_item['header']['text'] ) : ?>
								<div class="txt-t__h-text"><?php echo wp_kses_post( $tab_item['header']['text'] ); ?></div>
							<?php endif; ?>
							<?php
							echo wp_get_attachment_image(
								$tab_item['header']['bg'],
								'full',
								false,
								array(
									'class' => 'txt-t__h-bg',
								)
							);
							?>
						</div>
					<?php endif; ?>
					<?php if ( $tab_item['txt'] ) : ?>
						<?php foreach ( $tab_item['txt'] as $item ) : ?>
							<div class="txt-t__t-block">
								<?php if ( $item['title'] ) : ?>
									<div class="txt-t__b-title" data-title="<?php echo wp_kses_post( $item['title'] ); ?>"><?php echo wp_kses_post( $item['title'] ); ?></div>
								<?php endif; ?>
								<?php if ( $item['text'] ) : ?>
									<div class="txt-t__b-text"><?php echo wp_kses_post( $item['text'] ); ?></div>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</section>
