<?php
$video_id = get_sub_field('video_id');
$video_source = get_sub_field('video_source');
$title = get_sub_field('title_hero');
$titleLeftAlign = get_sub_field('title_left_align');
$titleRightAlign = get_sub_field('title_right_align');
$description = get_sub_field('description');
$buttons = get_sub_field('buttons');
$classHero = '';
?>

<!-- Hero section front  -->
<section class="hero-dynamic">
    <div class="container" data-video='{"type": "<?php echo $video_source;?>", "video": "<?php echo $video_id;?>", "autoplay": true}'>
        <div class="hero-dynamic__wrapper">
            <?php if ($titleLeftAlign || $titleRightAlign): ?>
                <div class="hero-dynamic__title-wrap">
                    <h1 class="hero-dynamic__title">
                        <?php if ($titleLeftAlign): ?>
                            <div class="hero-dynamic__title-line"><span
                                    class="anim-title-line"><?php echo $titleLeftAlign; ?></span></div>
                        <?php endif; ?>
                        <?php if ($titleRightAlign): ?>
                            <div class="hero-dynamic__title-line"><span
                                    class="anim-title-line"><?php echo $titleRightAlign; ?></span></div>
                        <?php endif; ?>
                    </h1>
                </div>
            <?php endif; ?>
            <?php if ($title): ?>
                <div class="hero-dynamic__title-wrap">
                    <h2 class="hero-dynamic__title">
                        <div class="hero-dynamic__title-line"><span class="anim-title-line"><?php echo $title; ?></span>
                        </div>
                    </h2>
                </div>
            <?php endif; ?>

            <?php if ($description): ?>
                <div class="hero-dynamic__description">
                    <?php echo $description; ?>
                </div>
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
                                <a class="btn hero-dynamic__btn" href="<?php echo esc_url($link_url); ?>"
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
