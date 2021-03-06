<?php
/**
 * Template Name: Страница со спойлерами
 *
 * This is the template that displays all product pages
 *
 * @package AlexOrto
 */

get_header();

$select_menu = carbon_get_the_post_meta( 'crb_select_field' );
$menus = get_list_menu();
if ($select_menu) {
	$menu = $menus[$select_menu];
}

?>

<main class="custom-page">
	<?php if ($select_menu && $select_menu !== 'menu-0'):  ?>
		<?php
			wp_nav_menu( array(
				'theme_location'  => $select_menu,
				'menu'            => $menu,
				'container'       => 'nav',
				'container_class' => 'page-menu',
			) );
		?>
	<?php endif; ?>
    <div class="custom-content">
		<header class="entry-header">
			<?= the_title( '<h1 class="entry-title">', '</h1>' ) ?>
		</header>
		<?php Timber::render('./template-parts/spoilers.twig', CarbonService::getSpoilers()); ?>
		<?php
			while ( have_posts() ) :
				the_post();
		
				get_template_part( 'template-parts/content-without-title', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>
    </div>
</main>

<?php
get_footer();
