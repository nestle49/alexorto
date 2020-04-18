<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Главная страница', 'crb' ) )
        ->add_tab( 'Шапка', array(
            Field::make( 'text', 'header_phone', 'Номер телефона в шапке' )->set_width( 50 ),
            Field::make( 'text', 'header_address', 'Адрес' )->set_width( 50 ),
        ) )
        ->add_tab( 'Услуги (шапка)', array(
            Field::make( 'text', 'header_service_1_text', 'Блок услуги 1, текст' )->set_width( 33 )->set_required( true ),
            Field::make( 'text', 'header_service_2_text', 'Блок услуги 2, текст' )->set_width( 33 )->set_required( true ),
            Field::make( 'text', 'header_service_3_text', 'Блок услуги 3, текст' )->set_width( 33 )->set_required( true ),
            Field::make( 'image', 'header_service_1_image', 'Блок услуги 1, изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
            Field::make( 'image', 'header_service_2_image', 'Блок услуги 2, изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
            Field::make( 'image', 'header_service_3_image', 'Блок услуги 3, изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        ) )
        ->add_tab( 'Слайдер',  array(
            Field::make( 'complex', 'crb_slides', 'Слайдер' )
                ->set_layout( 'tabbed-horizontal' )
                ->add_fields( array(
                    Field::make( 'image', 'slide_image', 'Изображение слайда' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
                    Field::make( 'image', 'slide_image_tablet', 'Изображение слайда для планшета' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
                    Field::make( 'image', 'slide_image_mobile', 'Изображение слайда для мобильного' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
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
        // Container::make( 'theme_options', __( 'Управление контентом 2', 'crb2' ) )
        //     ->add_tab( 'Рекомендуемые — второй блок',  array(
        //         Field::make( 'multiselect', 'featured-after-list2', 'Выберите рекомендуемые товары' )->set_width( 100 )
        //             ->add_options( 'get_hashtable_items' )
        //     ) );
        

        // ->add_tab( 'Стела', array(
        //     Field::make( 'text', 'crb_stela_95', 'Стела 95' )->set_width( 33 ),
        //     Field::make( 'text', 'crb_stela_92', 'Стела 92' )->set_width( 33 ),
        //     Field::make( 'text', 'crb_stela_dt', 'Стела DT' )->set_width( 33 ),
        //     Field::make( 'text', 'crb_stela_link', 'Стела ссылка на страницу' ),
        // ) )
        // ->add_tab( 'Блоки на глановй', array(
        //     Field::make( 'text', 'crb_block_1_text', 'Блок 1 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_1_images', 'Блок 1 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_1_link', 'Блок 1 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        //     Field::make( 'text', 'crb_block_2_text', 'Блок 2 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_2_images', 'Блок 2 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_2_link', 'Блок 2 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        //     Field::make( 'text', 'crb_block_3_text', 'Блок 3 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_3_images', 'Блок 3 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_3_link', 'Блок 3 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        //     Field::make( 'text', 'crb_block_4_text', 'Блок 4 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_4_images', 'Блок 4 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_4_link', 'Блок 4 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        //     Field::make( 'text', 'crb_block_5_text', 'Блок 5 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_5_images', 'Блок 5 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_5_link', 'Блок 5 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        //     Field::make( 'text', 'crb_block_6_text', 'Блок 6 текст' )->set_width( 33 )->set_required( true ),
        //     Field::make( 'image', 'crb_block_6_images', 'Блок 6 изображение' )->set_width( 33 )->set_value_type( 'url' )->set_required( true ),
        //     Field::make( 'text', 'crb_block_6_link', 'Блок 6 ссылка' )->set_width( 33 )->set_required( true )->set_help_text( 'Относительная ссылка' ),
        // ) );
}
// add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
// function crb_attach_post_meta() {
//     Container::make( 'post_meta', __( 'Какое меню выводить', 'crb' ) )
//         ->set_context( 'side' )
//         ->set_priority( 'low' )
//         ->where( 'post_type', '=', 'page' )
//         ->add_fields( array(
//             Field::make( 'select', 'crb_select_field', 'Выберите меню' )
//                 ->add_options( 'get_list_menu' )
//         ) );
//     Container::make( 'post_meta', __( 'Данные АЗС', 'crb' ) )
//         ->set_context( 'carbon_fields_after_title' )
//         ->set_priority( 'high' )
//         ->where( 'post_template', '=', 'page-azs.php' )
//         ->add_fields( array(
//             Field::make( 'media_gallery', 'crb_azs_gallery', 'Добавьте изображения АЗС' )->set_type( array( 'image') ),
//             Field::make( 'text', 'crb_azs_address', 'Добавьте адрес АЗС' )->set_width( 50 ),
//             Field::make( 'text', 'crb_azs_phone', 'Добавьте телефон АЗС' )->set_width( 50 ),
//             Field::make( 'textarea', 'crb_azs_features', 'Добавьте особенности АЗС' )->set_width( 50 ),
//             Field::make( 'set', 'crb_azs_fuels', 'Добавьте виды топлива АЗС' )
//             ->set_width( 50 )
//             ->add_options( array(
//                 'АИ-92' => 'АИ-92',
//                 'АИ-95' => 'АИ-95',
//                 'ДТ' => 'ДТ',
//             ) ),
//             Field::make( 'text', 'crb_azs_longitude', 'Добавьте координаты долготу АЗС' )->set_width( 33 ),
//             Field::make( 'text', 'crb_azs_latitude', 'Добавьте координаты широту АЗС' )->set_width( 33 ),
//             Field::make( 'text', 'crb_azs_map', 'Добавьте текст ссылки вызова карты АЗС' )->set_width( 33 ),
//             Field::make( 'textarea', 'crb_azs_map_frame', 'Добавьте карту АЗС' )->set_width( 50 ),
//             Field::make( 'set', 'crb_azs_icons', 'Добавьте иконки АЗС' )->set_width( 50 )
//             ->add_options( array(
//                 1 => 'Туалет',
//                 2 => 'Кофе',
//                 3 => 'Скоростные топливораздаточные колонки',
//                 4 => 'Безналичный расчет с возможностью бесконтактной оплаты',
//                 5 => 'Терминалы самообслуживания',
//                 6 => 'Автоматические АЗС',
//                 7 => 'Газ',
//             ) ),
//         ) );
// }
// function get_list_menu() {
//     $menus = get_registered_nav_menus();
//     unset($menus['menu-1'], $menus['menu-2']);
//     $select_menus = array('menu-0' => 'Не выводить') + $menus;
//     return $select_menus;
// }
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