<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="parallax-section">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($image=get_sub_field('image')):?>
            <div class="parallax">
                <div class="parallax__box" style="background-image: url('<?php echo $image;?>')" data-speed="<?php the_sub_field('speed');?>"></div>
            </div>
        <?php endif;?>
    </div>
</section>
