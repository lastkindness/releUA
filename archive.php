<?php

get_header(); ?>
<main>
    <?php $category = get_terms([
        'taxonomy' => get_object_taxonomies(get_post())[0],
        'hide_empty' => true,
    ]);?>
    <div class="two-columns two-columns_title">
        <div class="container">
            <?php
            $home_id = (int)get_option('page_on_front');
            $taxonomy_name = get_object_taxonomies(get_post())[0];
            $taxonomy = get_taxonomy($taxonomy_name);
            if ($taxonomy) {
                $string = $taxonomy->labels->name;
                $parts = explode(" ", $string);
                $field = strtolower($parts[0]);
                $field_value = get_field("page_elements", $home_id);
                foreach ($field_value as $item):
                    if($item["acf_fc_layout"]==$field) {?>
                        <h1 class="archive__title"><?php echo $item["title"]; ?></h1>
                    <?php }
                endforeach;
                ?>
            <?php }?>
        </div>
    </div>
    <section class="featured-post">
        <div class="container">
            <?php if($category):?>
                <ul class="filter__list">
                    <li <?php if(!isset($_GET['cat'])||$_GET['cat']==''):?>class="active"<?php endif;?>><a href="<?php echo $page_for_posts_url;?>"><?php _e('All',TEXTDOMAIN);?></a></li>
                    <?php foreach ($category as $item):?>
                        <li <?php if(isset($_GET['cat'])&&$_GET['cat']==$item->term_id):?>class="active"<?php endif;?>><a href="<?php echo get_post_type_archive_link(get_post_type()).$page_for_posts_url.$item->slug?>"><?php echo $item->name;?></a></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
            <?php if ( have_posts() ) : ?>
                <?php $sticky_posts=get_option( 'sticky_posts' );?>
                <div class="featured-post__row">
                    <a href="<?php echo get_the_permalink($sticky_posts[0]);?>" class="featured-post__img">
                        <?php if(has_post_thumbnail($sticky_posts[0])):?>
                            <?php echo get_the_post_thumbnail($sticky_posts[0],'large');
                        else : ?>
                            <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                        <?php endif; ?>
                    </a>
                    <div class="featured-post__text">
                        <h3><?php echo get_the_title($sticky_posts[0])?></h3>
                        <p><?php echo get_the_excerpt($sticky_posts[0])?></p>
                        <?php if(get_field('archive_button','options')):
                            $button = get_field('archive_button','options');?>
                            <a href="<?php echo get_the_permalink($sticky_posts[0]);?>"><?php echo $button;?></a>
                        <?php else:?>
                            <a href="<?php echo get_the_permalink($sticky_posts[0]);?>"><?php _e('Featured link',TEXTDOMAIN);?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col">
                            <article class="card">
                                <?php $taxonomies = get_object_taxonomies(get_post());?>
                                <div class="card__img">
                                    <?php if ($taxonomies) { foreach ($taxonomies as $taxonomy) {
                                        $terms = get_the_terms(get_the_ID(), $taxonomy);
                                        if ($terms && !is_wp_error($terms)) {
                                            echo '<div class="card__category">';
                                            foreach ($terms as $term) {
                                                echo '<span class="category">' . $term->name . '</span>';
                                            }
                                            echo '</div>';
                                        }
                                    }}?>
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('medium');
                                    else : ?>
                                        <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                                    <?php endif; ?>
                                </div>
                                <div class="card__body">
                                    <?php the_title('<h5 class="card__title">','</h5>')?>
                                    <?php $content = wp_trim_words(get_the_content(), 20, '...');
                                    echo '<div class="card__content">' . $content . '</div>'; ?>
                                </div>
                                <?php if(get_field('archive_button','options')):
                                    $button = get_field('archive_button','options');?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                                <?php else:?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php _e('Learn more',TEXTDOMAIN)?></a>
                                <?php endif; ?>
                            </article>
                        </div>
                    <?php endwhile;?>
                </div>
                <?php get_template_part( 'parts/core/pagination' );?>
            <?php endif;?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
