<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Izvilina33
 */

get_header();
?>

<main id="primary" class="site-main  container single_blog">

	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title" style="text-align: center;">404 страница не найдена</h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<br>
			<br>
			<p><a href="/">Перейти на главную </a> </p>
			<br>
			<br>

			<?php


			the_widget('WP_Widget_Recent_Posts');
			?>
			<br>
			<br>

			<div class="widget widget_categories">
				<h2 class="widget-title">Популярные категории</h2>
				<br>

				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div><!-- .widget -->



		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
