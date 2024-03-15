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
    $parking_icon = get_field('parking', 'option-estate')['url'];
    $subway_icon = get_field('subway', 'option-estate')['url'];
    $floors_icon = get_field('floors', 'option-estate')['url'];
    $address_icon = get_field('address', 'option-estate')['url'];
    $text_button_hero = get_field('hext_button_hero', 'option-estate');?>

    <main class="single-built-object">
        <section <?php if($hero_image):?> style="background-image: url('<?php echo $hero_image['url'];?>')" <?php endif;?> class="hero">
            <div class="container container_small">
                <div class="hero__wrapper">
                    <?php if($hero_image):?>
                        <div class="hero__tag"><?php echo $class_construction;?></div>
                    <?php endif;?>
                    <h1><?php single_term_title();?></h1>
                    <?php if($address):?>
                        <h6 class="hero__address">
                            <img src="<?php echo $address_icon;?>" alt="" class="icon">
                            <span class="text"><?php echo $address;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($parking):?>
                        <h6 class="hero__address">
                            <img src="<?php echo $parking_icon;?>" alt="" class="icon">
                            <span class="text"><?php echo $parking;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($distance_subway):?>
                        <h6 class="hero__address">
                            <img src="<?php echo $subway_icon;?>" alt="" class="icon">
                            <span class="text"><?php echo $distance_subway;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($floors):?>
                        <h6 class="hero__address">
                            <img src="<?php echo $floors_icon;?>" alt="" class="icon">
                            <span class="text"><?php echo $floors;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($text_button_hero):?>
                        <a href="#" class="btn btn_big"><?php echo $text_button_hero;?></a>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <section class="description">
            <div class="container container_small">
                <div class="description__wrapper">
                    <p><?php echo term_description(); ?></p>
                </div>
            </div>
        </section>
    </main>

<?php } else {
    $child_term_ids = get_term_children($term->term_id, 'estate_objects'); ?>
    <main class="catalogue-built-object">
<?php if (!empty($child_term_ids)) {?>
        <section class="cards-grid">
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
                            <h2 class="card__title"><?php echo $child_term->name; ?></h2>
                            <h4 class="card__address"><?php echo $address; ?></h4>
                            <a href="<?php echo $term_link; ?>" class="btn card_btn"><?php echo $button_build_estate; ?></a>
                        </div>
                    <?php }?>
                </div>
            </div>
        </section><?php } ?>
    </main>
<?php }
get_footer(); ?>
