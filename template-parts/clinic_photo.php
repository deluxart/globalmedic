<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php if ( have_rows( 'photo_for_gallery' ) ) : ?>
<div class="medic-slider slider-pro">
    <div class="sp-slides">
    <?php while ( have_rows( 'photo_for_gallery' ) ) : the_row(); ?>
        
        <?php if ( get_sub_field( 'foto' ) ) { ?>
        <div class="sp-slide"><img class="sp-image" src="<?php echo get_template_directory_uri(); ?>/img/blank.gif" data-src="<?php the_sub_field( 'foto' ); ?>"/></div>
        <?php } ?>
        
    <?php endwhile; ?>
</div>
<div class="sp-thumbnails">
    <?php while ( have_rows( 'photo_for_gallery' ) ) : the_row(); ?>
        <?php if ( get_sub_field( 'foto' ) ) { ?>
            <img class="sp-thumbnail" src="<?php the_sub_field( 'foto' ); ?>"/>
        <?php } ?>

    <?php endwhile; ?>
</div>
</div>
<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>    

    
        
    