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



<div class="block-doctor" id="doctor-<?php the_ID(); ?>">
<?php $photo = get_field( 'photo' ); ?>
<?php if ( $photo ) { ?>
    <div class="photo">
		<div style="background: url(<?php echo $photo['url']; ?>);background-size: cover;background-position: center;"><img src="https://globalmedik.com/wp-content/uploads/2019/10/doctor_opacity.gif" alt="<?php echo $photo['alt']; ?>" /></div>
    </div>
<?php } ?>
    <div class="text">
        <div class="name">
            <h4><?php the_title(); ?><span><?php the_field( 'position' ); ?></span></h4>
            <p class="clinic"><?php the_field( 'job_clinic' ); ?></p>
        </div>
        <div class="content">
            <div class="text-doctor">
        	<p><?php the_content(); ?></p>
            </div>
        </div>
        <div class="foot">
        	<div class="price">Консультация: <?php the_field( 'price' ); ?>$</div>
        	<div class="mail"><a href="mailto:<?php the_field( 'email' ); ?>" class="show-more btn"><i class="fa fa-envelope" aria-hidden="true"></i> Связаться</a></div>
        </div>
    </div>
</div>


