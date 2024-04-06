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
            <div class="container">
                <h1 class="title"><?php echo $text_button_hero; ?></h1>
            </div>
        </section>
    <?php endif;?>
    <section class="cards-grid" id="cards-grid">
        <div class="container">
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
                            $post_count = $child_term->count;
                            ?>

                            <div class="card">
                                <?php if($hero_image):?>
                                    <div class="card__img">
                                        <img class="img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
                                        <?php if($post_count):?>
                                            <span class="tag">
                                                <span class="icon icon-build"></span>
                                                <span class="count"><?php echo $post_count;?></span>
                                            </span>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                                <h1 class="card__title"><?php echo $child_term->name; ?></h1>
                                <h4 class="card__address"><?php echo $address; ?></h4>
                                <a href="<?php echo $term_link; ?>" class="btn card_btn"><?php echo $button_build_estate; ?></a>
                            </div><?php
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
                    <h1 class="seo-text__title"><?php echo $seo_title; ?></h1>
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
        $background_image = $didnt_find_banner['background_image']; ?>
        <section style="background-image: url('<?php echo $background_image["url"]; ?>')" class="didnt-find-banner" id="didnt-find-banner">
            <div class="container">
                <div class="didnt-find-banner__wrapper">
                    <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    <div class="didnt-find-banner__content">
                        <h5 class="didnt-find-banner__title"><?php echo $title; ?></h5>
                        <p class="didnt-find-banner__text"><?php echo $description; ?></p>
                        <?php if($button):?>
                            <a href="<?php echo $button['url'];?>" class="btn btn_big btn_light didnt-find-banner__btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
</main>
<?php
get_footer(); ?>
