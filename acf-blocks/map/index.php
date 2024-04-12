<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="map-section">
    <?php if($title=get_sub_field('title')):?>
        <h4 class="map-section__title"><?php echo $title;?></h4>
    <?php endif;?>
    <div id="map-section-box" class="map-section__box"
        <?php $iteration = 0; while ( have_rows('map_coords') ) : the_row();  ?>
            <?php if($coords=get_sub_field('coords')):?>
                data-object<?php echo $iteration;?>="<?php echo $coords;?>"
                <?php if($info=get_sub_field('info')):?>
                    data-info<?php echo $iteration;?>="<?php echo $info;?>"
                <?php endif;
            endif; $iteration++; endwhile;?>
    ></div>
</section>
