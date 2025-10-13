<?php
/**
 * Feedback template.
 *
 * @package Triton
 * @since 1.0.0
 */

$block_title = get_sub_field( 'title' );
$subtitle    = get_sub_field( 'subtitle' );
?>

<section class="feedback">
	<div class="container feedback__container">
		<div class="feedback__header">
			<?php if ( $block_title ) : ?>
				<h2 class="title feedback__title"><?php echo wp_kses_post( $block_title ); ?></h2>
			<?php endif; ?>
			<?php if ( $subtitle ) : ?>
				<div class="feedback__subtitle"><?php echo wp_kses_post( $subtitle ); ?></div>
			<?php endif; ?>
		</div>
		<form class="feedback__form js-form" name="Заявка">
			<label class="input">
				<span class="input__text">Имя</span>
				<input type="text" class="input__field" name="name" required>
			</label>
			<label class="input">
				<span class="input__text">Фамилия</span>
				<input type="text" class="input__field" name="surname">
			</label>
			<label class="input">
				<span class="input__text">Должность</span>
				<input type="text" class="input__field" name="position">
			</label>
			<label class="input">
				<span class="input__text">Текст сообщения</span>
				<textarea class="input__field" rows="1" name="message"></textarea>
			</label>
			<label class="checkbox">
				<input type="checkbox" name="policy" class="checkbox__input" required>
				<span class="checkbox__switcher"></span>
				<span>Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>" target="_blank">Политикой конфиденциальности</a></span>
			</label>
			<button class="submit-btn" type="submit">
				<span class="submit-btn__text">ОТПРАВИТЬ</span>
				<span class="submit-btn__icon">
					<svg width="20" height="20">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
					</svg>
				</span>
			</button>
			<?php adem_wp_nonce_field( 'Заявка', 'nonce' ); ?>
		</form>
	</div>
</section>
