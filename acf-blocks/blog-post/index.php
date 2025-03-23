<?php if($posts=get_sub_field('posts') ):
    $args = array(
        'posts_per_page' => -1,
        'post__in'  => $posts,
        'orderby'   => 'post__in',
    );
    $query = new WP_Query( $args );?>
    <?php if ( $query->have_posts() ) :?>
    <section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="blog-post">
        <div class="container">
            <?php if($sub_title=get_sub_field('sub_title')):?>
                <strong class="title"><?php echo $sub_title;?></strong>
            <?php endif;?>
            <?php if($title=get_sub_field('title')):?>
                <h2><?php echo $title;?></h2>
            <?php endif;?>
            <div class="blog-post__row">
                <?php while ( $query->have_posts() ) : $query->the_post();?>
                    <article class="post">
                        <time class="post__date" datetime="<?php echo get_the_date('Y-m-d'); ?> <?php echo get_the_time('H:i:s'); ?>">
                            <?php echo get_the_date('d F Y'); ?>, <?php echo get_the_time(); ?>
                        </time>
                        <h3><a href="<?php echo get_the_permalink();?>" alt="Post Link" title="Post Link"><?php the_title();?></a></h3>
                        <div class="post__img">
                            <?php $categories = get_the_category();
                            if(!empty($categories)) {
                                echo '<div class="post__category">';
                                echo esc_html( $categories[0]->name );
                                echo '</div>';
                            }?>
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('medium');
                            else : ?>
                                <img src="<?php echo get_field('logo','options')['url']; ?>" alt="logo" title="logo">
                            <?php endif; ?>
                        </div>
                        <?php $content = wp_trim_words(get_the_content(), 20, '...');
                        echo '<div class="post__text">' . $content . '</div>'; ?>
                        <?php if(get_field('archive_button','options')):
                            $button = get_field('archive_button','options');?>
                            <a href="<?php echo get_the_permalink();?>" class="btn" alt="Post Link" title="Post Link"><?php echo $button;?></a>
                        <?php else:?>
                            <a href="<?php echo get_the_permalink();?>" class="btn" alt="Post Link" title="Post Link"><?php _e('Learn more','ReleUA')?></a>
                        <?php endif; ?>
                    </article>
                <?php endwhile;?>
            </div>
            <?php $button_all = get_sub_field('button_text');?>
            <a href="/novini/" class="blog-post__btn btn" alt="News"><?php echo $button_all;?> >> </a>
        </div>
    </section>
<?php endif;?>
    <?php wp_reset_postdata();?>
<?php endif;?>
