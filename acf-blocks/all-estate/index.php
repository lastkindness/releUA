<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="cards-block cards-grid">
    <div class="container">
        <?php if($title = get_sub_field('title')): ?>
            <h1 class="featured-post__title"><?php echo $title;?></h1>
        <?php endif; ?>
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
                <?php if($category_filter):?>
                    <h3 class="estate-filter__title"><?php echo $category_filter;?></h3>
                <?php endif;?>
                <button id="reset-filters-btn" style="display:none;">Reset All Filters</button>
                <?php
                $categories = get_terms(array(
                    'taxonomy' => 'estate_category',
                    'hide_empty' => false,
                ));
                if (!empty($categories)) :
                    foreach ($categories as $category) : ?>
                        <label>
                            <input class="estate-category-filter" type="checkbox" name="estate_category[]" value="<?php echo $category->slug; ?>">
                            <?php echo $category->name; ?>
                        </label><br>
                    <?php endforeach;
                endif;
                ?>
            </div>

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
                <?php if($subway_filter):?>
                    <h3 class="estate-filter__title"><?php echo $subway_filter;?></h3>
                <?php endif;?>
                <?php
                $subways = get_terms(array(
                    'taxonomy' => 'subway_station',
                    'hide_empty' => false,
                ));
                if (!empty($subways)) :
                    foreach ($subways as $subway) : ?>
                        <label>
                            <input class="estate-subway-filter" type="checkbox" name="subway_station[]" value="<?php echo $subway->term_id; ?>">
                            <?php echo $subway->name; ?>
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

            <div class="taxonomy-filter estate-filter__filter">
                <?php if($floor_filter):?>
                    <h3 class="estate-filter__title"><?php echo $floor_filter;?></h3>
                <?php endif;?>
                <?php
                $floor_numbers = array();
                $args = array(
                    'post_type' => 'estate',
                    'posts_per_page' => -1,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $floor = get_field('floor');
                        if ($floor && !in_array($floor, $floor_numbers)) {
                            $floor_numbers[] = $floor;
                        }
                    }
                    wp_reset_postdata();
                }
                if (!empty($floor_numbers)) {
                    foreach ($floor_numbers as $floor_number) : ?>
                        <label>
                            <input class="estate-floor-filter" type="checkbox" name="estate_floor[]" value="<?php echo $floor_number; ?>">
                            <?php echo $floor_number; ?>
                        </label><br>
                    <?php endforeach;
                }
                ?>
            </div>

            <div class="taxonomy-filter estate-filter__filter">
                <?php if($advertising_type_filter):?>
                    <h3 class="estate-filter__title"><?php echo $advertising_type_filter;?></h3>
                <?php endif;?>
                <?php
                $types_ad = get_terms(array(
                    'taxonomy' => 'types_ad',
                    'hide_empty' => false,
                ));
                if (!empty($types_ad)) :
                    foreach ($types_ad as $type_ad) : ?>
                        <label>
                            <input class="type-advertising-filter" type="checkbox" name="type_advertising[]" value="<?php echo $type_ad->term_id; ?>">
                            <?php echo $type_ad->name; ?>
                        </label><br>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <div class="taxonomy-filter estate-filter__filter">
                <?php if($backlight_filter):?>
                    <h3 class="estate-filter__title"><?php echo $backlight_filter;?></h3>
                <?php endif;?>
                <?php
                $backlights = array();
                $args = array(
                    'post_type' => 'estate',
                    'posts_per_page' => -1,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $backlight = get_field('lighting');
                        if ($backlight !== null && !in_array($backlight, $backlights)) {
                            $backlights[] = $backlight;
                        }
                    }
                    wp_reset_postdata();
                }
                if (!empty($backlights)) {
                    foreach ($backlights as $light) : ?>
                        <label>
                            <?php $light == 'true' ? $light='1' : $light='0'; ?>
                            <input class="estate-backlight-filter" type="checkbox" name="estate_backlight[]" value="<?php echo $light; ?>">
                            <?php $current_language = apply_filters( 'wpml_current_language', NULL );
                                switch ($current_language) {
                                    case 'en':
                                        echo $light == '1' ? 'Yes' : 'No';
                                        break;
                                    case 'ru':
                                        echo $light == '1' ? 'Да' : 'Нет';
                                        break;
                                    default:
                                        echo $light == '1' ? 'Так' : 'Ні';
                                }
                            ?>
                        </label><br>
                    <?php endforeach;
                }
                ?>
            </div>

            <div class="taxonomy-filter estate-filter__filter">
                <?php if($number_of_parking_spaces_filter):?>
                    <h3 class="estate-filter__title"><?php echo $number_of_parking_spaces_filter;?></h3>
                <?php endif;?>
                <?php
                $parking_spaces = array();
                $args = array(
                    'post_type' => 'estate',
                    'posts_per_page' => -1,
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $spaces = get_field('parking_spaces');
                        if ($spaces && !in_array($spaces, $parking_spaces)) {
                            $parking_spaces[] = $spaces;
                        }
                    }
                    wp_reset_postdata();
                }
                if (!empty($parking_spaces)) {
                    foreach ($parking_spaces as $parking_space) : if ($parking_space>0) { ?>
                        <label>
                            <input class="parking-spaces-filter" type="checkbox" name="parking_space[]" value="<?php echo $parking_space; ?>">
                            <?php echo $parking_space; ?>
                        </label><br>
                    <?php } endforeach;
                }
                ?>
            </div>

            <?php
            $args = array(
                'post_type' => 'estate',
                'posts_per_page' => -1,
            );

            $query = new WP_Query($args);

            $min_area = PHP_INT_MAX;
            $max_area = 0;

            $min_sale_price = PHP_INT_MAX;
            $max_sale_price = 0;

            $min_rental_price = PHP_INT_MAX;
            $max_rental_price = 0;

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    // Get the value of the "object_area" field using ACF function
                    $object_area = get_field('object_area');
                    $sale_price = get_field('sale_price');
                    $rental_price = get_field('rental_price');


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
            <div id="estate-results" class="cards-grid__wrapper">
                <?php
                $rent = get_field('rent', 'option-estate');
                $no_rent = get_field('no_rent', 'option-estate');
                $sale = get_field('sale', 'option-estate');
                $no_sale = get_field('no_sale', 'option-estate');
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get the current page number
                $estate_query = new WP_Query(array(
                    'post_type' => 'estate',
                    'posts_per_page' => 5,
                    'paged' => $paged
                ));
                if ($estate_query->have_posts()) :
                    while ($estate_query->have_posts()) : $estate_query->the_post(); ?>
                        <article class="card">
                            <?php $taxonomies = get_object_taxonomies(get_post());
                            $sale_price = get_field('sale_price');
                            $rental_price = get_field('rental_price');
                            ?>
                            <div class="card__img">
                                <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('medium');
                                else : ?>
                                    <img src="<?php echo get_field('logo', 'options')['url']; ?>" alt="image description">
                                <?php endif; ?>
                                <?php if (get_field('unique_property') && $unique_property = get_field('text_unique_property', 'option-estate')) : ?>
                                    <span class="tag"><?php echo $unique_property; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card__body">
                                <?php the_title('<h1 class="card__title">', '</h1>') ?>
                                <?php $address = get_field('address');
                                if ($address) : ?>
                                    <h6 class="card__address"><?php echo $address; ?></h6>
                                <?php endif; ?>
                                <ul class="card__prices">
                                    <li class="card__price">
                                        <?php if ($rent) : ?>
                                            <span class="title"><?php echo $rent; ?>:</span>
                                        <?php endif; ?>
                                        <?php if (has_term('rent', 'estate_category') || has_term('rent-en', 'estate_category') || has_term('rent-ru', 'estate_category')) { ?>
                                            <span class="info"><?php echo $rental_price; ?>uah./m²</span>
                                        <?php } else { ?>
                                            <span class="info"><?php echo $no_rent; ?></span>
                                        <?php } ?>
                                    </li>
                                    <li class="card__price">
                                        <?php if ($sale) : ?>
                                            <span class="title"><?php echo $sale; ?>:</span>
                                        <?php endif; ?>
                                        <?php if (has_term('sale', 'estate_category') || has_term('sale-en', 'estate_category') || has_term('sale-ru', 'estate_category')) { ?>
                                            <span class="info">$<?php echo $sale_price; ?> m²</span>
                                        <?php } else { ?>
                                            <span class="info"><?php echo $no_sale; ?></span>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                            <?php if (get_field('archive_button', 'options')) :
                                $button = get_field('archive_button', 'options'); ?>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php echo $button; ?></a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="btn"><?php _e('Learn more', 'ReleUA') ?></a>
                            <?php endif; ?>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>No estate posts found.</p>
                <?php endif; ?>
            </div>
            <?php if ($estate_query->max_num_pages > 1) : // Show the "Load More" button if there are more pages ?>
                <div id="load-more-container">
                    <button id="load-more-posts" class="btn" data-current-page="<?php echo $paged; ?>" data-max-pages="<?php echo $estate_query->max_num_pages; ?>"><?php _e('Load More', 'ReleUA'); ?></button>
                </div>
            <?php endif; ?>
        </section>
    </div>
</section>
