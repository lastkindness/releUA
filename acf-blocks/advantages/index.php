<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?>
    class="advantages <?php if(get_sub_field('cards')): echo 'advantages_cards'; endif;?>">
    <div class="container container_small">
        <?php if($title=get_sub_field('title')):?>
            <h2 class="advantages__title"><?php echo $title;?></h2>
        <?php endif;?>
        <div class="advantages__wrapper">
            <?php while ( have_rows('advantages_items') ) : the_row(); ?>
                <div class="advantages__col <?php if($link=get_sub_field('dark')): echo "advantages__col--dark"; endif;?>">
                    <div class="advantages__box">
                        <?php if($image=get_sub_field('image')):?>
                            <img class="advantages__img" src="<?php echo $image; ?>" alt="<?php echo $link['title'];?>">
                        <?php endif;?>
                        <?php if($title=get_sub_field('title')):?>
                            <h5 class="advantages__subtitle"><?php echo $title;?></h5>
                        <?php endif;?>
                        <?php if($description=get_sub_field('description')):?>
                            <div class="advantages__box-description"><?php echo $description; ?></div>
                        <?php endif;?>
                        <?php if($link=get_sub_field('link')):?>
                            <a href="<?php echo $link['url'];?>" target="_blank" class="advantages__link"><?php echo $link['title'];?></a>
                        <?php endif;?>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
