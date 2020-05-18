<?php


class StoreService
{
    /**
    * @return array
    *
    */
    public static function getProductsAtCurrentPage()
    {
        $categories_keys = carbon_get_the_post_meta('categories-list');

        if ( empty($categories_keys) ) { return; }

        $posts = get_posts( array(
            'numberposts' => -1,
            'category'    => $categories_keys,
            'orderby'     => 'date',
            'order'       => 'DESC',
            'meta_key'     => '_wp_page_template', 
            'meta_value'   => 'page-product.php', 
            'post_type'   => 'page',
        ) );

        foreach ($posts as $post) {
            $post->preview = get_the_post_thumbnail_url( $post->ID, 'full' );
            // echo "<br><br>";
            // var_dump(get_the_post_thumbnail_url( $post->ID, 'full' ));
            // echo "<br><br>";
            // $related[$related_key]['subtitle'] = get_post_meta( $post->ID, '_crb_item_subtitle', true);
            // $related[$related_key]['price'] = get_post_meta( $post->ID, '_crb_item_price', true);
        }

        return $posts;
        
        // $related = array();

        // foreach ($posts as $post) {
        //    var_dump($post);
        //    echo "<br>";
        //    echo "<br>";
        // }
        
        // foreach ($related_keys as $key => $related_key) {
        //     $related[$related_key]['photo'] = get_the_post_thumbnail_url( $related_key, 'full' );
        //     $related[$related_key]['url'] = get_the_guid( $related_key );
        //     $related[$related_key]['title'] = get_the_title( $related_key );
        //     $related[$related_key]['subtitle'] = get_post_meta( $related_key, '_crb_item_subtitle', true);
        //     $related[$related_key]['price'] = get_post_meta( $related_key, '_crb_item_price', true);
        // }
    }




   
}
