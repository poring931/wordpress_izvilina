    <section class="section_block  our_address">
        <h2>НАШИ АДРЕСА <span class="h2_additional-text">
                <?the_field('название_города','option');?>
            </span></h2>
        <div class="our_address_list">
            <?foreach (get_field('адреса','option') as $cityName):?>
            <div class="our_address-item ">
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/geo_icon.png"
                    alt="">
                <span>
                    <?=$cityName['адрес'];?>
                </span>
            </div>
            <?endforeach;?>
        </div>
        <button class="btn white_btn btn_icon open_map" data-src="<?the_field('ссылка_на_яндекс_карту','option');?>">
            <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/geoPos_icon.png"
                alt="">
            Открыть карту
        </button>
    </section>