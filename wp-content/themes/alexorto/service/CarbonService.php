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

}