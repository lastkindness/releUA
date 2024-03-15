<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="partners">
    <div class="container">
        <?php if($partner_block_title=get_sub_field('partner_block_title')):?>
            <h2><?php echo $partner_block_title;?></h2>
        <?php endif;?>
        <?php if( have_rows('partners') ): ?>
                <div class="row">
                    <?php while ( have_rows('partners') ) : the_row(); ?>
                        <?php if($image=get_sub_field('image')):?>
                            <div class="col">
                                <?php
                                $tag_start=$tag_end='div';
                                if($url=get_sub_field('url')){
                                    $tag_start='a href="'.$url.'" target="_blank"';
                                    $tag_end='a';
                                }?>
                                <<?php echo $tag_start?> class="partners__box" >
                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['url']; ?>">
                                </<?php echo $tag_end?>>
                            </div>
                        <?php endif;?>
                    <?php endwhile;?>
                </div>
        <?php endif;?>
    </div>
</section>
