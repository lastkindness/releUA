<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="masonry">
    <div class="container">
        <?php if ($title = get_sub_field('masonry_title')): ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="grid">
            <div class="grid-sizer"></div>
            <?php while (have_rows('masonry')) : the_row(); ?>
                <?php if ($image = get_sub_field('image')): ?>
                    <div class="grid-item">
                        <img
                            src="<?php echo $image['url']; ?>"
                            title="<?php echo $image['title'];?>"
                            alt="<?php echo $image['alt']; ?>"
                        >
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
