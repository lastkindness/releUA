<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="featured-post">
    <div class="container">
        <!-- Filter options -->
        <div id="estate-filter" class="estate-filter">
            <h2>Filter Options</h2>

            <!-- Taxonomy filters -->
            <div class="taxonomy-filter">
                <h3>Estate Category</h3>
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

            <div class="taxonomy-filter">
                <h3>Estate Type</h3>
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

            <div class="taxonomy-filter">
                <h3>Estate District</h3>
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

            <div class="taxonomy-filter">
                <h3>Estate Compatible With</h3>
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
            <div class="meta-filter room-area-filter">
                <h3>Room Area</h3>
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

            <div class="meta-filter sale-price-filter">
                <h3>Sale Price</h3>
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

            <div class="meta-filter rental-price-filter">
                <h3>Rental Price</h3>
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

        </div>

        <div class="featured-post__wrapper">
            <?php if($title = get_sub_field('title')): ?>
                <h1 class="featured-post__title"><?php echo $title;?></h1>
            <?php endif; ?>

            <div id="estate-results" class="row">
                <?php $estate_query = new WP_Query(array(
                    'post_type' => 'estate',
                    'posts_per_page' => -1
                ));
                if ($estate_query->have_posts()) :
                    while ($estate_query->have_posts()) : $estate_query->the_post(); ?>
                        <div class="col">
                            <article class="card">
                                <?php $taxonomies = get_object_taxonomies(get_post());?>
                                <div class="card__img">
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('medium');
                                    else : ?>
                                        <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                                    <?php endif; ?>
                                    <?php if(get_field('unique_property') && $unique_property = get_field('text_unique_property', 'option-estate')):?>
                                        <span class="tag"><?php echo $unique_property;?></span>
                                    <?php endif;?>
                                </div>
                                <div class="card__body">
                                    <?php the_title('<h5 class="card__title">','</h5>')?>
                                </div>
                                <?php if(get_field('archive_button','options')):
                                    $button = get_field('archive_button','options');?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                                <?php else:?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php _e('Learn more','ReleUA')?></a>
                                <?php endif; ?>
                            </article>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else: ?>
                    <p>No estate posts found.</p>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
