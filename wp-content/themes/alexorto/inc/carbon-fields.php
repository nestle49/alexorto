<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Главная страница', 'crb' ) )
        ->add_tab( 'Шапка', array(
            Field::make( 'text', 'header_phone', 'Номер телефона в шапке' )->set_width( 30 ),
            Field::make( 'text', 'header_email', 'E-mail в шапке' )->set_width( 30 ),
            Field::make( 'text', 'header_address', 'Адрес' )->set_width( 30 ),
        ) )
        ->add_tab( 'Слайдер',  array(
            Field::make( 'complex', 'crb_slides', 'Слайдер' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'image', 'slide_image', 'Изображение слайда' )->set_width( 33 )->set_value_type( 'url' )->set_required( true )->help_text('Рек. <b>2500x1184px</b>'),
                    Field::make( 'image', 'slide_image_tablet', 'Изображение слайда для планшета' )->set_width( 33 )->set_value_type( 'url' )->set_required( true )->help_text('Рек. <b>768px</b>'),
                    Field::make( 'image', 'slide_image_mobile', 'Изображение слайда для мобильного' )->set_width( 33 )->set_value_type( 'url' )->set_required( false )->help_text('Рек. <b>480px</b>'),
                    Field::make( 'text', 'slide_link', 'Ссылка слайда' )->set_width( 100 )->set_required( true ),
                ) ),
        ) )
        ->add_tab( 'Рекомендуемые — первый блок',  array(
            Field::make( 'text', 'featured-before-header', 'Заголовок секции' )->set_width(100),
            Field::make( 'text', 'featured-before-subheader', 'Подзаголовок секции' )->set_width(100),
            Field::make( 'multiselect', 'featured-before-list', 'Выберите рекомендуемые товары' )->set_width( 100 )
                    ->add_options( 'get_hashtable_items' )
        ) )
        ->add_tab( 'Услуги (главная)', array(
            Field::make( 'text', 'header_home_services', 'Заголовок блока услуг' )->set_width( 100 )->set_required( true ),
            Field::make( 'complex', 'home_services', 'Услуги' )
                ->set_layout( 'tabbed-vertical' )
                ->add_fields( array(
                    Field::make( 'image', 'service_image', 'Изображение услуги' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
                    Field::make( 'text', 'service_header', 'Заголовок услуги' )->set_width( 66 )->set_required( true ),
                    Field::make( 'textarea', 'service_text', 'Текст услуги' )->set_width( 100 )->set_rows( 4 )->set_required( true ),
                ) ),
        ) )
        ->add_tab( 'Рекомендуемые — второй блок',  array(
            Field::make( 'text', 'featured-after-header', 'Заголовок секции' )->set_width(100),
            Field::make( 'text', 'featured-after-subheader', 'Подзаголовок секции' )->set_width(100),
            Field::make( 'multiselect', 'featured-after-list', 'Выберите рекомендуемые товары' )->set_width( 100 )
                    ->add_options( 'get_hashtable_items' )
        ) )
        ->add_tab( 'Форма заказа',  array(
            Field::make( 'text', 'order-form', 'Вставьте шорткод формы заказа' )->set_width(100),
        ) );
    Container::make( 'nav_menu_item', __( 'Top menu' ) )
    ->add_fields( array(
        Field::make( 'color', 'crb_color', __( 'Цвет' ) ),
        Field::make( 'checkbox', 'crb_bold', __( 'Жирный' ) )
        ->set_option_value( 'Да' )
    ));

}

add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
    Container::make( 'post_meta', __( 'Какое меню выводить слева', 'crb' ) )
        ->set_context( 'side' )
        ->set_priority( 'low' )
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'select', 'crb_select_field', 'Выберите меню' )
                ->add_options( 'get_list_menu' )
        ) );
    Container::make( 'post_meta', __( 'Верхний баннер', 'crb' ) )
        ->set_context( 'carbon_fields_after_title' )
        ->set_priority( 'high' )
        ->where( 'post_type', '=', 'page' )
        ->add_fields( array(
            Field::make( 'image', 'top_banner', 'Баннер' )->set_width( 33 )->set_value_type( 'url' )->help_text('Рек. <b>1440x150px</b>'),
            Field::make( 'image', 'top_banner_tablet', 'Баннер для планшета' )->set_width( 33 )->set_value_type( 'url' )->help_text('Рек. <b>768px</b>'),
            Field::make( 'image', 'top_banner_mobile', 'Баннер для мобильного' )->set_width( 33 )->set_value_type( 'url' )->help_text('Рек. <b>480px</b>'),
        ) );    
    Container::make( 'post_meta', __( 'Спойлеры', 'crb' ) )
    ->set_context( 'carbon_fields_after_title' )
    ->set_priority( 'default' )
    ->where( 'post_template', '=', 'page-spoilers.php' )
    ->add_fields( array(
        Field::make( 'complex', 'spoilers', 'Спойлеры на странице' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'text', 'header', 'Заголовок спойлера' )->set_width( 100 ),
                Field::make( 'rich_text', 'content', 'Спойлер' )->set_width( 100 ),
            ) ),
    ) );
    Container::make( 'post_meta', __( 'Спойлеры', 'crb' ) )
    ->set_context( 'normal' )
    ->set_priority( 'high' )
    ->where( 'post_template', '=', 'page-spoilers-bottom.php' )
    ->add_fields( array(
        Field::make( 'complex', 'spoilers', 'Спойлеры на странице' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'text', 'header', 'Заголовок спойлера' )->set_width( 100 ),
                Field::make( 'rich_text', 'content', 'Спойлер' )->set_width( 100 ),
            ) ),
    ) );
    Container::make( 'post_meta', __( 'Табы', 'crb' ) )
    ->set_context( 'carbon_fields_after_title' )
    ->set_priority( 'default' )
    ->where( 'post_template', '=', 'page-tabs.php' )
    ->or_where( 'post_template', '=', 'page-tabs-right.php' )
    ->add_fields( array(
        Field::make( 'complex', 'tabs', 'Табы на странице' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'text', 'header', 'Заголовок таба' )->set_width( 100 ),
                Field::make( 'rich_text', 'content', 'Таб' )->set_width( 100 ),
            ) )->set_max( 10 )->help_text('Макс. количество 10'),
    ) );
    Container::make( 'post_meta', __( 'Бренды', 'crb' ) )
    ->set_context( 'carbon_fields_after_title' )
    ->set_priority( 'default' )
    ->where( 'post_template', '=', 'page-brands.php' )
    ->add_fields( array(
        Field::make( 'complex', 'brands', 'Бренды' )
            ->set_layout( 'tabbed-vertical' )
            ->add_fields( array(
                Field::make( 'text', 'brand', 'Брэнд' )->set_width( 50 ),
                Field::make( 'text', 'url', 'Ссылка' )->set_width( 50 ),
                Field::make( 'image', 'logo', 'Логотип брэнда' )->set_width( 100 )->set_value_type( 'url' )->help_text('Загрузите логотип брэнда'),
            ) ),
    ) );
    Container::make( 'post_meta', __( 'Категории товаров для вывода на странице', 'crb' ) )
    ->set_context( 'carbon_fields_after_title' )
    ->set_priority( 'high' )
    ->where( 'post_template', '=', 'page-catalog.php' )
    ->add_fields( array(
        Field::make( 'multiselect', 'categories-list', 'Выберите категории' )->set_width( 100 )
                    ->add_options( 'get_categories_items' ),
        Field::make( 'rich_text', 'seo_before_catalog', 'Текст перед каталогом' )->set_width( 100 )->help_text('SEO-текст перед списком товаров'),
        Field::make( 'rich_text', 'seo_after_catalog', 'Текст после каталога' )->set_width( 100 )->help_text('SEO-текст после списка товаров')
                    
    ) );
    Container::make( 'post_meta', __( 'Данные о товаре', 'crb' ) )
    ->set_context( 'carbon_fields_after_title' )
    ->set_priority( 'high' )
    ->where( 'post_template', '=', 'page-product.php' )
    ->add_fields( array(
        Field::make( 'media_gallery', 'product_gallery', 'Добавьте изображения товара' )->set_type( array( 'image') ),
        Field::make( 'text', 'product_code', 'Артикул' )->set_width(50),
        Field::make( 'text', 'product_price', 'Цена' )->set_width(50),
        Field::make( 'checkbox', 'product_new', 'Новинка' )->set_option_value( 'yes' ),
        Field::make( 'textarea', 'product_description', 'Краткое описание' ),
        Field::make( 'set', 'product_sizes', 'Укажите размеры в наличии' )
        ->set_width( 100 )
        ->add_options( array(
            '35' => '35',
            '36' => '36',
            '37' => '37',
            '38' => '38',
            '39' => '39',
            '40' => '40',
            '41' => '41',
            '42' => '42',
            '43' => '43',
            '44' => '44',
            '45' => '45',
            '46' => '46',
            '47' => '47',
        ) ),
    ) );
}

function get_list_menu() {
    $menus = get_registered_nav_menus();
    unset($menus['menu-1'], $menus['menu-2']);
    $select_menus = array('menu-0' => 'Не выводить') + $menus;
    return $select_menus;
}


function get_hashtable_items() {

    $items = get_pages( array( 
        'post_type' => 'page',
        'meta_key'     => '_wp_page_template', 
        'meta_value'   => 'page-product.php', 
        'hierarchical' => 0
    ));

    $hashtable_items = array();

    foreach( $items as $item ){
        $hashtable_items[$item->ID] = $item->post_title;
    }

    return $hashtable_items;
}

function get_categories_items() {

    $items = get_categories( array( 
        'hide_empty'     => 0, 
    ));

    $categories_items = array();

    foreach( $items as $item ){
        $categories_items[$item->term_id] = $item->name;
    }

    return $categories_items;
}