    <section class="section_block   fast_and_qualitatively">
        <h2>делаем <i class="icon"><img class="fire_icon" loading="lazy" width="60" height="60" decoding="async"
                    src="/wp-content/themes/izvilina33/images/icons/fire_icon.png" alt=""></i> быстро и <br> <i
                class="icon "><img class="thumbUp_icon" loading="lazy" width="60" height="68" decoding="async"
                    src="/wp-content/themes/izvilina33/images/icons/thumb_up_icon.png" alt=""></i> качественно </h2>
        <div class=" grid_items_UTP">
            <?foreach (get_field('делаембыстрокачественно', get_option('page_on_front')) as $service) :?>
            <div class=" grid_items_UTP-item">
                <div class=" grid_items_UTP-img">
                    <img loading="lazy" decoding="async" src="<?=$service["элементы"]["изображение"]?>" alt="">
                </div>
                <div class=" grid_items_UTP-title">
                    <?=$service["элементы"]["заголовок"]?>
                </div>
                <div class=" grid_items_UTP-text">
                    <?=$service["элементы"]["текст"]?>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </section>