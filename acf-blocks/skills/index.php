<section <?php if($id = get_sub_field('id')): echo 'id="' . $id . '"'; endif;?> class="skills">
    <div class="container">
        <?php if($skills_title=get_sub_field('skills_title')):?>
            <h3 class="skills__title"><?php echo $skills_title;?></h3>
        <?php endif;?>
        <div class="skills__wrapper">
            <?php while ( have_rows('skills') ) : the_row(); ?>
                <div class="skills__item">
                    <span>+ </span>
                    <?php if($skill=get_sub_field('skill')):?>
                        <span class="skill"><?php echo $skill;?></span>
                    <?php endif;?>
                    <span> ~ </span>
                    <?php if($comment=get_sub_field('comment')):?>
                        <span class="comment"><?php echo $comment;?></span>
                    <?php endif;?>
                </div>
            <?php endwhile;?>
        </div>
    </div>
</section>
