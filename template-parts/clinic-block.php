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
<!-- Блок одной клиники с фото -->











<section class="one-clinic blue">
    <div class="container">
        <div class="content">
            <div class="text">
                <h3><?php the_title(); ?></h3>


<?php if ( have_rows( 'clinick_block' ) ) : ?>
    <?php while ( have_rows( 'clinick_block' ) ) : the_row(); ?>
        <p><?php the_sub_field( 'short_description' ); ?></p>
    <?php endwhile; ?>
<?php endif; ?>

                <ul class="clinic-tags">

<?php if ( have_rows( 'tags_for_clinic' ) ) : ?>
	<?php while ( have_rows( 'tags_for_clinic' ) ) : the_row(); ?>
		<li><?php the_sub_field( 'tag' ); ?></li>
	<?php endwhile; ?>
<?php endif; ?>

                <!-- < ?php $rows_tag = get_field('tags_for_clinic');
                foreach ( $rows_tag as $row_tag ) : ?>
                    <li>< ?php $row_tag['tag']; ?></li>
                < ?php endforeach;?> -->
                </ul>


            </div>

            <div class="photos">



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

    
        

            </div>


            <div>




<?php if ( have_rows( 'clinick_block' ) ) : ?>
    <?php while ( have_rows( 'clinick_block' ) ) : the_row(); ?>

                <div class="counters">
        <?php if ( have_rows( 'count_1' ) ) : ?>
            <?php while ( have_rows( 'count_1' ) ) : the_row(); ?>
                    <div>
                        <div class="num"><?php the_sub_field( 'count_num' ); ?></div>
                        <p><?php the_sub_field( 'opisanie' ); ?></p>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php if ( have_rows( 'count_2' ) ) : ?>
            <?php while ( have_rows( 'count_2' ) ) : the_row(); ?>
                    <div>
                        <div class="num"><?php the_sub_field( 'count_num' ); ?></div>
                        <p><?php the_sub_field( 'opisanie' ); ?></p>
                    </div>
                
                
            <?php endwhile; ?>
        <?php endif; ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
     

            </div>

            <div class="btns">
                <ul class="clinic-links">

<?php if ( have_rows( 'clinick_block' ) ) : ?>
    <?php while ( have_rows( 'clinick_block' ) ) : the_row(); ?>
                    <li><a href="<?php the_sub_field( 'link_clinic_page' ); ?>" class="btn">О клиникие</a></li>
                    <li><a class="popmake-obratnyj-zvonok green-btn btn">Уточнить цены</a></li>
    <?php endwhile; ?>
<?php endif; ?>
                </ul>
            </div>




        </div>
    </div>
</section>
<!-- Конец - Блок одной клиники с фото -->
        
    