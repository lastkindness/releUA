<?php $post = get_post();
$taxonomies = get_object_taxonomies($post);?>
<?php get_header();?>
    <?php if ( have_posts() ) : ?>
        <main>
            <?php while ( have_posts() ) : the_post(); ?>
                <section class="article-section">
                    <div class="container">
                        <?php the_title('<h1>','</h1>')?>
                        <?php /*foreach ($taxonomies as $taxonomy) {
                            if ($taxonomy !== 'category' && $taxonomy !== 'post_tag') {
                                $taxonomy_object = get_taxonomy($taxonomy);
                                $taxonomy_label = $taxonomy_object->labels->name;
                                $words = explode(' ', $taxonomy_label);
                                $first_word = $words[0];
                                if($first_word=='Formats') {
                                    echo '<span class="article__category">News</span>';
                                } else {
                                    echo '<span class="article__category">' . $first_word . '</span>';
                                };
                            }

                            $terms = get_the_terms($post->ID, $taxonomy);
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    echo '<span class="article__taxonomy">' . $term->name . '</span>';
                                }
                            }
                        }*/?>
                        <?php if ($taxonomies[0] !== 'estate_category') {?>
                            <div class="author-post">
                                <?php $author_id=get_the_author_meta("ID");?>
                                <div class="author-post__info">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?> <?php echo get_the_time('H:i:s'); ?>">
                                        <?php echo get_the_date('d F Y'); ?>, <?php echo get_the_time(); ?>
                                    </time>
                                </div>
                            </div>
                        <?php }?>
                        <figure class="article-section__image">
                            <?php $categories = get_the_category();
                            if(!empty($categories)) {
                                echo '<span class="article-section__category">';
                                echo esc_html( $categories[0]->name );
                                echo '</span>';
                            }?>
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('large', array('class' => 'post-thumbnail'));
                            else : ?>
                                <img src="<?php echo get_field('logo','options')['url']; ?>" alt="image description">
                            <?php endif; ?>
                        </figure>
                        <?php the_content();?>
                        <div class="share">
                            <strong><?php _e('Share this post',TEXTDOMAIN);?></strong>
                            <?php
                            $url=get_the_permalink();
                            $title=get_the_title();
                            $summary=get_the_excerpt();
                            ?>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>&quote=<?php echo $url;?>" target="_blank"><i class="icon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?source=<?php echo $url;?>&text=<?php echo $title;?>:%20<?php echo $url;?>" target="_blank"><i class="icon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>&title=<?php echo $title;?>&summary=<?php echo $summary;?>&source=<?php echo $url;?>"><i class="icon-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="article-section__pagination">
                            <?php
                            $next = get_next_post_link( '%link', '<i class="icon-chevron-left"></i> Prev', true );
                            echo  $next ;
                            $prev = get_previous_post_link( '%link', 'Next <i class="icon-chevron-right"></i>', true );
                            echo $prev ;
                            ?>
                        </div>
                    </div>
                </section>
            <?php endwhile;?>
        </main>
    <?php endif;?>
<?php get_footer();
