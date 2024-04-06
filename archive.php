<?php

get_header(); ?>
<main class="archive-estate">
    <section id="estate-catalogue" class="estate-catalogue">
        <div class="container">
            <div class="estate-catalogue__wrapper">
                <aside id="estate-filter" class="estate-filter">
                    <?php
                    $area_filter = get_field('area_filter', 'option-estate');
                    $rental_price_filter = get_field('rental_price_filter', 'option-estate');
                    $selling_price_filter = get_field('selling_price_filter', 'option-estate');
                    $district_filter = get_field('district_filter', 'option-estate');
                    $subway_filter = get_field('subway_filter', 'option-estate');
                    $floor_filter = get_field('floor_filter', 'option-estate');
                    $number_of_parking_spaces_filter = get_field('number_of_parking_spaces_filter', 'option-estate');
                    $purpose_filter = get_field('purpose_filter', 'option-estate');
                    $advertising_type_filter = get_field('advertising_type_filter', 'option-estate');
                    $backlight_filter = get_field('backlight_filter', 'option-estate');
                    $property_type_filter = get_field('property_type_filter', 'option-estate');
                    $category_filter = get_field('category_filter', 'option-estate');
                    ?>
                    <div class="taxonomy-filter estate-filter__filter">
                        <?php if($property_type_filter):?>
                            <h3 class="estate-filter__title"><?php echo $property_type_filter;?></h3>
                        <?php endif;?>
                        <?php
                        $types = get_terms(array(
                            'taxonomy' => 'estate_type',
                            'hide_empty' => false,
                        ));
                        if (!empty($types)) :
                            foreach ($types as $type) : ?>
                                <label>
                                    <input class="estate-type-filter" type="checkbox" name="estate_type[]" value="<?php echo $type->term_id; ?>">
                                    <?php echo $type->name; ?>
                                </label><br>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>

                    <div class="taxonomy-filter estate-filter__filter">
                        <?php if($district_filter):?>
                            <h3 class="estate-filter__title"><?php echo $district_filter;?></h3>
                        <?php endif;?>
                        <?php
                        $districts = get_terms(array(
                            'taxonomy' => 'estate_district',
                            'hide_empty' => false,
                        ));
                        if (!empty($districts)) :
                            foreach ($districts as $district) : ?>
                                <label>
                                    <input class="estate-district-filter" type="checkbox" name="estate_district[]" value="<?php echo $district->term_id; ?>">
                                    <?php echo $district->name; ?>
                                </label><br>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>

                    <div class="taxonomy-filter estate-filter__filter">
                        <?php if($purpose_filter):?>
                            <h3 class="estate-filter__title"><?php echo $purpose_filter;?></h3>
                        <?php endif;?>
                        <?php
                        $compatibles = get_terms(array(
                            'taxonomy' => 'estate_compatible',
                            'hide_empty' => false,
                        ));
                        if (!empty($compatibles)) :
                            foreach ($compatibles as $compatible) : ?>
                                <label>
                                    <input class="estate-compatible-filter" type="checkbox" name="estate_compatible[]" value="<?php echo $compatible->term_id; ?>">
                                    <?php echo $compatible->name; ?>
                                </label><br>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>

                    <?php
                    // Custom query to retrieve posts of the custom post type "estate"
                    $args = array(
                        'post_type' => 'estate',
                        'posts_per_page' => -1, // Retrieve all posts
                        // Add any other parameters you need for your query
                    );

                    $query = new WP_Query($args);

                    // Initialize variables to store min and max values
                    $min_area = PHP_INT_MAX;
                    $max_area = 0;

                    $min_sale_price = PHP_INT_MAX;
                    $max_sale_price = 0;

                    $min_rental_price = PHP_INT_MAX;
                    $max_rental_price = 0;

                    // Loop through the posts to find min and max values of "object_area" field
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            // Get the value of the "object_area" field using ACF function
                            $object_area = get_field('object_area');
                            $sale_price = get_field('sale_price');
                            $rental_price = get_field('rental_price');
                            // Update min and max values if necessary
                            if ($object_area < $min_area) {
                                $min_area = $object_area;
                            }
                            if ($object_area > $max_area) {
                                $max_area = $object_area;
                            }

                            if ($sale_price < $min_sale_price) {
                                $min_sale_price = $sale_price;
                            }
                            if ($sale_price > $max_sale_price) {
                                $max_sale_price = $sale_price;
                            }

                            if ($rental_price < $min_rental_price) {
                                $min_rental_price = $rental_price;
                            }
                            if ($rental_price > $max_rental_price) {
                                $max_rental_price = $rental_price;
                            }

                            $min_area = $min_area - 1;
                            $max_area = $max_area + 1;
                            $min_sale_price = $min_sale_price - 1;
                            $max_sale_price = $max_sale_price + 1;
                            $min_rental_price = $min_rental_price - 1;
                            $max_rental_price = $max_rental_price + 1;
                        }
                        // Restore original post data
                        wp_reset_postdata();
                    }

                    // Output the HTML with min and max values assigned to the input fields
                    ?>
                    <div class="meta-filter room-area-filter estate-filter__filter">
                        <?php if($area_filter):?>
                            <h3 class="estate-filter__title"><?php echo $area_filter;?></h3>
                        <?php endif;?>
                        <div class="meta-filter__box">
                            <div class="price-outer price-outer_start"></div>
                            <input id="room-area-min" type="range" name="room_area_min" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $min_area; ?>">
                            <input id="room-area-max" type="range" name="room_area_max" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $max_area; ?>">
                            <div class="price-outer price-outer_end"></div>
                            <div class="range_bg"></div>
                        </div>
                        <div class="meta-filter__numbers">
                            <input id="room-area-min-value" type="number" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $min_area; ?>">
                            <input id="room-area-max-value" type="number" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $max_area; ?>">
                        </div>
                    </div>

                    <div class="meta-filter sale-price-filter estate-filter__filter">
                        <?php if($selling_price_filter):?>
                            <h3 class="estate-filter__title"><?php echo $selling_price_filter;?></h3>
                        <?php endif;?>
                        <div class="meta-filter__box">
                            <div class="price-outer price-outer_start"></div>
                            <input id="sale-price-min" type="range" name="sale_price_min" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $min_sale_price; ?>">
                            <input id="sale-price-max" type="range" name="sale_price_max" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $max_sale_price; ?>">
                            <div class="price-outer price-outer_end"></div>
                            <div class="range_bg"></div>
                        </div>
                        <div class="meta-filter__numbers">
                            <input id="sale-price-min-value" type="number" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $min_sale_price; ?>">
                            <input id="sale-price-max-value" type="number" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $max_sale_price; ?>">
                        </div>
                    </div>

                    <div class="meta-filter rental-price-filter estate-filter__filter">
                        <?php if($rental_price_filter):?>
                            <h3 class="estate-filter__title"><?php echo $rental_price_filter;?></h3>
                        <?php endif;?>
                        <div class="meta-filter__box">
                            <div class="price-outer price-outer_start"></div>
                            <input id="rental-price-min" type="range" name="rental_price_min" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $min_rental_price; ?>">
                            <input id="rental-price-max" type="range" name="rental_price_max" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $max_rental_price; ?>">
                            <div class="price-outer price-outer_end"></div>
                            <div class="range_bg"></div>
                        </div>
                        <div class="meta-filter__numbers">
                            <input id="rental-price-min-value" type="number" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $min_rental_price; ?>">
                            <input id="rental-price-max-value" type="number" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $max_rental_price; ?>">
                        </div>
                    </div>
                </aside>
                <section class="cards-grid" id="cards-grid">
                    <?php if ( have_posts() ) : ?>
                        <?php $sticky_posts=get_option( 'sticky_posts' );?>
                        <div id="estate-results" class="cards-grid__wrapper">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <article class="card">
                                    <?php
                                    $unique_property = get_field('unique_property', get_the_ID());
                                    $text_unique_property = get_field('text_unique_property', 'option-estate');
                                    $taxonomies = get_object_taxonomies(get_post());
                                    ?>
                                    <div class="card__img">
                                        <?php if($unique_property && $text_unique_property):?>
                                            <span class="tag"><?php echo $text_unique_property;?></span>
                                        <?php endif;?>
                                        <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('medium');
                                        else : ?>
                                            <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                                        <?php endif; ?>
                                    </div>
                                    <div class="card__body">
                                        <?php the_title('<h1 class="card__title">', '</h1>') ?>
                                        <?php $address = get_field('address');
                                        $rent = get_field('rent', 'option-estate');
                                        $no_rent = get_field('no_rent', 'option-estate');
                                        $sale = get_field('sale', 'option-estate');
                                        $no_sale = get_field('no_sale', 'option-estate');
                                        $sale_price = get_field('sale_price');
                                        $rental_price = get_field('rental_price');
                                        if ($address) : ?>
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
                                    <?php if(get_field('archive_button','options')):
                                        $button = get_field('archive_button','options');?>
                                        <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                                    <?php else:?>
                                        <a href="<?php the_permalink();?>" class="btn"><?php _e('Learn more','ReleUA')?></a>
                                    <?php endif; ?>
                                </article>
                            <?php endwhile;?>
                        </div>
                        <?php get_template_part( 'parts/core/pagination' );?>
                    <?php endif;?>
                </section>
            </div>
        </div>
    </section>
    <section class="seo-text" id="seo-text">
        <div class="container">
            <div class="seo-text__wrapper">
                <p><?php echo term_description(); ?></p>
            </div>
        </div>
    </section>
    <?php $didnt_find_banner = get_field('didnt_find', 'option-estate');
    if($didnt_find_banner):
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
<?php get_footer(); ?>
