<div class="block-doctor mini" id="doctor-mini-<?php the_ID(); ?>">
<?php $photo = get_field( 'photo' ); ?>
<?php if ( $photo ) { ?>
    <div class="photo">
        <img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
    </div>
<?php } ?>
    <div class="text">
        <div class="name">
            <h4><?php the_title(); ?><span><?php the_field( 'position' ); ?></span></h4>
        </div>
        <div class="foot">
            <div class="mail"><a href="#doctor-<?php the_ID(); ?>" class="show-more btn">Подробнее</a></div>
        </div>
    </div>
</div>