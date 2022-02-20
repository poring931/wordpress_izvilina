<?php

/**
 * Izvilina33 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Izvilina33
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function izvilina33_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Izvilina33, use a find and replace
		* to change 'izvilina33' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('izvilina33', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'izvilina33'),
			'bottom-menu-1' => esc_html__('bottomMenu2', 'izvilina33'),
			'bottom-menu-2' => esc_html__('bottomMenu1', 'izvilina33'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'izvilina33_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'izvilina33_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function izvilina33_content_width()
{
	$GLOBALS['content_width'] = apply_filters('izvilina33_content_width', 640);
}
add_action('after_setup_theme', 'izvilina33_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function izvilina33_scripts()
{
	wp_enqueue_style('izvilina33-style', get_stylesheet_uri(), array(), _S_VERSION);



	wp_enqueue_script('tiny-slider_js', get_template_directory_uri() . '/js/tiny_slider/tiny-slider.js', array(), null, true);

	if (is_front_page()) {
		wp_enqueue_style('front_page-style', get_template_directory_uri() . '/css/index.css', array(), _S_VERSION);
		wp_enqueue_script('main_js', get_template_directory_uri() . '/js/index_page.js', array(), null, true);
	}

	if (get_queried_object()->slug == 'blog' || in_category('blog') && !is_single()) {//стили для категорий блога
		wp_enqueue_style('blog_css', get_template_directory_uri() . '/css/blog.css', array(), _S_VERSION);
		wp_enqueue_script('blog_js', get_template_directory_uri() . '/js/blog.js', array(), null, true);
	}

	if (get_queried_object()->slug == 'uslugi' || in_category('uslugi') && !is_single()) {//стили для категорий блога
		wp_enqueue_style('blog_css', get_template_directory_uri() . '/css/services.css', array(), _S_VERSION);
	}

	if ( !is_category('blog') && in_category('blog')&& is_single()) {//стили для записей блога
		wp_enqueue_style('blog-single_css', get_template_directory_uri() . '/css/blog-single.css', array(), _S_VERSION);
		wp_enqueue_script('blog-single_js', get_template_directory_uri() . '/js/blog-single.js', array(), null, true);
	}

	wp_enqueue_script('common_js', get_template_directory_uri() . '/js/common.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'izvilina33_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



function wpassist_remove_block_library_css()
{
	wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

function rmn_custom_mime_types($mimes)
{
	// Новый mime тип
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'rmn_custom_mime_types');


function my_deregister_scripts()
{
	wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

// убираем dns-prefetch
remove_action('wp_head', 'wp_resource_hints', 2);
// убираем стили и скрипт emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// + как бонус, удаление meta generator и короткой ссылки на материалы
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
function wpcourses_disable_feed()
{
	wp_redirect(get_option('siteurl'));
}
add_action('do_feed', 'wpcourses_disable_feed', 1);
add_action('do_feed_rdf', 'wpcourses_disable_feed', 1);
add_action('do_feed_rss', 'wpcourses_disable_feed', 1);
add_action('do_feed_rss2', 'wpcourses_disable_feed', 1);
add_action('do_feed_atom', 'wpcourses_disable_feed', 1);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
// register_nav_menus( array( 
//         'footer_menu' => 'Меню в футере', 
//         'header_menu' => 'Меню в шапке', 
//     ));





if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Общие настройки (соц сети, режим работы)',
		'menu_title' => 'Общие настройки (соц сети, режим работы)',
		'menu_slug' => 'theme-social',
		'capability' => 'edit_posts',
		'icon_url' => 'dashicons-instagram',
		'redirect' => false
	));

	acf_add_options_page(array(
		'page_title' => 'Адреса с картой',
		'menu_title' => 'Адреса с картой',
		'menu_slug' => 'theme-slider',
		'capability' => 'edit_posts',
		'icon_url' => 'dashicons-location-alt',
		'redirect' => false
	));
	acf_add_options_page(array(
		'page_title' => 'Отзывы',
		'menu_title' => 'Отзывы',
		'menu_slug' => 'theme-why-city',
		'capability' => 'edit_posts',
		'icon_url' => 'dashicons-format-status',
		'redirect' => false
	));
}



// шаблоны страниц
add_filter('template_include', 'my_template');
function my_template($template)
{

	if ((in_category('blog') && !is_single())) {
		if ($new_template = locate_template(array('category-blog.php')))
			return $new_template;
	}
	
	if ((in_category('blog') && is_single())) {
		if ($new_template = locate_template(array('single-blog.php')))
			return $new_template;
	}

	if ((is_category('uslugi') && !is_single())) {
		if ($new_template = locate_template(array('category-services.php')))
			return $new_template;
	}
	if ((!is_category('uslugi') && in_category('uslugi') && !is_single())) {
		if ($new_template = locate_template(array('category-inner-services.php')))
			return $new_template;
	}



	return $template;
}




add_action('wp_ajax_filter_blog', 'filter_blog');
add_action('wp_ajax_nopriv_filter_blog', 'filter_blog');

function filter_blog()
{

	// есть проблема на внутренних категориях. Там фильтры наверное вообще лишние, мб стоит убрать. Так как они тянут нунежные вещи



	$catsIds = explode(',', $_POST['cat_id']);
	$blogId = $_POST['blog_id'];
	// var_dump(!$catsIds[0]);
	// var_dump($catsIds);
	if (!$catsIds[0]) {
		$catsIds = $blogId;
	}

	$ajaxposts = new WP_Query([
		'posts_per_page' => -1,
		'category' => $blogId,
		'category__and' => $catsIds,
		'order' => 'desc',
	]);
	// var_dump($ajaxposts);
	$response = '';

	if ($ajaxposts->have_posts()) {
		while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= get_template_part('template-parts/blog', 'content');
		endwhile;
	} else {
		$response = '<span class="filter_not_found"><img width="60" laoding="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/not_found.svg" alt=""> Ничего не найдено. <br/> Попробуйте поменять варианты фильтра </span> ';
	}



	echo $response;
	exit;
}



function loadmore_get_posts()
{
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';

	query_posts($args);
	// если посты есть
	if (have_posts()) :
		while (have_posts()) : the_post();
			$response .= get_template_part('template-parts/blog', 'content');
		endwhile;
	endif;
	die();
}

add_action('wp_ajax_loadmore', 'loadmore_get_posts');
add_action('wp_ajax_nopriv_loadmore', 'loadmore_get_posts');
