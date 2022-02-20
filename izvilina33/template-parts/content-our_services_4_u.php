    <section class="section_block   our_services_4_u">
        <h2>Наши услуги - <span class="h1-grid_item__back-text">для вас</span> , <br> если вы</h2>
        <div class="our_services_4_u-list grid_items_UTP">
            <?foreach (get_field('наши_услуги', get_option('page_on_front')) as $service) :?>
            <div class="our_services_4_u-item grid_items_UTP-item">
                <div class="our_services_4_u-item_img grid_items_UTP-img">
                    <img loading="lazy" decoding="async" src="<?=$service["элементы"]["изображение"]?>" alt="">
                </div>
                <div class="our_services_4_u-item-title grid_items_UTP-title">
                    <?=$service["элементы"]["заголовок"]?>
                </div>
                <div class="our_services_4_u-item-text grid_items_UTP-text">
                    <?=$service["элементы"]["текст"]?>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </section>