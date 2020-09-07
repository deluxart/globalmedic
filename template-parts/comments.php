<?php
$comment_id = NULL;

// Define prefixed comment ID
$comment_acf_prefix = 'comment_';
$comment_id_prefixed = $comment_acf_prefix . $comment_id;
?>


    <div class="comment">
        

<br/>
                                Какое лечение проходил: <?php the_field( 'kakoe_lechenie_prohodil', $comment_id_prefixed ); ?><br/>
                Страна: <?php echo the_field( 'strana_otkuda_vy', $comment_id_prefixed ); ?><br/>
                Рейтинг: <?php echo the_field( 'rejting', $comment_id_prefixed ); ?><br/>


        <?php if( get_field('upload_image', $comment) ): ?>
            
            <img src="<?php the_field('image', $comment); ?>" />
            
        <?php endif; ?>
    
    </div>