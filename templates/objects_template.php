<?php
/*

Template name: Objects Template

*/
get_header();
$text_button_hero = get_field('title_for_category', 'option-estate');
$didnt_find_banner = get_field('didnt_find', 'option-estate');
$current_term = get_queried_object();
$term_id = $current_term->term_id;
?>
<main class="archive-built-objects">
    <?php if($text_button_hero):?>
        <section class="title-section">
            <div class="container container_small">
                <h1 class="h4 title"><?php echo $text_button_hero; ?></h1>
            </div>
        </section>
    <?php endif;?>
    <section class="cards-grid cards-grid_big cards-grid_decorate" id="cards-grid">
        <div class="container container_small">
            <div class="cards-grid__wrapper">
                <?php
                // Get all terms of 'estate_objects' taxonomy
                $terms = get_terms([
                    'taxonomy' => 'estate_objects',
                    'hide_empty' => false,
                ]);

                foreach ($terms as $term) {
                    if ($term->parent == 0) {
                        $child_terms = get_terms([
                            'taxonomy' => 'estate_objects',
                            'hide_empty' => false,
                            'parent' => $term->term_id,
                        ]);

                        foreach ($child_terms as $child_term) {
                            $hero_image = get_field('image', $child_term);
                            $address = get_field('address', $child_term);
                            $term_link = get_term_link($child_term);
                            $button_build_estate = get_field('button_build_estate', 'option-estate');
                            $tag_info = get_field('tag_info', 'option-estate');
                            $post_count = $child_term->count;
                            ?>

                            <a href="<?php echo $term_link; ?>" class="card">
                                <?php if($hero_image):?>
                                    <div class="card__img">
                                        <img class="img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
                                        <?php if($post_count):?>
                                            <span class="tag">
                                                <span class="icon icon-build"></span>
                                                <span class="count"><?php echo $post_count;?></span>
                                                <?php if($tag_info):?>
                                                    <span class="tag-info"><?php echo $tag_info;?></span>
                                                <?php endif;?>
                                            </span>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                                <div class="card__body">
                                    <h1 class="card__title"><?php echo $child_term->name; ?></h1>
                                    <h4 class="card__address"><?php echo $address; ?></h4>
                                    <button class="btn btn_dark card__btn"><?php echo $button_build_estate; ?></button>
                                </div>
                            </a><?php
                        }
                    }
                }?>
            </div>
        </div>
    </section>
    <?php $seo_title = get_field('seo_title'); $seo_text = get_field('seo_text'); if($seo_text):?>
        <section id="seo-text" class="seo-text">
            <div class="container">
                <div class="seo-text__wrapper">
                    <h1 class="h4 seo-text__title"><?php echo $seo_title; ?></h1>
                    <div class="seo-text__text">
                        <?php echo $seo_text; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if($didnt_find_banner):
        $title = $didnt_find_banner['title'];
        $description = $didnt_find_banner['description'];
        $button = $didnt_find_banner['button'];
        $image = $didnt_find_banner['image'];
        $background_image = $didnt_find_banner['background_image'];
        $form_shortcode = $didnt_find_banner['form_shortcode'];
        $popup_img = $didnt_find_banner['popup_img']; ?>
        <section style="background-image: url('<?php echo $background_image["url"]; ?>')" class="didnt-find-banner" id="didnt-find-banner">
            <div class="container container_small">
                <div class="didnt-find-banner__wrapper">
                    <img class="didnt-find-banner__img" src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    <div class="didnt-find-banner__content">
                        <?php if($title):?>
                            <h2 class="didnt-find-banner__title"><?php echo $title; ?></h2>
                        <?php endif;?>
                        <?php if($description):?>
                            <p class="didnt-find-banner__text"><?php echo $description; ?></p>
                        <?php endif;?>
                        <?php if($button):?>
                            <a href="<?php echo $button['url'];?>" class="btn btn_big btn_light didnt-find-banner__btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?> alt="<?php echo $button['title'];?>"><?php echo $button['title'];?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
        <div class="popup didnt-find-banner__popup">
            <div class="close popup__close"></div>
            <div class="container container_small">
                <div class="popup__wrapper">
                    <?php if($popup_img):?>
                        <img src="<?php echo $popup_img['url'];?>" alt="<?php echo $popup_img['alt'];?>" title="<?php echo $popup_img['title'];?>" class="didnt-find-banner__popup-img">
                    <?php endif;?>
                    <div class="popup__content">
                        <?php if($title):?>
                            <h2 class="didnt-find-banner__popup-title"><?php echo $title;?></h2>
                        <?php endif;?>
                        <?php if($description):?>
                            <div class="didnt-find-banner__popup-text">
                                <?php echo $description;?>
                            </div>
                        <?php endif;?>
                        <?php if($form_shortcode): ?>
                            <div class="didnt-find-banner__popup-form"><?php echo do_shortcode($form_shortcode); ?></div>
                        <?php endif ; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;?>
</main>
<?php
get_footer(); ?>
