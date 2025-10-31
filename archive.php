<?php
/**
 * Posts archive template
 *
 * @package Triton
 * @since 1.0.0
 */

get_header();

$term_object = get_queried_object();
$card_name   = 'post-card';
$grid_class  = 'posts';

if ( 6 === $term_object->term_id ) {
	$card_name  = 'news-card';
	$grid_class = 'news';
}
?>

	<section class="section section--white archive-block">
		<div class="container">
			<div class="<?php echo esc_html( 'archive-block__' . $grid_class . ' js-posts-container' ); ?>">
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();

						get_template_part( 'layouts/cards/' . $card_name );
					}
				} else {
					echo '<p>Нет доступных записей.</p>';
				}
				?>
			</div>
			<?php if ( $GLOBALS['wp_query']->max_num_pages > 1 ) : ?>
				<button class="btn archive-block__btn js-show-more-posts" type="button" data-text="Показать еще">
					<span>Показать еще</span>
				</button>
				<script>
					let posts = <?php echo wp_json_encode( $GLOBALS['wp_query']->query_vars ); ?>;
					let posts_current_page = <?php echo ( get_query_var( 'paged' ) ) ? esc_js( get_query_var( 'paged' ) ) : 1; ?>;
					let posts_max_pages = <?php echo esc_js( $GLOBALS['wp_query']->max_num_pages ); ?>;
					let posts_nonce = '<?php echo esc_js( wp_create_nonce( 'load_more' ) ); ?>';
				</script>
			<?php endif ?>
		</div>
	</section>

<?php
get_template_part(
	'layouts/partials/blocks',
	null,
	array(
		'id' => 'category_' . $term_object->term_id,
	)
);

get_footer();
