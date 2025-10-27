<?php
/**
 * Posts archive template
 *
 * @package Triton
 * @since 1.0.0
 */

get_header();

$term_object = get_queried_object();

get_template_part(
	'layouts/partials/blocks',
	null,
	array(
		'id' => 'category_' . $term_object->term_id,
	)
);

get_footer();
