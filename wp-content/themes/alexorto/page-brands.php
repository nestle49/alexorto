<?php
/**
 * Template Name: Бренды
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
		<header class="entry-header">
			<?= the_title( '<h1 class="entry-title">', '</h1>' ) ?>
		</header>
		<?php Timber::render('./template-parts/brands.twig', CarbonService::getBrands()); ?>
    </div>
</main>

<?php
get_footer();
