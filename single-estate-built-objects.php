<?php get_header();?>
    <?php if ( have_posts() ) : ?>
        <main class="team">
            <?php while ( have_posts() ) : the_post(); ?>
                <section class="article-section">
                    <div class="container">
                        <?php the_title('<h1>','</h1>')?>
                        <?php if($сopyright=get_field('submit_button','estate-general-settings')):?>
                            <p class="сopyright"><?php echo $сopyright;?></p>
                        <?php endif;?>
                    </div>
                </section>
            <?php endwhile;?>
        </main>
    <?php endif;?>
<?php get_footer();
