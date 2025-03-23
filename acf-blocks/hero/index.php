<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="hero">
    <div class="hero__slider swiper">
        <div class="swiper-wrapper">
            <?php while ( have_rows('hero_items') ) : the_row(); ?>
                <div class="swiper-slide" style="background-image: url(<?php the_sub_field('image_bg'); ?>)">
                    <div class="container container_small">
                        <div class="hero__wrapper">
                            <div class="hero__content">
                                <?php if($title=get_sub_field('title')):?>
                                    <h1 class="h2 hero__title"><?php echo $title;?></h1>
                                <?php  endif;?>
                                <div class="hero__text">
                                    <?php the_sub_field('text'); ?>
                                    <?php if($subtitle=get_sub_field('subtitle')):?>
                                        <h6 class="hero__subtitle">
                                            <?php if($icon=get_sub_field('icon')):?>
                                                <span class="icon">
                                            <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>" title="<?php echo $icon['title'];?>">
                                        </span>
                                            <?php  endif;?>
                                            <span class="text"><?php echo $subtitle;?></span>
                                        </h6>
                                    <?php  endif;?>
                                    <?php if($link=get_sub_field('link')):?>
                                        <a href="<?php echo $link['url'];?>" class="btn" target="<?php echo $link['target'];?>"><?php echo $link['title'];?></a>
                                    <?php  endif;?>
                                </div>
                            </div>
                            <?php if($image=get_sub_field('image')):?>
                                <img class="hero__image" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>" title="<?php echo $image['title'];?>">
                            <?php  endif;?>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
        <?php $hero_items = get_sub_field('hero_items');
            if(count($hero_items)>1):?>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        <?php endif;?>
    </div>
</section>
