<?php if( have_rows('quote') ): ?>
    <section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="quote">
        <div class="container">
            <?php if($quote_block_title=get_field('quote_block_title')):?>
                <h2><?php echo $quote_block_title;?></h2>
            <?php endif;?>
            <div class="quote__slider swiper">
                <div class="swiper-wrapper">
                    <?php while ( have_rows('quote') ) : the_row(); ?>
                        <div class="swiper-slide">
                            <blockquote class="blockquote">
                                <?php the_sub_field('quote_text');?>
                                <?php if($author=get_sub_field('author')):?>
                                    <cite><?php echo $author;?></cite>
                                <?php endif;?>
                            </blockquote>
                        </div>
                    <?php endwhile;?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif;?>
