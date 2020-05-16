<?php
/**
 * Template Name: Каталог
 *
 * This is the template that displays all product pages
 *
 * @package AlexOrto
 */

get_header();

?>

<main class="catalog-page">
            <?php
				wp_nav_menu( array(
					'theme_location'  => 'menu-5',
					'menu'            => 'catalog-menu',
					'container'       => 'nav',
					'container_class' => 'page-menu',
				) );
			?>
</main>

<?php
get_footer();
