<?php 
add_action('init', 'create_post_type');

function create_post_type() {
    register_post_type('treatment',
        array(
            'labels' => array(
                'name' => 'Лечение',
                'singular_name' => 'Лечение', // админ панель Добавить->Функцию
                'add_new' => 'Добавить статью',
                'add_new_item' => 'Добавить новую статью', // заголовок тега <title>
                'edit_item' => 'Редактировать статью',
                'new_item' => 'Новая статья',
                'all_items' => 'Все статьи',
                'search_items' => 'Искать статью',
                'not_found' =>  'Статей не найдено.',
                'not_found_in_trash' => 'В корзине нет статей.',
                'menu_name' => 'Лечение',
                ),
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'menu_icon' => 'dashicons-welcome-widgets-menus',
                'query_var' => true,
                'capability_type' => 'post',
                // 'rewrite' => array('slug' => 'treatments/%treatment%'),
                'hierarchical' => true,
                'menu_position' => null,
                'taxonomies' => array('treatments','post_tag'),
                'supports' => array('title','editor','author', 'custom-fields','thumbnail','excerpt','comments'),
            )
        );
         register_taxonomy( 'treatments', 'treatment', array( 'hierarchical' => true, 'label' => 'Рубрики', 'query_var' => true, 'rewrite' => true ) );
 
    }



function wpa_course_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'treatments' );
        if( $terms ){
            return str_replace( '%treatment%' , $terms[0]->slug , $post_link );
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_course_post_link', 1, 3 );




add_action("admin_init", "admin_init_treatment");
    // add_action('save_post', 'save_job_position_clinic');

    function admin_init_treatment(){
        add_meta_box("job_position_treatment", "Шорткод", "meta_options_treatment", "treatment", "side", "high");
    }

    function meta_options_treatment(){
        global $post;
        $custom = get_post_custom($post->ID);
        // $job_position_clinic = $custom["job_position_clinic"][0];
        $custom_id = $post->ID;
?>
    <!-- <label>Адресс:</label><input name="job_position_clinic" type="text" style="width: 100%;" value="<?php echo $job_position_clinic; ?>" /> -->
    <!-- <label>Шорткод статьи:</label><input name='treatment_id' type='text' style='width: 100%;' value='[treatment id="<?php echo $custom_id; ?>"]' readonly/> -->
    <!-- <label>Шорткод галеери:</label><input name='clinic_photo_id' type='text' style='width: 100%;' value='[clinic_photo id="<?php echo $custom_id; ?>"]' readonly/> -->
    <!-- <label>Шорткод меток:</label><input name='clinic_tag_id' type='text' style='width: 100%;' value='[clinic_tags id="<?php echo $custom_id; ?>"]' readonly/> -->
    <label>Шорткод статьи:</label><input type='text' onfocus='this.select();' style='width: 100%;' readonly='' value='[treatment id="<?php echo $custom_id; ?>"]' class='large-text code' />
<?php
    }

	// function save_job_position_clinic(){
	// 	global $post;
	// 	update_post_meta($post->ID, "job_position_clinic", $_POST["job_position_clinic"]);
	// }







add_shortcode( 'treatment',  'call_shortcode_treatment' );
function call_shortcode_treatment( $atts ) {
    ob_start();
    $atts = shortcode_atts( array( 'id' => null ), $atts );
    $clinic_query = new WP_Query( array(
        'post_type' => 'treatment',
        'p' => intval( $atts['id'] )
    ));

    echo '<div class="clinic">';
    if ( $clinic_query->have_posts() ) :
        while ( $clinic_query->have_posts() ) : $clinic_query->the_post();
            get_template_part( 'template-parts/treatment', get_post_format() );
        endwhile;
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}



add_shortcode( 'treatment_photo',  'shortcode_treatment_photo' );
function shortcode_treatment_photo( $atts ) {
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


add_shortcode( 'treatment_tags',  'shortcode_treatment_tags' );
function shortcode_treatment_tags( $atts ) {
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
<?php $rows_tag = get_field('tags_for_treatment');
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


add_filter( 'manage_edit-treatment_columns', 'my_edit_treatment_columns' ) ;

function my_edit_treatment_columns( $columns ) {

    $columns = array(
        'cb' => '&lt;input type="checkbox" />',
        'title' => __( 'Название лечения' ),
        'shortcode' => __( 'Шорткод' ),
        'date' => __( 'Date' )
    );

    return $columns;
}


add_action( 'manage_treatment_posts_custom_column', 'my_manage_treatment_columns', 10, 2 );

function my_manage_treatment_columns( $column, $post_id ) {
    global $post;

    switch( $column ) {

        case 'shortcode' :
            $shortcode = $post->ID;
            if ( empty( $shortcode ) )
                echo __( 'Unknown' );
            else
                printf( __( '<input type="text" onfocus="this.select();" style="width: auto;max-width: 158px;" readonly="" value="[treatment id=%s]" class="large-text code">' ), $shortcode );

        break;

        default :
            break;
    }
}
?>