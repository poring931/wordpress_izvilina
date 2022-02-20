<?php get_header(); ?>
<main id="primary" class="site-main container <? if (is_front_page()) echo 'main_page'; ?>">
    <div class="parallax_block_bacHover">
        <div class="parallax_block  ">
            <h1>
                <span class="h1-grid_item">
                    <span>МАГАЗИН</span>
                    <span></span>
                    <span></span>
                </span>
                <span class="h1-grid_item">
                    <span></span>
                    <span class="h1-grid_item__back-text">ПОЛЕЗНЫХ</span>
                    <span></span>
                </span>
                <span class="h1-grid_item">
                    <span></span>
                    <span class="h1-grid_item__button_"></span>
                    <span>УСЛУГ</span>
                </span>
            </h1>
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/parallax_img_left_1.png" alt="" class="mouse parallax_img_left_1" value="-5">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/parallax_img_left_2.png" alt="" class="mouse parallax_img_left_2" value="5">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/parallax_img_right_1.png" alt="" class="mouse parallax_img_right_1" value="5">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/parallax_img_right_2.png" alt="" class="mouse parallax_img_right_2" value="-5">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/parallax_img_top.png" alt="" class="mouse parallax_img_top" value="-5">
            <button class="header_callback call_btn btn btn_icon  main_page_bnt_icon red_btn">
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/clip_icon.png" alt="">
                Связаться с нами
            </button>
            <div class="parallax_block_ticker">
                <div class="marquee">
                    <?

                    foreach (get_field('бегущая_строка') as $running_string) {
                        echo "<span>" . $running_string["текст"] . "</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <section class="section_block video_block ">
        <div class="video_block_text">
            <h2>
                <span>
                    <?= get_field('блок_с_видео')["заголовок"]["часть_заголовка_до_раздвоенного_текста"] ?>
                </span>
                <span class="h1-grid_item__back-text text_video">
                    <?= get_field('блок_с_видео')["заголовок"]["раздвоенный_текст"] ?>
                </span>
                <span>
                    <?= get_field('блок_с_видео')["заголовок"]["часть_после_раздвоенного_текста"] ?>
                </span>
            </h2>
            <div class="video_block-text">
                <?= get_field('блок_с_видео')["текст_блока_с_видео"] ?>
            </div>
            <a class="btn white_btn btn_icon " href="<?= get_field('socials', 'option')[" инстаграм"]; ?>">
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/inst_icon.png" alt="">
                Наш инстаграм
            </a>
        </div>
        <div class="video_block_youtube">
            <div class="video youtube" data-embed="<? echo get_field('блок_с_видео')["ссылка_на_ютюб_видео"]; ?>">
                <? if (get_field('блок_с_видео')["превью_видео"]) : ?>
                    <img loading="lazy" decoding="async" src="<? echo get_field('блок_с_видео')["превью_видео"]; ?>" alt="">
                <? else : ?>
                    <img loading="lazy" decoding="async" src="https://i.ytimg.com/vi/<? echo get_field('блок_с_видео')["
                    ссылка_на_ютюб_видео"]; ?>/0.jpg">
                <? endif; ?>
                <div class="play-button"></div>
            </div>
        </div>
    </section>
    <? if (get_field('блок_с_видео')["заголовок"]["раздвоенный_текст"]) : ?>
        <style>
            .text_video:before {
                content: '<?= get_field('блок_с_видео')["заголовок"]["раздвоенный_текст"] ?>';
                top: -4.6%;
                right: -0.6%;
            }
        </style>
    <? endif; ?>





    <?php get_template_part('template-parts/content', 'our_services_4_u'); ?>
    <?php get_template_part('template-parts/content', 'what_we_cando'); ?>
    <?php get_template_part('template-parts/content', 'fast_and_qualitatively'); ?>
    <?php get_template_part('template-parts/content', 'done_works'); ?>
    <?php get_template_part('template-parts/content', 'reviews'); ?>
    <?php get_template_part('template-parts/content', 'our_adress'); ?>


</main>





<pre>
<!-- <? var_dump(get_field('скриншот_отзыва', 'option')); ?> -->
</pre>

<?php
get_footer();
