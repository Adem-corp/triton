<?php
/**
 * Template for all modals
 *
 * @package Triton
 * @since 1.0.0
 */

?>

<div class="modal" id="modal-call">
	<form class="modal__form js-form" name="Заявка">
		<div class="modal__title">Закажите<br> обратный звонок</div>
		<div class="modal__text">Оставьте свои контактные данные и наш менеджер свяжется с вами в ближайшее время.</div>
		<label class="input">
			<span class="input__text">Имя</span>
			<input type="text" class="input__field" name="name" required>
		</label>
		<label class="input">
			<span class="input__text">Телефон</span>
			<input type="tel" class="input__field" name="tel" placeholder="+7 (___) ___-__-__" pattern="[+]7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}" required>
		</label>
		<label class="checkbox modal__policy">
			<input type="checkbox" name="policy" class="checkbox__input" required>
			<span class="checkbox__switcher"> </span>
			<span>Даю согласие на обработку моих персональных данных в соответствии с <a href="<?php echo esc_url( get_privacy_policy_url() ); ?>" target="_blank">Политикой конфиденциальности</a></span>
		</label>
		<button class="submit-btn modal__btn" type="submit">
			<span class="submit-btn__text">ОТПРАВИТЬ</span>
			<span class="submit-btn__icon">
					<svg width="20" height="20">
						<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
					</svg>
				</span>
		</button>
		<input type="hidden" name="color">
		<input type="hidden" name="quantity">
		<?php adem_wp_nonce_field( 'Заявка', 'nonce' ); ?>
	</form>
</div>

<div class="modal modal--success" id="modal-success">
	<div class="modal__title">Ваше обращение <br>принято!</div>
	<button class="btn modal__close-btn" type="button" data-fancybox-close>Закрыть</button>
</div>
