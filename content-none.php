<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<main id="main" class="site-main" role="main">
<div class="open-courses course" style="padding-bottom: 0;"><div class="col tc"><h1><?php printf( __( 'Поиск: %s', 'Ember' ), get_search_query() ); ?></h1></div></div>

<div class="container">

<section class="no-results not-found">

	<div class="page-content" style="padding: 70px 0;">

		<h2 class="tc">Ничего не найдео :(</h2>

	</div><!-- .page-content -->
</section><!-- .no-results -->
</div></main>
