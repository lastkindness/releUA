<?php
/**
 * The template for displaying search results pages
 */
get_header();?>
<main>
    <div class="container">
        <h1 class="page-title">
            <?php _e( 'Search results for: ', 'ReleUA' ); ?>
            <span class="page-description"><?php echo get_search_query(); ?></span>
        </h1>
        <div class="search__wrapper">
            <?php get_search_form();?>
            <ul class="search__posts">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <li class="search__post">
                            <a href="<?php the_permalink(); ?>" class="search__post-link">
                                <span class="h5 search__post-data small-title"><?php echo get_the_date('d.m.y') ?></span>
                                <h3 class="h3 search__post-title"><?php the_title(); ?></h3>
                                <h4 class="h4 search__post-subtitle small-title"><?php  ?></h4>
                                <p class="search__post-text"><?php echo substr(get_the_excerpt(), 0, 200);?></p>
                            </a>
                        </li>
                    <?php endwhile;?>
                    <?php get_template_part( 'parts/core/pagination' );?>
                <?php else :?>
                    <div class="search__no-posts">
                        <h2 class="h2 search__no-posts-title small-title">
                            <span><?php _e('At your request: ','ReleUA');?></span><strong>"<?php echo get_search_query();?>"</strong>
                            <span><?php _e( ' nothing found', 'ReleUA' );?></span>
                        </h2>
                        <h3 class="h3 search__no-posts-subtitle"><?php _e( 'Try another request!', 'ReleUA' );?></h3>
                    </div>
                <?php endif;?>
            </ul>
        </div>
    </div>
</main>
<?php get_footer();
