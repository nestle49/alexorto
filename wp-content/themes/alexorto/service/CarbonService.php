<?php


class CarbonService
{

    /**
    * @return array
    *
    */
    public static function getSlidersHomePage()
    {
        $data['slides'] = carbon_get_theme_option( 'crb_slides' ); 
        return $data;
    }

    /**
    * @return array
    *
    */
    public static function getHomeServices()
    {
        $data['header_services'] = carbon_get_theme_option( 'header_home_services' ); 
        $data['services'] = carbon_get_theme_option( 'home_services' ); 
        return $data;
    }

    /**
    * @return array
    *
    */
    public static function getProductGallery()
    {
        return carbon_get_the_post_meta( 'product_gallery' );
    }

    /**
    * @return array
    *
    */
    public static function getFeaturedBefore()
    {
        $data['header'] = carbon_get_theme_option( 'featured-before-header' ); 
        $data['subheader'] = carbon_get_theme_option( 'featured-before-subheader' ); 
        $ids = carbon_get_theme_option( 'featured-before-list' ); 

        $items = get_pages( array( 
            'include' => $ids,
        ));

        foreach( $items as $item ){
            $item->preview = get_the_post_thumbnail_url( $item->ID, 'full' );
            $item->is_new = get_post_meta( $item->ID, '_product_new', true);
            $item->code = get_post_meta( $item->ID, '_product_code', true);
            $item->price = get_post_meta( $item->ID, '_product_price', true);
        }

        $data['products'] = $items; 
        return $data;
    }

    /**
    * @return array
    *
    */
    public static function getFeaturedAfter()
    {
        $data['header'] = carbon_get_theme_option( 'featured-after-header' ); 
        $data['subheader'] = carbon_get_theme_option( 'featured-after-subheader' ); 
        $ids = carbon_get_theme_option( 'featured-after-list' ); 

        $items = get_pages( array( 
            'include' => $ids,
        ));

        foreach( $items as $item ){
            $item->preview = get_the_post_thumbnail_url( $item->ID, 'full' );
            $item->is_new = get_post_meta( $item->ID, '_product_new', true);
            $item->code = get_post_meta( $item->ID, '_product_code', true);
            $item->price = get_post_meta( $item->ID, '_product_price', true);
        }

        $data['products'] = $items; 
        return $data;
    }

}