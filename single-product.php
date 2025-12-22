<?php
/**
 * Single product template
 *
 * @package Triton
 * @since 1.0.0
 */

get_header();

$gallery             = get_field( 'gallery' );
$description         = get_field( 'description' );
$coating             = get_field( 'coating' );
$params              = get_field( 'params' );
$price               = get_field( 'price' );
$tab_txt             = get_field( 'txt-block' );
$tab_chars           = get_field( 'chars' );
$tab_docs            = get_field( 'docs' );
$tab_delivery        = get_field( 'delivery-txt' );
$option_ral_link     = get_field( 'ral-link', 'option' );
$option_catalog_link = get_field( 'catalog-link', 'option' );
?>

	<section class="section section--white product">
		<div class="container">
			<?php get_template_part( 'layouts/partials/breadcrumbs' ); ?>
			<h1 class="title product__title"><?php the_title(); ?></h1>
			<div class="product__main">
				<div class="product__gallery">
					<div class="product__thumbs">
						<div class="product__arrow product__arrow_prev">
							<svg width="15" height="10">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-prod-arrow-prev' ); ?>"></use>
							</svg>
						</div>
						<div class="swiper">
							<div class="swiper-wrapper">
								<?php if ( $gallery ) : ?>
									<?php foreach ( $gallery as $img_id ) : ?>
										<div class="swiper-slide product__slide">
											<?php
											echo wp_get_attachment_image(
												$img_id,
												'thumbnail',
												false,
												array(
													'class' => 'product__img',
												)
											);
											?>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="product__arrow product__arrow_next">
							<svg width="15" height="10">
								<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-prod-arrow-next' ); ?>"></use>
							</svg>
						</div>
					</div>
					<div class="swiper product__slider">
						<div class="swiper-wrapper">
							<?php if ( get_the_post_thumbnail() ) : ?>
								<a href="<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>" class="swiper-slide product__slide" data-fancybox="product">
									<?php
									the_post_thumbnail(
										'post-thumbnail',
										array(
											'class' => 'product__img',
										)
									);
									?>
								</a>
							<?php endif; ?>
							<?php if ( $gallery ) : ?>
								<?php foreach ( $gallery as $img_id ) : ?>
									<a href="<?php echo esc_url( wp_get_attachment_image_url( $img_id, 'full' ) ); ?>" class="swiper-slide product__slide" data-fancybox="product">
										<?php
										echo wp_get_attachment_image(
											$img_id,
											'post-thumbnail',
											false,
											array(
												'class' => 'product__img',
											)
										);
										?>
									</a>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="product__info">
					<?php if ( $description ) : ?>
						<div class="product__description"><?php echo wp_kses_post( $description ); ?></div>
					<?php endif; ?>
					<?php if ( $coating ) : ?>
						<?php if ( count( $coating ) > 1 ) : ?>
							<div class="product__block">
								<div class="product__caption">Тип покрытия</div>
								<ul class="reset-list product__params-list">
									<?php foreach ( $coating as $key => $item ) : ?>
										<li class="product__param">
											<input id="<?php echo esc_attr( 'coating_' . $key ); ?>" class="product__p-input" type="radio" name="coating" value="<?php echo esc_attr( $item['name'] ); ?>" <?php echo 0 === $key ? 'checked' : ''; ?>>
											<label class="product__p-label" for="<?php echo esc_attr( 'coating_' . $key ); ?>">
												<span class="product__p-name"><?php echo esc_html( $item['name'] ); ?></span>
											</label>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php if ( $coating[0]['color'] ) : ?>
							<div class="product__block">
								<div class="product__caption">Цвет</div>
								<?php foreach ( $coating as $key_coating => $item ) : ?>
									<ul class="reset-list product__colors-list <?php echo 0 === $key_coating ? 'active' : ''; ?>" data-target="<?php echo esc_attr( 'coating_' . $key_coating ); ?>">
										<?php foreach ( $item['color'] as $key_color => $color ) : ?>
											<?php
											if ( $color['color'] ) {
												$color_bg = 'background-color: ' . $color['color'] . ';';
											} else {
												$color_bg = 'background-image: url(' . $color['img'] . ');';
											}
											?>
											<li class="product__color">
												<input id="<?php echo esc_attr( 'color_' . $key_coating . '_' . $key_color ); ?>" class="product__c-input" type="radio" name="color" value="<?php echo esc_attr( $color['name'] ); ?>">
												<label class="product__c-label" for="<?php echo esc_attr( 'color_' . $key_coating . '_' . $key_color ); ?>">
													<span class="product__c-preview" style="<?php echo esc_attr( $color_bg ); ?>"></span>
													<span class="product__c-name"><?php echo esc_html( $color['name'] ); ?></span>
												</label>
											</li>
										<?php endforeach; ?>
										<?php if ( $option_ral_link ) : ?>
											<li>
												<a href="<?php echo esc_url( $option_ral_link['url'] ); ?>" class="product__ral-link" target="<?php echo $option_ral_link['target'] ? esc_attr( $option_ral_link['target'] ) : '_self'; ?>">
													<?php echo esc_html( $option_ral_link['title'] ); ?>
												</a>
											</li>
										<?php endif; ?>
									</ul>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( $params ) : ?>
						<?php foreach ( $params as $param_key => $item ) : ?>
							<div class="product__block">
								<div class="product__caption"><?php echo esc_html( $item['name'] ); ?></div>
								<ul class="reset-list product__params-list">
									<?php foreach ( $item['values'] as $key => $value ) : ?>
										<li class="product__param">
											<input id="<?php echo esc_attr( 'param_' . $param_key . '_' . $key ); ?>" class="product__p-input" type="radio" name="<?php echo esc_attr( $item['name'] ); ?>" value="<?php echo esc_attr( $value['value'] ); ?>" <?php echo 0 === $key ? 'checked' : ''; ?>>
											<label class="product__p-label" for="<?php echo esc_attr( 'param_' . $param_key . '_' . $key ); ?>">
												<span class="product__p-name"><?php echo esc_html( $value['value'] ); ?></span>
											</label>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
					<div class="product__block">
						<div class="product__caption">Количество <span>(шт.)</span></div>
						<div class="product__quantity">
							<input class="product__q-input" type="number" name="quantity" value="1">
							<button class="product__q-btn" type="button" data-plus>
								<svg width="15" height="10">
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-prod-arrow-prev' ); ?>"></use>
								</svg>
							</button>
							<button class="product__q-btn" type="button" data-minus>
								<svg width="15" height="10">
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-prod-arrow-next' ); ?>"></use>
								</svg>
							</button>
						</div>
					</div>
					<div class="product__footer">
						<?php if ( $price['new'] ) : ?>
							<div class="product__prices">
								<div class="product__new-price"><?php echo esc_html( $price['new'] ); ?><span> руб.</span></div>
								<?php if ( $price['old'] ) : ?>
									<div class="product__old-price">
										<div><?php echo esc_html( $price['old'] ); ?></div>
										<span> руб.</span></div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<button class="submit-btn product__btn js-product-btn" type="button" data-src="#modal-call" data-fancybox>
							<span class="submit-btn__text">Заказать</span>
							<span class="submit-btn__icon">
								<svg width="20" height="20">
									<use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/sprite.svg#i-arrow-angle' ); ?>"></use>
								</svg>
							</span>
						</button>
					</div>
				</div>
			</div>
			<?php if ( $tab_txt || $tab_chars || $tab_docs || $tab_delivery ) : ?>
				<?php $active_tab = ''; ?>
				<div class="product__body">
					<ul class="reset-list product__tab-list js-tabs">
						<?php if ( $tab_txt ) : ?>
							<li class="product__tab active" data-tab="product-txt">Описание</li>
							<?php $active_tab = 'product-txt'; ?>
						<?php endif; ?>
						<?php if ( $tab_chars ) : ?>
							<li class="product__tab<?php echo ! $active_tab ? ' active' : ''; ?>" data-tab="product-chars">Характеристики</li>
							<?php $active_tab = ! $active_tab ? 'product-chars' : $active_tab; ?>
						<?php endif; ?>
						<?php if ( $tab_docs ) : ?>
							<li class="product__tab<?php echo ! $active_tab ? ' active' : ''; ?>" data-tab="product-docs">Документация</li>
							<?php $active_tab = ! $active_tab ? 'product-docs' : $active_tab; ?>
						<?php endif; ?>
						<?php if ( $tab_delivery ) : ?>
							<li class="product__tab<?php echo ! $active_tab ? ' active' : ''; ?>" data-tab="product-delivery">Доставка и оплата</li>
							<?php $active_tab = ! $active_tab ? 'product-delivery' : $active_tab; ?>
						<?php endif; ?>
					</ul>
					<div class="product__tabs-wrap">
						<?php if ( $tab_txt ) : ?>
							<div class="product__tab-container<?php echo 'product-txt' === $active_tab ? ' active' : ''; ?>" data-tab-container="product-txt">
								<?php foreach ( $tab_txt as $item ) : ?>
									<div class="product__txt">
										<?php if ( $item['name'] ) : ?>
											<div class="product__txt-name"><?php echo esc_html( $item['name'] ); ?></div>
										<?php endif; ?>
										<?php if ( $item['text'] ) : ?>
											<div class="product__txt-text"><?php echo wp_kses_post( $item['text'] ); ?></div>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<?php if ( $tab_chars ) : ?>
							<div class="product__tab-container<?php echo 'product-chars' === $active_tab ? ' active' : ''; ?>" data-tab-container="product-chars">
								<ul class="reset-list product__chars">
									<?php foreach ( $tab_chars as $item ) : ?>
										<li class="product__char-item">
											<?php if ( $item['name'] ) : ?>
												<div class="product__char-name"><?php echo esc_html( $item['name'] ); ?></div>
											<?php endif; ?>
											<?php if ( $item['value'] ) : ?>
												<div class="product__char-value"><?php echo esc_html( $item['value'] ); ?></div>
											<?php endif; ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						<?php if ( $tab_docs ) : ?>
							<div class="product__tab-container<?php echo 'product-docs' === $active_tab ? ' active' : ''; ?>" data-tab-container="product-docs">
								<div class="product__docs">
									<?php foreach ( $tab_docs as $item ) : ?>
										<a href="<?php echo esc_url( $item['file']['url'] ); ?>" class="product__doc-item" data-fancybox="product-docs">
											<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/doc-icon.png' ); ?>" width="120" height="163" alt="">
											<span class="product__doc-name"><?php echo esc_html( $item['file']['title'] ); ?></span>
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>
						<?php if ( $tab_chars ) : ?>
							<div class="product__tab-container product__delivery<?php echo 'product-delivery' === $active_tab ? ' active' : ''; ?>" data-tab-container="product-delivery"><?php echo wp_kses_post( $tab_delivery ); ?></div>
						<?php endif; ?>
						<?php if ( $option_catalog_link ) : ?>
							<a href="<?php echo esc_url( $option_catalog_link ); ?>" class="catalog-btn product__catalog-btn" data-fancybox>
								<span class="catalog-btn__text">Скачать каталог продукции</span>
							</a>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php
get_template_part( 'layouts/partials/blocks' );

get_footer();
