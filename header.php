<!doctype html>
<html lang="<?php echo get_bloginfo("language"); ?>">
<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <?php  if($_GET['projectId']){
        project_data($_GET['projectId']);
    }?>
    <header class="header">
        <div class="container container_small">
            <div class="header__wrapper">
                <?php if($header_logo=get_field('logo','options')):?>
                    <a class="header__logo" href="<?php echo home_url(); ?>">
                        <img src="<?php echo $header_logo['url'];?>" alt="<?php echo $header_logo['alt'];?>">
                    </a>
                <?php endif;?>
                <div class="header__menu">
                    <?php
                    wp_nav_menu( [
                        'theme_location' => 'primary',
                        'menu'            => '',
                        'container'       => 'nav',
                        'container_class' => 'header__navbar',
                        'container_id'    => '',
                        'menu_class'      => 'header__navbar',
                        'menu_id'         => '',
                        'echo'            => true,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="navbar__nav">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ] );
                    ?>
                    <div class="header__additional">
                        <?php if($phones=get_field('phones','options')):?>
                            <ul class="header__phones phones">
                                <?php if($link=$phones[0]['text']): ?>
                                    <li>
                                        <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $link); ?>" target="_blank"><?php echo $link;?></a>
                                    </li>
                                <?php endif;?>
                            </ul>
                        <?php endif;?>
                        <div class="header__lang">
                            <?php if ( is_active_sidebar( 'header_lang_switcher' ) ) : ?>
                                <?php dynamic_sidebar( 'header_lang_switcher' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <a href="#" class="nav-opener"><span></span></a>
            </div>
        </div>
    </header>
