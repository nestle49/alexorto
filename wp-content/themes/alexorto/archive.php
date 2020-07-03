<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alexorto
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main tags-page archive-page">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
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
								<div class="product__detail-row">
									<!-- <?php foreach(carbon_get_the_post_meta( 'product_sizes' ) as $size): ?>
                        				<span class="product__size"> <?= $size ?> </span>
									<?php endforeach; ?> -->
								</div><br><br>
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
	</div><!-- #primary -->

<?php
get_footer();
