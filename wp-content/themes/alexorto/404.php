<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package alexorto
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main page-404">

			<section class="error-404 not-found container">
				<header class="page-header">
					<h1 class="page-title">Cтраница не найдена</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Возможно вы сделали опечатку в адресе или страница была перемещена</p>
					<p><a href="/" class="lightgreen">Вернуться на главную</a></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();