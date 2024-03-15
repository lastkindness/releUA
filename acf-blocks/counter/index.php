<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="counter">
    <div class="container">
        <?php if($title=get_sub_field('title')):?>
            <h2><?php echo $title;?></h2>
        <?php endif;?>
        <?php if($items=get_sub_field('items')):?>
            <div class="counter__row">
                <?php foreach ($items as $item):?>
                    <div class="counter__col">
                        <?php if($value=$item['value']):?>
                            <span class="counter__num" data-number="<?php echo $value;?>"></span>
                        <?php endif;?>
                        <?php if($title=$item['title']):?>
                            <p><?php echo $title;?></p>
                        <?php endif;?>
                    </div>
                <?php endforeach;?>
            </div>
        <?php endif;?>
    </div>
</section>
