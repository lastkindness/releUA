<?php

/*

Template name: Flexible Content Template

*/ ?>
<?php get_header();?>
<main>
    <?php if ( have_rows('page_elements') ) {
    while (have_rows('page_elements')) {
        the_row();
        $name = str_replace('_', '-', get_row_layout());
        get_template_part(
            'acf-blocks/' . $name . '/index',
            NULL,
            ['section-id' => $name] // in file need use: "$args['section-id']" to setup unique section id="value"
    );}}?>
</main>
<?php get_footer(); ?>
