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

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class='<?= current_user_can('administrator') ? "body-admin" : ""?>'>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'alexorto' ); ?></a>

	<header id="masthead" class="site-header <?= current_user_can('administrator') ? "wpadminbar-active" : "" ;  ?>">
		<div class="site-header__wrapper">
			<div class="container">

			<div class="site-branding">

				<div class="header-contacts">
					<a href="/contacts" class="header-contacts__link header-contacts__link--adress link-address" class=""> <?= carbon_get_theme_option( 'header_address' ) ?> </a>
					<a href="tel:<?= str_replace(' ', '', carbon_get_theme_option( 'header_phone' )) ?>" class="header-contacts__link header-contacts__link--phone link-phone" class=""> <?= carbon_get_theme_option( 'header_phone' ) ?> </a>
				</div>

				<div class="site-branding__logo">
					<a href="/" class="site-branding__link-to-main">
						<img src="<?= get_template_directory_uri() . '/images/logo.png' ?>" class="site-branding__logo-image" title="Алекс Орто" width="48px" height="auto">
					</a>	
					<div class="site-branding__text">
                    	<span class="site-branding__logo-text"> <?= carbon_get_theme_option( 'header_text' ) ?> </span>
						<span class="site-branding__logo-text"> <?= carbon_get_theme_option( 'subheader_text' ) ?> </span>
					</div>
				</div>

				<button id="search-toggle" class="search-toggle">
						<svg version="1.1" id="search_icon" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
						<path fill="#F05368" d="M17.545,16.684l-0.335,0.335l-0.813-0.813c1.246-1.42,2.009-3.275,2.009-5.309
						c0-4.446-3.616-8.063-8.06-8.063c-4.445,0-8.062,3.617-8.062,8.063c0,4.445,3.617,8.063,8.062,8.063
						c2.052,0,3.921-0.777,5.346-2.045l0.812,0.812l-0.372,0.372l7.013,7.012l1.414-1.414L17.545,16.684z M10.345,16.959
						c-3.343,0-6.062-2.72-6.062-6.063c0-3.343,2.719-6.063,6.062-6.063c3.341,0,6.06,2.72,6.06,6.063
						C16.405,14.239,13.687,16.959,10.345,16.959z"></path>
						</svg>
				</button>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle primary-menu-toggle" id="primary-menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation -->
			
			</div>
		</div>

		

		</div>
	</header><!-- #masthead -->

	<?php 
	
	$data['header_services']['text1'] = carbon_get_theme_option( 'header_service_1_text' ); 
	$data['header_services']['text2'] = carbon_get_theme_option( 'header_service_2_text' ); 
	$data['header_services']['text3'] = carbon_get_theme_option( 'header_service_3_text' ); 
	$data['header_services']['image1'] = carbon_get_theme_option( 'header_service_1_image' ); 
	$data['header_services']['image2'] = carbon_get_theme_option( 'header_service_2_image' ); 
	$data['header_services']['image3'] = carbon_get_theme_option( 'header_service_3_image' ); 
	
	
	?>

	<div id="content" class="site-content">
		<?php Timber::render('./template-parts/header-services.twig', $data['header_services']); ?>
			
