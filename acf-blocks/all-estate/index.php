<!--<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="featured-post">
    <div class="container">
        <div class="featured-post__wrapper">
            <?php if($title = get_sub_field('title')): ?>
                <h1 class="featured-post__title"><?php echo $title;?></h1>
            <?php endif; ?>
            <?php $estate_query = new WP_Query(array(
                'post_type' => 'estate',
                'posts_per_page' => -1
            ));
            if ($estate_query->have_posts()) :?>
                <div class="row">
                    <?php while ($estate_query->have_posts()) : $estate_query->the_post(); ?>
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
                    wp_reset_postdata();?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>-->


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
                            <input class="estate-type-filter" type="checkbox" name="estate_type[]" value="<?php echo $type->slug; ?>">
                            <?php echo $type->name; ?>
                        </label><br>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <div class="taxonomy-filter">
                <h3>Estate District</h3>
                <?php
                $types = get_terms(array(
                    'taxonomy' => 'estate_district',
                    'hide_empty' => false,
                ));
                if (!empty($types)) :
                    foreach ($types as $type) : ?>
                        <label>
                            <input class="estate-district-filter" type="checkbox" name="estate_district[]" value="<?php echo $type->slug; ?>">
                            <?php echo $type->name; ?>
                        </label><br>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <div class="taxonomy-filter">
                <h3>Estate Compatible With</h3>
                <?php
                $types = get_terms(array(
                    'taxonomy' => 'estate_compatible',
                    'hide_empty' => false,
                ));
                if (!empty($types)) :
                    foreach ($types as $type) : ?>
                        <label>
                            <input class="estate-compatible-filter" type="checkbox" name="estate_compatible[]" value="<?php echo $type->slug; ?>">
                            <?php echo $type->name; ?>
                        </label><br>
                    <?php endforeach;
                endif;
                ?>
            </div>

            <!-- ACF meta tag filters (Range sliders) -->
            <div class="meta-filter">
                <h3>Room Area</h3>
                <div class="meta-filter__box">
                    <div class="price-outer price-outer_start"></div>
                    <input id="room-area-min" type="range" name="room_area_min" min="0" max="1000" value="0">
                    <input id="room-area-max" type="range" name="room_area_max" min="0" max="1000" value="1000">
                    <div class="price-outer price-outer_end"></div>
                    <div class="range_bg"></div>
                </div>
                <div class="meta-filter__numbers">
                    <input id="room-area-min-value" type="number" min="0" max="1000" value="0">
                    <input id="room-area-max-value" type="number" min="0" max="1000" value="1000">
                </div>
            </div>

            <!-- Button to trigger filtering -->
<!--            <button class="btn" id="filter-button">Apply Filters</button>-->
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
