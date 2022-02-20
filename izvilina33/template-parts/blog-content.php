
    <div class="inner_cats-item">
        <a class="inner_cats-item_img" href="<?= get_permalink(); ?>">
            <? if (get_field('картинка_превью')) : ?>
                <img loading="lazy" decoding="async" src="<? the_field('картинка_превью'); ?>" alt="<?= the_title(); ?>">
            <? else : ?>
                <? the_post_thumbnail(); ?>
            <? endif; ?>
            <? if (!get_the_post_thumbnail_url() && !get_field('картинка_превью')) : ?>
                <img loading="lazy" decoding="async" src="/wp-content/themes/izvilina33/images/no_image.svg" alt="<?= the_title(); ?>">
            <? endif; ?>
        </a>
        <div class="inner_cats-item-parents_list">


            <? foreach (get_the_category(get_the_ID()) as $cat) :
                if ($cat->term_taxonomy_id == $current_cat_id || $cat->slug == 'blog') continue;
            ?>
                <a title="Перейти на раздел:  <?= $cat->cat_name; ?>" href="<?= get_category_link($cat->term_id); ?>" class=" inner_cats-item-parent">
                    <img loading="lazy" decoding="async" src="<? the_field('иконка_рубрики', $cat->taxonomy . '_' . $cat->term_id); ?>" alt="<?= $cat->cat_name; ?>">
                    <span><?= $cat->cat_name; ?></span>
                </a>
            <? endforeach; ?>
        </div>
        <a href="<?= get_permalink(); ?>" class=" inner_cats-item_name">
            <?= the_title(); ?>
        </a>
        <div class="inner_cats-item_text">
            <div class="inner_cats-item-preview">
                <? if (get_field('текст_превью')) : ?>
                    <?= get_field('текст_превью'); ?>
                <? else : ?>
                    <?= mb_strimwidth(get_the_content(), 0, 100, "..."); ?>
                <? endif; ?>
            </div>
            <a class="inner_cats-item-detail btn white_btn" href="<?= get_permalink(); ?>">
                Читать
            </a>
        </div>
    </div>