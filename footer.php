<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <?php if($footer_logo=get_field('logo_footer','options')):?>
                <a class="footer__logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo $footer_logo['url'];?>" alt="<?php echo $footer_logo['alt'];?>">
                </a>
            <?php endif;?>
            <?php
            wp_nav_menu( [
                'theme_location' => 'secondary',
                'menu'            => '',
                'container'       => 'nav',
                'container_class' => 'footer__navbar',
                'container_id'    => '',
                'menu_class'      => 'footer__navbar',
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
            <?php if($social=get_field('social','options')):?>
                <ul class="footer__social social">
                    <?php foreach ($social as $item):?>
                        <?php if($link=$item['link']):?>
                            <li>
                                <a class="<?php echo $item['icon']?>" href="<?php echo $link;?>" target="_blank"><i class="icon icon-<?php echo $item['icon']?>"></i></a>
                            </li>
                        <?php endif;?>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__сopyright">
                <?php if($сopyright=get_field('copyright','options')):?>
                    <p class="сopyright"><?php echo $сopyright;?></p>
                <?php endif;?>
            </div>
        </div>
    </div>

    <button type="button" id="back-to-top"><i class="icon-arrow-up"></i></button>
</footer>
<?php wp_footer(); ?>
</div>
</body>
</html>
