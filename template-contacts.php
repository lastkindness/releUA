<?php

/*

Template name: Contact Page Template

*/ ?>
<?php get_header();
$main_title = get_field('main_title', 'option-contacts');
$subtitle = get_field('subtitle', 'option-contacts');
$emails = get_field('emails', 'option-contacts');
$addresses = get_field('addresses', 'option-contacts');
$social = get_field('social', 'option-contacts');
$phones = get_field('phones', 'option-contacts');
$map_coords = get_field('map_coords', 'option-contacts');
$form_title = get_field('form_title', 'option-contacts');
$form_shortcode = get_field('form_shortcode', 'option-contacts');
?>
<main class="contact-page">
    <section class="contact" id="contact-section">
        <div class="container container_small">
            <div class="contact__wrapper">
                <div class="contact__info">
                    <?php if($main_title):?>
                        <h2 class="contact__title"><?php echo $main_title;?></h2>
                    <?php endif;?>
                    <?php if($subtitle):?>
                        <h1 class="contact__subtitle"><?php echo $subtitle;?></h1>
                    <?php endif;?>
                    <?php if($phones):?>
                        <ul class="contact__items contact__phones phones">
                            <?php foreach ($phones as $item): ?>
                                <?php if($phone=$item['phone']): ?>
                                    <li class="contact__item">
                                        <i class="icon icon-icon13"></i>
                                        <a class="phone" href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" target="_blank"><?php echo $phone;?></a>
                                        <?php if($text=$item['text']): ?>
                                            <span class="text"><?php echo $text; ?></span>
                                        <?php endif;?>
                                    </li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <?php if($emails):?>
                        <ul class="contact__items contact__emails emails">
                            <?php foreach ($emails as $item): ?>
                                <?php if($email=$item['email']): ?>
                                    <li class="contact__item">
                                        <i class="icon icon-mail-envelope-closed1"></i>
                                        <a class="email" href="mailto:<?php echo $email; ?>" target="_blank"><?php echo $email;?></a>
                                        <?php if($text=$item['text']): ?>
                                            <span class="text"><?php echo $text; ?></span>
                                        <?php endif;?>
                                    </li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <?php if($addresses):?>
                        <ul class="contact__items contact__addresses addresses">
                            <?php foreach ($addresses as $item): ?>
                                <?php if($address=$item['address']): ?>
                                    <li class="contact__item">
                                        <i class="icon icon-icon12"></i>
                                        <a class="address" href="<?php echo $address;?>" target="_blank"><?php echo $item['text'];?></a>
                                    </li>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <?php if($social):?>
                        <ul class="contact__items contact__social social">
                            <?php foreach ($social as $item):?>
                                <?php if($link=$item['link']):?>
                                    <li class="contact__item">
                                        <a class="<?php echo $item['icon']?>" href="<?php echo $link;?>" target="_blank"><i class="icon icon-<?php echo $item['icon']?>"></i></a>
                                    </li>
                                <?php endif;?>
                            <?php endforeach;?>
                        </ul>
                    <?php endif;?>
                </div>
                <div class="contact__form">
                    <?php if($form_title):?>
                        <h6 class="contact__form-title"><?php echo $form_title;?></h6>
                    <?php endif;?>
                    <?php if($form_shortcode): ?>
                        <div class="contact__form-form"><?php echo do_shortcode($form_shortcode); ?></div>
                    <?php endif ; ?>
                </div>
            </div>
        </div>
    </section>
    <?php if($map_coords):?>
        <section id="map-section" class="map-section">
            <div id="map-section-box" class="map-section__box"
                <?php $iteration = 0; while ( have_rows('map_coords', 'option-contacts') ) : the_row();  ?>
                    <?php if($coords=get_sub_field('coords')):?>
                        data-object<?php echo $iteration;?>="<?php echo $coords;?>"
                        <?php if($info=get_sub_field('info')):?>
                            data-info<?php echo $iteration;?>="<?php echo $info;?>"
                        <?php endif;
                    endif; $iteration++; endwhile;?>
            ></div>
        </section>
    <?php endif ; ?>
</main>
<?php get_footer(); ?>
