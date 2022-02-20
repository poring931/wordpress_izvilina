<?php

/**
 * Template Name: Контакты
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Izvilina33
 */

get_header();
?>

<main id="primary" class="site-main container">

    <section class="section_block  our_address">
        <h1 class="h1_flex-title">НАШИ АДРЕСА <span class="h2_additional-text">
                <? the_field('название_города', 'option'); ?>
            </span></h1>
        <div class="our_address_list our_address_list-long">
            <? foreach (get_field('адреса', 'option') as $cityName) : ?>
                <div class="our_address-item-long">
                    <div class="our_address-item-text_icon">
                        <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/geo_icon.png" alt="">
                        <span>
                            <?= $cityName['адрес']; ?>
                        </span>
                    </div>
                    <div class="our_address-item-text_icon">
                        <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/phone_icon.svg" alt="">
                        <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', $cityName['телефон']); ?>">
                            <?= $cityName['телефон']; ?>
                        </a>
                    </div>
                    <div class="our_address-item-text">
                        <?= $cityName['подробный_адрес']; ?>
                    </div>

                </div>
            <? endforeach; ?>
        </div>
        <button class="btn white_btn btn_icon open_map" data-src="<? the_field('ссылка_на_яндекс_карту', 'option'); ?>">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/geoPos_icon.png" alt="">
            Открыть карту
        </button>
    </section>

</main><!-- #main -->

<style>

</style>

<?php
get_footer();
