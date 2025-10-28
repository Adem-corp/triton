<?php
/**
 * Catalog settings
 *
 * @package Triton
 * @since 1.0.0
 */

add_action( 'init', 'adem_register_product_post_type' );
/**
 * Register custom post type - product.
 */
function adem_register_product_post_type() {
	register_taxonomy(
		'prod_cat',
		array( 'product' ),
		array(
			'labels'            => array(
				'name'              => 'Категории',
				'singular_name'     => 'Категория',
				'search_items'      => 'Искать категории',
				'all_items'         => 'Все категории',
				'parent_item'       => 'Родительская категория',
				'parent_item_colon' => 'Родительская категория:',
				'edit_item'         => 'Редактировать категорию',
				'update_item'       => 'Обновить категорию',
				'add_new_item'      => 'Добавить новую категорию',
				'new_item_name'     => 'Название новой категории',
				'menu_name'         => 'Категории',
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => true,
			'show_in_rest'      => null,
			'rewrite'           => array(
				'slug'         => 'catalog',
				'with_front'   => false,
				'hierarchical' => true,
			),
		)
	);

	register_post_type(
		'product',
		array(
			'label'         => null,
			'labels'        => array(
				'name'               => 'Каталог',
				'singular_name'      => 'Товар',
				'add_new'            => 'Добавить товар',
				'add_new_item'       => 'Добавить новый товар',
				'edit_item'          => 'Редактировать товар',
				'new_item'           => 'Новый товар',
				'view_item'          => 'Просмотреть товар',
				'search_items'       => 'Искать товары',
				'not_found'          => 'Товары не найдены',
				'not_found_in_trash' => 'Товары в корзине не найдены',
				'menu_name'          => 'Каталог',
			),
			'public'        => true,
			'show_in_menu'  => true,
			'has_archive'   => true,
			'menu_position' => 24,
			'menu_icon'     => 'dashicons-admin-generic',
			'rewrite'       => array(
				'slug'       => 'catalog/%prod_cat%',
				'with_front' => false,
			),
			'supports'      => array( 'title', 'thumbnail', 'excerpt', 'editor' ),
			'taxonomies'    => array( 'prod_cat' ),
		)
	);
}


add_filter( 'post_type_link', 'filter_catalog_post_link', 10, 2 );
/**
 * Replace %prod_cat% placeholder in profile permalinks with the actual brand slug.
 *
 * @param string  $post_link The generated post link.
 * @param WP_Post $post The post object.
 *
 * @return string  The modified permalink with brand slug or "uncategorized".
 */
function filter_catalog_post_link( $post_link, $post ) {
	if ( 'product' === $post->post_type ) {
		$terms = wp_get_post_terms( $post->ID, 'prod_cat' );

		if ( $terms && ! is_wp_error( $terms ) ) {
			$term_slug = '';

			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$term      = $terms[0];
				$ancestors = get_ancestors( $term->term_id, 'prod_cat' );

				$slugs = array_reverse(
					array_map(
						function ( $ancestor_id ) {
							$ancestor_term = get_term( $ancestor_id, 'prod_cat' );

							return $ancestor_term->slug;
						},
						$ancestors
					)
				);

				$slugs[] = $term->slug;

				$term_slug = implode( '/', $slugs );
			}

			$post_link = str_replace( '%prod_cat%', $term_slug, $post_link );
		} else {
			$post_link = str_replace( '%prod_cat%', 'uncategorized', $post_link );
		}
	}

	return $post_link;
}

add_action( 'init', 'catalog_rewrite_rules', 10 );
/**
 * Register custom rewrite rules for catalog URLs.
 *
 * Handles:
 * - /catalog/category-name/product-name → single profile
 * - /catalog/category-name → brand taxonomy archive
 *
 * @return void
 */
function catalog_rewrite_rules( $flash = false ) {
	$terms = get_terms(
		array(
			'taxonomy'   => 'prod_cat',
			'post_type'  => 'product',
			'hide_empty' => false,
		)
	);

	if ( $terms && ! is_wp_error( $terms ) ) {
		$site_url = esc_url( home_url( '/' ) );

		foreach ( $terms as $term ) {
			$term_slug = $term->slug;
			$base_term = str_replace( $site_url, '', get_term_link( $term->term_id, 'prod_cat' ) );

			add_rewrite_rule( $base_term . '?$', 'index.php?prod_cat=' . $term_slug, 'top' );
			add_rewrite_rule( $base_term . 'page/([0-9]{1,})/?$', 'index.php?prod_cat=' . $term_slug . '&paged=$matches[1]', 'top' );
			add_rewrite_rule( $base_term . '(?:feed/)?(feed|rdf|rss|rss2|atom)/?$', 'index.php?prod_cat=' . $term_slug . '&feed=$matches[1]', 'top' );
		}
	}

	add_rewrite_rule(
		'^catalog/([^/]+)/([^/]+)/?$',
		'index.php?prod_cat=$matches[1]&product=$matches[2]',
		'top'
	);

	add_rewrite_rule(
		'^catalog/([^/]+)/([^/]+)/([^/]+)/?$',
		'index.php?prod_cat=$matches[1]/$matches[2]&product=$matches[3]',
		'top'
	);

	add_rewrite_rule(
		'^catalog/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
		'index.php?prod_cat=$matches[1]/$matches[2]/$matches[3]&product=$matches[4]',
		'top'
	);

	if ( true === $flash ) {
		update_option( 'rewrite_rules', '' );
	}
}

add_action( 'create_catalog_category', 'create_term_flash_rewrite_rules', 10, 2 );
function create_term_flash_rewrite_rules( $term_id, $taxonomy ) {
	catalog_rewrite_rules( true );
}
