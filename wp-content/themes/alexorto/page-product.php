<?php
/**
 * Template Name: Товар
 *
 * This is the template that displays all product pages
 *
 * @package AlexOrto
 */

get_header();

?>

<main class="product-page">
    <div class="product__information">
        <div class="product__swiper">
            <?php if( carbon_get_the_post_meta( 'product_new' ) ): ?>
                <span class="product-label product-label--new">Новинка</span>
            <?php endif; ?>
            <?php if( is_array(CarbonService::getProductGallery()) ): ?>
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <?php foreach(CarbonService::getProductGallery() as $slide): ?>
                            <div class="swiper-slide" style="background-image:url('<?= wp_get_attachment_image_src( $slide, 'full', false )['0']; ?>')"></div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-prev swiper-button-white">
                        <i class="material-icons">arrow_right_alt</i>
                    </div>
                    <div class="swiper-button-next swiper-button-white">
                        <i class="material-icons">arrow_right_alt</i>
                    </div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <?php foreach(CarbonService::getProductGallery() as $slide): ?>
                            <div class="swiper-slide" style="background-image:url('<?= wp_get_attachment_image_src( $slide, 'full', false )['0']; ?>')"></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="product__details">
            <span class="product__title"> <?= get_the_title() ?> </span>
                <?php if( carbon_get_the_post_meta( 'product_code' ) ): ?>
                    <div class="product__detail-row">
                        <span class="product__code"> 
                            <?= carbon_get_the_post_meta( 'product_code' ) ?>
                        </span>
                    </div>
                <?php endif; ?>
                <?php if ( carbon_get_the_post_meta( 'product_description' ) ): ?>
                    <div class="product__detail-description">
                        <?= carbon_get_the_post_meta( 'product_description' ) ?>
                    </div>
                <?php endif; ?>
            <div class="product__detail-row">
                <?php if ( is_array(carbon_get_the_post_meta( 'product_sizes' )) && (count(carbon_get_the_post_meta( 'product_sizes' )) > 0) ): ?>
                    <?php foreach(carbon_get_the_post_meta( 'product_sizes' ) as $size): ?>
                        <span class="product__size"> <?= $size ?> </span>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ( carbon_get_the_post_meta( 'product_price' ) ): ?>
                    <span class="product__price"> <?= carbon_get_the_post_meta( 'product_price' ) ?> <span class="symbol"> ₽ </span> </span>
                <?php endif; ?>
            </div>
            <div class="product__detail-row">
                <button class="button button--large button--lightgreen" type="button"> Заказать </button>
            </div>
            <div class="product__detail-row product__detail-row--relative">
                <span class="product__show product__link">Уточнить наличие размера</span>
                <a href="tel:<?= str_replace(' ', '', carbon_get_theme_option( 'header_phone' )) ?>" class="product__link" id="product__phone">
                    <?= carbon_get_theme_option( 'header_phone' ) ?>
                </a>
            </div>
            <a href="/pomosch/tablitsa-razmerov/" class="product__link">
                Таблица размеров
            </a>
        </div>
    </div>
    <?php if( get_post(get_the_ID())->post_content ): ?>
        <div class="product__content">
            <div class="product__container">
                <?= apply_filters( 'the_content', get_post(get_the_ID())->post_content ) ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php
get_footer();
