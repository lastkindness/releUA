<?php

/*

Template name: All Blocks Page

*/ ?>
<?php get_header(''); ?>
<main>
    <?php get_template_part( 'acf-blocks/hero/index' ); ?>
    <?php get_template_part( 'acf-blocks/news/index' ); ?>
    <?php get_template_part( 'acf-blocks/quote/index' ); ?>
    <?php get_template_part( 'acf-blocks/faqs/index' ); ?>
    <?php get_template_part( 'acf-blocks/partners/index' ); ?>
    <?php get_template_part( 'acf-blocks/two-columns/index' ); ?>
    <?php get_template_part( 'acf-blocks/cta/index' ); ?>
    <?php get_template_part( 'acf-blocks/blog-post/index' ); ?>
    <?php get_template_part( 'acf-blocks/team/index' ); ?>
    <?php get_template_part( 'acf-blocks/tabs/index' ); ?>
    <?php get_template_part( 'acf-blocks/gallery/index' ); ?>
    <?php get_template_part( 'acf-blocks/slider-img-text/index' ); ?>
    <?php get_template_part( 'acf-blocks/read-more-less/index' ); ?>
    <?php get_template_part( 'acf-blocks/counter/index' ); ?>
    <?php get_template_part( 'acf-blocks/scrollbar/index' ); ?>
    <?php get_template_part( 'acf-blocks/masonry/index' ); ?>
    <?php get_template_part( 'acf-blocks/video/index' ); ?>
    <?php get_template_part( 'acf-blocks/columns-text/index' ); ?>
    <?php get_template_part( 'acf-blocks/columns-cards/index' ); ?>
    <?php get_template_part( 'acf-blocks/intro/index' ); ?>
    <?php get_template_part( 'acf-blocks/skills/index' ); ?>
    <?php get_template_part( 'acf-blocks/portfolio/index' ); ?>
    <?php get_template_part( 'acf-blocks/experience/index' ); ?>
</main>
<?php get_footer(''); ?>
