<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alexorto
 */

	get_template_part( 'template-parts/mobile-menu' );
	get_template_part( 'template-parts/order-form' );

?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<button id="scroll-top"><i class="material-icons">expand_less</i></button>
		<div class="site-info">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'bottom-menu',
				) );
			?>
			<div class="social-share">
					<a href="https://share.yandex.ru/go.xml?service=facebook&amp;url=http%3A%2F%2Falexorto.ru%2Finformatsiya%2Fzaschita-informatsii%2F&amp;title=%D0%97%D0%B0%D1%89%D0%B8%D1%82%D0%B0%20%D0%B8%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D0%B8%20%E2%80%94%20%D0%A1%D0%B0%D0%BB%D0%BE%D0%BD%20%D0%BE%D1%80%D1%82%D0%BE%D0%BF%D0%B5%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B9%20%D0%BE%D0%B1%D1%83%D0%B2%D0%B8" class="social-share__item social-share__item--fb" rel="nofollow" target="_blank" title="Facebook">
						<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" class="svg-inline--fa fa-facebook-f fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
					</a>
					<a href="https://share.yandex.ru/go.xml?service=vkontakte&url=http%3A%2F%2Falexorto.ru%2Finformatsiya%2Fzaschita-informatsii%2F&title=%D0%97%D0%B0%D1%89%D0%B8%D1%82%D0%B0%20%D0%B8%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D0%B8%20%E2%80%94%20%D0%A1%D0%B0%D0%BB%D0%BE%D0%BD%20%D0%BE%D1%80%D1%82%D0%BE%D0%BF%D0%B5%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B9%20%D0%BE%D0%B1%D1%83%D0%B2%D0%B8" class="social-share__item social-share__item--vk" rel="nofollow" target="_blank" title="Вконтакте">
						<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="vk" class="svg-inline--fa fa-vk fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M545 117.7c3.7-12.5 0-21.7-17.8-21.7h-58.9c-15 0-21.9 7.9-25.6 16.7 0 0-30 73.1-72.4 120.5-13.7 13.7-20 18.1-27.5 18.1-3.7 0-9.4-4.4-9.4-16.9V117.7c0-15-4.2-21.7-16.6-21.7h-92.6c-9.4 0-15 7-15 13.5 0 14.2 21.2 17.5 23.4 57.5v86.8c0 19-3.4 22.5-10.9 22.5-20 0-68.6-73.4-97.4-157.4-5.8-16.3-11.5-22.9-26.6-22.9H38.8c-16.8 0-20.2 7.9-20.2 16.7 0 15.6 20 93.1 93.1 195.5C160.4 378.1 229 416 291.4 416c37.5 0 42.1-8.4 42.1-22.9 0-66.8-3.4-73.1 15.4-73.1 8.7 0 23.7 4.4 58.7 38.1 40 40 46.6 57.9 69 57.9h58.9c16.8 0 25.3-8.4 20.4-25-11.2-34.9-86.9-106.7-90.3-111.5-8.7-11.2-6.2-16.2 0-26.2.1-.1 72-101.3 79.4-135.6z"></path></svg>
					</a>
					<a href="#" class="social-share__item social-share__item--instagram" rel="nofollow" target="_blank" title="Instagram">
						<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12" height="14" viewBox="0 0 12 14"><path d="M8 7q0-0.828-0.586-1.414t-1.414-0.586-1.414 0.586-0.586 1.414 0.586 1.414 1.414 0.586 1.414-0.586 0.586-1.414zM9.078 7q0 1.281-0.898 2.18t-2.18 0.898-2.18-0.898-0.898-2.18 0.898-2.18 2.18-0.898 2.18 0.898 0.898 2.18zM9.922 3.797q0 0.297-0.211 0.508t-0.508 0.211-0.508-0.211-0.211-0.508 0.211-0.508 0.508-0.211 0.508 0.211 0.211 0.508zM6 2.078q-0.055 0-0.598-0.004t-0.824 0-0.754 0.023-0.805 0.078-0.559 0.145q-0.391 0.156-0.688 0.453t-0.453 0.688q-0.086 0.227-0.145 0.559t-0.078 0.805-0.023 0.754 0 0.824 0.004 0.598-0.004 0.598 0 0.824 0.023 0.754 0.078 0.805 0.145 0.559q0.156 0.391 0.453 0.688t0.688 0.453q0.227 0.086 0.559 0.145t0.805 0.078 0.754 0.023 0.824 0 0.598-0.004 0.598 0.004 0.824 0 0.754-0.023 0.805-0.078 0.559-0.145q0.391-0.156 0.688-0.453t0.453-0.688q0.086-0.227 0.145-0.559t0.078-0.805 0.023-0.754 0-0.824-0.004-0.598 0.004-0.598 0-0.824-0.023-0.754-0.078-0.805-0.145-0.559q-0.156-0.391-0.453-0.688t-0.688-0.453q-0.227-0.086-0.559-0.145t-0.805-0.078-0.754-0.023-0.824 0-0.598 0.004zM12 7q0 1.789-0.039 2.477-0.078 1.625-0.969 2.516t-2.516 0.969q-0.688 0.039-2.477 0.039t-2.477-0.039q-1.625-0.078-2.516-0.969t-0.969-2.516q-0.039-0.688-0.039-2.477t0.039-2.477q0.078-1.625 0.969-2.516t2.516-0.969q0.688-0.039 2.477-0.039t2.477 0.039q1.625 0.078 2.516 0.969t0.969 2.516q0.039 0.688 0.039 2.477z"></path></svg>
					</a>
					<a href="https://share.yandex.ru/go.xml?service=odnoklassniki&url=http%3A%2F%2Falexorto.ru%2Finformatsiya%2Fzaschita-informatsii%2F&title=%D0%97%D0%B0%D1%89%D0%B8%D1%82%D0%B0%20%D0%B8%D0%BD%D1%84%D0%BE%D1%80%D0%BC%D0%B0%D1%86%D0%B8%D0%B8%20%E2%80%94%20%D0%A1%D0%B0%D0%BB%D0%BE%D0%BD%20%D0%BE%D1%80%D1%82%D0%BE%D0%BF%D0%B5%D0%B4%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B9%20%D0%BE%D0%B1%D1%83%D0%B2%D0%B8" class="social-share__item social-share__item--ok" rel="nofollow" target="_blank" title="Одноклассники">
						<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="odnoklassniki" class="svg-inline--fa fa-odnoklassniki fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M275.1 334c-27.4 17.4-65.1 24.3-90 26.9l20.9 20.6 76.3 76.3c27.9 28.6-17.5 73.3-45.7 45.7-19.1-19.4-47.1-47.4-76.3-76.6L84 503.4c-28.2 27.5-73.6-17.6-45.4-45.7 19.4-19.4 47.1-47.4 76.3-76.3l20.6-20.6c-24.6-2.6-62.9-9.1-90.6-26.9-32.6-21-46.9-33.3-34.3-59 7.4-14.6 27.7-26.9 54.6-5.7 0 0 36.3 28.9 94.9 28.9s94.9-28.9 94.9-28.9c26.9-21.1 47.1-8.9 54.6 5.7 12.4 25.7-1.9 38-34.5 59.1zM30.3 129.7C30.3 58 88.6 0 160 0s129.7 58 129.7 129.7c0 71.4-58.3 129.4-129.7 129.4s-129.7-58-129.7-129.4zm66 0c0 35.1 28.6 63.7 63.7 63.7s63.7-28.6 63.7-63.7c0-35.4-28.6-64-63.7-64s-63.7 28.6-63.7 64z"></path></svg>
					</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>