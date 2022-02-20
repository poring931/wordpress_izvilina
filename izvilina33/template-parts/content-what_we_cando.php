    <section class="section_block   what_we_cando">
        <h2><i class="icon"><img class=" clip_big_icon" loading="lazy" width="62" height="70" decoding="async" src="/wp-content/themes/izvilina33/images/icons/clip_big_icon.png" alt=""></i>ЧТО
            МЫ УМЕЕМ</h2>
        <div class="tiny_slider_container">
            <div class="what_we_cando-slider ">
                <? foreach (get_field('что_мы_умеем', get_option('page_on_front')) as $workItem) : ?>
                    <? if ($workItem["ссылка_на_услугу"]) : ?>
                        <a class="what_we_cando-item" href="<?= $workItem["ссылка_на_услугу"]; ?>" title="перейти на <?= trim($workItem["текст_услуги"]); ?>">
                            <div class="what_we_cando-item-inner">
                                <img loading="lazy" decoding="async" src="<?= $workItem["картинка"]; ?>" alt="">
                                <div class="what_can_we_do-text">
                                    <?= $workItem["текст_услуги"]; ?>
                                </div>
                            </div>
                        </a>
                    <? else : ?>
                        <div class="what_we_cando-item">
                            <div class="what_we_cando-item-inner">
                                <img loading="lazy" decoding="async" src="<?= $workItem["картинка"]; ?>" alt="">
                                <div class="what_can_we_do-text">
                                    <?= $workItem["текст_услуги"]; ?>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
            <div class="what_we_cando-slider-nav tiny_slider_nav">
                <div class="what_we_cando-slider-nav_left">
                    <img width="43" height="43" decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_left_white.svg" alt="">
                </div>
                <div class="what_we_cando-slider-nav_right">
                    <img width="43" height="43" decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_right_white.svg" alt="">
                </div>
            </div>
        </div>

        <a href="asdasdasd" class=" call_btn btn btn_icon  main_page_bnt_icon red_btn">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/clip_icon.png" alt="">
            Перейти в каталог
        </a>
    </section>