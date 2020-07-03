<?php
/**
 * Search results are contained within a div.searchwp-live-search-results
 * which you can style accordingly as you would any other element on your site
 *
 * Some base styles are output in wp_footer that do nothing but position the
 * results container and apply a default transition, you can disable that by
 * adding the following to your theme's functions.php:
 *
 * add_filter( 'searchwp_live_search_base_styles', '__return_false' );
 *
 * There is a separate stylesheet that is also enqueued that applies the default
 * results theme (the visual styles) but you can disable that too by adding
 * the following to your theme's functions.php:
 *
 * wp_dequeue_style( 'searchwp-live-search' );
 *
 * You can use ~/searchwp-live-search/assets/styles/style.css as a guide to customize
 */

$count = 0;
$limit_results = 30;
$includes_products = false;
$includes_post = false;

if ( have_posts() ) :
	while ( have_posts() ) : 
		the_post(); 
		if ( get_page_template_slug( get_the_ID() ) == 'page-product.php' ) {
			$includes_products = true;
		} else $includes_post = true;
	endwhile; 	
endif;

?>

<?php if ( have_posts() ) : ?>
	<?php global $post; ?>
	<?php if($includes_products): ?>
		<a class="search_title_ajax" href="#"><?= 'Товары' ?></a>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if( get_page_template_slug( get_the_ID() ) == 'page-product.php' && $count < $limit_results ): ?>
				<?php $count++; ?>
					<div class="searchwp-live-search-result" role="option" id="" aria-selected="false">
						<a href="<?= esc_url( get_permalink() ); ?>">
							<?php if( get_the_post_thumbnail_url($post->ID) ): ?>
								<span class="search_ajax_img" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID) ?>')"></span>
							<?php endif; ?>
							<span class="search_ajax_text"><?php the_title(); ?></span>
						</a>
					</div>
			<?php endif; ?>
		<?php endwhile; ?>
<?php endif; ?>
<?php if($includes_post): ?>
		<a class="search_title_ajax" href="#"><?= 'Страницы' ?></a>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if( get_page_template_slug( get_the_ID() ) != 'page-product.php' && $count < $limit_results ): ?>
					<?php $count++; ?>
						<div class="searchwp-live-search-result" role="option" id="" aria-selected="false">
						<a href="<?= esc_url( get_permalink() ); ?>">
							<?php if( get_the_post_thumbnail_url($post->ID) ): ?>
								<span class="search_ajax_img" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID) ?>')"></span>
							<?php endif; ?>
							<span class="search_ajax_text"><?= the_title(); ?>
						</a>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
<?php endif; ?>
<?php else : ?>
	<p class="searchwp-live-search-no-results" role="option">
		<em><?='Совпадений не найдено' ?></em>
	</p>
<?php endif; ?>