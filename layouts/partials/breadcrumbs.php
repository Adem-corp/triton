<?php
/**
 * Breadcrumbs template
 *
 * @package Triton
 * @since 1.0.0
 */

?>

<?php if ( ! is_front_page() && function_exists( 'yoast_breadcrumb' ) ) : ?>
	<div class="breadcrumbs"><?php yoast_breadcrumb(); ?></div>
<?php endif; ?>
