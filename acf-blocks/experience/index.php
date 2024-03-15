<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="experience">
    <div class="container">
        <?php if($experience_block_title=get_sub_field('experience_block_title')):?>
            <h2><?php echo $experience_block_title;?></h2>
        <?php endif;?>
        <div class="handorgel">
            <?php while ( have_rows('experience') ) : the_row(); ?>
                <?php if($title=get_sub_field('title')):?>
                    <h3 class="handorgel__header">
                        <button class="handorgel__header__button"><?php echo $title;?></button>
                    </h3>
                <?php endif;?>
                <?php if($text=get_sub_field('text')):?>
                    <div class="handorgel__content">
                        <div class="handorgel__content__inner">
                            <?php if($period=get_sub_field('period')):?>
                                <time class="period"><?php echo $period;?></time>
                            <?php endif;?>
                            <?php if($diraction=get_sub_field('diraction')):?>
                                <p class="diraction"><?php echo $diraction;?></p>
                            <?php endif;?>
                            <?php if($location=get_sub_field('location')):?>
                                <p class="location"><?php echo $location;?></p>
                            <?php endif;?>
                            <p><?php echo $text;?></p>
                            <?php if($link=get_sub_field('link')):?>
                                <a href="<?php echo $link;?>" target="_blank">website company ></a>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif;?>
            <?php endwhile;?>
        </div>
    </div>
</section>
