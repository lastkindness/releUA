<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="intro">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <div class="intro__wrapper">
            <?php if($left_column=get_sub_field('left_column')):?>
                <div class="intro__col">
                    <?php if($text=$left_column['text']):?>
                        <?php echo $text;?>
                    <?php endif;?>
                    <?php if($properties=$left_column['properties']):?>
                        <div class="intro__properties">
                            <?php foreach ($properties as $item):?>
                                <div class="item">
                                    <?php if($label=$item['label']):?>
                                        <span class="label"><?php echo $label;?>:</span>
                                    <?php endif;?>
                                    <?php if($value=$item['value']):?>
                                        <span class="value"><?php echo $value;?></span>
                                    <?php endif;?>
                                </div>
                            <?php endforeach;?>
                        </div>
                    <?php endif;?>
                    <?php if($button=$left_column['button']):?>
                        <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if($right_column=get_sub_field('right_column')):?>
                <?php if($image=$right_column['image']):?>
                    <div class="intro__col">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                    </div>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</section>
