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
<div class="popup didnt-find-banner__popup">
    <div class="close popup__close"></div>
    <div class="container container_small">
        <div class="popup__wrapper">
            <?php if($popup_img=get_sub_field('popup_img')):?>
                <img src="<?php echo $popup_img['url'];?>" alt="<?php echo $popup_img['alt'];?>" title="<?php echo $popup_img['title'];?>" class="didnt-find-banner__popup-img">
            <?php endif;?>
            <div class="popup__content">
                <?php if($title=get_sub_field('title')):?>
                    <h2 class="didnt-find-banner__popup-title"><?php echo $title;?></h2>
                <?php endif;?>
                <?php if($text=get_sub_field('text')):?>
                    <div class="didnt-find-banner__popup-text">
                        <?php echo $text;?>
                    </div>
                <?php endif;?>
                <?php if($form_shortcode=get_sub_field('form_shortcode')): ?>
                    <div class="didnt-find-banner__popup-form"><?php echo do_shortcode($form_shortcode); ?></div>
                <?php endif ; ?>
            </div>
        </div>
    </div>
</div>
