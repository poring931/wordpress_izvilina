<?php

/**
 * Template Name: Блог
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Izvilina33
 */

get_header();

$category = get_queried_object();
$current_cat_id = $category->term_id;
$current_cat_name = $category->name;
$taxonomy = $category->taxonomy;



// var_dump($category->slug);
// var_dump(get_field('иконка_рубрики', $taxonomy . '_' . $current_cat_id));


$categories = get_categories([ //формируем внутренние категории блога
	'taxonomy'     => $taxonomy,
	'type'         => 'post',
	'child_of'     => 0,
	'parent'       => $current_cat_id,
	'orderby'      => 'name',
	'order'        => 'ASC',
	'hide_empty'   => 1,
	'hierarchical' => 1,
	'exclude'      => '',
	'include'      => '',
	'number'       => 0,
	'pad_counts'   => false,
	// полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
]);

if ($categories) { //пример данных, которые можно забрать
	foreach ($categories as $cat) {
		// Данные в объекте $cat
		// echo $cat->name;
		// $cat->term_id
		// $cat->name (Рубрика 1)
		// $cat->slug (rubrika-1)
		// $cat->term_group (0)
		// echo $cat->term_taxonomy_id;
		// $cat->taxonomy (category)
		// $cat->description (Текст описания)
		// $cat->parent (0)
		// $cat->count (14)
		// $cat->object_id (2743)
		// echo $cat->cat_ID;
		// $cat->category_count (14)
		// $cat->category_description (Текст описания)
		// $cat->cat_name (Рубрика 1)
		// $cat->category_nicename (rubrika-1)
		// $cat->category_parent (0)

	}
}
global $wp_query;

// текущая страница
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
// максимум страниц
$max_pages = $wp_query->max_num_pages;


?>

<form action="/wp-admin/admin-ajax.php" method="POST" id="filter">
	<input name="cat_id" type="text">
	<input name="action" type="text" value="filter_blog">
	<input name="blog_id" type="text" value="<?= $current_cat_id; ?>">
	<button class="filter_btn" type="submit"></button>
</form>

<style>
	.h1-grid_item__back-text:before {
		content: '<?= $current_cat_name; ?>';
		top: -3.2%;
		right: -1.7%;
	}
</style>
<main id="primary" class="site-main container ">
	<div class="category-title_block">
		<div class="category-title_block-left">
			<div class="category-title">
				<img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $taxonomy . '_' . $current_cat_id); ?>" alt="">
				<h1 class="h1-grid_item__back-text"><?= $current_cat_name; ?></h1>
			</div>
			<div class="under-title">ИЗВИЛИНЫ</div>
		</div>
		<div class="category-title_block-left">
			<div class="filter_blog-title">

				<?  if ($category->slug == 'blog') : ?>
					Выберите рубрику:
					<div class="categories_list">

						<? if ($categories) :
							foreach ($categories as $cat) :
								if ($current_cat_id == $cat->cat_ID || $cat->slug == 'blog') continue;
						?>

								<button class="category_item btn white_btn" data-id="<?= $cat->term_taxonomy_id; ?>">
									<div class="category_item-icon">
										<img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $taxonomy . '_' . $cat->cat_ID); ?>" alt="">
									</div>
									<div class="category_item-name">
										<?= $cat->name; ?>
									</div>
									<div class="category_item-close">
										<img laoding="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/close_icon.svg" alt="">
									</div>
								</button>

						<? endforeach;
						endif; ?>
					</div>
				<? else : ?>
					<?php echo category_description(); ?>

				<? endif; ?>


			</div>
		</div>
	</div>



	<div class="inner_cats_list">
		<?php while (have_posts()) : the_post(); ?>
			<? get_template_part('template-parts/blog', 'content'); ?>
		<? endwhile; ?>
	</div>


	<? if ($paged < $max_pages) : ?>
		<div class="relative_block_">
			<div class="cats_list_getmore_back">
				<button class="cats_list_getmore btn white_btn btn_icon">
					<img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/pen_transform_icon.png" alt="">
					Показать больше статей
				</button>
			</div>
		</div>
		<script>
			let posts_vars = '<?php echo serialize($wp_query->query_vars); ?>'
			let current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			let max_pages = '<?php echo $wp_query->max_num_pages; ?>';
		</script>
	<? endif; ?>



	<?php get_template_part('template-parts/content', 'our_services_slider'); ?>
	<?php get_template_part('template-parts/content', 'our_adress'); ?>



</main><!-- #main -->

<style>

</style>

<?php
get_footer();
