<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="cta" style="background-image: url(<?php the_sub_field('background_image'); ?>)">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($text=get_sub_field('text')){ echo $text;}?>
        <?php if($button=get_sub_field('button')):?>
            <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
        <?php endif;?>
    </div>
</section>
