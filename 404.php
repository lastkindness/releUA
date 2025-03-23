<?php
/**
 * 404 template
 */
get_header();?>
<main class="error-page">
    <div class="container container_small">
        <div class="error-page__wrapper">
            <div class="error-page__content">
                <?php if($title=get_field('title','option-error')):?>
                    <h2 class="h3 error-page__title"><?php echo $title;?></h2>
                <?php endif;?>
                <?php if($text=get_field('text','option-error')):?>
                    <p class="error-page__text"><?php echo $text;?></p>
                <?php endif;?>
                <?php if($button=get_field('button','option-error')):?>
                    <a href="<?php echo $button["url"];?>" title="<?php echo $button["title"];?>" alt="<?php echo $button["title"];?>" class="btn btn_big error-page__btn"><?php echo $button["title"];?></a>
                <?php endif;?>
            </div>
            <?php if($image=get_field('image','option-error')):?>
                <img src="<?php echo $image["url"];?>" class="error-page__image" alt="<?php echo $image["alt"];?>" title="<?php echo $image["title"];?>">
            <?php endif;?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
