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
            $post->is_new = get_post_meta( $post->ID, '_product_new', true);
            $post->code = get_post_meta( $post->ID, '_product_code', true);
            $post->price = get_post_meta( $post->ID, '_product_price', true);
        }

        return $posts;
        
    }
}
