<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package alexorto
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main search-results-page">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?='Поиск по запросу ' . '«' . get_search_query() . '»' ?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				global $post;
				the_post();
			?>

				<div class="result__line">
						<?php if( get_the_post_thumbnail_url($post->ID) ): ?>
							<a href="<?= esc_url( get_permalink() ); ?>" class="result__img" style="background-image:url('<?= get_the_post_thumbnail_url($post->ID) ?>')"></a>
						<?php endif; ?>
						<div class="result__content">
							<a href="<?= esc_url( get_permalink() ); ?>" class="result__title">
								<?php the_title(); ?>
							</a>

							 <?php if( carbon_get_the_post_meta( 'product_code' ) ): ?>
                        		<span class="result__code product__code"> 
                        		    <?= carbon_get_the_post_meta( 'product_code' ) ?>
                        		</span>
                			<?php endif; ?>

							<?php if ( is_array(carbon_get_the_post_meta( 'product_sizes' )) && (count(carbon_get_the_post_meta( 'product_sizes' )) > 0) ): ?>
								<div class="product__detail-row"><br><br>
									<!-- <?php foreach(carbon_get_the_post_meta( 'product_sizes' ) as $size): ?>
                        				<span class="product__size"> <?= $size ?> </span>
									<?php endforeach; ?> -->
								</div>
							<?php endif; ?>
							
							<a href="<?= esc_url( get_permalink() ); ?>" class="products-list__button">
                        		Подробнее
                    		</a>
						</div>
				</div>
			
			<?php					
			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();