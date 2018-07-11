<?
define("THEME_DIR", get_template_directory_uri());
define("IMAGES_DIR", get_template_directory_uri().'/img');
define("BLOG_URL", get_site_url());




/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');
// ENQUEUE STYLES



function theme_load_styles() {
	if (!is_admin()) {
		wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css');
	  wp_enqueue_style('screen', get_template_directory_uri() . '/css/layout/stylesheets/screen.css');
	}
}
add_action('get_header', 'theme_load_styles');






// LOAD JQUERY
function add_google_jquery() {
   if ( !is_admin() ) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false);
      wp_enqueue_script('jquery');
   }
}
add_action('wp_print_scripts ', 'add_google_jquery');


// ENQUEUE SCRIPTS
function enqueue_scripts() {
	wp_register_script( 'custom-script', THEME_DIR . '/js/theme.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'custom-script' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


function pw_load_scripts() {
	wp_localize_script('custom-script', 'custom_vars', array(
			'templateUrl' => get_template_directory_uri(),
			'blogUrl' => get_site_url(),
			'admin_url' => admin_url(),
		)
	);
}
add_action('wp_enqueue_scripts', 'pw_load_scripts');





//THEME SUPPORT
add_theme_support( 'post-thumbnails' );

function register_my_menus() {
register_nav_menus(
array(
'main-home' => __( 'Main Menu Home' ),
)
);
}
add_action( 'init', 'register_my_menus' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}




// IMAGE
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
	  add_image_size( 'square-thumb', 500, 500, true );

}
