    <section class="section_block  reviews">

        <div class="hearts_block left_hearts_back">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_small_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_small_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_small_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
        </div>
        <div class="hearts_block right_hearts_back" >
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_small_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_small_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_small_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
            <img src="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png" srcset="/wp-content/themes/izvilina33/images/icons/heart_big_1x.png 1x, 
                    /wp-content/themes/izvilina33/images/icons/heart_big_2x.png 2x" alt="">
        </div>

        <? if ($args) {
            $titleTag = $args;
        } else {
            $titleTag = 'h2';
        }

        ?>

        <<?= $titleTag; ?> class="<?= $titleTag; ?>_flex-title">отзывы <span class="h2_additional-text"> о нашей работе</span></<?= $titleTag; ?>>
        <div class="tiny_slider_container">
            <div class="reviews_list">
                <? foreach (get_field('скриншот_отзыва', 'option') as $image) : ?>
                    <div class="reviews-item">
                        <?php echo wp_get_attachment_image($image['ID'], 'full'); ?>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="reviews-nav tiny_slider_nav">
                <div class="reviews-nav_left">
                    <img decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_left_white.svg" alt="">
                </div>
                <div class="reviews-nav_right">
                    <img decoding="async" loading="lazy" src="/wp-content/themes/izvilina33/images/icons/arrow_right_white.svg" alt="">
                </div>
            </div>
            <button class="btn white_btn btn_icon open_reviewModal">
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/icons/pen_icon.png" alt="">
                Оставить отзыв
            </button>
        </div>
        <style>
            .modal__reviews{
                
                font-family: 'trebuchetms';
                position: fixed;
                top:0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 3;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: rgba(0, 0, 0, 0.6);
                display: none;
            }
            .reviews__form{
                position: relative;
                width: 40%;
                height: 65%;
                padding: 50px 100px;
                background: #025239;
                border-radius: 20px;
                display: flex;
                flex-direction: column;
            }
            .reviews__title{
                font-style: normal;
                font-weight: bold;
                font-size: 60px;
                text-align: center;
                letter-spacing: 0.035em;
                text-transform: uppercase;
            }
            .reviews__form input,
            .reviews__form textarea{
                font-family: 'trebuchetms';
                padding: 21px 34px;
                width: 100%;
            }
        </style>
        <div class="modal__reviews">
            <form class="reviews__form" title="Форма 'Оставить отзыв'">
                <div class="modal__close"></div>
                <p class="reviews__title">Оставить отзыв</p>
                <p class="reviews__text">Мы хотим стать лучше! Расскажите, что думаете о наших услугах. Что понравилось, а что могло бы быть лучше? <br/>
                    Мы обязательно учтем ваше мнение в дальнейшей работе <3</p>
                <input type="text" name="Имя" placeholder="Имя">
                <textarea name="" id="" cols="30" rows="5" placeholder="Текст отзыва"></textarea>
                <a href="" id="review-submit" class="reviews__btn btn">Отправить</a>
            </form>
        </div>


    </section>