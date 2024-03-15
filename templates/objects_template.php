<?php
/*

Template name: Objects Template

*/
get_header();
$text_button_hero = get_field('title_for_category', 'option-estate');
$didnt_find_banner = get_field('didnt_find', 'option-estate');?>
<main class="archive-built-objects">
    <?php if($text_button_hero):?>
        <section class="title-section">
            <div class="container">
                <h1 class="title"><?php echo $text_button_hero; ?></h1>
            </div>
        </section>
    <?php endif;?>
    <section class="cards-grid">
        <div class="container">
            <div class="cards-grid__wrapper">
                <?php
                // Get all terms of 'estate_objects' taxonomy
                $terms = get_terms([
                    'taxonomy' => 'estate_objects',
                    'hide_empty' => false,
                ]);

                // Loop through each term
                foreach ($terms as $term) {
                    // Check if the term is a main category (no parent)
                    if ($term->parent == 0) {
                        // Get child terms of the main category
                        $child_terms = get_terms([
                            'taxonomy' => 'estate_objects',
                            'hide_empty' => false,
                            'parent' => $term->term_id,
                        ]);

                        // Loop through each child term
                        foreach ($child_terms as $child_term) {
                            // Get ACF fields for the child term
                            $hero_image = get_field('image', $child_term);
                            $address = get_field('address', $child_term);
                            $term_link = get_term_link($child_term);
                            $button_build_estate = get_field('button_build_estate', 'option-estate');
                            ?>

                            <div class="card">
                                <?php if($hero_image):?>
                                    <img class="card__img" src="<?php echo $hero_image['url']; ?>" alt="<?php echo $hero_image['alt']; ?>">
                                <?php endif;?>
                                <h2 class="card__title"><?php echo $child_term->name; ?></h2>
                                <h4 class="card__address"><?php echo $address; ?></h4>
                                <a href="<?php echo $term_link; ?>" class="btn card_btn"><?php echo $button_build_estate; ?></a>
                            </div><?php
                        }
                    }
                }?>
            </div>
        </div>
    </section>
    <?php if($didnt_find_banner):
        $title = $didnt_find_banner['title'];
        $description = $didnt_find_banner['description'];
        $button = $didnt_find_banner['button'];
        $image = $didnt_find_banner['image'];
        $background_image = $didnt_find_banner['background_image']; ?>
        <section style="background-image: url('<?php echo $background_image["url"]; ?>')" class="didnt-find-banner">
            <div class="container">
                <div class="didnt-find-banner__wrapper">
                    <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    <div class="didnt-find-banner__content">
                        <h5 class="didnt-find-banner__title"><?php echo $title; ?></h5>
                        <p class="didnt-find-banner__text"><?php echo $description; ?></p>
                        <a href="<?php echo $button["url"]; ?>"><?php echo $button["title"]; ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif;?>
</main>
<?php
get_footer(); ?>
