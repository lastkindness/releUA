<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="slider-img">
    <div class="container container_small">
        <?php if($slider_title=get_sub_field('slider_title')):?>
            <h2><?php echo $slider_title;?></h2>
        <?php endif;?>
        <div class="slider-img__slider">
            <div class="swiper-wrapper">
                <?php while ( have_rows('slider') ) : the_row(); ?>
                    <div class="swiper-slide">
                        <div class="row">
                            <?php if($image=get_sub_field('image')):?>
                                <div class="col">
                                    <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                </div>
                            <?php endif;?>
                            <div class="col">
                                <?php if($title=get_sub_field('title')):?>
                                    <h3><?php echo$title;?></h3>
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

