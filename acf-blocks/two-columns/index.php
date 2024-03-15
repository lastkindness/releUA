<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="two-columns">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <div class="row">
            <?php if($left_column=get_sub_field('left_column')):?>
                <div class="col">
                    <?php if($text=$left_column['text']):?>
                        <?php echo $text;?>
                    <?php endif;?>
                    <?php if($button=$left_column['button']):?>
                        <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if($right_column=get_sub_field('right_column')):?>
                <?php if($image=$right_column['image']):?>
                    <div class="col">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</section>
