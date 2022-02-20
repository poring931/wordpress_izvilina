<?

// var_dump(get_field('дополнительные_параметры'));


$params = array(
    'numberposts' => -1,
    'order' => 'DESC',
    'cat' => $args,
    'suppress_filters' => true,

);
global $wp_query;
$save_wpq = $wp_query;
$wp_query = new WP_Query($params);

while ($wp_query->have_posts()) : $wp_query->the_post();  ?>
    <div class="service_item">
        <div class="service_item-img"  title="Заказать: <? the_title(); ?> ">
            <? if (get_field('картинка_услуги')) : ?>
                <img loading="lazy" decoding="async" src="<? the_field('картинка_услуги'); ?>" alt="<?= the_title(); ?>">
            <? else : ?>
                <? the_post_thumbnail(); ?>
            <? endif; ?>
            <? if (!get_the_post_thumbnail_url() && !get_field('картинка_услуги')) : ?>
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/no_image.svg" alt="<?= the_title(); ?>">
            <? endif; ?>
        </div>
        <div class="price_title"  title="Заказать: <? the_title(); ?> ">

            <span class="title_service-item">
                <? the_title(); ?>
            </span>
            <? if (get_field('стоимость')) : ?>
                <span class="title_service-item-price">
                    <img src="/wp-content/themes/izvilina33/images/icons/coins_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/coins_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/coins_2x.png 2x" alt="">
                    <?=get_field('стоимость'); ?> ₽
                </span>
            <? endif; ?>
    
            
        </div>

        <div class="service_item-attributes">

            <?if (get_field('сроки_изготовления')):?>
                <div class="service_item-attr">
                    <div class="service_item-attr-name">
                        Сроки изготовления:
                    </div>
                    <div class="service_item-attr-value">
                        <?=get_field('сроки_изготовления');?>
                    </div>
                </div>
            <?endif;?>   
            <?if (get_field('объемы')):?>
                <div class="service_item-attr">
                    <div class="service_item-attr-name">
                        Объемы:
                    </div>
                    <div class="service_item-attr-value">
                        <?=get_field('объемы');?>
                    </div>
                </div>
            <?endif;?>   


            <?if( have_rows('дополнительные_параметры') ):
                while( have_rows('дополнительные_параметры') ) : the_row();$attr = get_sub_field('группа_свойств');?>
                    <div class="service_item-attr">
                        <div class="service_item-attr-name">
                            <?=$attr["свойство"];?>:
                        </div>
                        <div class="service_item-attr-value">
                            <?=$attr["значение"];?>
                        </div>
                    </div>
                <?endwhile;
            endif;?>
               
        </div>

        <button class="btn white_btn service_btn_buy" title="Заказать услугу <? the_title(); ?>" 
        data-name="<? the_title(); ?>" 
        data-price="<?=get_field('стоимость'); ?>"
        >Заказать услугу</button>
    </div>



<?




endwhile;


     wp_reset_postdata();
                    wp_reset_query();

?>