<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="scrollbar">
    <div class="container">
        <?php if ($title = get_sub_field('scrollbar_title')): ?>
            <h3><?php echo $title; ?></h3>
        <?php endif; ?>
        <div class="scrollbar__wrap <?php echo $type=get_sub_field('type');?>">
            <?php if($scrollbar=get_sub_field('scrollbar')):?>
                <div class="scrollbar__wrap-<?php if('scrollbar-x'==$type){echo 'img';}elseif('scrollbar-y'==$type){echo 'text';}?>">
                    <?php foreach ($scrollbar as $item):?>
                        <?php if($image=$item['image']):?>
                            <img src="<?php echo $image['url'];?>" width="<?php echo $item['width']?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;?>
                        <?php if($text=$item['text']){echo $text;}?>
                    <?php endforeach;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
