<?php
/*
Template Name: Страница с клиникой
*/

get_header(); ?>

<?php if ( get_field( 'box-content' ) == 1 ) { ?>
	<div id="primary" class="content-area clinics-page box-page">
<?php
} else { ?>
	<div id="primary" class="content-area clinics-page"> 
<?php } ?>

		<div class="container post-page">


<?php $clinic_before = get_field( 'content_before_text' ); ?>
<?php if ( $clinic_before ) { ?>
	<?php echo do_shortcode( get_field('content_before_text') ); ?>
<?php } ?>



		

		<div class="content">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'template-parts/clinic', get_post_format() );

			// End the loop.
			endwhile;
			?>
		</div>


<main id="main" class="site-main123 <?php echo esc_attr( get_post_meta( get_the_ID(), '_wporg_meta_key', true ) ); ?>" role="main">





		<div class="content">
			
<article id="post-<?php the_ID(); ?>" class="post-<?php the_ID(); ?> page type-page status-publish hentry">



<div class="entry-content">
	<?php the_field( 'kontent_pod_klinikoj_doktora_bloki_i_td' ); ?>











		<div class="comments">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			// End the loop.
			endwhile;
			?>
		</div>
















</div><!-- .entry-content -->


</article><!-- #post-## -->

<!-- #comments -->
		</div>








<?php  
$clinics_sidebar = esc_attr( get_post_meta( get_the_ID(), '_wporg_meta_key', true ) );

if($clinics_sidebar == 'clinics-1'){ 
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-1'); ?>
   		</div>
    </aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-2') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-2'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-3') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-3'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-4') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-4'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-5') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-5'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-6') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-6'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-7') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-7'); ?>
   	</div>
</aside>

<?php 
 } elseif ($clinics_sidebar == 'clinics-8') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-8'); ?>
   	</div>
</aside>






<?php 
 } elseif ($clinics_sidebar == 'clinics-9') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-9'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-10') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-10'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-11') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-11'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-12') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-12'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-13') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-13'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-14') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-14'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-15') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-15'); ?>
   	</div>
</aside>
<?php 
 } elseif ($clinics_sidebar == 'clinics-16') {
?>
<aside id="sidebar" class="course">
	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-16'); ?>
   	</div>
</aside>






<?php  } else { ?>	
<!-- <aside id="sidebar" class="course">
	<div>
   	</div>
</aside> -->
<?php 
 }?>




	













		</main><!-- .site-main -->
	</div>





<?php $clinic_after = get_field( 'content_after_text' ); ?>
<?php if ( $clinic_after ) { ?>
	<?php the_field( 'content_after_text' ); ?>
<?php } ?>





	</div><!-- .content-area -->

<?php get_footer(); ?>
