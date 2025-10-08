<?php
/**
 * The Page template
 *
 * @package Triton
 * @since 1.0.0
 */

get_header();

get_template_part( 'layouts/partials/blocks' );

the_content();

get_footer();
