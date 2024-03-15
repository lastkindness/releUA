<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="hero">
    <div class="hero__slider swiper">
        <div class="swiper-wrapper">
            <?php while ( have_rows('hero') ) : the_row(); ?>
                <div class="swiper-slide" style="background-image: url(<?php the_sub_field('image'); ?>)">
                    <div class="container">
                        <div class="hero__text">
                            <?php the_sub_field('text'); ?>
                            <?php if($link=get_sub_field('link')):?>
                                <a href="<?php echo $link['url'];?>" class="btn" target="<?php echo $link['target'];?>"><?php echo $link['title'];?></a>
                            <?php  endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
