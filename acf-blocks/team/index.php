<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="team">
    <div class="container">
        <?php if($title=get_sub_field('team__title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($team=get_sub_field('team')):
            $args = array(
            'posts_per_page' => -1,
            'post__in'  => $team,
            'post_type' => 'team',
            'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );?>
            <?php if ( $query->have_posts() ) :?>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col">
                            <div class="team__box">
                                <?php if(has_post_thumbnail()):?>
                                    <?php the_post_thumbnail('medium');?>
                                <?php endif;?>
                                <?php the_title('<h4>','</h4>')?>
                                    <?php if($position=get_field('position')):?>
                                    <span class="team__box-position"><?php echo $position;?></span>
                                <?php endif;?>
                                <?php if(get_field('archive_button','options')):
                                    $button = get_field('archive_button','options');?>
                                    <a href="<?php the_permalink();?>"><?php echo $button;?></a>
                                <?php else:?>
                                    <a href="<?php the_permalink();?>"><?php _e('See More','ReleUA');?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            <?php endif;?>
            <?php wp_reset_postdata();?>
        <?php endif;?>
        <?php $button_all = get_sub_field('button');?>
        <a href="<?php echo $button_all["url"];?>" class="team__btn btn"><?php echo $button_all["title"];?> >> </a>
    </div>
</section>
