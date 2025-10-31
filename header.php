<?php
/**
 * The Header template
 *
 * @package Triton
 * @since 1.0.0
 */

$option_tel    = get_field( 'tel', 'option' );
$option_social = get_field( 'social', 'option' );
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header">
	<div class="container header__container">
		<div class="header__col header__main">
			<a href="<?php echo esc_url( site_url( '/' ) ); ?>" class="header__logo">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-header.svg' ); ?>" class="header__l-img" width="176" height="40" alt="">
			</a>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu_main',
					'container'      => '',
					'menu_id'        => 'menu-main',
					'menu_class'     => 'reset-list menu-main header__menu',
				)
			);
			?>
			<button class="square-btn header__search-btn js-search-btn" type="button">
				<svg width="20" height="20">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-search' ); ?>"></use>
				</svg>
			</button>
		</div>
		<div class="header__col header__contacts">
			<!--			TODO tel dropdown-->
			<?php if ( $option_tel && count( $option_tel ) ) : ?>
				<a href="<?php echo esc_url( 'tel:' . adem_clear_tel( $option_tel[0]['number'] ) ); ?>" class="header__tel"><?php echo esc_html( $option_tel[0]['number'] ); ?></a>
			<?php endif; ?>
			<?php if ( $option_social ) : ?>
				<ul class="reset-list social header__social">
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
		<div class="header__col header__burger">
			<button class="square-btn burger-btn header__burger-btn js-open-burger" type="button">
				<svg width="20" height="20" class="burger-btn__close">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-close' ); ?>"></use>
				</svg>
				<svg width="22" height="18" class="burger-btn__open">
					<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-burger' ); ?>"></use>
				</svg>
			</button>
		</div>
	</div>
	<form role="search" method="get" class="container search-form header__col header__search-form" action="<?php bloginfo( 'url' ); ?>" id="searchform">
		<label class="input search-form__input">
			<span class="input__text">Поиск</span>
			<input type="search" id="search" class="input__field" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		</label>
		<button type="submit" class="square-btn search-form__btn">
			<svg width="20" height="20">
				<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-search' ); ?>"></use>
			</svg>
		</button>
	</form>
</header>
<main class="main">
	<?php
	if ( is_front_page() ) {
		get_template_part( 'layouts/partials/main-hero' );
	} else {
		get_template_part( 'layouts/partials/hero' );
	}
	?>
