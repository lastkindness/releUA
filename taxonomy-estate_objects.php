<?php

get_header();
$term = get_queried_object();
$term_id = get_queried_object_id();
if ($term && $term->parent) {
    $hero_image = get_field('image', $term);
    $class_construction = get_field('class_construction', $term);
    $address = get_field('address', $term);
    $parking = get_field('parking', $term);
    $distance_subway = get_field('distance_subway', $term);
    $floors = get_field('floors', $term);
    $text_button_hero = get_field('hext_button_hero', 'option-estate', $term);
    $seo_text = get_field('seo_text', $term);
    $seo_title = get_field('seo_title', $term);
    $title_available_properties = get_field('title_available_properties', 'option-estate');
    $title_other_built_objects = get_field('title_other_built_objects', 'option-estate');
    $more_real_estate = get_field('more_real_estate', 'option-estate');
    $title_map = get_field('title_map', 'option-estate');
    $map_coords = get_field('map_coords');
    $form_text = get_field('form_text', 'option-estate');
    $form_text_object = get_field('form_text_object', 'option-estate');
    $button_read_more = get_field('button_read_more', 'option-estate');
?>

    <main class="single-built-object">
        <section <?php if($hero_image):?> style="background-image: url('<?php echo $hero_image['url'];?>')" <?php endif;?> class="hero single-built-object__hero" id="hero">
            <div class="container container_small">
                <div class="hero__wrapper">
                    <?php if($hero_image):?>
                        <div class="hero__tag"><?php echo $class_construction;?></div>
                    <?php endif;?>
                    <h1 class="hero__title"><?php single_term_title();?></h1>
                    <?php if($address):?>
                        <h6 class="hero__item">
                            <i class="icon icon-address"></i>
                            <span class="text"><?php echo $address;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($parking):?>
                        <h6 class="hero__item">
                            <i class="icon icon-parking"></i>
                            <span class="text"><?php echo $parking;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($distance_subway):?>
                        <h6 class="hero__item">
                            <i class="icon icon-icon8"></i>
                            <span class="text"><?php echo $distance_subway;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($floors):?>
                        <h6 class="hero__item">
                            <i class="icon icon-build"></i>
                            <span class="text"><?php echo $floors;?></span>
                        </h6>
                    <?php endif;?>
                    <?php if($text_button_hero):?>
                        <a href="#" class="btn btn_big btn_light hero__btn"><?php echo $text_button_hero;?></a>
                    <?php endif;?>
                </div>
            </div>
        </section>
        <section class="description single-built-object__description" id="description">
            <div class="container container_small">
                <div class="description__wrapper">
                    <p><?php echo term_description(); ?></p>
                </div>
                <?php if($button_read_more):?>
                    <button class="btn description__btn"><?php echo $button_read_more;?></button>
                <?php endif;?>
            </div>
        </section>
        <?php if($form_text_object):?>
            <section id="form" class="contact-form single-built-object__form">
                <div class="container">
                    <div class="contact-form__wrapper">
                        <?php if( have_rows('form_text_object', 'option-estate') ):
                            while( have_rows('form_text_object', 'option-estate') ): the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                $shortcode_form = get_sub_field('shortcode_form');?>
                                <div class="contact-form__content">
                                    <?php if($title):?>
                                        <h2 class="contact-form__title"><?php echo $title;?></h2>
                                    <?php endif;?>
                                    <?php if($description):?>
                                        <div class="contact-form__description"><?php echo $description;?></div>
                                    <?php endif;?>
                                </div>
                                <?php if($shortcode_form): ?>
                                    <div class="contact-form__form"><?php echo do_shortcode($shortcode_form); ?></div>
                                <?php endif;
                            endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        <?php endif;?>
        <?php if($map_coords):?>
            <section id="map-section" class="map-section single-built-object__map">
                <div class="container">
                    <div class="map-section__wrapper">
                        <?php if($title_map):?>
                            <h4 class="map-section__title"><?php echo $title_map;?></h4>
                        <?php endif;?>
                        <?php while ( have_rows('map_coords') ) : the_row(); ?>
                            <?php if(get_sub_field('object') && get_sub_field('subway')):?>
                                <div id="map-box" class="map-section__box" data-object="<?php echo get_sub_field('object');?>" data-subway="<?php echo get_sub_field('subway');?>"></div>
                            <?php endif;?>
                        <?php endwhile;?>
                    </div>
                </div>
            </section>
        <?php endif;?>
        <section id="properties-this-building"  class="cards-grid cards-grid_properties-this-building single-built-object__properties-this-building">
            <div class="container">
                <?php if($title_available_properties):?>
                    <h3 class="h4 seo-text__title"><?php echo $title_available_properties; ?></h3>
                <?php endif;?>
                <div class="cards-grid__wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'estate',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'estate_objects',
                                'field' => 'term_id',
                                'terms' => $term_id
                            )
                        )
                    );
                    $posts_query = new WP_Query($args);

                    if ($posts_query->have_posts()) :
                        while ($posts_query->have_posts()) : $posts_query->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>" class="card">
                                <?php
                                $unique_property = get_field('unique_property', get_the_ID());
                                $text_unique_property = get_field('text_unique_property', 'option-estate');
                                $taxonomies = get_object_taxonomies(get_post());
                                $rent = get_field('rent', 'option-estate');
                                $no_rent = get_field('no_rent', 'option-estate');
                                $sale = get_field('sale', 'option-estate');
                                $no_sale = get_field('no_sale', 'option-estate');
                                $sale_price = get_field('sale_price');
                                $rental_price = get_field('rental_price');
                                ?>
                                <div class="card__img">
                                    <?php if($unique_property && $text_unique_property):?>
                                        <span class="tag"><?php echo $text_unique_property;?></span>
                                    <?php endif;?>
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('medium');
                                    else : ?>
                                        <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="image description">
                                    <?php endif; ?>
                                </div>
                                <div class="card__body">
                                    <?php the_title('<h1 class="card__title">', '</h1>') ?>
                                    <?php $address = get_field('address'); if ($address) : ?>
                                        <h6 class="card__address"><?php echo $address; ?></h6>
                                    <?php endif; ?>
                                    <ul class="card__prices">
                                        <li class="card__price">
                                            <?php if($rent):?>
                                                <span class="title"><?php echo $rent;?>:</span>
                                            <?php endif;?>
                                            <?php  if (has_term('rent', 'estate_category')||has_term('rent-en', 'estate_category')||has_term('rent-ru', 'estate_category')) {?>
                                                <span class="info"><?php echo $rental_price;?>uah./м²</span>
                                            <?php } else { ?>
                                                <span class="info"><?php echo $no_rent;?></span>
                                            <?php } ?>
                                        </li>
                                        <li class="card__price">
                                            <?php if($sale):?>
                                                <span class="title"><?php echo $sale;?>:</span>
                                            <?php endif;?>
                                            <?php  if (has_term('sale', 'estate_category')||has_term('sale-en', 'estate_category')||has_term('sale-ru', 'estate_category')) {?>
                                                <span class="info">$<?php echo $sale_price;?> м²</span>
                                            <?php } else { ?>
                                                <span class="info"><?php echo $no_sale;?></span>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                                <?php if (get_field('archive_button', 'options')) :
                                    $button = get_field('archive_button', 'options');
                                    ?>
                                    <button class="btn card__btn"><?php echo $button; ?></button>
                                <?php else : ?>
                                    <button class="btn card__btn"><?php _e('Learn more', 'ReleUA') ?></button>
                                <?php endif; ?>
                            </a>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<h4 class="card__title">No posts found</h4>';
                    endif;
                    ?>
                </div>
            </div>
        </section>

        <section id="other-built-objects"  class="cards-grid cards-grid_other-built-objects single-built-object__other-built-objects">
            <div class="container">
                <div class="swiper-container">
                    <?php if($title_other_built_objects):?>
                        <h3 class="h4 cards-grid__title">
                            <div class="swiper-button-prev"></div>
                            <span class="text"><?php echo $title_other_built_objects; ?></span>
                            <div class="swiper-button-next"></div>
                        </h3>
                    <?php endif;?>
                    <div class="cards-grid__wrapper swiper-wrapper">
                        <?php $current_term_id = get_queried_object_id();
                        $parent_terms = get_terms(array(
                            'taxonomy' => 'estate_objects',
                            'parent' => 0,
                            'exclude' => array($current_term_id),
                            'hide_empty' => false,
                        ));

                        if (!empty($parent_terms) && !is_wp_error($parent_terms)) {
                            foreach ($parent_terms as $parent_term) {
                                $child_terms = get_terms(array(
                                    'taxonomy' => 'estate_objects',
                                    'parent' => $parent_term->term_id,
                                    'exclude' => array($current_term_id),
                                    'hide_empty' => false,
                                ));
                                if (!empty($child_terms) && !is_wp_error($child_terms)) {
                                    foreach ($child_terms as $child_term) { $post_count = $child_term->count; ?>
                                        <a href="<?php echo get_term_link($child_term); ?>" class="card swiper-slide">
                                            <div class="card__img">
                                                <?php $image = get_field('image', 'estate_objects_' . $child_term->term_id)['url'];
                                                if ($image) : ?>
                                                    <img src="<?php echo($image); ?>" alt="image description">
                                                <?php else : ?>
                                                    <img src="<?php echo(get_field('logo', 'options')['url']); ?>" alt="image description">
                                                <?php endif; ?>
                                                <?php if($post_count):?>
                                                    <span class="tag">
                                                <span class="icon icon-build"></span>
                                                <span class="count"><?php echo $post_count;?></span>
                                            </span>
                                                <?php endif;?>
                                            </div>
                                            <div class="card__body">
                                                <h1 class="card__title"><?php echo $child_term->name; ?></h1>
                                                <?php $address = get_field('address', 'estate_objects_' . $child_term->term_id); if ($address) : ?>
                                                    <h6 class="card__address"><?php echo $address; ?></h6>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (get_field('archive_button', 'options')) :
                                                $button = get_field('archive_button', 'options');
                                                ?>
                                                <button class="btn card__btn"><?php echo $button; ?></button>
                                            <?php else : ?>
                                                <button class="btn card__btn"><?php _e('Learn more', 'ReleUA') ?></button>
                                            <?php endif; ?>
                                        </a>
                                        <?php
                                    }
                                }
                            }
                        } else {
                            echo '<h4 class="card__title">No posts found</h4>';
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <?php if($seo_text):?>
            <section id="seo-text" class="seo-text single-built-object__seo-text">
                <div class="container">
                    <div class="seo-text__wrapper">
                        <?php if($seo_title):?>
                            <h1 class="h4 seo-text__title"><?php echo $seo_title; ?></h1>
                        <?php endif;?>
                        <?php echo $seo_text; ?>
                    </div>
                </div>
            </section>
        <?php endif;?>

        <?php if($more_real_estate):?>
            <?php if( have_rows('more_real_estate', 'option-estate') ):
                while( have_rows('more_real_estate', 'option-estate') ): the_row();
                    $title = get_sub_field('title');
                    $description = get_sub_field('description');
                    $button = get_sub_field('button');
                    $image = get_sub_field('image');
                    $background_image = get_sub_field('background_image');?>
                    <section id="more-real-estate" class="more-real-estate single-built-object__more-real-estate" style="background-image: url('<?php echo $background_image;?>')">
                        <div class="container container_small">
                            <div class="more-real-estate__wrapper">
                                <div class="more-real-estate__content">
                                    <?php if($title):?>
                                        <h2 class="more-real-estate__title"><?php echo $title;?></h2>
                                    <?php endif;?>
                                    <?php if($description):?>
                                        <p class="more-real-estate__description"><?php echo $description;?></p>
                                    <?php endif;?>
                                    <?php if($button):?>
                                        <a href="<?php echo $button['url'];?>" class="more-real-estate__btn btn btn_big btn_light"><?php echo $button['title'];?></a>
                                    <?php endif;?>
                                </div>
                                <?php if($image):?>
                                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>" title="<?php echo $image['title'];?>" class="more-real-estate__img">
                                <?php endif;?>
                            </div>
                        </div>
                    </section>
                <?php endwhile; endif; endif;?>
    </main>

<?php } else {
    $child_term_ids = get_term_children($term->term_id, 'estate_objects');
    $term_title = single_term_title('', false);
    $didnt_find_banner = get_field('didnt_find', 'option-estate');?>
    <main class="catalogue-built-objects">
<?php if (!empty($child_term_ids)) {
        if($term_title):?>
            <section id="title-section" class="catalogue-built-objects__title-section title-section">
                <div class="container container_small">
                    <h1 class="h4 title"><?php echo $term_title; ?></h1>
                </div>
            </section>
        <?php endif;?>
        <section id="cards-grid" class="catalogue-built-objects__cards-grid cards-grid cards-grid_big cards-grid_decorate">
            <div class="container container_small">
                <div class="cards-grid__wrapper">
                    <?php foreach ($child_term_ids as $child_term_id) {
                        $child_term = get_term_by('id', $child_term_id, 'estate_objects');
                        $hero_image = get_field('image', $child_term);
                        $term_link = get_term_link($child_term);
                        $address = get_field('address', $child_term);
                        $unique_property = get_field('text_unique_property', $child_term);
                        $button_build_estate = get_field('button_build_estate', 'option-estate');
                        $post_count = $child_term->count;
                        ?>
                        <a href="<?php $term_link; ?>" class="card">
                            <?php if($hero_image):?>
                                <div class="card__img">
                                    <img class="img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
                                    <?php if($unique_property):?>
                                        <span class="tag"><?php echo $unique_property;?></span>
                                    <?php endif;?>
                                    <?php if($post_count):?>
                                        <span class="tag">
                                            <span class="icon icon-build"></span>
                                            <span class="count"><?php echo $post_count;?></span>
                                        </span>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                            <div class="card__body">
                                <h1 class="card__title"><?php echo $child_term->name; ?></h1>
                                <h4 class="card__address"><?php echo $address; ?></h4>
                                <button class="btn btn_dark card__btn"><?php echo $button_build_estate; ?></button>
                            </div>
                        </a>
                    <?php }?>
                </div>
            </div>
        </section><?php }
        $current_term = get_queried_object();
        if ($current_term instanceof WP_Term) {
            $term_id = $current_term->term_id;
            if($term_id):?>
                <section id="seo-text" class="catalogue-built-objects__seo-text seo-text">
                    <div class="container">
                        <div class="seo-text__wrapper">
                            <?php echo term_description($term_id, 'estate_objects'); ?>
                        </div>
                    </div>
                </section>
        <?php endif; }
        if($didnt_find_banner):
            $title = $didnt_find_banner['title'];
            $description = $didnt_find_banner['description'];
            $button = $didnt_find_banner['button'];
            $image = $didnt_find_banner['image'];
            $background_image = $didnt_find_banner['background_image']; ?>
            <section style="background-image: url('<?php echo $background_image["url"]; ?>')" class="catalogue-built-objects__didnt-find-banner didnt-find-banner" id="didnt-find-banner">
                <div class="container container_small">
                    <div class="didnt-find-banner__wrapper">
                        <img class="didnt-find-banner__img" src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                        <div class="didnt-find-banner__content">
                            <h2 class="didnt-find-banner__title"><?php echo $title; ?></h2>
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
<?php }
get_footer(); ?>
