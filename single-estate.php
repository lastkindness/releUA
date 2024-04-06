<?php $post = get_post();
$current_post_id = get_the_ID();
$taxonomies = get_object_taxonomies($post);?>
<?php get_header();
    $submit_button = get_field('submit_button', 'option-estate');
    $button_load_more = get_field('button_load_more', 'option-estate');
    $rent = get_field('rent', 'option-estate');
    $no_rent = get_field('no_rent', 'option-estate');
    $no_rent_tooltip = get_field('no_rent_tooltip', 'option-estate');
    $sale = get_field('sale', 'option-estate');
    $no_sale = get_field('no_sale', 'option-estate');
    $no_sale_tooltip = get_field('no_sale_tooltip', 'option-estate');
    $minimum_rental = get_field('minimum_rental', 'option-estate');
    $best_for = get_field('best_for', 'option-estate');
    $characteristics_block = get_field('characteristics_block', 'option-estate');
    $text_no_elevator = get_field('text_no_elevator', 'option-estate');
    $text_elevator = get_field('text_elevator', 'option-estate');
    $text_not_furnished = get_field('text_not_furnished', 'option-estate');
    $text_furnished = get_field('text_furnished', 'option-estate');
    $text_no_parking = get_field('text_no_parking', 'option-estate');
    $text_parking = get_field('text_parking', 'option-estate');
    $electricity_units = get_field('electricity_units', 'option-estate');
    $form_text_object = get_field('form_text_object', 'option-estate');
    $title_slider = get_field('title_slider', 'option-estate');
    $title_map = get_field('title_map', 'option-estate');
    $title_see_more = get_field('title_see_more', 'option-estate');
    $more_real_estate = get_field('more_real_estate', 'option-estate');
    $floor_text = get_field('text_floor', 'option-estate');



    if ( have_posts() ) : ?>
        <main class="single-estate">
            <?php while ( have_posts() ) : the_post();
                $main_images = get_field('main_images');
                $object_area = get_field('object_area');
                $ad_banner_size = get_field('ad_banner_size');
                $sale_price = get_field('sale_price');
                $rental_price = get_field('rental_price');
                $minimum_rental_period = get_field('minimum_rental_period');
                $address = get_field('address');
                $distance_subway = get_field('distance_subway');
                $condition = get_field('condition');
                $floor = get_field('floor');
                $car_park = get_field('car_park');
                $lift = get_field('lift');
                $furnished = get_field('furnished');
                $electricity = get_field('electricity');
                $additional_information = get_field('additional_information');
                $map_coords = get_field('map_coords');
                $slider_images = get_field('slider_images');
                $seo_title = get_field('seo_title');
                $seo_text = get_field('seo_text');
            ?>
                <div class="single-estate__wrapper">
                    <?php if($main_images):?>
                        <section id="gallery" class="single-estate__gallery gallery">
                            <div class="container">
                                <div class="row">
                                    <?php while (have_rows('main_images') ) : the_row(); ?>
                                        <?php if($image=get_sub_field('image')):?>
                                            <div class="col">
                                                <a href="<?php echo $image['url'];?>" class="glightbox">
                                                    <img src="<?php echo $image['url'];?>" title="<?php echo $image['title'];?>" alt="<?php echo $image['alt'];?>">
                                                </a>
                                            </div>
                                        <?php endif;?>
                                    <?php endwhile;?>
                                </div>
                            </div>
                        </section>
                    <?php endif;?>
                    <section id="map-section" class="single-estate__info">
                        <div class="container">
                            <div class="article-section__wrapper">
                                <?php the_title('<h1 class="article-section__title">','</h1>')?>
                                <div class="article-section__buttons">
                                    <div class="article-section__button article-section__button_rent">
                                        <?php if($rent):?>
                                            <a href="#form" class="btn btn-order"><?php echo $rent;?></a>
                                        <?php endif;?>
                                        <?php  if (has_term('rent', 'estate_category')||has_term('rent-en', 'estate_category')||has_term('rent-ru', 'estate_category')) {?>
                                            <div class="info"><?php echo $rental_price;?>uah./м²</div>
                                        <?php } else { ?>
                                            <div class="info"><?php echo $no_rent;?></div>
                                        <?php } ?>
                                        <?php  if (!has_term('rent', 'estate_category')&!has_term('rent-en', 'estate_category')&!has_term('rent-ru', 'estate_category')) {?>
                                            <div class="tooltip">
                                                <i class="icon">i</i>
                                                <div class="text"><?php echo $no_rent_tooltip;?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="article-section__button article-section__button_sale">
                                        <?php if($sale):?>
                                            <a href="#form" class="btn btn-order"><?php echo $sale;?></a>
                                        <?php endif;?>
                                        <?php  if (has_term('sale', 'estate_category')||has_term('sale-en', 'estate_category')||has_term('sale-ru', 'estate_category')) {?>
                                            <div class="info">$<?php echo $sale_price;?> м²</div>
                                        <?php } else { ?>
                                            <div class="info"><?php echo $no_sale;?></div>
                                        <?php } ?>
                                        <?php  if (!has_term('sale', 'estate_category')&!has_term('sale-en', 'estate_category')&!has_term('sale-ru', 'estate_category')) {?>
                                            <div class="tooltip">
                                                <i class="icon">i</i>
                                                <div class="text"><?php echo $no_sale_tooltip;?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if($submit_button):?>
                                        <a href="#form" class="btn btn-order"><?php echo $submit_button;?></a>
                                    <?php endif;?>
                                </div>
                                <div class="article-section__description">
                                    <?php the_content();?>
                                </div>
                                <ul class="article-section__details">
                                    <li class="article-section__detail">
                                        <?php if($minimum_rental):?>
                                            <span class="title"><?php echo $minimum_rental;?>:</span>
                                        <?php endif;?>
                                        <?php if($minimum_rental_period):?>
                                            <span class="tags">
                                                    <span class="tag"><?php echo $minimum_rental_period;?></span>
                                                </span>
                                        <?php endif;?>
                                    </li>
                                    <li class="article-section__detail">
                                        <?php if($best_for):?>
                                            <span class="title"><?php echo $best_for;?>:</span>
                                        <?php endif;?>
                                        <?php $compatible_terms = get_the_terms(get_the_ID(), 'estate_compatible'); if ($compatible_terms && !is_wp_error($compatible_terms)) {?>
                                            <span class="tags">
                                                <?php foreach ($compatible_terms as $term) {
                                                    $term_name = apply_filters('wpml_translate_single_string', $term->name, 'taxonomy name', 'slug:'.$term->slug);
                                                    echo '<span class="tag">' . $term_name . '</span>, ';
                                                }?>
                                                </span>
                                        <?php }?>
                                    </li>
                                </ul>
                                <div class="article-section__characteristics">
                                    <?php if($characteristics_block):?>
                                        <h3 class="article-section__characteristic-title"><?php echo $characteristics_block;?></h3>
                                    <?php endif;?>
                                    <ul class="article-section__characteristic-list">
                                        <?php if($address):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon12"></i>
                                                <span class="text"><?php echo $address;?></span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($object_area):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon11"></i>
                                                <span class="text"><?php echo $object_area;?> m²</span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($ad_banner_size):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon11"></i>
                                                <span class="text"><?php echo $ad_banner_size;?> mm</span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($distance_subway):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon8"></i>
                                                <span class="text"><?php echo $distance_subway;?></span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($condition):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon10"></i>
                                                <span class="text"><?php echo $condition;?></span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($floor):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon9"></i>
                                                <span class="text"><?php echo $floor . ' ' . $floor_text;?></span>
                                            </li>
                                        <?php endif;?>
                                        <?php if($additional_information):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-build"></i>
                                                <span class="text"><?php echo $additional_information;?></span>
                                            </li>
                                        <?php endif;?>
                                        <li class="article-section__characteristic">
                                            <i class="icon icon-icon15"></i>
                                            <span class="text">
                                                    <?php if($furnished): echo $text_furnished; else: echo $text_not_furnished; endif;?>
                                                </span>
                                        </li>
                                        <li class="article-section__characteristic">
                                            <i class="icon icon-icon6"></i>
                                            <span class="text">
                                                    <?php if($car_park): echo $text_parking; else: echo $text_no_parking; endif;?>
                                                </span>
                                        </li>
                                        <li class="article-section__characteristic">
                                            <i class="icon icon-icon5"></i>
                                            <span class="text">
                                                    <?php if($lift): echo $text_elevator; else: echo $text_no_elevator; endif;?>
                                                </span>
                                        </li>
                                        <?php if($electricity):?>
                                            <li class="article-section__characteristic">
                                                <i class="icon icon-icon4"></i>
                                                <span class="text"><?php echo $electricity . ' ' . $electricity_units;?></span>
                                            </li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php if($form_text_object):?>
                        <section id="form" class="form single-estate__form">
                            <div class="container">
                                <div class="form__wrapper">
                                    <?php if( have_rows('form_text_object', 'option-estate') ):
                                        while( have_rows('form_text_object', 'option-estate') ): the_row();
                                            $title = get_sub_field('title');
                                            $description = get_sub_field('description');
                                            $shortcode_form = get_sub_field('shortcode_form');
                                            if($title):?>
                                                <h2><?php echo $title;?></h2>
                                            <?php endif;?>
                                            <?php if($description):?>
                                                <p><?php echo $description;?></p>
                                            <?php endif;?>
                                            <?php if($shortcode_form): ?>
                                                <div class="contacts__popup-form"><?php echo do_shortcode($shortcode_form); ?></div>
                                            <?php endif;
                                        endwhile;
                                    endif; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif;?>
                    <?php if($slider_images):?>
                        <section id="slider-img" class="slider-img single-estate__slider-img">
                            <div class="container">
                                <h3 class="article-section__slider-title"><?php echo $title_slider;?></h3>
                                <div class="slider-img__slider">
                                    <div class="swiper-wrapper">
                                        <?php while ( have_rows('slider_images') ) : the_row(); ?>
                                            <div class="swiper-slide">
                                                <div class="row">
                                                    <?php if($image=get_sub_field('image')):?>
                                                        <div class="col">
                                                            <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                                        </div>
                                                    <?php endif;?>
                                                    <div class="col">
                                                        <?php if($title=get_sub_field('title')):?>
                                                            <h3><?php echo $title;?></h3>
                                                        <?php endif;?>
                                                        <?php the_sub_field('text'); ?>
                                                        <?php if($button=get_sub_field('button')):?>
                                                            <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </section>
                    <?php endif;?>
                    <?php if($map_coords):?>
                        <section id="map-section" class="map-section single-estate__map">
                            <div class="container">
                                <div class="map-section__wrapper">
                                    <?php if($title_map):?>
                                        <h2 class="map-section__title"><?php echo $title_map;?></h2>
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
                    <?php $categories = wp_get_post_terms($current_post_id, 'estate_category', array('fields' => 'slugs'));
                    if (in_array('rent', $categories) || in_array('rent-ru', $categories) || in_array('rent-en', $categories)) {
                        $related_category = (is_singular('estate') && in_array('rent', $categories)) ? 'rent' : (is_singular('estate') && in_array('rent-ru', $categories) ? 'rent-ru' : 'rent-en');
                    }
                    elseif (in_array('sale', $categories) || in_array('sale-ru', $categories) || in_array('sale-en', $categories)) {
                        $related_category = (is_singular('estate') && in_array('sale', $categories)) ? 'sale' : (is_singular('estate') && in_array('sale-ru', $categories) ? 'sale-ru' : 'sale-en');
                    }
                    else {
                        $related_category = array('rent', 'sale');
                    }
                    if($related_category):?>
                        <section id="related-posts" class="single-estate__related-posts related-posts">
                            <div class="container">
                                <div class="related-posts__wrapper">
                                    <?php if($title_see_more):?>
                                        <h2 class="see-more-posts__title"><?php echo $title_see_more;?></h2>
                                    <?php endif;?>
                                    <?php $args = array(
                                        'post_type' => 'estate',
                                        'posts_per_page' => -1, // Display all related posts
                                        'post__not_in' => array($current_post_id), // Exclude the current post
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'estate_category',
                                                'field' => 'slug',
                                                'terms' => $related_category
                                            )
                                        )
                                    );
                                    $related_posts_query = new WP_Query($args);
                                    if ($related_posts_query->have_posts()) :
                                        ?>
                                        <div class="related-posts">
                                            <?php while ($related_posts_query->have_posts()) : $related_posts_query->the_post(); ?>
                                                <div class="card">
                                                    <h4><?php the_title(); ?></h4>
                                                    <div class="post-thumbnail">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                    <div class="post-content">
                                                        <p><?php the_excerpt(); ?></p>
                                                        <a href="<?php the_permalink(); ?>">Read more</a>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                        <?php wp_reset_postdata();
                                    endif; ?>
                                </div>
                            </div>
                        </section>
                    <?php endif;?>
                    <?php if($seo_text):?>
                        <section class="single-estate__seo-text seo-text" id="seo-text">
                            <div class="container">
                                <div class="seo-text__wrapper">
                                    <?php if($seo_title):?>
                                        <h1 class="seo-text__title"><?php echo $seo_title; ?></h1>
                                    <?php endif;?>
                                    <div class="seo-text__text"><?php echo $seo_text; ?></div>
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
                                <section class="more-real-estate" style="background-image: url('<?php echo $background_image;?>')">
                                    <div class="container">
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
                </div>
            <?php endwhile;?>
        </main>
    <?php endif;?>

<?php get_footer();
