<?php
/**
 * The Footer template
 *
 * @package Triton
 * @since 1.0.0
 */

$footer_form      = get_field( 'footer-form' );
$option_form      = get_field( 'form', 'option' );
$option_logo_text = get_field( 'logo-text', 'option' );
$option_social    = get_field( 'social', 'option' );
$option_tel       = get_field( 'tel', 'option' );
$option_email     = get_field( 'email', 'option' );
$option_address   = get_field( 'address', 'option' );

if ( is_search() || is_404() ) {
	$footer_form = 1;
}
?>

</main>
<footer class="footer">
	<div class="footer__wrap">
		<div class="container">
			<?php if ( $footer_form ) : ?>
				<div class="footer__grid footer__top">
					<div class="footer__header">
						<?php if ( $option_form['title'] ) : ?>
							<h2 class="title footer__title"><?php echo wp_kses_post( $option_form['title'] ); ?></h2>
						<?php endif; ?>
						<?php if ( $option_form['subtitle'] ) : ?>
							<div class="footer__subtitle"><?php echo wp_kses_post( $option_form['subtitle'] ); ?></div>
						<?php endif; ?>
					</div>
					<form class="footer__form js-form" name="Над футером">
						<label class="input">
							<span class="input__text">Имя</span>
							<input type="text" class="input__field" name="name" required>
						</label>
						<label class="input">
							<span class="input__text">Фамилия</span>
							<input type="text" class="input__field" name="surname">
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
						<?php adem_wp_nonce_field( 'Над футером', 'nonce' ); ?>
					</form>
				</div>
			<?php endif; ?>
			<div class="footer__grid">
				<div class="footer__main-info">
					<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="footer__logo">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-footer.svg' ); ?>" class="footer__logo-img" width="353" height="80" alt="">
					</a>
					<?php if ( $option_logo_text ) : ?>
						<div class="footer__logo-text"><?php echo esc_html( $option_logo_text ); ?></div>
					<?php endif; ?>
				</div>
				<div class="footer__nav">
					<?php if ( has_nav_menu( 'menu_clients' ) ) : ?>
						<div class="footer__menu">
							<div class="footer__caption footer__nav-name">Клиентам</div>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu_clients',
									'container'      => '',
									'menu_id'        => 'menu-clients',
									'depth'          => 1,
									'menu_class'     => 'reset-list menu-footer footer__menu-list',
								)
							);
							?>
						</div>
					<?php endif; ?>
					<?php if ( has_nav_menu( 'menu_partners' ) ) : ?>
						<div class="footer__menu">
							<div class="footer__caption footer__nav-name">Партнерам</div>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu_partners',
									'container'      => '',
									'menu_id'        => 'menu-partners',
									'depth'          => 1,
									'menu_class'     => 'reset-list menu-footer footer__menu-list',
								)
							);
							?>
						</div>
					<?php endif; ?>
				</div>
				<div class="footer__social">
					<?php if ( $option_social ) : ?>
						<div class="footer__caption">Социальные сети</div>
						<ul class="reset-list social">
							<?php foreach ( $option_social as $item ) : ?>
								<li class="social__item">
									<a href="<?php echo esc_url( $item['link'] ); ?>" class="social__link" target="_blank">
										<svg width="22" height="22" class="social__icon">
											<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-' . $item['icon'] ); ?>"></use>
										</svg>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="footer__contacts">
					<?php if ( $option_tel ) : ?>
						<?php foreach ( $option_tel as $item ) : ?>
							<div class="footer__c-item">
								<div class="footer__caption"><?php echo esc_html( $item['city'] ); ?></div>
								<a href="<?php echo esc_url( 'tel:' . adem_clear_tel( $item['number'] ) ); ?>" class="footer__text"><?php echo esc_html( $item['number'] ); ?></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if ( $option_email ) : ?>
						<div class="footer__c-item">
							<div class="footer__caption">Email</div>
							<a href="<?php echo esc_url( 'mailto:' . $option_email ); ?>" class="footer__text footer__text--email"><?php echo esc_html( $option_email ); ?></a>
						</div>
					<?php endif; ?>
					<?php if ( $option_address ) : ?>
						<div class="footer__c-item footer__c-item--address">
							<div class="footer__caption">Мы находимся</div>
							<address class="footer__text"><?php echo esc_html( $option_address ); ?></address>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="footer__bottom">
				<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>" class="footer__policy">Политика конфиденциальности</a>
				<div class="footer__copy">Copyright <?php echo esc_html( gmdate( 'Y' ) ); ?> Triton. Все права защищены</div>
			</div>
		</div>
	</div>
</footer>

<?php
get_template_part( 'layouts/partials/modals' );

wp_footer();
?>

</body>
</html>
