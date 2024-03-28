<?php

get_header();
$term = get_queried_object();

if ($term && $term->parent) {
    $hero_image = get_field('image');
    $class_construction = get_field('class_construction');
    $address = get_field('address');
    $parking = get_field('parking');
    $distance_subway = get_field('distance_subway');
    $floors = get_field('floors');
    $text_button_hero = get_field('hext_button_hero', 'option-estate');
?>

    <main class="single-built-object">
        <section <?php if($hero_image):?> style="background-image: url('<?php echo $hero_image['url'];?>')" <?php endif;?> class="hero" id="hero">
            <div class="container container_small">
                <div class="hero__wrapper">
                    <?php if($hero_image):?>
                        <div class="hero__tag"><?php echo $class_construction;?></div>
                    <?php endif;?>
                    <h1 class="hero__title"><?php single_term_title();?></h1>
                    <?php if($address):?>
                        <h6 class="hero__address">
                            <i class="icon icon-address"></i>
                            <span class="text"><?php echo $address;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($parking):?>
                        <h6 class="hero__address">
                            <i class="icon icon-parking"></i>
                            <span class="text"><?php echo $parking;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($distance_subway):?>
                        <h6 class="hero__address">
                            <i class="icon icon-icon8"></i>
                            <span class="text"><?php echo $distance_subway;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($floors):?>
                        <h6 class="hero__address">
                            <i class="icon icon-build"></i>
                            <span class="text"><?php echo $floors;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($text_button_hero):?>
                        <a href="#" class="btn btn_big"><?php echo $text_button_hero;?></a>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <section class="description" id="description">
            <div class="container container_small">
                <div class="description__wrapper">
                    <p><?php echo term_description(); ?></p>
                </div>
            </div>
        </section>
    </main>

<?php } else {
    $child_term_ids = get_term_children($term->term_id, 'estate_objects');
    $term_title = single_term_title('', false);
    $didnt_find_banner = get_field('didnt_find', 'option-estate');?>
    <main class="catalogue-built-objects">
<?php if (!empty($child_term_ids)) {
        if($term_title):?>
            <section id="title" class="title-section">
                <div class="container">
                    <h1 class="title"><?php echo $term_title; ?></h1>
                </div>
            </section>
        <?php endif;?>
        <section id="cards-grid" class="cards-grid">
            <div class="container">
                <div class="cards-grid__wrapper">
                    <?php foreach ($child_term_ids as $child_term_id) {
                        $child_term = get_term_by('id', $child_term_id, 'estate_objects');
                        $hero_image = get_field('image', $child_term);
                        $term_link = get_term_link($child_term);
                        $address = get_field('address', $child_term);
                        $button_build_estate = get_field('button_build_estate', 'option-estate');?>
                        <div class="card">
                            <?php if($hero_image):?>
                                <img class="card__img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
                            <?php endif;?>
                            <h1 class="card__title"><?php echo $child_term->name; ?></h1>
                            <h4 class="card__address"><?php echo $address; ?></h4>
                            <a href="<?php echo $term_link; ?>" class="btn card_btn"><?php echo $button_build_estate; ?></a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section><?php }
        $current_term = get_queried_object();
        if ($current_term instanceof WP_Term) {
            $term_id = $current_term->term_id;
            if($term_id):?>
                <section id="seo-text" class="seo-text">
                    <div class="container">
                        <div class="seo-text__wrapper">
                            <?php echo term_description($term_id, 'estate_objects'); ?>
                        </div>
                    </div>
                </section>
        <?php endif; } if($didnt_find_banner):
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
                            <a href="<?php echo $button["url"]; ?>"><?php echo $button["title"]; ?></a>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif;?>
    </main>
<?php }
get_footer(); ?>
