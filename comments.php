<?php

/**

 * The template for displaying comments

 *

 * The area of the page that contains both current comments

 * and the comment form.

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */



/*

 * If the current post is protected by a password and

 * the visitor has not yet entered the password we will

 * return early without loading the comments.

 */

if ( post_password_required() ) {

	return;

}




// Define comment ID
// Replace NULL with ID of comment to be queried
$comment_id = NULL;

// Define prefixed comment ID
$comment_acf_prefix = 'comment_';
$comment_id_prefixed = $comment_acf_prefix . $comment_id;



?>



<div id="comments" class="comments-area">



	<?php if ( have_comments() ) : ?>

		<h2 class="comments-title">

			<?php

				$comments_number = get_comments_number();

				// if ( '1' === $comments_number ) {


				// 	printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'ember' ), get_the_title() );

				// } else {

				// 	printf(


				// 		_nx(

				// 			'%1$s thought on &ldquo;%2$s&rdquo;',

				// 			'%1$s thoughts on &ldquo;%2$s&rdquo;',

				// 			$comments_number,

				// 			'comments title',

				// 			'ember'

				// 		),

				// 		number_format_i18n( $comments_number ),

				// 		get_the_title()

				// 	);

				// }







			?>
			Отзывы
		</h2>



		<?php ember_comment_nav(); ?>




<ul class="commentlist custom-comments">
<?php
        // wp_list_comments( array( 'callback' => 'my_comments' ) );
        // $commentnumber = 0;
wp_list_comments(array(
	'callback'	  => 'my_comment_template'
));
?>
</ul>



		<?php ember_comment_nav(); ?>



	<?php endif; // have_comments() ?>



	<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?

		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :

	?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'ember' ); ?></p>

	<?php endif; ?>



	<?php comment_form(); ?>



</div><!-- .comments-area -->
