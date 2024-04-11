<?php
$video_id = get_sub_field('video_id');
$video_source = get_sub_field('video_source');
$bg_image = get_sub_field('bg_image');
$title = get_sub_field('title_hero');
$titleLeftAlign = get_sub_field('title_left_align');
$titleRightAlign = get_sub_field('title_right_align');
$description = get_sub_field('description');
$buttons = get_sub_field('buttons');
$classHero = '';
?>

<!-- Hero section front  -->
<section class="hero-dynamic">
    <div class="container"
        <?php if ($video_id): ?>
            data-video='{"type": "<?php echo $video_source;?>", "video": "<?php echo $video_id;?>", "autoplay": true}'
        <?php endif; ?>
        <?php if ($bg_image): ?>
            style="background-image: url(<?php echo $bg_image; ?>)"
        <?php endif; ?>
    >
        <div class="hero-dynamic__wrapper">
            <?php if ($title): ?>
                <h1 class="hero-dynamic__title"><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php if ($description): ?>
                <h6 class="hero-dynamic__description">
                    <?php echo $description; ?>
                </h6>
            <?php endif; ?>
            <div class="hero-dynamic__footer">
                <?php if ($buttons): ?>
                    <div class="hero-dynamic__buttons">
                        <?php foreach ($buttons as $button): ?>
                            <?php
                            $link = $button['link'];
                            if ($link):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn btn_big btn_light hero-dynamic__btn" href="<?php echo esc_url($link_url); ?>"
                                   target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End of Hero section -->
