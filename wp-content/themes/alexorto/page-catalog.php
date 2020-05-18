<?php
/**
 * Template Name: Каталог
 *
 * This is the template that displays all product pages
 *
 * @package AlexOrto
 */

get_header();

?>

<main class="catalog-page">
    <?php
		wp_nav_menu( array(
			'theme_location'  => 'menu-5',
			'menu'            => 'catalog-menu',
			'container'       => 'nav',
			'container_class' => 'page-menu',
		) );
    ?>
    <div class="products">

      <?php if( carbon_get_the_post_meta( 'seo_before_catalog' ) ): ?>
        <div class="seo-before-catalog">
          <?= carbon_get_the_post_meta( 'seo_before_catalog' ) ?>
        </div>
      <?php endif; ?>

      <div id="data-container" class="products-list">
        <?php if( is_array( StoreService::getProductsAtCurrentPage() ) ): ?>
          <?php foreach(StoreService::getProductsAtCurrentPage() as $product): ?>
            <div class="products-list__item">
              <a href="<?= $product->guid ?>" class="products-list__image" style="background-image: url('<?= $product->preview ?>');">
                <span class="product-label product-label--new">Новинка</span>
              </a>
              <span class="products-list__code"> Code </span>
              <a href="<?= $product->guid ?>" class="products-list__title">
                <?= $product->post_title ?>
              </a>
              <span class="products-list__price"> Price ₽ </span>
              <a href="<?= $product->guid ?>" class="products-list__button">
                Подробнее
              </a>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div id="pagination-container" class="pagination">
      </div>

      <?php if( carbon_get_the_post_meta( 'seo_after_catalog' ) ): ?>
        <div class="seo-after-catalog">
          <?= carbon_get_the_post_meta( 'seo_after_catalog' ) ?>
        </div>
      <?php endif; ?>

    </div>
</main>

<?php
get_footer();
