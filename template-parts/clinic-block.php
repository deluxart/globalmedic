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
<section class="one-clinic">
    <div class="container">
        <div class="content">
            <div class="text">
                <h3><?php the_title(); ?></h3>

                <?php if ( have_rows( 'clinick_block' ) ) : ?>
                    <?php while ( have_rows( 'clinick_block' ) ) : the_row(); ?>
                        <p><?php the_sub_field( 'short_description' ); ?></p>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if ( have_rows( 'tags_for_clinic' ) ) : ?>
                <ul class="clinic-tags">
                <?php while ( have_rows( 'tags_for_clinic' ) ) : the_row(); ?>
                    <li><?php the_sub_field( 'tag' ); ?></li>
                <?php endwhile; ?>
                
                </ul>
                <?php endif; ?>


            </div>

            <div class="photos">

            <?php if ( have_rows( 'photo_for_gallery' ) ) : ?>
            <div class="med-slider">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                    <?php while ( have_rows( 'photo_for_gallery' ) ) : the_row(); ?>
                        <?php if ( get_sub_field( 'foto' ) ) { ?>
                        <div class="swiper-slide"><img src="<?php the_sub_field( 'foto' ); ?>" alt=""></div>
                        <?php } ?>
                    <?php endwhile; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                    <?php while ( have_rows( 'photo_for_gallery' ) ) : the_row(); ?>
                        <?php if ( get_sub_field( 'foto' ) ) { ?>
                        <div class="swiper-slide"><img src="<?php the_sub_field( 'foto' ); ?>" alt=""></div>
                        <?php } ?>
                    <?php endwhile; ?>
                    </div>
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
        
    