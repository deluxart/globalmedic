<?php
/*
Template Name: Treatment
*/

get_header(); ?>

<?php $args=array( 
'post_type' => 'treatment', //set the post_type to use.
// 'taxonomy' => 'treatments',
'term' => 'php', 
'posts_per_page' => 10  // how many posts or comment out for all.       
);

$tutorialsloop = new WP_Query($args);
if($tutorialsloop->have_posts()) : while($tutorialsloop->have_posts()) :
$tutorialsloop->the_post();

get_template_part( 'template-parts/content-treatment', get_post_format() );

endwhile; endif; //end the custom post_type loop


?>




<?php get_footer(); ?>
