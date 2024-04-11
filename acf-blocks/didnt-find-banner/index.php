<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="didnt-find-banner" style="background-image: url(<?php the_sub_field('background_image'); ?>)">
    <div class="container container_small">
        <div class="didnt-find-banner__wrapper">
            <?php if($img=get_sub_field('img')):?>
                <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" title="<?php echo $img['title'];?>" class="didnt-find-banner__img">
            <?php endif;?>
            <div class="didnt-find-banner__content">
                <?php if($title=get_sub_field('title')):?>
                    <h2 class="didnt-find-banner__title"><?php echo $title;?></h2>
                <?php endif;?>
                <?php if($text=get_sub_field('text')):?>
                    <div class="didnt-find-banner__text">
                        <?php echo $text;?>
                    </div>
                <?php endif;?>
                <?php if($button=get_sub_field('button')):?>
                    <a href="<?php echo $button['url'];?>" class="btn btn_big btn_light didnt-find-banner__btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
