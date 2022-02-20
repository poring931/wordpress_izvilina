    <section class="section_block   done_works">
        <h2>ВЫПОЛНЕННЫЕ <br> РАБОТЫ <i class="icon"><img class=" hummer_icon" loading="lazy" width="89" height="89" decoding="async" src="/wp-content/themes/izvilina33/images/icons/hummer_icon.png" alt=""></i></h2>
        <div class="tiny_slider_container">
            <div class="done_works-slider">
                <? foreach (get_field('выполненные_работы', get_option('page_on_front')) as $workItem) : ?>
                    <div class="done_works-item">
                        <div class="done_works-img">
                            <img width="368" height="296" decoding="async" loading="lazy" src="<?= $workItem["до_после"]["после"]; ?>" alt="">
                            <img width="368" height="296" class="done_works_img_abs" decoding="async" loading="lazy" src="<?= $workItem["до_после"]["до"]; ?>" alt="">
                        </div>
                        <div class="done_works-title">
                            <?= $workItem['название']; ?>
                        </div>
                        <div class="done_works-text">
                            <?= $workItem['описание']; ?>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="done_works-slider-nav tiny_slider_nav">
                <div class="done_works-slider-nav_left">
                    <img width="43" height="43" decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_left_white.svg" alt="">
                </div>
                <div class="done_works-slider-nav_right">
                    <img width="43" height="43" decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_right_white.svg" alt="">
                </div>
            </div>
        </div>
    </section>