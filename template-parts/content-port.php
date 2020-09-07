<?php
/**
 * The template used for displaying content single
 *
 * @package    WordPress
 * @subpackage asterion
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<article  id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php 
		if( get_theme_mod( 'asterion_single_post_image', 1 ) != false ) {
			//load post thubnail
			asterion()->posts->post_thumbnail(); 	
		}
	?>

	<div class="blog-post-body port_body">


		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php			
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'asterion' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'asterion' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div>


	<div id="panel">

<a id="largelink"  href="<?php the_field('original_1'); ?>" id="largeIink" title=""  data-fancybox="images"><img src="<?php the_field('original_1'); ?>"  id="largeImage" /></a>
	</div>




	<div id="thumbs">
  <?php if ( get_field('original_1') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('original_1'); ?>" class="entry-thumb" /></div>
<?php } else { ?>
<?php } ?>
  <?php if ( get_field('original_2') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('original_2'); ?>" class="entry-thumb" /></div>
<?php } else { ?>
<?php } ?>

  <?php if ( get_field('original_3') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('original_3'); ?>" class="entry-thumb" /></div>
<?php } else { ?>
<?php } ?>

  <?php if ( get_field('mobilnaya_versiya_1') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('mobilnaya_versiya_1'); ?>" class="entry-thumb" /></div>
<?php } else { ?>
<?php } ?>

  <?php if ( get_field('mobilnaya_versiya_2') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('mobilnaya_versiya_2'); ?>" class="entry-thumb" /></div>
<?php } else { ?>
<?php } ?>

  <?php if ( get_field('mobilnaya_versiya_3') ) {?>
<div class="td-module-thumb"><img src="<?php the_field('mobilnaya_versiya_3'); ?>" class="entry-thumb"/></div>
<?php } else { ?>
<?php } ?>
	</div>


<ul class="port_ul">
<?php if ( get_field('proekt') ) {?>
<li><b>Имя проекта:</b> <?php the_field('proekt'); ?></li>
<?php } else { ?>
<?php } ?>
<?php if ( get_field('ssylka_na_proekt') ) {?>
<li><b>Адрес проекта:</b> <?php the_field('ssylka_na_proekt'); ?></li>
<?php } else { ?>
<?php } ?>

<?php if ( get_field('usluga') ) {?>
<li><b>Услуга:</b> <?php the_field('usluga'); ?></li>
<?php } else { ?>
<?php } ?>


<?php if ( get_field('data_vypolneniya') ) {?>
<li><b>Год:</b> <?php the_field('data_vypolneniya'); ?></li>
<?php } else { ?>
<?php } ?></ul>




	</div>
</article>
