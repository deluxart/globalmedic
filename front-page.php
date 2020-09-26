<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">






<?php if ( have_rows( 'glavnaya_stranicza' ) ): ?>
	<?php while ( have_rows( 'glavnaya_stranicza' ) ) : the_row(); ?>
	
		<?php if ( get_row_layout() == 'home_slider' ) : ?>
			<section id="home-slider">
				<div class="container">
				<div class="content">
					<div class="text">
					<div>
						<h1><?php the_sub_field( 'osnovnoj_zasholovok_header' ); ?></h1>
						<p class="descr"><?php the_sub_field( 'opisanie_header' ); ?></p>
						<?php if ( have_rows( 'knopka_slider' ) ) : ?>
							<?php while ( have_rows( 'knopka_slider' ) ) : the_row(); ?>
								<a href="#" class="white-btn btn <?php the_sub_field( 'dopklass_dlya_knopki' ); ?>"><?php the_sub_field( 'tekst_knopki' ); ?></a>
							<?php endwhile; ?>
						<?php endif; ?>
						
					</div>
					</div>
					<div class="a-end">
					<?php if ( get_sub_field( 'kartinka_slider' ) ) : ?>
						<img src="<?php the_sub_field( 'kartinka_slider' ); ?>" />
					<?php endif ?>
					</div>
				</div>
				</div>
			</section>
			
			


		<?php elseif ( get_row_layout() == 'directions' ) : ?>
			<section id="directions">
			<div class="container">
				<p><h2 class="bg"><?php the_sub_field( 'zagolovok_sekczii_directions' ); ?></h2>
				<p><?php the_sub_field( 'opisanie_directions' ); ?></p>
			</div>
			<div class="container">
			<?php if ( have_rows( 'kartochki_s_napravleniyami' ) ) : ?>
			<div class="content">
				<?php while ( have_rows( 'kartochki_s_napravleniyami' ) ) : the_row(); ?>
					<div>
						<?php if ( get_sub_field( 'ikonka' ) ) : ?>
							<img src="<?php the_sub_field( 'ikonka' ); ?>" />
						<?php endif ?>
						<h5><?php the_sub_field( 'zagolovok_napravleniya' ); ?></h5>
						<p><?php the_sub_field( 'opisanie_napravleniya' ); ?></p>
						<?php if ( have_rows( 'knopka' ) ) : ?>
							<?php while ( have_rows( 'knopka' ) ) : the_row(); ?>
								<?php $ssylka = get_sub_field( 'ssylka' ); ?>
								<?php if ( $ssylka ) : ?>
								<div><a href="<?php echo esc_url( $ssylka); ?>" class="white-btn btn"><span><?php the_sub_field( 'tekst_na_knopke' ); ?></span><i class="fas fa-long-arrow-alt-right"></i></a></div>
								<?php endif; ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
			</div>
			</section>
			
		<?php elseif ( get_row_layout() == 'search' ) : ?>
			<section id="search-sec-title">
				<div class="container">
					<h2 class="tc"><?php the_sub_field( 'zagolovok_sekczii' ); ?></h2>
					<p class="description"><?php the_sub_field( 'opisanie_search' ); ?></p>
				</div>
			</section>
			<section id="search-sec">
				<div class="container">
					<div class="content">
					<div class="prev">Хочу найти</div>
					<div class="search-form"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
					</div>
				</div>
			</section>
			
			
		<?php elseif ( get_row_layout() == 'preimushestva' ) : ?>
			<section id="treatment" class="section">
				<div class="container">
				<h2 class="bg"><?php the_sub_field( 'zagolovok_sekczii' ); ?></h2>
				<p><?php the_sub_field( 'opisanie' ); ?></p>
				<?php if ( have_rows( 'kartochki_s_preimushhestvami' ) ) : ?>
				<div class="grid-columns-4">
					<?php while ( have_rows( 'kartochki_s_preimushhestvami' ) ) : the_row(); ?>
					<div>
						<?php if ( get_sub_field( 'ikonka' ) ) : ?>
							<img src="<?php the_sub_field( 'ikonka' ); ?>" />
						<?php endif ?>
						<h4><?php the_sub_field( 'zagolovok_preimushestva' ); ?></h4>
						<p><?php the_sub_field( 'opisanie_preimushestva' ); ?></p>
					</div>
					<?php endwhile; ?>
				</div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>
				</div>
			</section>
			
		<?php elseif ( get_row_layout() == 'about' ) : ?>
			<section id="about">
				<div class="container">
				<h2 class="bg"><?php the_sub_field( 'zagolovok_sekczii' ); ?></h2>
				</div>
				<div class="content">
				<div class="container">
					<div class="grid-columns-2">
						<?php if ( get_sub_field( 'kartinka_about' ) ) : ?>
							<div><img src="<?php the_sub_field( 'kartinka_about' ); ?>" /></div>
						<?php endif ?>
						<div><?php the_sub_field( 'kontentnaya_chast' ); ?></div>
					</div>
				</div>
				</div>
			</section>
			
		<?php elseif ( get_row_layout() == 'bonuses' ) : ?>
			<section id="icons">
				<div class="container">
				<?php if ( have_rows( 'kartochki_s_bonusami' ) ) : ?>
				<div class="content">
					<?php while ( have_rows( 'kartochki_s_bonusami' ) ) : the_row(); ?>
					<div>
						<?php if ( get_sub_field( 'ikonka' ) ) : ?>
							<img src="<?php the_sub_field( 'ikonka' ); ?>" />
						<?php endif ?>
						<p><?php the_sub_field( 'opisanie' ); ?></p>
					</div>
					<?php endwhile; ?>
				</div>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'principi_raboti' ) : ?>
			<section id="working">
			<div class="container">
				<h2 class="bg"><?php the_sub_field( 'zagolovok_sekczii_principi' ); ?></h2>
			</div>
			<div class="gray-bg">
				<div class="container">
					<div class="content">
					<p><?php the_sub_field( 'opisanie_principi' ); ?></p>

					<?php if ( have_rows( 'kartochki_s_princzipami' ) ) : ?>
					<div class="grid-columns-4">
						<?php while ( have_rows( 'kartochki_s_princzipami' ) ) : the_row(); ?>
						<div>
							<div class="icon">
								<?php if ( get_sub_field( 'ikonka' ) ) : ?>
									<img src="<?php the_sub_field( 'ikonka' ); ?>" />
								<?php endif ?>
							</div>
							<h4><?php the_sub_field( 'zagolovok_preimushestva' ); ?></h4>
							<p><?php the_sub_field( 'opisanie' ); ?></p>
						</div>
						<?php endwhile; ?>
					</div>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
			</section>
		<?php elseif ( get_row_layout() == 'ne_oplachivayete_nashi_uslugi' ) : ?>
			<section id="offer">
				<div class="container">
					<div class="content blue-g">
					<?php if ( get_sub_field( 'kartinka' ) ) : ?>
						<div><img src="<?php the_sub_field( 'kartinka' ); ?>" /></div>
					<?php endif ?>
					<div>
						<h4><?php the_sub_field( 'zagolovok_sekczii' ); ?></h4>
						<p><?php the_sub_field( 'opisanie' ); ?></p>
					</div>
					<div>
					<?php if ( have_rows( 'knopka' ) ) : ?>
						<?php while ( have_rows( 'knopka' ) ) : the_row(); ?>
							<a class="trans-btn btn <?php the_sub_field( 'dopklass_dlya_knopki' ); ?>"><?php the_sub_field( 'tekst_na_knopke' ); ?></a>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
					</div>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'vy_iskali_chto-to_drugoye' ) : ?>
			<section id="offer-two">
				<div class="container">
					<div class="content blue-g">
					<?php if ( get_sub_field( 'kartinka' ) ) : ?>
						<div class="a-end"><img src="<?php the_sub_field( 'kartinka' ); ?>" alt=""></div>
					<?php endif ?>
						<div>
							<h4><?php the_sub_field( 'zagolovok_sekczii' ); ?></h4>
							<p><?php the_sub_field( 'opisanie' ); ?></p>
						</div>
						<div>
						<?php if ( have_rows( 'knopka' ) ) : ?>
							<?php while ( have_rows( 'knopka' ) ) : the_row(); ?>
								<a class="trans-btn btn <?php the_sub_field( 'dob_klass_na_knopke' ); ?>"><?php the_sub_field( 'tekst_na_knopke' ); ?></a>
							<?php endwhile; ?>
						<?php endif; ?>
							
						</div>
					</div>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'reviews' ) : ?>
			<section id="reviews">
			<div class="container">
				<h2><?php the_sub_field( 'zagolovok_sekczii_reviews' ); ?></h2>
				<div class="content">
					<div class="reviews-slick">
					Здесь шоркод отзывов
					</div>
				</div>
				<p><?php the_sub_field( 'opisanie_reviews' ); ?></p>
				<div class="socials">
				<ul>
					<li><a href="https://www.facebook.com/globalmedik" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
					<li><a href="https://www.instagram.com/plastika.globalmedik/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
				</div>
			</div>
			</section>
		<?php elseif ( get_row_layout() == 'blog' ) : ?>
			<section id="articles">
				<div class="container">
					<h2><?php the_sub_field( 'zagolovok_sekczii_blog' ); ?></h2>
					<p><?php the_sub_field( 'opisanie_blog' ); ?></p>
					<div class="content">
					<div><?php echo do_shortcode('[recent_posts posts="6"]'); ?></div>
					</div>
					<?php if ( have_rows( 'knopka_blog' ) ) : ?>
						<?php while ( have_rows( 'knopka_blog' ) ) : the_row(); ?>
							<?php $ssylka_knopki = get_sub_field( 'ssylka_knopki' ); ?>
							<?php if ( $ssylka_knopki ) : ?>
								<div><a href="<?php echo esc_url( $ssylka_knopki); ?>" class="show-more btn"><?php the_sub_field( 'tekst_na_knopke' ); ?></a></div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'contacts' ) : ?>
			<section id="contacts">
				<div class="content">
				<div><?php the_sub_field( 'kod_karty_google_maps' ); ?></div>
				<div>
					<?php if ( have_rows( 'socz-seti' ) ) : ?>
					<ul class="soc">
						<?php while ( have_rows( 'socz-seti' ) ) : the_row(); ?>
							<li><a href="<?php the_sub_field( 'ssylka' ); ?>" rel="nofollow noopener noreferrer" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><?php the_sub_field( 'nazvanie' ); ?></a></li>
						<?php endwhile; ?>
					</ul>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
					
					<?php if ( have_rows( 'kontakty' ) ) : ?>
					<ul class="contacts">
						<?php while ( have_rows( 'kontakty' ) ) : the_row(); ?>
						<li>
							<div>
							<?php if ( get_sub_field( 'ikonka' ) ) : ?>
								<img src="<?php the_sub_field( 'ikonka' ); ?>" />
							<?php endif ?>
							</div>
							<div>
								<h3><?php the_sub_field( 'zagolovok' ); ?></h3>
								<p><?php the_sub_field( 'kontentnaya_chast' ); ?></p>
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
				</div>
				</div>
			</section>
		<?php elseif ( get_row_layout() == 'podobrat' ) : ?>
			<section id="choose" class="blue-g">
				<div class="container">
					<div class="content">
					<?php if ( get_sub_field( 'ikonka' ) ) : ?>
						<div><img src="<?php the_sub_field( 'ikonka' ); ?>" /></div>
					<?php endif ?>
					<div><h3><?php the_sub_field( 'tekst' ); ?></h3></div>
					<?php if ( have_rows( 'knopka' ) ) : ?>
						<?php while ( have_rows( 'knopka' ) ) : the_row(); ?>
							<?php $ssylka = get_sub_field( 'ssylka' ); ?>
							<?php if ( $ssylka ) : ?>
								<div><a href="<?php echo esc_url( $ssylka) ; ?>" class="book-btn btn"><?php the_sub_field( 'tekst_na_knopke' ); ?></a></div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>



























		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
