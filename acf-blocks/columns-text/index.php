<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="columns-text">
    <div class="container">
        <?php if($sub_title=get_sub_field('sub_title')):?>
            <strong class="title"><?php echo $sub_title;?></strong>
        <?php endif;?>
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($items=get_sub_field('items')):?>
            <div class="columns-text__row">
                <?php foreach ($items as $item):?>
                    <div class="columns-text__col">
                        <?php if($title=$item['title']):?>
                            <h3><?php echo $title;?></h3>
                        <?php endif;?>
                        <?php if($text=$item['text']){echo $text;}?>
                        <?php if($button=$item['button']):?>
                            <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>



