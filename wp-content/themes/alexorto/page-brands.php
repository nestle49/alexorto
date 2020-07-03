<?php
/**
 * Template Name: Бренды
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
		<?php Timber::render('./template-parts/brands.twig', CarbonService::getBrands()); ?>
    </div>
</main>

<?php
get_footer();
