<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alexorto
 */

get_header();

$select_menu = carbon_get_the_post_meta( 'crb_select_field' );
$menus = get_list_menu();
if ($select_menu) {
	$menu = $menus[$select_menu];
}

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main container">
			
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
