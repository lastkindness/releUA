<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="portfolio">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2 class="portfolio__title"><?php echo $title;?></h2>
        <?php endif;?>
        <div class="portfolio__wrapper">
            <?php while ( have_rows('portfolio') ) : the_row(); ?>
                <div class="portfolio__col <?php if($link=get_sub_field('dark')): echo "portfolio__col--dark"; endif;?>">
                    <?php if($link=get_sub_field('link')):?>
                        <a href="<?php echo $link['url'];?>" target="_blank" class="portfolio__box">
                            <?php if($image=get_sub_field('image')):?>
                                <img src="<?php echo $image; ?>" alt="<?php echo $link['title'];?>">
                            <?php endif;?>
                            <h4><?php echo $link['title'];?></h4>
                            <?php if($description=get_sub_field('description')):?>
                                <div class="portfolio__box-description"><?php echo $description; ?></div>
                            <?php endif;?>
                        </a>
                    <?php endif;?>
                </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
