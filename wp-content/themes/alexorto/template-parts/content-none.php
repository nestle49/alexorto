<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package alexorto
 */

?>

<section class="no-results not-found container">
	<header class="page-header">
		<h1 class="page-title"><?= esc_html_e( 'Результатов не найдено', 'alexorto' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'alexorto' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		else :
			?>

			<p><?php esc_html_e( 'Извините, совпадений не найдено. Пожалуйста, попробуйте другой запрос.', 'alexorto' ); ?></p>
			<p><a href="/" class="lightgreen">Или вернитесь на главную</a></p>
			
			<?php

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
