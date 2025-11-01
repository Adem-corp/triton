<?php
/**
 * Yoast seo plugin settings
 *
 * @package Triton
 * @since 1.0.0
 */

add_filter( 'wpseo_breadcrumb_links', 'custom_breadcrumbs' );
function custom_breadcrumbs( $links ) {
	if ( is_singular( 'product' ) ) {
		$links[1]['url'] = str_replace( '%prod_cat%/', '', $links[1]['url'] );
	}

	return $links;
}
