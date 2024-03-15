<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="video">
    <div class="container">
        <?php if($video_block_title=get_sub_field('video_block_title')):?>
            <h2><?php echo $video_block_title;?></h2>
        <?php endif;?>
        <?php while ( have_rows('video') ) : the_row(); ?>
            <?php $type=get_sub_field('type');?>
            <?php if('popup_video'==$type):?>
                <?php if($video_id=get_sub_field('video_id')):?>
                    <p><a href="#" data-video='{"type": "<?php the_sub_field('video_source');?>", "video": "<?php echo $video_id;?>", "fluidWidth": true}'><?php the_sub_field('title');?></a></p>
                <?php endif;?>
            <?php elseif ('video'==$type):?>
                <div class="video">
                    <?php if($title=get_sub_field('title')):?>
                        <h2><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php if($video_id=get_sub_field('video_id')):?>
                        <p><a href="#" data-video='{"type": "<?php the_sub_field('video_source');?>", "video": "<?php echo $video_id;?>", "fluidWidth": true}'><?php the_sub_field('title');?></a></p>
                        <div data-video='{"type": "<?php the_sub_field('video_source');?>", "video": "<?php echo $video_id;?>", "autoplay": false, "fluidWidth": true}'>
                            <a href="#" class="btn-play"><span><?php _e('Play',TEXTDOMAIN);?></span><em><?php _e('Pause',TEXTDOMAIN);?></em></a>
                        </div>
                    <?php endif;?>
                </div>
            <?php elseif ('background_video'==$type):?>
                <div class="video">
                    <?php if($title=get_sub_field('title')):?>
                        <h2><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php if($video_id=get_sub_field('video_id')):?>
                        <div data-video='{"type": "<?php the_sub_field('video_source');?>", "video": "<?php echo $video_id;?>", "autoplay": true}'></div>
                    <?php endif;?>
                </div>
            <?php endif;?>
        <?php endwhile;?>
    </div>
</section>
