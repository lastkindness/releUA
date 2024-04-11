<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?>
    class="contact-form <?php if(get_sub_field('is_centered')): echo 'contact-form_centered'; endif;?>">
    <div class="container container_small">
        <div class="contact-form__wrapper">
            <?php if($title=get_sub_field('title')):?>
                <h2 class="contact-form__title"><?php echo $title;?></h2>
            <?php endif;?>
            <?php if($subtitle=get_sub_field('subtitle')):?>
                <h4 class="contact-form__subtitle"><?php echo $subtitle;?></h4>
            <?php endif;?>
            <?php if($form_shortcode = get_sub_field('form_shortcode')): ?>
                <div class="contact-form__form"><?php echo do_shortcode($form_shortcode); ?></div>
            <?php endif ; ?>
        </div>
    </div>
</section>
