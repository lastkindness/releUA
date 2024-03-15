<?php

/*
Blog
*/
$page_for_posts = (int)get_option( 'page_for_posts' );
$page_for_posts_url=get_the_permalink($page_for_posts);
get_header(); ?>
<main>
    <div class="two-columns two-columns_title">
        <div class="container">
            <h2><?php echo get_the_title($page_for_posts);?></h2>
        </div>
    </div>
    <section class="featured-post">
        <div class="container">
            <?php $category = get_terms([
                'taxonomy' => 'category',
                'hide_empty' => true,
            ]);?>
            <?php if($category):?>
                <ul class="filter__list">
                    <li <?php if(!isset($_GET['cat'])||$_GET['cat']==''):?>class="active"<?php endif;?>><a href="<?php echo $page_for_posts_url;?>"><?php _e('All',TEXTDOMAIN);?></a></li>
                    <?php foreach ($category as $item):?>
                        <li <?php if(isset($_GET['cat'])&&$_GET['cat']==$item->term_id):?>class="active"<?php endif;?>><a href="<?php echo $page_for_posts_url.'?cat='.$item->term_id?>"><?php echo $item->name;?></a></li>
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
                        <time class="featured-post__date" datetime="<?php echo get_the_date('Y-m-d'); ?> <?php echo get_the_time('H:i:s'); ?>">
                            <?php echo get_the_date('d F Y'); ?>, <?php echo get_the_time(); ?>
                        </time>
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
                                <div class="card__img">
                                    <?php $categories = get_the_category();
                                    if(!empty($categories)) {
                                        echo '<div class="card__category">';
                                        echo esc_html( $categories[0]->name );
                                        echo '</div>';
                                    }?>
                                    <?php if (has_post_thumbnail()) :
                                        the_post_thumbnail('medium');
                                    else : ?>
                                        <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                                    <?php endif; ?>
                                </div>
                                <div class="card__body">
                                    <time class="card__date" datetime="<?php echo get_the_date('Y-m-d'); ?> <?php echo get_the_time('H:i:s'); ?>">
                                        <?php echo get_the_date('d F Y'); ?>, <?php echo get_the_time(); ?>
                                    </time>
                                    <?php the_title('<h5 class="card__title">','</h5>')?>
                                    <?php $content = wp_trim_words(get_the_content(), 20, '...');
                                    echo '<div class="card__text">' . $content . '</div>'; ?>
                                </div>
                                <?php if(get_field('archive_button','options')):
                                    $button = get_field('archive_button','options');?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo $button;?></a>
                                <?php else:?>
                                    <a href="<?php the_permalink();?>" class="btn"><?php _e('See more',TEXTDOMAIN);?></a>
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
