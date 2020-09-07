<?php
add_action( 'init', 'health_doctors' ); // Использовать функцию только внутри хука init

function health_doctors() {
	$labels = array(
		'name' => 'Доктора',
		'singular_name' => 'Доктор', // админ панель Добавить->Функцию
		'add_new' => 'Добавить доктора',
		'add_new_item' => 'Добавить нового доктора', // заголовок тега <title>
		'edit_item' => 'Редактировать доктора',
		'new_item' => 'Новый доктор',
		'all_items' => 'Все доктора',
		// 'view_item' => 'Просмотр продукта на сайте',
		'search_items' => 'Искать доктора',
		'not_found' =>  'Докторов не найдено.',
		'not_found_in_trash' => 'В корзине нет докторов.',
		'menu_name' => 'Доктора' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
        //'rewrite' => array('slug' => 'health/%health%'),
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true,
		'menu_icon' => 'dashicons-businessman', // иконка корзины
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail', 'revisions')
	);
	register_post_type('doctors', $args);
}

add_action("admin_init", "add_position_metabox");
    // add_action('save_post', 'save_job_position_doc');

    function add_position_metabox(){
        add_meta_box("job_position_doc", "Шорткод", "meta_options_doc", "doctors", "side", "high");
    }

    function meta_options_doc(){
        global $post;
        $custom = get_post_custom($post->ID);
        // $job_position_doc = $custom["job_position_doс"][0];
        $custom_id = $post->ID;
?>
    <!-- <label>Должность:</label><input name="job_position" type="text" style="width: 100%;" value="<?php echo $job_position_doc; ?>" /> -->
    <label>ID:</label><input name='doctor_id' type='text' style='width: 100%;' value='[doctor id="<?php echo $custom_id; ?>"]' readonly/>
    <label>ID mini:</label><input name='doctor_mini_id' type='text' style='width: 100%;' value='[doctor_mini id="<?php echo $custom_id; ?>"]' readonly/>
<?php
    }

	// function save_job_position_doc(){
	// 	global $post;
	// 	update_post_meta($post->ID, "job_position_doс", $_POST["job_position_doc"]);
	// }



add_shortcode( 'doctor',  'call_shortcode_doctor' );
function call_shortcode_doctor( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $doctor_query = new WP_Query( array(
        'post_type' => 'doctors',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="doctor">';
    if ( $doctor_query->have_posts() ) :
        while ( $doctor_query->have_posts() ) : $doctor_query->the_post();
            get_template_part( 'template-parts/doctor', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}


add_shortcode( 'doctor_mini',  'call_shortcode_doctor_mini' );
function call_shortcode_doctor_mini( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $doctor_mini_query = new WP_Query( array(
        'post_type' => 'doctors',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="doctor">';
    if ( $doctor_mini_query->have_posts() ) :
        while ( $doctor_mini_query->have_posts() ) : $doctor_mini_query->the_post();
            get_template_part( 'template-parts/doctor_mini', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}








add_filter( 'manage_edit-doctors_columns', 'my_edit_doctors_columns' ) ;

function my_edit_doctors_columns( $columns ) {

    $columns = array(
        'cb' => '&lt;input type="checkbox" />',
        'title' => __( 'Имя доктора' ),
        'shortcode' => __( 'Шорткод' ),
        'date' => __( 'Date' )
    );

    return $columns;
}


add_action( 'manage_doctors_posts_custom_column', 'my_manage_doctors_columns', 10, 2 );

function my_manage_doctors_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'shortcode' :
            $shortcode = $post->ID;
            if ( empty( $shortcode ) )
                echo __( 'Unknown' );
            else
                printf( __( '[doctor id="%s"]' ), $shortcode );

        break;

        default :
            break;
    }
}









?>