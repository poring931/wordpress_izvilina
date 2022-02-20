<?php

foreach (get_the_category(get_the_ID()) as $catItem) {
    if ($catItem->slug == 'blog') continue;
    $catIds[] = $catItem->term_taxonomy_id;
}

$params = array(
    'numberposts' => 10,
    'orderby' => 'rand',
    'order' => 'DESC',
    'posts_per_page' => 10, // количество постов на странице

    'cat' => $catIds,
    'suppress_filters' => true,

);
// query_posts($params);
global $wp_query;
$save_wpq = $wp_query;
$wp_query = new WP_Query($params); ?>





<section class="section_block  similar_articles_slider-block">
    <h2>Похожие материалы</h2>
    <div class="tiny_slider_container">
        <div class="similar_articles_slider">

            <? while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
                <div class="similar_articles-item">

                    <a class="similar_articles-item-inner" href="<?= get_permalink(); ?>">
                        <? if (get_field('картинка_превью')) : ?>
                            <img loading=" lazy" decoding="async" src="<? the_field('картинка_превью'); ?>" alt="<?= the_title(); ?>">
                        <? else : ?>
                            <? the_post_thumbnail(); ?>
                        <? endif; ?>
                        <? if (!get_the_post_thumbnail_url() && !get_field('картинка_превью')) : ?>
                            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/no_image.svg" alt="<?= the_title(); ?>">
                        <? endif; ?>
                        <span class="article_title_abs">
                            <? the_title(); ?>
                        </span>
                    </a>
                </div>

            <? endwhile;
            wp_reset_postdata();
            wp_reset_query(); ?>

        </div>
        <div class="done_works-slider-nav tiny_slider_nav">
            <div class="done_works-slider-nav_right">
                <img decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_left_white.svg" alt="">
            </div>
            <div class="done_works-slider-nav_left">
                <img decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_right_white.svg" alt="">
            </div>
        </div>
    </div>
    <a href="/blog/" class="btn white_btn btn_icon red_btn go_blog_btn">
        <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/pen_icon.png" alt="">
        Перейти в блог
    </a>
</section>