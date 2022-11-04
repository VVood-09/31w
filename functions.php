<?php
/**
 * underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscores
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function under_setup() {

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}

add_action( 'after_setup_theme', 'under_setup' );

/**
 * Enqueue scripts and styles.
 */
function under_scripts() {
	// wp_enqueue_style( 'under-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('under-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);
}
add_action( 'wp_enqueue_scripts', 'under_scripts' );


/**
 * Initialisation de la fonction de création de menu 
 */
function mon_31w_register_nav_menu(){
	register_nav_menus( array(
		'menu_primaire' => __( 'Menu primaire', 'text_domain' ),
	) );
}
add_action( 'after_setup_theme', 'mon_31w_register_nav_menu', 0 );

/* Pour filtrer les éléments du menu */
function igc31w_filtre_choix_menu($obj_menu, $arg){
    // var_dump($arg); die;
    foreach($obj_menu as $cle => $value)
    {
       if($arg->menu == "aside" || $arg->menu == "principal")
	   if($value->title[0] >= "0" && $value->title[0] <= "9"){
		   $value->title = substr($value->title,7);
		   $arrTitle = explode("(", $value->title);
		   $value->title = $arrTitle[0];
	   }
	   if ($arg->menu == "aside"){
       $value->title = wp_trim_words($value->title,3,"...");
	   }
    }
    return $obj_menu;
}
add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu", 10,2);

/**
 * Widget
 */
function themename_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'footer' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Premier widget footer' ),
			'description'   => __( 'Le 1 widg foo.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Second widget footer' ),
			'description'   => __( 'Le 2 widg foo.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'TROISIEME widget footer' ),
			'description'   => __( 'Le 3 widg foo.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-4',
			'name'          => __( 'Last but not the least widget footer' ),
			'description'   => __( 'Le 4 widg foo.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-1',
			'name'          => __( 'Aside widget 1' ),
			'description'   => __( 'Calendrier' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-2',
			'name'          => __( 'Aside widget 2' ),
			'description'   => __( 'Liens utile' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}