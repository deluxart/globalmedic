<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'Ember_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function Ember_setup() {
	load_theme_textdomain( 'Ember' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		// 'primary' => __( 'Primary Menu',      'Ember' ),
		// 'social'  => __( 'Social Links Menu', 'Ember' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );


	$color_scheme  = Ember_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	/**
	 * Filter Twenty Fifteen custom-header support arguments.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'Ember_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	// add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', Ember_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // Ember_setup
add_action( 'after_setup_theme', 'Ember_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function Ember_widgets_init() {
    register_sidebar( array(
		'name' => "Сайдбар - Базовый",
		'id' => 'news-sidebar',
		'description' => 'Эти виджеты будут показаны на страницах записей новостей',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

 //    register_sidebar( array(
	// 	'name' => "Сайдбар - Блог",
	// 	'id' => 'blog-sidebar',
	// 	'description' => 'Эти виджеты будут показаны на страницах записей блога',
	// 	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</aside>',
	// 	'before_title'  => '<h4 class="widget-title">',
	// 	'after_title'   => '</h4>',
	// ) );

    register_sidebar( array(
		'name' => "Футер - 1 колонка",
		'id' => 'footer-1',
		'description' => 'Футер - 1 колонка',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Футер - 2 колонка",
		'id' => 'footer-2',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Футер - 3 колонка",
		'id' => 'footer-3',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Футер - 4 колонка",
		'id' => 'footer-4',
		'description' => 'Эти виджеты будут показаны в правой колонке сайта',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );






    register_sidebar( array(
		'name' => "Клиники #1",
		'id' => 'clinics-1',
		'description' => 'Блок с клиниками #1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #2",
		'id' => 'clinics-2',
		'description' => 'Блок с клиниками #2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #3",
		'id' => 'clinics-3',
		'description' => 'Блок с клиниками #3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #4",
		'id' => 'clinics-4',
		'description' => 'Блок с клиниками #4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name' => "Клиники #5",
		'id' => 'clinics-5',
		'description' => 'Блок с клиниками #5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #6",
		'id' => 'clinics-6',
		'description' => 'Блок с клиниками #6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #7",
		'id' => 'clinics-7',
		'description' => 'Блок с клиниками #7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #8",
		'id' => 'clinics-8',
		'description' => 'Блок с клиниками #8',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #9",
		'id' => 'clinics-9',
		'description' => 'Блок с клиниками #9',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #10",
		'id' => 'clinics-10',
		'description' => 'Блок с клиниками #10',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #11",
		'id' => 'clinics-11',
		'description' => 'Блок с клиниками #11',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #12",
		'id' => 'clinics-12',
		'description' => 'Блок с клиниками #12',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #13",
		'id' => 'clinics-13',
		'description' => 'Блок с клиниками #13',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #14",
		'id' => 'clinics-14',
		'description' => 'Блок с клиниками #14',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #15",
		'id' => 'clinics-15',
		'description' => 'Блок с клиниками #15',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

    register_sidebar( array(
		'name' => "Клиники #16",
		'id' => 'clinics-16',
		'description' => 'Блок с клиниками #16',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );








}
add_action( 'widgets_init', 'Ember_widgets_init' );





function my_stylesheet2(){
    wp_enqueue_style("style-admin",get_bloginfo('stylesheet_directory')."/css/for_admin.css");
}
add_action('admin_head', 'my_stylesheet2');






if ( ! function_exists( 'Ember_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function Ember_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'Ember' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Ember 1.1
 */

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function Ember_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'Ember-fonts', Ember_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
	wp_enqueue_style( 'gm-swiper', get_template_directory_uri() . '/css/swiper-bundle.min.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'Ember-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'Ember-ie', get_template_directory_uri() . '/css/ie.css', array( 'Ember-style' ), '20141010' );
	wp_style_add_data( 'Ember-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'Ember-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'Ember-style' ), '20141010' );
	wp_style_add_data( 'Ember-ie7', 'conditional', 'lt IE 8' );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// wp_enqueue_script( 'Ember-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_enqueue_script( 'gm-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js','','1',true);
	wp_enqueue_script( 'gm-sliders-swiper', get_template_directory_uri() . '/js/sliders-swiper.js','','1',true);
}
add_action( 'wp_enqueue_scripts', 'Ember_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function Ember_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	wp_add_inline_style( 'Ember-style', $css );
}
add_action( 'wp_enqueue_scripts', 'Ember_post_nav_background' );


function Ember_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'Ember_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function Ember_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'Ember_search_form_modify' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fifteen 1.9
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function Ember_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'Ember_widget_tag_cloud_args' );

//$wpdb2 = new wpdb( 'levelu04_bd', 'pannsxf7', 'levelu04_bd', 'localhost' );
function _SmrkvLib_GetCourse ($atts = array(), $content = null, $tag)
{
	global $wpdb;
	$result =
		$wpdb->get_results('SELECT * FROM smrkv_courses WHERE url like "'.$atts['cource'].'%"');
	$dat_res = get_object_vars($result[0]);


	return $dat_res[$atts['field']];
}
add_shortcode( 'SmrkCourse', '_SmrkvLib_GetCourse' );

//BEGIN amberpanther.com code
function include_file($atts) {
     //if filepath was specified
     extract(
          shortcode_atts(
               array(
                    'filepath' => 'NULL',
                    'key1' => 'NULL'
               ), $atts
          )
     );

     if(strpos($filepath,"?")) {
          $query_string_pos = strpos($filepath,"?");
          //create global variable for query string so we can access it in our included files if we need it
          //also parse it out from the clean file name which we will store in a new variable for including
          global $query_string;
          $query_string = substr($filepath,$query_string_pos + 1);
          $clean_file_path = substr($filepath,0,$query_string_pos);
          //if there isn't a query string
     } else {
          $clean_file_path = $filepath;
     }

     //check if the filepath was specified and if the file exists
     if ($filepath != 'NULL' && file_exists(TEMPLATEPATH.$clean_file_path)){
          //turn on output buffering to capture script output
          ob_start();
          //include the specified file
          include(TEMPLATEPATH.$clean_file_path);
          //assign the file output to $content variable and clean buffer
          $content = ob_get_clean();
          return $content;
     }
}
//register the Shortcode handler
add_shortcode('include', 'include_file');


add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

global $user_ID;

if ( current_user_can( 'manager' ) ) {
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'index.php' );
        remove_menu_page( 'edit-comments.php' );
         remove_menu_page( 'admin.php?page=wpcf7' );
         remove_menu_page( 'edit.php?post_type=rl_gallery' );
         remove_menu_page( 'wpcf7' );
         remove_menu_page( 'tools.php' );
         remove_menu_page( 'Media' );
         remove_menu_page( 'edit.php' );                   // Записи
         remove_menu_page( 'profile.php' );
         remove_menu_page( 'upload.php' );
    }
}

// Отключение обновлений
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');



register_nav_menus(array(
	'mibile_nav'    => 'Мобильная навигация',

// Для полноэкранного меню
	'full_nav_1'    => 'Основное меню (Шапка)',
	'full_nav_2'    => 'Меню #2 (Все курсы)',
	'full_nav_3'    => 'Меню #3 (Программирование)',
	'full_nav_4'    => 'Меню #4 (Дизайн и верстка)',
	'full_nav_5'    => 'Меню #5 (Маркетинг и IT-менеджмент)',
	'full_nav_6'    => 'Меню #6 (Поддержка и аналитика)',
	'full_nav_7'    => 'Меню #7 (Индивидуальные курсы)',
// Для полноэкранного меню
));

// function add_additional_class_on_li($classes, $item, $args) {
//     if($args->add_li_class) {
//         $classes[] = $args->add_li_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// function add_menu_link_class( $atts, $item, $args ) {
//   if($args->link_class) {
//     $atts['class'] = $args->link_class;
//   }
//   return $atts;
// }
// add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


/** чтоб РЕДАКТОР не удалял теги span без атрибутов */
function override_mce_options($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_mce_options');
/** чтоб РЕДАКТОР не удалял теги span без атрибутов */

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';


function admin_favicon() {
    echo '<link rel="Shortcut Icon" type="image/svg+xml"
	      href="https://Ember.ua/wp-content/themes/Ember/img/favicon_admin.svg" />';
}
add_action('admin_head', 'admin_favicon');

add_action( 'admin_bar_menu', 'my_admin_bar_menu', 90 );
function my_admin_bar_menu( $wp_admin_bar ) {
	$wp_admin_bar->add_menu( array(
		'id'    => 'shortcodes',
		'title' => '<span class="ab-icon"></span><span class="ab-label">'.__( 'Основные настройки', 'some-textdomain' ).'</span>',
		'href'  => '/wp-admin/admin.php?page=price_options',
        'meta' => array(
                'target' => '_blank', // Change to _blank for launching in a new window
                'class' => 'shortcodes-link', // Add a class to your link
        )
	) );
};

if( !function_exists('_add_my_quicktags') ){

function _add_my_quicktags()
{ ?>

<?php }
add_action('admin_print_footer_scripts', '_add_my_quicktags');
}

add_action( 'admin_print_footer_scripts', 'test_callback' );
    function test_callback() {
    if ( wp_script_is('quicktags') ) :
    ?>
    <?php endif;
}

add_filter( 'category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );



add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
			return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
		return $the_template;' )
);


// Загрузка SVG

function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// function special_nav_class ($classes, $item) {
//     if (in_array('current-menu-item', $classes) ){
//         $classes[] = 'active ';
//     }
//     return $classes;
// }


// END Загрузка SVG



function php_in_widgets($widget_content) {
	if (strpos($widget_content, '<' . '?') !== false) {
		ob_start();
		eval('?' . '>' . $widget_content);
		$widget_content = ob_get_contents();
		ob_end_clean();
	}
	return $widget_content;
}
 
add_filter('widget_text', 'php_in_widgets', 99);

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	// return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Подробнее...</a>';
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



function search_filter ($query) {
if ($query->is_search)
$query->set('cat', '1, 32');
return $query;
}
add_filter('pre_get_posts', 'search_filter');



// Для публикации новостей
add_theme_support ('align-wide'); 
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Ember blue', 'genesis-sample' ),
		'slug'  => 'Ember-blue',
		'color'	=> '#1db4c1',
	),
	array(
		'name'  => __( 'Ember pink', 'genesis-sample' ),
		'slug'  => 'Ember-pink',
		'color' => '#ff1569',
	),
	array(
		'name'  => __( 'Dark gray', 'genesis-sample' ),
		'slug'  => 'dark-gray',
		'color' => '#333',
       ),
) );




// Add shortcode_spoiler

function sanitize_callback( $options ) { 
	foreach( $options as $name => & $val ) {
		if( $name == 'input' )
			$val = strip_tags( $val );
	}
	return $options;
}



// Спойлер для WP by Alexander Osadchyy
function simple_spoiler_shortcode($atts, $content) {
	if ( ! isset($atts['title']) ) {
		$sp_name = __( 'Спойлер', 'simple-spoiler' );
	} else {
		$sp_name = $atts['title'];
	}

	$sp_icon='';
	if(!empty($atts['icon'])){
	  $sp_icon = '<div class="icon"><img src="'.$atts['icon'].'" alt="" /></div>';
	  $sp_class = 'icon';
	}
	return '<div class="spoiler">
	      <div class="head '.$sp_class.'">'.$sp_icon.$sp_name.'</div>
	      <div class="cont">'.$content.'</div>
	    </div>';
}
add_shortcode( 'spoiler', 'simple_spoiler_shortcode' );
add_filter( 'comment_text', 'do_shortcode' );

function my_tinymce_button() {
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		add_filter( 'mce_buttons', 'my_register_tinymce_button' );
		add_filter( 'mce_external_plugins', 'my_tinymce_button_script' );
	}
}
add_action( 'admin_init', 'my_tinymce_button' );

function my_register_tinymce_button( $buttons ) {
	array_push( $buttons, 'my_button' );
	return $buttons;
}

function my_tinymce_button_script( $plugin_array ) {
	$plugin_array['my_button_script'] = get_stylesheet_directory_uri() . '/js/spoiler-wp.js';  // Change this to reflect the path/filename to your js file
	return $plugin_array;
}

add_action( 'admin_print_footer_scripts', 'html_button_spoiler' );
function html_button_spoiler() {
	if ( wp_script_is('quicktags') ){
?>
	<script type="text/javascript">
        QTags.addButton( 'my_prompt', 'Спойлер', btn_spoiler);
        function btn_spoiler() {
        var spoiler_title = prompt( 'Введите название спойлера:', '' );
        var spoiler_content = prompt( 'Введите контент спойлера:', '' );
        if ( spoiler_title && spoiler_content ) {
            QTags.insertContent('[spoiler title="' + spoiler_title + '"]' + spoiler_content + '[/spoiler]');
      }
    }
	</script>
<?php
	}
}
// Спойлер для WP by Alexander Osadchyy



/**
 * Enqueue Gutenberg block editor style
 */
function Ember_gutenberg_editor_styles() {
    wp_enqueue_style( 'Ember-block-editor-styles', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
}

add_action( 'enqueue_block_editor_assets', 'Ember_gutenberg_editor_styles' );

function column_block_cgb_editor_assets(){
    // Scripts.
    wp_enqueue_script(
        'column_block-cgb-block-js', // Handle.
        plugins_url('/dist/blocks.build.js', dirname(__FILE__)),
        array('wp-blocks', 'wp-i18n', 'wp-element')
    );

    // Styles.
    wp_enqueue_style(
        'column_block-cgb-block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', dirname(__FILE__)),
        array('wp-edit-blocks')
    );
} // End function column_block_cgb_editor_assets().

// Hook: Editor assets.
add_action('enqueue_block_editor_assets', 'column_block_cgb_editor_assets');


function my_mario_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'mario-blocks',
				'title' => __( 'Mario Blocks', 'mario-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'my_mario_block_category', 10, 2);

function my_stylesheet1(){
wp_enqueue_style("style-admin",get_bloginfo('stylesheet_directory')."/css/font-awesome.min.css");
}
add_action('admin_head', 'my_stylesheet1');


// function disable_visual_editor($can)
// {
//     global $post;

// 	$post_type = get_post_type($post);
// 	if ($post_type == 'page') {
//         return false;
//     }

//     return $can;
// }

// add_filter('user_can_richedit', 'disable_visual_editor');


require get_template_directory() . '/inc/options_page.php';
require get_template_directory() . '/inc/options_event-modal.php';
require get_template_directory() . '/inc/clinics.php';
require get_template_directory() . '/inc/treatment.php';
require get_template_directory() . '/inc/doctors.php';
require get_template_directory() . '/inc/gm-reviews.php';





pll_register_string('Call_back', 'Call_back');
pll_register_string('popmake-obratnyj-zvonok', 'popmake-obratnyj-zvonok');
pll_register_string('Home', 'Home');
pll_register_string('Copyright', 'Copyright');








/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2019.03.03
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = pll__('Home','Global'); // текст ссылки "Главная"
  // $text['home'] = __('Home', 'you_theme_name'); // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = '<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"
  $before = '<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"
  $after = '</span>'; // тег после текущей "крошки"

  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
  $link .= '<a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';
  $link .= '<meta itemprop="position" content="%3$s" />';
  $link .= '</span>';
  $parent_id = ( $post ) ? $post->post_parent : '';
  $home_link = sprintf( $link, $home_url, $text['home'], 1 );

  if ( is_home() || is_front_page() ) {

    if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

  } else {

    $position = 0;

    echo $wrap_before;

    if ( $show_home_link ) {
      $position += 1;
      echo $home_link;
    }

    if ( is_category() ) {
      $parents = get_ancestors( get_query_var('cat'), 'category' );
      foreach ( array_reverse( $parents ) as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $cat = get_query_var('cat');
        echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo $sep;
          echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
        } elseif ( $show_last_sep ) echo $sep;
      }

    } elseif ( is_search() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $show_home_link ) echo $sep;
        echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo $sep;
          echo $before . sprintf( $text['search'], get_search_query() ) . $after;
        } elseif ( $show_last_sep ) echo $sep;
      }

    } elseif ( is_year() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_time('Y') . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_month() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_day() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
      $position += 1;
      echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_single() && ! is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $position += 1;
        $post_type = get_post_type_object( get_post_type() );
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
      } else {
        $cat = get_the_category(); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'cpage' ) ) {
          $position += 1;
          echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
          echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
        } else {
          if ( $show_current ) echo $sep . $before . get_the_title() . $after;
          elseif ( $show_last_sep ) echo $sep;
        }
      }

    } elseif ( is_post_type_archive() ) {
      $post_type = get_post_type_object( get_post_type() );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . $post_type->label . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_attachment() ) {
      $parent = get_post( $parent_id );
      $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
      $parents = get_ancestors( $catID, 'category' );
      $parents = array_reverse( $parents );
      $parents[] = $catID;
      foreach ( $parents as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      $position += 1;
      echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_page() && ! $parent_id ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_title() . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_page() && $parent_id ) {
      $parents = get_post_ancestors( get_the_ID() );
      foreach ( array_reverse( $parents ) as $pageID ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
      }
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_tag() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $tagID = get_query_var( 'tag_id' );
        echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_author() ) {
      $author = get_userdata( get_query_var( 'author' ) );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_404() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . $text['404'] . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( has_post_format() && ! is_singular() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()




/**
 * Register meta boxes.
 */

function hcf_register_meta_boxes($screen) {
	$screen = ['post', 'page', 'clinics'];
    add_meta_box( 'hcf-1', __( 'Сайдбар для данной записи', 'hcf' ), 'wporg_custom_box_html', $screen, 'side' );
}
add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );



function wporg_custom_box_html($post)
{
    $value = get_post_meta($post->ID, '_wporg_meta_key', true);
    $field_value = isset( $list_item[$field['id']] ) ? $list_item[$field['id']] : '';




 /* format setting outer wrapper */
    // echo '<div class="format-setting type-sidebar-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';

      /* description */
      // echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';

      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';

        /* build page select */
        echo '<label for="clinics_sidebar">Выберите Сайдбар</label><select name="clinics_sidebar" id="clinics_sidebar" class="components-select-control__input">';



// Filters for only clinics_sidebar
        echo '<option value="">-- ' . __( 'Выберите сайдбар', 'ember' ) . ' --</option>';
        echo '<option value="clinics-1" id="clinics-1"' . selected($value, 'clinics-1') . '>' . __( 'Клиники #1', 'ember' ) . '</option>';
        echo '<option value="clinics-2" id="clinics-2"' . selected($value, 'clinics-2') . '>' . __( 'Клиники #2', 'ember' ) . '</option>';
        echo '<option value="clinics-3" id="clinics-3"' . selected($value, 'clinics-3') . '>' . __( 'Клиники #3', 'ember' ) . '</option>';
        echo '<option value="clinics-4" id="clinics-4"' . selected($value, 'clinics-4') . '>' . __( 'Клиники #4', 'ember' ) . '</option>';
        echo '<option value="clinics-5" id="clinics-5"' . selected($value, 'clinics-5') . '>' . __( 'Клиники #5', 'ember' ) . '</option>';
        echo '<option value="clinics-6" id="clinics-6"' . selected($value, 'clinics-6') . '>' . __( 'Клиники #6', 'ember' ) . '</option>';
        echo '<option value="clinics-7" id="clinics-7"' . selected($value, 'clinics-7') . '>' . __( 'Клиники #7', 'ember' ) . '</option>';
        echo '<option value="clinics-8" id="clinics-8"' . selected($value, 'clinics-8') . '>' . __( 'Клиники #8', 'ember' ) . '</option>';
        echo '<option value="clinics-9" id="clinics-9"' . selected($value, 'clinics-9') . '>' . __( 'Клиники #9', 'ember' ) . '</option>';
        echo '<option value="clinics-10" id="clinics-10"' . selected($value, 'clinics-10') . '>' . __( 'Клиники #10', 'ember' ) . '</option>';
        echo '<option value="clinics-11" id="clinics-11"' . selected($value, 'clinics-11') . '>' . __( 'Клиники #11', 'ember' ) . '</option>';
        echo '<option value="clinics-12" id="clinics-12"' . selected($value, 'clinics-12') . '>' . __( 'Клиники #12', 'ember' ) . '</option>';
        echo '<option value="clinics-13" id="clinics-13"' . selected($value, 'clinics-13') . '>' . __( 'Клиники #13', 'ember' ) . '</option>';
        echo '<option value="clinics-14" id="clinics-14"' . selected($value, 'clinics-14') . '>' . __( 'Клиники #14', 'ember' ) . '</option>';
        echo '<option value="clinics-15" id="clinics-15"' . selected($value, 'clinics-15') . '>' . __( 'Клиники #15', 'ember' ) . '</option>';
        echo '<option value="clinics-16" id="clinics-16"' . selected($value, 'clinics-16') . '>' . __( 'Клиники #16', 'ember' ) . '</option>';
        echo '<option value="no-sidebar" id="no-sidebar"' . selected($value, 'no-sidebar') . '>' . __( 'Без сайдбара', 'ember' ) . '</option>';

        // /* get the registered sidebars */
        // global $wp_registered_sidebars;

        // $sidebars = array();
        // foreach( $wp_registered_sidebars as $id=>$sidebar ) {
        //   $sidebars[ $id ] = $sidebar[ 'name' ];
        // }

        // /* filters to restrict which sidebars are allowed to be selected, for example we can restrict footer sidebars to be selectable on a blog page */
        // $sidebars = apply_filters( 'recognized_sidebars', $sidebars );
        // $sidebars = apply_filters( 'recognized_sidebars_' . $field_id, $sidebars );

        // /* has sidebars */
        // if ( count( $sidebars ) ) {
        //   echo '<option value="">-- ' . __( 'Выберите сайдбар', 'ember' ) . ' --</option>';
        //   foreach ( $sidebars as $id => $sidebar ) {
        //     echo '<option value="' . esc_attr( $id ) . '"' . selected( $value, $id, false ) . '>' . esc_attr( $sidebar ) . '</option>';
        //   }
        // } else {
        //   echo '<option value="">' . __( 'No Sidebars', 'ember' ) . '</option>';
        // }

        echo '</select>';

      // echo '</div>';

    echo '</div>';





    ?>
    <?php
}


function wporg_save_postdata($post_id)
{
    if (array_key_exists('clinics_sidebar', $_POST)) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['clinics_sidebar']
        );
    }
}
add_action('save_post', 'wporg_save_postdata');






add_filter('acf/format_value/type=textarea', 'do_shortcode');



function load_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_media_files' );



function display_grid_columns($atts, $content = null) {
    $default = array(
        'col' => '',
    );
    $cols = shortcode_atts($default, $atts);
    $content = do_shortcode($content);

    return '<div class="content-grid columns-'.$cols['col'].'">'.$content.'</div>';
}
add_shortcode('block', 'display_grid_columns');





function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');








function wph_change_submit_label($defaults) {
    $defaults['title_reply'] = 'Оставить свой отзыв';
    return $defaults;
}
add_filter('comment_form_defaults', 'wph_change_submit_label');






if ( ! function_exists( 'my_comment' ) ) :
function my_comments( $comment, $args, $depth ) {
        global $commentnumber;
        $GLOBALS['comment'] = $comment;

// Define comment ID
// Replace NULL with ID of comment to be queried
$comment_id = NULL;

// Define prefixed comment ID
$comment_acf_prefix = 'comment_';
$comment_id_prefixed = $comment_acf_prefix . $comment_id;

        switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' : ?>
                <li class="post pingback">
        <p><?php _e( 'Pingback:', 'my_press' ); ?> <?php comment_author_link(); ?></p>
<?php edit_comment_link( __( 'Edit', 'my_press' ), '<span class="edit-link">', '</span>' ); ?>
                </li>
                <?php break;
                default :
                $commentnumber++; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment">
                        <div class="comment-meta">
                                <div class="comment-author vcard">
                                        <?php
                        $avatar_size = 68;
                        if ( '0' != $comment->comment_parent )
                        $avatar_size = 39;
                        echo get_avatar( $comment, $avatar_size );
                        /* translators: 1: comment author, 2: date and time */
                        printf( __( '%1$s %2$s', 'my_press' ),
                        sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
                        sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
                        esc_url( get_comment_link( $comment->comment_ID ) ),
                        get_comment_time( 'c' ),
                        /* translators: 1: date, 2: time */
                        sprintf( __( '%1$s %2$s', 'my_press' ), get_comment_date(), get_comment_time() )
                        )
                        ); ?>
                </div><!-- .comment-author .vcard -->

                <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'my_press' ); ?></em>
                        <?php endif; 

                        ?>
                </div>








                <div class="comment-content">
                <span class="commentnumber"><?php the_field( 'kakoe_lechenie_prohodil', $comment_id_prefixed ); ?><?php echo $commentnumber; ?></span>
                <?php comment_text(); ?>
                </div>
                <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'my_press' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
                <?php edit_comment_link( __( 'Edit', 'my_press' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- #comment-## -->
                <?php
                break;
        endswitch;
}
endif;



// Для общей суммы
// https://wordpress.org/support/topic/finding-sum-of-acf-custom-field-value-for-comments/


function my_comment_template( $comment, $args, $depth ) {
	
	?>
	<li class="comment review">
		
<div class="top-block">
	<div class="avatar">
		<?php
			$avatar_size = 68;
			if ( '0' != $comment->comment_parent )
			$avatar_size = 39;
			echo get_avatar( $comment, $avatar_size );
			$author = get_comment_author( $comment_ID );
			$date = get_comment_date( $d, $comment_ID );
		?>
	</div>
	<div class="text-comment">
		<div class="details">
			<div class="name"><strong><?php echo $author; ?></strong> <span><?php the_field( 'strana_otkuda_vy', $comment ); ?></span></div>
			<div class="date-time"><?php echo $date; ?></div>
		</div>
		<?php if( get_field( 'kakoe_lechenie_prohodil', $comment ) ): ?>
			<div class="why-treatment"><strong>Какое лечение проходил(а):</strong> <?php the_field( 'kakoe_lechenie_prohodil', $comment ); ?></div>
		<?php endif; ?>
		<?php if( get_field( 'rejting', $comment ) ): ?>
		<div class="rating"><strong>Оценка:</strong> <?php the_field( 'rejting', $comment ); ?></div>
		<?php endif; ?>

<!-- 				< ?php
					printf( __( '%1$s %2$s', 'my_press' ),
					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
					sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					sprintf( __( '%1$s %2$s', 'my_press' ), get_comment_date(), get_comment_time() )
					));
				? > -->
<!-- 				< ?php
					printf( __( '%1$s %2$s', 'my_press' ),
					sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
					sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					sprintf( __( '%1$s %2$s', 'my_press' ), get_comment_date(), get_comment_time() )
					));
				? > -->
			
		
			<div class="text"><?php comment_text(); ?></div>
		
<?php if ( have_rows( 'foto', $comment ) ) : ?>
	<div class="photos"><strong>Прикрепил(а) фото:</strong> 
	<?php while ( have_rows( 'foto', $comment ) ) : the_row(); ?>
		<?php $foto = get_sub_field( 'foto' ); ?>
		<?php if ( $foto ) { ?>
			<a href="<?php echo $foto['url']; ?>" data-fancybox="images-<?php echo get_comment_ID() ?>"><img src="<?php echo $foto['url']; ?>" alt="<?php echo $foto['alt']; ?>" /></a>
		<?php } ?>
	<?php endwhile; ?>
	</div>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>



	</div>
</div>

		

	
	</li>
	
	<?php
}


// Update 2020
add_image_size( 'spec_thumb_slider', 444, 210, true );

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

// Add theme url shortcode
add_shortcode('theme_url', 'wpse_66026_theme_uri_shortcode' );
function wpse_66026_theme_uri_shortcode( $attrs = array (), $content = '' )
{
    $theme_uri = is_child_theme()
        ? get_stylesheet_directory_uri()
        : get_template_directory_uri();
    return trailingslashit( $theme_uri );
}


add_shortcode( 'recent_posts', 'recent_posts_shortcode' );
function recent_posts_shortcode( $atts ) {
    ob_start();
    $args = shortcode_atts( array (
        'type' => 'post',
        'posts' => 6,
		'public'   => true,
		'order'   => 'DESC',
		'orderby' => 'post_date',
    ), $atts );
    $options = array(
        'post_type' => $args['type'],
        'posts_per_page' => $args['posts']
    );

    $query = new WP_Query( $options );
    if ( $query->have_posts() ) { 
		echo '<div class="recent-posts">';
		?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php
                    get_template_part( 'template-parts/recent-posts', get_post_format() );
                 ?>
			<?php endwhile;
		echo '</div>';
            wp_reset_postdata(); ?>
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

// [recent_posts posts="10"]
// <?php echo do_shortcode('[recent_posts posts="'.get_field( 'show_items' ).'"]'); ?>