<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alexorto
 */


$data['top_banner']['desktop'] = carbon_get_the_post_meta( 'top_banner' ); 
$data['top_banner']['tablet'] = carbon_get_the_post_meta( 'top_banner_tablet' ); 
$data['top_banner']['mobile'] = carbon_get_the_post_meta( 'top_banner_mobile' ); 

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#5cbf96">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="manifest" href="<?= get_template_directory_uri()?>/manifest.json">
	<link rel="icon" href="<?= get_template_directory_uri()?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" sizes="57x57" href="<?= get_template_directory_uri() ?>/images/icon_57.webp">
	<link rel="apple-touch-icon" sizes="60x60" href="<?= get_template_directory_uri() ?>/images/icon_60.webp">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= get_template_directory_uri() ?>/images/icon_72.webp">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= get_template_directory_uri() ?>/images/icon_76.webp">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= get_template_directory_uri() ?>/images/icon_114.webp">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= get_template_directory_uri() ?>/images/icon_120.webp">
	<link rel="apple-touch-icon" sizes="144x144" href="<?= get_template_directory_uri() ?>/images/icon_144.webp">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= get_template_directory_uri() ?>/images/icon_152.webp">
	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_template_directory_uri() ?>/images/icon_180.webp">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alexorto' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header__wrapper">

			<div class="site-branding">

				<div class="site-header__contacts">
					<a href="tel:<?= str_replace(' ', '', carbon_get_theme_option( 'header_phone' )) ?>" class="site-header__link"> <?= carbon_get_theme_option( 'header_phone' ) ?> </a>
					<a href="mailto:<?= carbon_get_theme_option( 'header_email' ) ?>" class="site-header__link"> <i class="material-icons">email</i> </a>
				</div>

				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-4',
						'menu_id'        => 'front-menu',
					) );
				?>

				<div class="site-header__search">
				 <?= get_search_form() ?>
				</div>

				<button type="submit" class="search-open" id="search-open" aria-label="search-open">
            		<svg id="search-open1" viewBox="0 0 24 24">
		        		<path d="M18.227 16.627l3.443 3.444c.44.44.441 1.15-.003 1.596a1.128 1.128 0 0 1-1.596.003l-3.444-3.443C15.2 19.317 13.435 20 11.5 20 6.815 20 3 16.185 3 11.5 3 6.815 6.815 3 11.5 3c4.685 0 8.5 3.815 8.5 8.5 0 1.935-.683 3.7-1.773 5.127zM11.5 18a6.5 6.5 0 1 0 0-13 6.5 6.5 0 0 0 0 13z"></path>
	        		</svg>
        		</button>

			</div><!-- .site-branding -->

			<div class="header-bottom">

				<a href="/" class="site-branding__link-to-main">
					<img src="<?= get_template_directory_uri() . '/images/logo.jpg' ?>" class="site-header__logo" title="Алекс Орто" width="152px" height="48px">
				</a>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle primary-menu-toggle" id="primary-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span><i class="material-icons">menu</i></span>
					</button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->

			</div> <!-- #header-bottom -->
			
		</div>

		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php if (!is_front_page()): ?>
			<?php Timber::render('./template-parts/top-banner.twig', $data['top_banner']); ?>
		<?php endif; ?>
		<?php Timber::render('./template-parts/horizontally-menu.twig', CarbonService::getTimberMenu("menu-4")); ?>
		<?php if (is_front_page()) { 
			Timber::render('./template-parts/header-bar.twig', CarbonService::getHeaderBar());
		} ?>
		<?php if (!is_front_page()): ?>
			<div class="container breadcrumbs-wrapper">
        		<?php
        		    if (function_exists('dimox_breadcrumbs')) {
						dimox_breadcrumbs();	
					}
				?>
			</div>
		<?php endif; ?>
			
