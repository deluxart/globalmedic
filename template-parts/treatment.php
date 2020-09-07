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
<div class="clinic">
<div class="block-photos">




<?php 
    $foto_1 = get_field( 'foto_1' );
    $foto_2 = get_field( 'foto_2' );
    $foto_3 = get_field( 'foto_3' );
    $foto_4 = get_field( 'foto_4' );
    $foto_5 = get_field( 'foto_5' );
?>
    <?php if ( $foto_1 ) { ?>
        <div class="big" style="background: url(<?php echo $foto_1['url']; ?>);background-size: cover;background-position: center;">
            <img src="https://globalmedik.com/wp-content/uploads/2019/10/over.gif" />
        </div>
    <?php } ?>

    <?php if ( $foto_2 ) { ?>
        <div class="mini" style="background: url(<?php echo $foto_2['url']; ?>);background-size: cover;background-position: center;">
            <img src="https://globalmedik.com/wp-content/uploads/2019/10/over.gif" />
        </div>
    <?php } ?>


    <?php if ( $foto_3 ) { ?>
        <div class="mini" style="background: url(<?php echo $foto_3['url']; ?>);background-size: cover;background-position: center;">
            <img src="https://globalmedik.com/wp-content/uploads/2019/10/over.gif" />
        </div>
    <?php } ?>


    <?php if ( $foto_4 ) { ?>
        <div class="mini" style="background: url(<?php echo $foto_4['url']; ?>);background-size: cover;background-position: center;">
            <img src="https://globalmedik.com/wp-content/uploads/2019/10/over.gif" />
        </div>
    <?php } ?>

    <?php if ( $foto_5 ) { ?>
        <div class="mini" style="background: url(<?php echo $foto_5['url']; ?>);background-size: cover;background-position: center;">
            <img src="https://globalmedik.com/wp-content/uploads/2019/10/over.gif" />
        </div>
    <?php } ?>

</div>





<?php if ( have_rows( 'clinic-side_columns' ) ) : ?>
<div class="content-clinic clinic-sidebar" id="clinic-<?php the_ID(); ?>">
<?php else : ?>
    <div class="content-clinic" id="clinic-<?php the_ID(); ?>">
<?php endif; ?>




    <div class="clinic-block">
        <h2><?php the_title(); ?></h2>
        <div class="companies">

<?php if ( have_rows( 'tag_field' ) ) : ?>
    <?php while ( have_rows( 'tag_field' ) ) : the_row(); ?>
        <div class="company">
            <div>
                <?php $company_logo = get_sub_field( 'company_logo' ); ?>
                <?php if ( $company_logo ) { ?>
                    <div class="logo"><img src="<?php echo $company_logo['url']; ?>" alt="<?php echo $company_logo['alt']; ?>" /></div>
                <?php } ?>
                <div class="text">
                    <h4><?php the_sub_field( 'company_name' ); ?></h4>
                    <p><?php the_sub_field( 'company_description' ); ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php // no rows found ?>
<?php endif; ?>
        </div>
        <div class="text-block">
            <?php the_content(); ?>
        </div>
    </div>





    <div class="block-clinic-widgets">




<?php $rows = get_field('treatment-side_columns');
foreach ( $rows as $row ) : ?>
    <div class="block <?= $row['grid_columns']; ?>">
        <div class="title tc"><h2><?= $row['treatment-column_title']; ?></h2></div>
        <div class="content"><?= $row['treatment-column_content']; ?></div>
    </div>
<?php endforeach;?>
    </div>





</div>




</div>