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
                    Field::make( 'image', 'slide_image_mobile', 'Изображение слайда для мобильного' )->set_width( 33 )->set_value_type( 'url' )->set_required( true )->help_text('Рек. <b>480px</b>'),
                    Field::make( 'text', 'slide_link', 'Ссылка слайда' )->set_width( 100 )->set_required( true ),
                ) ),
        ) )
        ->add_tab( 'Рекомендуемые — первый блок',  array(
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
            Field::make( 'multiselect', 'featured-after-list', 'Выберите рекомендуемые товары' )->set_width( 100 )
                    ->add_options( 'get_hashtable_items' )
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
}
function get_list_menu() {
    $menus = get_registered_nav_menus();
    unset($menus['menu-1'], $menus['menu-2']);
    $select_menus = array('menu-0' => 'Не выводить') + $menus;
    return $select_menus;
}


function get_hashtable_items() {

    $items = get_pages( array( 
        // 'meta_key'     => '_wp_page_template', 
        // 'meta_value'   => 'page-item.php', 
        // 'hierarchical' => 0
    ));

    $hashtable_items = array();

    foreach( $items as $item ){
        $hashtable_items[$item->ID] = $item->post_title;
    }

    return $hashtable_items;
}

