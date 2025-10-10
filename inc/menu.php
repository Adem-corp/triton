<?php
/**
 * Menu settings
 *
 * @package Triton
 * @since 1.0.0
 */

add_filter( 'nav_menu_submenu_css_class', 'adem_custom_dropdown_class' );
/**
 * Adds a custom CSS class to submenu <ul> elements in navigation menus.
 *
 * @param array $classes Array of the CSS classes that are applied to the menu <ul> element.
 *
 * @return array Modified array of classes with the custom class added.
 */
function adem_custom_dropdown_class( $classes ) {
	$classes[] = 'reset-list';

	return $classes;
}

add_filter( 'wp_nav_menu_objects', 'adem_wp_nav_menu_objects', 10, 2 );
/**
 * Appends icon images (from ACF field) to menu item titles.
 *
 * This function loops through all menu items, retrieves the value of the ACF field 'icon'
 * assigned to each item, and prepends the corresponding image (if available) to the menu title.
 *
 * @param WP_Post[] $items Array of menu item objects.
 * @param stdClass  $args An object containing wp_nav_menu() arguments.
 *
 * @return WP_Post[] Modified array of menu items with icons prepended to their titles.
 */
function adem_wp_nav_menu_objects( $items, $args ) {
	foreach ( $items as &$item ) {
		$icon_id = get_field( 'icon', $item );

		if ( $icon_id ) {
			$icon = wp_get_attachment_image(
				$icon_id,
				'full',
				false,
				array(
					'class' => 'menu-item-icon',
				)
			);

			$item->title = $icon . $item->title;
		}
	}

	return $items;
}
