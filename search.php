<?php
/**
 * The Search page template
 *
 * @package Triton
 * @since 1.0.0
 */

get_header(); ?>

<section class="search-block">
	<div class="container">
		<h2 class="title search-block__title">Вы искали: <?php echo esc_html( get_search_query() ); ?></h2>
		<?php if ( have_posts() ) : ?>
			<ul class="reset-list search-block__list">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<li class="search-block__item">
						<a href="<?php the_permalink(); ?>" class="search-block__link"><?php the_title(); ?></a>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<p>По вашему запросу ничего не найдено</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
