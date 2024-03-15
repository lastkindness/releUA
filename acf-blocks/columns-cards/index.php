<?php if($items=get_sub_field('items')):?>
    <?php
    $map=[
        2=>'',
        3=>'three-columns',
        4=>'four-columns'
    ];
    $count=count($items);?>
    <section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="columns-cards <?php echo $map[$count];?>">
        <div class="container">
            <?php if($sub_title=get_sub_field('sub_title')):?>
                <strong class="title"><?php echo $sub_title;?></strong>
            <?php endif;?>
            <?php if($title=get_sub_field('title')):?>
                <h2><?php echo $title;?></h2>
            <?php endif;?>
            <div class="columns-cards__row">
                <?php foreach ($items as $item):?>
                    <div class="columns-cards__col">
                        <div class="card">
                            <?php if($image=$item['image']):?>
                                <img class="card__img card__img--rounded" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                            <?php endif;?>
                            <div class="card__body">
                                <?php if($title=$item['title']):?>
                                    <h3><?php echo $title;?></h3>
                                <?php endif;?>
                                <?php if($text=$item['text']){echo $text;}?>
                            </div>
                            <?php if($button=$item['button']):?>
                                <a href="<?php echo $button['url'];?>" class="btn" <?php if($button['target']=='_blank'):?>target="_blank"<?php endif;?>><?php echo $button['title'];?></a>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
<?php endif;?>
