<div class="block-quote-lab" style="margin-bottom: <?php block_field( 'margin-bottom' ); ?>px; border-left: 4px solid <?php block_field( 'border-color' ); ?>;">
	<?php block_field( 'content' ); ?>
</div>

<?php
if ( block_value( 'shadow' ) ) {
	echo "<style>.block-quote-lab { box-shadow: 0 7px 30px 0 rgba(0,0,0,.1) !important; }</style>";
}
?>