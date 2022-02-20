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

$nameArray = explode(' ', $current_cat_name);


$categories = get_categories([ //
    'child_of'     => $current_cat_id,
    'type'         => 'post',
    'parent'       => '',
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


?>

<style>
    .h1-grid_item__back-text:before {
        content: '<?= explode(' ', $current_cat_name)[0]; ?>';
        top: -4.6%;
        right: 1.1%;
    }
</style>

<?
unset($nameArray[0]);
$nameCat = implode(' ', $nameArray);
?>
<main id="primary" class="site-main container main_inner_cat">
    <div class="category-title_block">
        <div class="category-title_block-left">
            <div class="category-title">
                <h1>
                    <span class="flex-title">
                        <span class="h1-grid_item__back-text">
                            <?= explode(' ', $current_cat_name)[0]; ?>
                        </span> <img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $taxonomy . '_' . $current_cat_id); ?>" alt="">
                    </span>

                    <?= $nameCat; ?>

                </h1>
            </div>

        </div>
        <div class="category-title_block-left">
            <div class="filter_blog-title">
                <?php echo category_description(); ?>

            </div>
        </div>
    </div>



    <div class="cats_list">
        <?php if ($categories) : //пример данных, которые можно забрать
            foreach ($categories as $cat) : ?>
                <div class="inner_cats-item">
                    <h2 class="inner_cats-item-title">
                        <a href="<?= get_category_link($cat->term_id); ?>"><?= $cat->name; ?></a>
                    </h2>
                    <div class="inner_cats-service_list">
                        <? get_template_part('template-parts/service', 'list', $cat->term_id); ?>
                    </div>
                </div>
            <? endforeach;
        else : ?>
            <div class="inner_cats-item">
                <div class="inner_cats-service_list">
                    <? get_template_part('template-parts/service', 'list', $current_cat_id); ?>
                </div>
            </div>
        <? endif; ?>
    </div>





    <?php get_template_part('template-parts/content', 'fast_and_qualitatively'); ?>
    <?php get_template_part('template-parts/content', 'done_works'); ?>
    <?php get_template_part('template-parts/content', 'reviews'); ?>
    <?php get_template_part('template-parts/content', 'kak_mi_rabotaem'); ?>
    <?php get_template_part('template-parts/content', 'our_adress'); ?>



</main><!-- #main -->

<script>
    document.querySelectorAll('.service_btn_buy').forEach(btn => {
        btn.addEventListener('mousemove', (event) => {
            let img_coin = event.target.previousElementSibling.previousElementSibling.querySelector('img');
            img_coin.style.animation = "shake-bottom 0.8s cubic-bezier(0.455, 0.030, 0.515, 0.955) both"
            setTimeout(() => {
                img_coin.style =''
            }, 800);
        })
    });
</script>

<?php
get_footer();
