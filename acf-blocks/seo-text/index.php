<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="seo-text">
    <div class="container">
        <div class="seo-text__wrapper">
            <?php if($title=get_sub_field('title')):?>
                <h1 class="seo-text__title"><?php echo $title;?></h1>
            <?php endif;?>
            <?php if($text=get_sub_field('text')):?>
                <div class="seo-text__text"><?php echo $text;?></div>
            <?php endif;?>
        </div>
    </div>
</section>
