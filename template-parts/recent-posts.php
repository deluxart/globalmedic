<div class="item_post">
    <div class="image">
    <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail('spec_thumb_slider'); ?>
    <?php else : ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/no_image.jpg" alt="No image" />
    <?php endif; ?>

    </div>
    <div class="content-item">
        <div class="date"><?php echo get_the_date(); ?></div>
        <div class="title"><h2><a href="<?php the_permalink() ?>" class="title"><?php the_title(); ?></h2></a></div>
        <div class="text">
                <?php 
                    $my_excerpt = get_the_excerpt();
                    if ( $my_excerpt ){ echo wpautop( $my_excerpt ); } 
                ?>
        </div>
        <div class="foot">
            <div class="comments"><?php comments_number('0', '1', '%'); ?></div>
            <div class="readmore"><a href="<?php the_permalink() ?>">Подробнее →</a></div>
        </div>
    </div>
</div>
