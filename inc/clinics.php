<?php 
add_action( 'init', 'health_products' ); // Использовать функцию только внутри хука init

function health_products() {
	$labels = array(
		'name' => 'Клиники',
		'singular_name' => 'Клиника', // админ панель Добавить->Функцию
		'add_new' => 'Добавить клинику',
		'add_new_item' => 'Добавить новую клинику', // заголовок тега <title>
		'edit_item' => 'Редактировать клинику',
		'new_item' => 'Новая клиника',
		'all_items' => 'Все клиники',
		// 'view_item' => 'Просмотр продукта на сайте',
		'search_items' => 'Искать клинику',
		'not_found' =>  'Клиник не найдено.',
		'not_found_in_trash' => 'В корзине нет клиник.',
		'menu_name' => 'Клиники' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        //'rewrite' => array('slug' => 'health/%health%'),
        'rewrite' => array('slug' => 'medicinskie-centry'),
		'has_archive' => false,
        'hierarchical' => true,
		'menu_icon' => 'dashicons-admin-multisite', // иконка корзины
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail', 'revisions')
	);
	register_post_type('clinics', $args);
}


// add_filter( 'clinics_post_type_args', '_my_rewrite_slug' );
//             function _my_rewrite_slug( $args ) {
//             $args['rewrite']['slug'] = 'medicinskie-centry';
//             return $args;
// }


add_action("admin_init", "admin_init_clinic");
    // add_action('save_post', 'save_job_position_clinic');

    function admin_init_clinic(){
        add_meta_box("job_position_clinic", "Шорткод", "meta_options", "clinics", "side", "high");
    }

    function meta_options(){
        global $post;
        $custom = get_post_custom($post->ID);
        // $job_position_clinic = $custom["job_position_clinic"][0];
        $custom_id = $post->ID;
?>
    <!-- <label>Адресс:</label><input name="job_position_clinic" type="text" style="width: 100%;" value="<?php echo $job_position_clinic; ?>" /> -->
    <label>Шорткод клиники:</label><input name='clinic_id' type='text' style='width: 100%;' value='[clinic id="<?php echo $custom_id; ?>"]' readonly/>
    <label>Шорткод галеери:</label><input name='clinic_photo_id' type='text' style='width: 100%;' value='[clinic_photo id="<?php echo $custom_id; ?>"]' readonly/>
    <label>Шорткод меток:</label><input name='clinic_tag_id' type='text' style='width: 100%;' value='[clinic_tags id="<?php echo $custom_id; ?>"]' readonly/>
    <label>Шорткод блок-клиники:</label><input name='clinic_block_id' type='text' style='width: 100%;' value='[clinic_block id="<?php echo $custom_id; ?>"]' readonly/>
<?php
    }

	// function save_job_position_clinic(){
	// 	global $post;
	// 	update_post_meta($post->ID, "job_position_clinic", $_POST["job_position_clinic"]);
	// }







add_shortcode( 'clinic',  'call_shortcode_clinic' );
function call_shortcode_clinic( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $clinic_query = new WP_Query( array(
        'post_type' => 'clinics',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="clinic">';
    if ( $clinic_query->have_posts() ) :
        while ( $clinic_query->have_posts() ) : $clinic_query->the_post();
            get_template_part( 'template-parts/clinic', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}




add_shortcode( 'clinic_block',  'call_shortcode_clinic_block' );
function call_shortcode_clinic_block( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $clinic_query = new WP_Query( array(
        'post_type' => 'clinics',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="clinic-block">';
    if ( $clinic_query->have_posts() ) :
        while ( $clinic_query->have_posts() ) : $clinic_query->the_post();
            get_template_part( 'template-parts/clinic-block', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}




add_shortcode( 'clinic_photo',  'shortcode_clinic_photo' );
function shortcode_clinic_photo( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $clinic_query = new WP_Query( array(
        'post_type' => 'clinics',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="clinic">';
    if ( $clinic_query->have_posts() ) :
        while ( $clinic_query->have_posts() ) : $clinic_query->the_post();
            get_template_part( 'template-parts/clinic_photo', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}


add_shortcode( 'clinic_tags',  'shortcode_clinic_tags' );
function shortcode_clinic_tags( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $clinic_query = new WP_Query( array(
        'post_type' => 'clinics',
        'p' => intval( $atts['id'] )
    ));

    if ( $clinic_query->have_posts() ) :
        while ( $clinic_query->have_posts() ) : $clinic_query->the_post();
            ?>

<ul class="clinic-tags">
<?php $rows_tag = get_field('tags_for_clinic');
foreach ( $rows_tag as $row_tag ) : ?>
    <li><?= $row_tag['tag']; ?></li>
<?php endforeach;?>
</ul>

            <?php
        endwhile;
    endif;

    wp_reset_postdata();
    return ob_get_clean();
}


add_filter( 'manage_edit-clinics_columns', 'my_edit_clinics_columns' ) ;

function my_edit_clinics_columns( $columns ) {

    $columns = array(
        'cb' => '&lt;input type="checkbox" />',
        'title' => __( 'Название клиники' ),
        'shortcode' => __( 'Шорткод' ),
        'date' => __( 'Date' )
    );

    return $columns;
}


add_action( 'manage_clinics_posts_custom_column', 'my_manage_clinics_columns', 10, 2 );

function my_manage_clinics_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'shortcode' :
            $shortcode = $post->ID;
            if ( empty( $shortcode ) )
                echo __( 'Unknown' );
            else
                printf( __( '<input type="text" onfocus="this.select();" style="width: auto;max-width: 135px;" readonly="" value="[clinic id=%s]" class="large-text code">' ), $shortcode );

        break;

        default :
            break;
    }
}


add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );
function add_cpt_to_pll( $post_types, $is_settings ) {
    if ( $is_settings ) {
        // unset( $post_types['teachers'] );
    } else {
        $post_types['clinics'] = 'clinics';
    }
    return $post_types;
}


?>