<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="form">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($subtitle=get_sub_field('subtitle')):?>
            <h4><?php echo $subtitle;?></h4>
        <?php endif;?>
        <?php if($form_shortcode = get_sub_field('form_shortcode')): ?>
            <div class="contacts__popup-form"><?php echo do_shortcode($form_shortcode); ?></div>
        <?php endif ; ?>
    </div>
</section>
