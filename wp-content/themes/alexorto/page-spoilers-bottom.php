<?php
/**
 * Template Name: Страница со спойлерами внизу
 *
 * This is the template that displays all product pages
 *
 * @package AlexOrto
 */

get_header();

?>

<main class="custom-page">
    <?php
		wp_nav_menu( array(
			'theme_location'  => 'menu-5',
			'menu'            => 'catalog-menu',
			'container'       => 'nav',
			'container_class' => 'page-menu',
		) );
    ?>
    <div class="custom-content">
		<?php
			while ( have_posts() ) :
				the_post();
		
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
		<?php Timber::render('./template-parts/spoilers.twig', CarbonService::getSpoilers()); ?>
    </div>
</main>

<?php
get_footer();
