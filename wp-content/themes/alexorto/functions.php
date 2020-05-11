<?php
/**
 * alexorto functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alexorto
 */

if ( ! function_exists( 'alexorto_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alexorto_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on alexorto, use a find and replace
		 * to change 'alexorto' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'alexorto', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'alexorto' ),
			'menu-2' => esc_html__( 'Bottom', 'alexorto' ),
			'menu-3' => esc_html__( 'Page', 'alexorto' ),
			'menu-4' => esc_html__( 'Front', 'alexorto' ),
			'menu-5' => esc_html__( 'Catalog', 'alexorto' ),
			// 'menu-6' => esc_html__( 'Контакты', 'alexorto' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'alexorto_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'alexorto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alexorto_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'alexorto_content_width', 640 );
}
add_action( 'after_setup_theme', 'alexorto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alexorto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'alexorto' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'alexorto' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'alexorto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alexorto_scripts() {
	wp_enqueue_style( 'alexorto-style', get_stylesheet_uri() );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/assets/swiper/swiper.min.css', array(), null );
	
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/swiper/swiper.min.js', array( 'jquery' ), null, true );

	wp_enqueue_style( 'jquery-ui-style', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.min.css', array(), null );

	wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.min.js', array( 'jquery' ), null, true );

	wp_enqueue_script( 'alexorto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'alexorto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_home() ) {
		wp_enqueue_script( 'home-swipers-js', get_template_directory_uri() . '/js/home-swipers.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/js/home-swipers.js' ) , true );
	}

	if ( is_page_template('page-catalog.php') ) {
		wp_enqueue_script( 'pagination-js', get_template_directory_uri() . '/assets/pagination.min.js', array( 'jquery' ), filemtime( get_stylesheet_directory() . '/assets/pagination.min.js' ) , true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexorto_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include Carbon Service
 */
require_once dirname(__FILE__) . '/service/CarbonService.php';

/**
 *  Carbon Fields
 */
require get_template_directory() . '/inc/carbon-fields.php';

// Adding a custom color to the links
add_filter( 'nav_menu_link_attributes', 'crb_nav_menu_link_attributes', 10, 4 );
function crb_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
	$crb_color = carbon_get_nav_menu_item_meta( $item->ID, 'crb_color' );
	$crb_bold = carbon_get_nav_menu_item_meta( $item->ID, 'crb_bold' );
	$styles = '';
	
	if(!empty( $crb_color )) {
		$styles = $styles . 'color: ' . $crb_color . '; ';
	}
	if(!empty( $crb_bold )) {
		$styles = $styles . 'font-weight:600; ';
	}

    $atts['style'] = $styles;

    return $atts;
}

/**
 * Get nav menu items by location
 *
 * @param $location The menu location id
 */
function get_nav_menu_items_by_location( $location, $args = [] ) {
 
    // Get all locations
    $locations = get_nav_menu_locations();
 
    // Get object id by location
    $object = wp_get_nav_menu_object( $locations[$location] );
 
    // Get menu items by menu name
    $menu_items = wp_get_nav_menu_items( $object->name, $args );
 
    // Return menu post objects
    return $menu_items;
}

function apply_categories_for_pages(){
	add_meta_box( 'categorydiv', 'Категории', 'post_categories_meta_box', 'page', 'side', 'normal'); 
	register_taxonomy_for_object_type('category', 'page'); 
}

add_action('admin_init','apply_categories_for_pages');
 
function true_expanded_request_category($q) {
	if (isset($q['category_name'])) 
		$q['post_type'] = array('post', 'page');
	return $q;
}
 
add_filter('request', 'true_expanded_request_category');

function true_apply_tags_for_pages(){
	add_meta_box( 'tagsdiv-post_tag', 'Теги', 'post_tags_meta_box', 'page', 'side', 'normal' );
	register_taxonomy_for_object_type('post_tag', 'page');
}
 
add_action('admin_init','true_apply_tags_for_pages');
 
function true_expanded_request_post_tags($q) {
	if (isset($q['tag']))
		$q['post_type'] = array('post', 'page');
	return $q;
}
 
add_filter('request', 'true_expanded_request_post_tags');

add_filter( 'taxonomy_labels_'.'category', 'change_labels_category' );
function change_labels_category( $labels ) {

	$my_labels = array(
		'name'                  => 'Категории',
		'singular_name'         => 'Категория',
		'search_items'          => 'Поиск категорий',
		'all_items'             => 'Все категории',
		'parent_item'           => 'Родительская категория',
		'parent_item_colon'     => 'Родительская категория:',
		'edit_item'             => 'Изменить категорию',
		'view_item'             => 'Просмотреть категорию',
		'update_item'           => 'Обновить категорию',
		'add_new_item'          => 'Добавить новую категорию',
		'new_item_name'         => 'Название новой категории',
		'not_found'             => 'Категория не найдена',
		'no_terms'              => 'Категорий нет',
		'items_list_navigation' => 'Навигация по списку категорий',
		'items_list'            => 'Список категорий',
		'back_to_items'         => '← Назад к категориям',
		'menu_name'             => 'Категории',
	);

	return $my_labels;
}