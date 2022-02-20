<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Izvilina33
 */

get_header();
?>

<article id="primary" class="site-main container single_blog">


    <div class="blog_banner" style="background:linear-gradient(0deg, rgba(43, 42, 41, 0.9), rgba(43, 42, 41, 0.9)), url(<?= get_field('картинка_баннера_статьи'); ?>) no-repeat;  ">
        <div class="date_article">
            <?php the_time('j.m.Y') ?>
        </div>
        <h1> <? the_title(); ?></h1>
        <? if (get_the_category(get_the_ID())) : ?>
            <div class="inner_cats-item-parents_list">
                <? foreach (get_the_category(get_the_ID()) as $cat) :
                    if ($cat->term_taxonomy_id == $current_cat_id || $cat->slug == 'blog') continue;
                ?>
                    <a title="Перейти на раздел:  <?= $cat->cat_name; ?>" href="<?= get_category_link($cat->term_id); ?>" class=" inner_cats-item-parent">
                        <img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $cat->taxonomy . '_' . $cat->term_id); ?>" alt="<?= $cat->cat_name; ?>">
                        <span><?= $cat->cat_name; ?></span>
                    </a>
                <? endforeach; ?>
            </div>
        <? endif; ?>
        <? if (get_field('текст_на_баннере')) : ?>
            <div class="banner_text">
                <? the_field('текст_на_баннере'); ?>
            </div>
        <? endif; ?>
    </div>
    <div class="blog_main">
        <? if (get_the_content()) : ?>
            <? the_content(); ?>
        <? else : ?>
            <p class="text_not_found">Статья в разработке <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/pen_icon.png" alt=""></p>
        <? endif; ?>
    </div>

</article><!-- #main -->
<div class="container">
    <?php get_template_part('template-parts/content', 'similar_materials'); ?>
    <?php get_template_part('template-parts/content', 'skidka10-form'); ?>
    <?php get_template_part('template-parts/content', 'our_adress'); ?>
</div>


<?php
get_sidebar();
get_footer();
