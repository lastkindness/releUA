<?php

get_header();
$queried_object = get_queried_object();
?>
<main class="archive-estate">
    <section id="estate-catalogue" class="estate-catalogue">
        <div class="container">
            <h1 class="h4 estate-catalogue__title"><?php echo $queried_object->name;?></h1>
            <div class="estate-catalogue__wrapper">
                <?php function is_mobile() {
                    return (bool) preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $_SERVER['HTTP_USER_AGENT']) || (bool) preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobile))/i', $_SERVER['HTTP_USER_AGENT']);
                }
                if (is_mobile()) { ?>
                    <aside id="estate-filter" class="estate-filter estate-catalogue__filter estate-catalogue__filter_mobile">
                        <?php
                        $main_title_filters = get_field('main_title_filters', 'option-estate');
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
                        $property_units_found = get_field('property_units_found', 'option-estate');
                        $reset_all_filters = get_field('reset_all_filters', 'option-estate');
                        $default_posts_per_page = get_option( 'posts_per_page' );
                        ?>
                        <?php if($main_title_filters):?>
                            <h6 class="estate-filter__main-title">
                                <span class="icon"><svg class="t-store__filter__opts-mob-btn-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 63.42 100"><defs><style>.cls-1{fill:#1d1d1b;}</style></defs><path class="cls-1" d="M13.75,22.59V.38h-6V22.59a10.75,10.75,0,0,0,0,20.64V99.62h6V43.23a10.75,10.75,0,0,0,0-20.64Z"></path><path class="cls-1" d="M63.42,67.09a10.75,10.75,0,0,0-7.75-10.32V.38h-6V56.77a10.75,10.75,0,0,0,0,20.64V99.62h6V77.41A10.75,10.75,0,0,0,63.42,67.09Z"></path></svg></span>
                                <span class="title"><?php echo $main_title_filters; ?></span>
                            </h6>
                        <?php endif;?>
                        <div class="handorgel">
                            <div class="estate-filter__controls">
                                <input id="max-posts" type="hidden" value="<?php echo wp_count_posts('estate')->publish/3; ?>">
                                <input id="posts-per-page" type="hidden" value="<?php echo $default_posts_per_page; ?>">
                                <div id="found-filters-block" style="display:none;" class="estate-filter__found">
                                    <?php if($property_units_found):?>
                                        <span class="text"><?php echo $property_units_found; ?>: </span>
                                    <?php endif;?>
                                    <span id="found-filters-posts" class="found"></span>
                                </div>
                                <?php if($reset_all_filters):?>
                                    <span id="reset-filters-btn" class="estate-filter__reset" style="display:none;"><?php echo $reset_all_filters; ?></span>
                                <?php endif;?>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($category_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $category_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $categories = get_terms(array(
                                            'taxonomy' => 'estate_category',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($categories)) :
                                            foreach ($categories as $category) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current category is the queried taxonomy
                                                    $checked = is_tax('estate_category', $category->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="estate-category-filter" type="checkbox" name="estate_category[]" value="<?php echo $category->slug; ?>" <?php echo $checked; ?>>
                                                    <?php echo $category->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($property_type_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $property_type_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $types = get_terms(array(
                                            'taxonomy' => 'estate_type',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($types)) :
                                            foreach ($types as $type) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current type is the queried taxonomy
                                                    $checked = is_tax('estate_type', $type->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="estate-type-filter" type="checkbox" name="estate_type[]" value="<?php echo $type->term_id; ?>" <?php echo $checked; ?>>
                                                    <?php echo $type->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($district_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $district_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $districts = get_terms(array(
                                            'taxonomy' => 'estate_district',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($districts)) :
                                            foreach ($districts as $district) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current district is the queried taxonomy
                                                    $checked = is_tax('estate_district', $district->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="estate-district-filter" type="checkbox" name="estate_district[]" value="<?php echo $district->term_id; ?>" <?php echo $checked; ?>>
                                                    <?php echo $district->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($subway_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $subway_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $subways = get_terms(array(
                                            'taxonomy' => 'subway_station',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($subways)) :
                                            foreach ($subways as $subway) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current subway station is the queried taxonomy
                                                    $checked = is_tax('subway_station', $subway->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="estate-subway-filter" type="checkbox" name="subway_station[]" value="<?php echo $subway->term_id; ?>" <?php echo $checked; ?>>
                                                    <?php echo $subway->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($purpose_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $purpose_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $compatibles = get_terms(array(
                                            'taxonomy' => 'estate_compatible',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($compatibles)) :
                                            foreach ($compatibles as $compatible) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current compatible purpose is the queried taxonomy
                                                    $checked = is_tax('estate_compatible', $compatible->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="estate-compatible-filter" type="checkbox" name="estate_compatible[]" value="<?php echo $compatible->term_id; ?>" <?php echo $checked; ?>>
                                                    <?php echo $compatible->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="taxonomy-filter estate-filter__filter">
                                <?php if($advertising_type_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $advertising_type_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <?php $types_ad = get_terms(array(
                                            'taxonomy' => 'types_ad',
                                            'hide_empty' => false,
                                        ));
                                        if (!empty($types_ad)) :
                                            foreach ($types_ad as $type_ad) : ?>
                                                <label>
                                                    <?php
                                                    // Check if the current advertising type is the queried taxonomy
                                                    $checked = is_tax('types_ad', $type_ad->slug) ? 'checked' : '';
                                                    ?>
                                                    <input class="type-advertising-filter" type="checkbox" name="type_advertising[]" value="<?php echo $type_ad->term_id; ?>" <?php echo $checked; ?>>
                                                    <?php echo $type_ad->name; ?>
                                                </label>
                                            <?php endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
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

                                    if ($object_area < 0) {
                                        $object_area=0;
                                    }
                                    if ($sale_price < 0) {
                                        $sale_price=0;
                                    }
                                    if ($rental_price < 0) {
                                        $rental_price=0;
                                    }

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

                                    if ($min_area < 0) {
                                        $min_area = 0;
                                    }
                                    if ($min_sale_price < 0) {
                                        $min_sale_price = 0;
                                    }
                                    if ($min_rental_price < 0) {
                                        $min_rental_price = 0;
                                    }
                                }
                                wp_reset_postdata();?>
                            <?php } ?>
                            <div class="meta-filter room-area-filter estate-filter__filter">
                                <?php if($area_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $area_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <div class="meta-filter__box">
                                            <div class="price-outer price-outer_start"></div>
                                            <input id="room-area-min" type="range" name="room_area_min" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $min_area; ?>">
                                            <input id="room-area-max" type="range" name="room_area_max" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $max_area; ?>">
                                            <div class="price-outer price-outer_end"></div>
                                            <div class="range_bg"></div>
                                        </div>
                                        <div class="meta-filter__numbers">
                                            <input id="room-area-min-value" type="number" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $min_area; ?>">
                                            —
                                            <input id="room-area-max-value" type="number" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $max_area; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-filter sale-price-filter estate-filter__filter">
                                <?php if($selling_price_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $selling_price_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <div class="meta-filter__box">
                                            <div class="price-outer price-outer_start"></div>
                                            <input id="sale-price-min" type="range" name="sale_price_min" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $min_sale_price; ?>">
                                            <input id="sale-price-max" type="range" name="sale_price_max" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $max_sale_price; ?>">
                                            <div class="price-outer price-outer_end"></div>
                                            <div class="range_bg"></div>
                                        </div>
                                        <div class="meta-filter__numbers">
                                            <input id="sale-price-min-value" type="number" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $min_sale_price; ?>">
                                            —
                                            <input id="sale-price-max-value" type="number" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $max_sale_price; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="meta-filter rental-price-filter estate-filter__filter">
                                <?php if($rental_price_filter):?>
                                    <h6 class="estate-filter__title handorgel__header">
                                        <button class="handorgel__header__button"><?php echo $rental_price_filter;?></button>
                                    </h6>
                                <?php endif;?>
                                <div class="handorgel__content">
                                    <div class="handorgel__content__inner">
                                        <div class="meta-filter__box">
                                            <div class="price-outer price-outer_start"></div>
                                            <input id="rental-price-min" type="range" name="rental_price_min" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $min_rental_price; ?>">
                                            <input id="rental-price-max" type="range" name="rental_price_max" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $max_rental_price; ?>">
                                            <div class="price-outer price-outer_end"></div>
                                            <div class="range_bg"></div>
                                        </div>
                                        <div class="meta-filter__numbers">
                                            <input id="rental-price-min-value" type="number" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $min_rental_price; ?>">
                                            —
                                            <input id="rental-price-max-value" type="number" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $max_rental_price; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                <?php } else { ?>
                    <aside id="estate-filter" class="estate-filter estate-catalogue__filter">
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
                        $property_units_found = get_field('property_units_found', 'option-estate');
                        $reset_all_filters = get_field('reset_all_filters', 'option-estate');
                        $default_posts_per_page = get_option( 'posts_per_page' );
                        ?>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($category_filter):?>
                                <h6 class="estate-filter__title"><?php echo $category_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $categories = get_terms(array(
                                'taxonomy' => 'estate_category',
                                'hide_empty' => false,
                            ));
                            if (!empty($categories)) :
                                foreach ($categories as $category) : ?>
                                    <label>
                                        <?php
                                        // Check if the current category is the queried taxonomy
                                        $checked = is_tax('estate_category', $category->slug) ? 'checked' : '';
                                        ?>
                                        <input class="estate-category-filter" type="checkbox" name="estate_category[]" value="<?php echo $category->slug; ?>" <?php echo $checked; ?>>
                                        <?php echo $category->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($property_type_filter):?>
                                <h6 class="estate-filter__title"><?php echo $property_type_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $types = get_terms(array(
                                'taxonomy' => 'estate_type',
                                'hide_empty' => false,
                            ));
                            if (!empty($types)) :
                                foreach ($types as $type) : ?>
                                    <label>
                                        <?php
                                        // Check if the current type is the queried taxonomy
                                        $checked = is_tax('estate_type', $type->slug) ? 'checked' : '';
                                        ?>
                                        <input class="estate-type-filter" type="checkbox" name="estate_type[]" value="<?php echo $type->term_id; ?>" <?php echo $checked; ?>>
                                        <?php echo $type->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($district_filter):?>
                                <h6 class="estate-filter__title"><?php echo $district_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $districts = get_terms(array(
                                'taxonomy' => 'estate_district',
                                'hide_empty' => false,
                            ));
                            if (!empty($districts)) :
                                foreach ($districts as $district) : ?>
                                    <label>
                                        <?php
                                        // Check if the current district is the queried taxonomy
                                        $checked = is_tax('estate_district', $district->slug) ? 'checked' : '';
                                        ?>
                                        <input class="estate-district-filter" type="checkbox" name="estate_district[]" value="<?php echo $district->term_id; ?>" <?php echo $checked; ?>>
                                        <?php echo $district->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($subway_filter):?>
                                <h6 class="estate-filter__title"><?php echo $subway_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $subways = get_terms(array(
                                'taxonomy' => 'subway_station',
                                'hide_empty' => false,
                            ));
                            if (!empty($subways)) :
                                foreach ($subways as $subway) : ?>
                                    <label>
                                        <?php
                                        // Check if the current subway station is the queried taxonomy
                                        $checked = is_tax('subway_station', $subway->slug) ? 'checked' : '';
                                        ?>
                                        <input class="estate-subway-filter" type="checkbox" name="subway_station[]" value="<?php echo $subway->term_id; ?>" <?php echo $checked; ?>>
                                        <?php echo $subway->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($purpose_filter):?>
                                <h6 class="estate-filter__title"><?php echo $purpose_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $compatibles = get_terms(array(
                                'taxonomy' => 'estate_compatible',
                                'hide_empty' => false,
                            ));
                            if (!empty($compatibles)) :
                                foreach ($compatibles as $compatible) : ?>
                                    <label>
                                        <?php
                                        // Check if the current compatible purpose is the queried taxonomy
                                        $checked = is_tax('estate_compatible', $compatible->slug) ? 'checked' : '';
                                        ?>
                                        <input class="estate-compatible-filter" type="checkbox" name="estate_compatible[]" value="<?php echo $compatible->term_id; ?>" <?php echo $checked; ?>>
                                        <?php echo $compatible->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
                            ?>
                        </div>
                        <div class="taxonomy-filter estate-filter__filter">
                            <?php if($advertising_type_filter):?>
                                <h6 class="estate-filter__title"><?php echo $advertising_type_filter;?></h6>
                            <?php endif;?>
                            <?php
                            $types_ad = get_terms(array(
                                'taxonomy' => 'types_ad',
                                'hide_empty' => false,
                            ));
                            if (!empty($types_ad)) :
                                foreach ($types_ad as $type_ad) : ?>
                                    <label>
                                        <?php
                                        // Check if the current advertising type is the queried taxonomy
                                        $checked = is_tax('types_ad', $type_ad->slug) ? 'checked' : '';
                                        ?>
                                        <input class="type-advertising-filter" type="checkbox" name="type_advertising[]" value="<?php echo $type_ad->term_id; ?>" <?php echo $checked; ?>>
                                        <?php echo $type_ad->name; ?>
                                    </label>
                                <?php endforeach;
                            endif;
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

                                if ($object_area < 0) {
                                    $object_area=0;
                                }
                                if ($sale_price < 0) {
                                    $sale_price=0;
                                }
                                if ($rental_price < 0) {
                                    $rental_price=0;
                                }

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

                                if ($min_area < 0) {
                                    $min_area = 0;
                                }
                                if ($min_sale_price < 0) {
                                    $min_sale_price = 0;
                                }
                                if ($min_rental_price < 0) {
                                    $min_rental_price = 0;
                                }
                            }
                            wp_reset_postdata();?>
                        <?php } ?>
                        <div class="meta-filter room-area-filter estate-filter__filter">
                            <?php if($area_filter):?>
                                <h6 class="estate-filter__title"><?php echo $area_filter;?></h6>
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
                                —
                                <input id="room-area-max-value" type="number" min="<?php echo $min_area; ?>" max="<?php echo $max_area; ?>" value="<?php echo $max_area; ?>">
                            </div>
                        </div>
                        <div class="meta-filter sale-price-filter estate-filter__filter">
                            <?php if($selling_price_filter):?>
                                <h6 class="estate-filter__title"><?php echo $selling_price_filter;?></h6>
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
                                —
                                <input id="sale-price-max-value" type="number" min="<?php echo $min_sale_price; ?>" max="<?php echo $max_sale_price; ?>" value="<?php echo $max_sale_price; ?>">
                            </div>
                        </div>
                        <div class="meta-filter rental-price-filter estate-filter__filter">
                            <?php if($rental_price_filter):?>
                                <h6 class="estate-filter__title"><?php echo $rental_price_filter;?></h6>
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
                                —
                                <input id="rental-price-max-value" type="number" min="<?php echo $min_rental_price; ?>" max="<?php echo $max_rental_price; ?>" value="<?php echo $max_rental_price; ?>">
                            </div>
                        </div>
                        <div class="estate-filter__controls">
                            <input id="max-posts" type="hidden" value="<?php echo wp_count_posts('estate')->publish/3; ?>">
                            <input id="posts-per-page" type="hidden" value="<?php echo $default_posts_per_page; ?>">
                            <div id="found-filters-block" style="display:none;" class="estate-filter__found">
                                <?php if($property_units_found):?>
                                    <span class="text"><?php echo $property_units_found; ?>: </span>
                                <?php endif;?>
                                <span id="found-filters-posts" class="found"></span>
                            </div>
                            <?php if($reset_all_filters):?>
                                <span id="reset-filters-btn" class="estate-filter__reset" style="display:none;"><?php echo $reset_all_filters; ?></span>
                            <?php endif;?>
                        </div>
                    </aside>
                <?php } ?>
                <section class="cards-grid estate-catalogue__grid" id="cards-grid">
                    <?php
                    $button_load_more = get_field('button_load_more', 'option-estate');
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    if (is_archive()) {
                        if (is_tax()) {
                            $current_taxonomy = get_queried_object();
                            $current_taxonomy_id = get_queried_object_id();
                            $taxonomy_slug = $current_taxonomy->taxonomy;
                            $estate_query = new WP_Query(array(
                                'post_type' => 'estate',
                                'posts_per_page' => 24,
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy_slug,
                                        'field' => 'term_id',
                                        'terms' => $current_taxonomy_id,
                                    ),
                                ),
                            ));
                        } else {
                            $estate_query = new WP_Query(array(
                                'post_type' => 'estate',
                                'posts_per_page' => 24,
                                'paged' => $paged,
                            ));
                        }
                    }
                    if ($estate_query->have_posts()) : ?>
                        <div id="estate-results" class="cards-grid__wrapper">
                            <?php while ($estate_query->have_posts()) : $estate_query->the_post(); ?>
                                <a href="<?php the_permalink();?>" class="card">
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
                                        <button class="btn card__btn"><?php echo $button;?></button>
                                    <?php else:?>
                                        <button class="btn card__btn"><?php _e('Learn more','ReleUA')?></button>
                                    <?php endif; ?>
                                </a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                    <?php else : ?>
                        <h3>No estate posts found.</h3>
                    <?php endif; ?>
                    <div id="load-more-container" class="cards-grid__btn">
                        <button id="load-more-posts" class="btn <?php if ($estate_query->max_num_pages <= 1) : echo "btn_disabled"; endif; ?>" <?php if ($estate_query->max_num_pages <= 1) : echo "disabled"; endif; ?> data-current-page="<?php echo $paged; ?>" data-max-pages="<?php echo $estate_query->max_num_pages; ?>">
                            <?php if ($button_load_more) : echo $button_load_more; else : _e('Load More', 'ReleUA'); endif; ?>
                        </button>
                    </div>
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
<?php get_footer(); ?>
