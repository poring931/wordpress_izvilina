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




?>

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
                <h1 class="h1-grid_item__back-text"><?= $current_cat_name; ?></h1>
            </div>

            <div class="under-title">УСЛУГ <img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $taxonomy . '_' . $current_cat_id); ?>" alt=""></div>
        </div>
        <div class="category-title_block-left">
            <div class="filter_blog-title">
                <?php echo category_description(); ?>

            </div>
        </div>
    </div>



    <div class="inner_cats_list">

        <?php

        $upperCategories = get_categories([
            'taxonomy'     => 'category',
            'type'         => 'post',
            'child_of'     => $current_cat_id,
            'parent'       => $current_cat_id,
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'pad_counts'   => false,
        ]);

        foreach ($upperCategories as $childcat) : // var_dump(get_category_link($childcat->cat_ID));

        ?>
            <div class="inner_cat-item">
                <? if (cat_is_ancestor_of($ancestor, $childcat->cat_ID) == false) : ?>
                    <div class="inner_cat-item-main">
                        <img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $childcat->taxonomy . '_' . $childcat->cat_ID); ?>" alt="<?= $childcat->cat_name; ?>" />
                        <a href="<?= get_category_link($childcat->cat_ID); ?>">

                            <span><?= $childcat->cat_name; ?></span>
                        </a>

                    </div>

                    <?

                    $subCategories = get_categories([
                        'taxonomy'     => 'category',
                        'type'         => 'post',
                        'child_of'     => 0,
                        'parent'       => $childcat->cat_ID,
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                        'hide_empty'   => 1,
                        'hierarchical' => 1,
                        'exclude'      => '',
                        'include'      => '',
                        'number'       => 0,
                        'pad_counts'   => false,
                    ]);
                    ?>
                    <div class="inner_cat-item-subcats">
                        <?php $count = 0;
                        foreach ($subCategories as $subcat) :
                            if ($current_cat == $subcat->cat_ID) continue;
                        ?>
                            <a style="opacity:<?= (1 - 0.2 * $count); ?>" href="<?= get_category_link($subcat->cat_ID); ?>"><?= $subcat->cat_name; ?></a>
                        <?php
                            if ($count > 2) $count = 1;
                            $count++;
                        endforeach; ?>
                        <a class="btn white_btn btn_icon " href="<?= get_category_link($childcat->cat_ID); ?>">
                            <img width="50" loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $childcat->taxonomy . '_' . $childcat->cat_ID); ?>" alt="<?= $childcat->cat_name; ?>">
                            <?= $childcat->cat_name; ?>
                        </a>
                    </div>


                <? $ancestor = $childcat->cat_ID;
                endif; ?>
            </div>

        <? endforeach ?>





    </div>




    <?php get_template_part('template-parts/content', 'our_services_4_u'); ?>
    <?php get_template_part('template-parts/content', 'fast_and_qualitatively'); ?>
    <?php get_template_part('template-parts/content', 'done_works'); ?>
    <?php get_template_part('template-parts/content', 'reviews'); ?>
    <?php get_template_part('template-parts/content', 'kak_mi_rabotaem'); ?>
    <?php get_template_part('template-parts/content', 'our_adress'); ?>



</main><!-- #main -->

<style>

</style>

<?php
get_footer();
