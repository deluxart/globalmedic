<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<main id="main" class="site-main" role="main">
<div class="container">
	<div id="content-page" class="<?php echo esc_attr( get_post_meta( get_the_ID(), '_wporg_meta_key', true ) ); ?>">

	<div id="content-news" class="course content-area">

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
		?>

<?php
	$categories = get_the_category($post->ID);
	if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>5,
		'orderby' => 'rand',
		'caller_get_posts'=>1);
	$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		echo '<div class="related_posts">';
		echo '<div class="container">';
		echo '<h2 class="widget-title">Читать так-же:</h3>';
		echo '<ul>';
while ($my_query->have_posts()) {
$my_query->the_post();
?>
		<li>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<div class="post-thumb"><?php the_post_thumbnail(); ?></div>
				<div>
					<?php the_title(); ?>
					<span class="date_publ"><?php echo get_the_date(); ?></span>
				</div>
			</a>
		</li>
		<?php
		}
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		echo '<div class="all-posts"><a href="/articles/" class="btn">Показать больше</a></div>';
		}
		wp_reset_query();
		}
		?>








		<!-- .site-main -->
	</div><!-- .content-area -->


<?php  
$clinics_sidebar = esc_attr( get_post_meta( get_the_ID(), '_wporg_meta_key', true ) );

if($clinics_sidebar == 'clinics-1'){ 
?>

<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-1'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-2') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-2'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-3') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-3'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-4') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-4'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-5') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-5'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-6') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-6'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-7') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-7'); ?>
   		</div>
    </nav>

<?php 
 } elseif ($clinics_sidebar == 'clinics-8') {
?>
<nav id="sidebar" class="course">
   	<div>
	<?php if ( function_exists('dynamic_sidebar') )
				dynamic_sidebar('clinics-8'); ?>
   		</div>
    </nav>

<?php  } else { ?>	
 <nav id="sidebar" class="course">
   	<div>
		<?php if ( function_exists('dynamic_sidebar') )
						dynamic_sidebar('news-sidebar'); ?>
   		</div>
    </nav>
<?php 
 }?>





</div>
</div>
</main>
<?php get_footer(); ?>
