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


   
}
