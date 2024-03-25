<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="featured-post">
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
</section>
