<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="two-columns">
    <div class="container container_small">
        <div class="two-columns__wrapper">
            <?php if($left_column=get_sub_field('left_column')):?>
                <div class="two-columns__col two-columns__content">
                    <?php if($title=get_sub_field('title')):?>
                        <h2 class="two-columns__title"><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php if($text=$left_column['text']):?>
                        <div class="two-columns__text">
                            <?php echo $text;?>
                        </div>
                    <?php endif;?>
                    <?php if($button=$left_column['button']):?>
                        <a href="<?php echo $button['url'];?>" class="btn two-columns__btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if($right_column=get_sub_field('right_column')):?>
                <div class="two-columns__col two-columns__images">
                    <?php foreach ($right_column as $item): ?>
                        <?php if($image=$item['image']):?>
                                <img class="two-columns__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        <?php endif;?>
                    <?php endforeach; ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
