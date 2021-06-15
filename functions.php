<?php
require_once('theme-init/plugin-update-checker.php');
$themeInit = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/mostak-shahid/update/master/weknowgloves-child.json',
	__FILE__,
	'weknowgloves-child'
);

/**
 * Enqueue styles
 */
function child_enqueue_styles() {
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css' );
    wp_enqueue_script('fancybox', get_stylesheet_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js', 'jquery');    
    
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/plugins/slick/slick.css' );
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/plugins/slick/slick-theme.css' );
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/plugins/slick/slick.js', 'jquery');
    
    wp_enqueue_style( 'BeerSlider', get_stylesheet_directory_uri() . '/plugins/BeerSlider/BeerSlider.css' );
    wp_enqueue_script('BeerSlider', get_stylesheet_directory_uri() . '/plugins/BeerSlider/BeerSlider.js', 'jquery');
    
    wp_enqueue_script('jquery.waypoints.min', get_stylesheet_directory_uri() . '/plugins/jquery.counterup/jquery.waypoints.min.js', 'jquery');
    wp_enqueue_script('jquery.counterup', get_stylesheet_directory_uri() . '/plugins/jquery.counterup/jquery.counterup.js', 'jquery');
    
    wp_enqueue_style( 'font-awesome.min', get_stylesheet_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
    
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array('twenty-twenty-one-style'), wp_get_theme()->get('Version'), 'all' );
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/script.js', 'jquery');

}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );
require_once 'aq_resizer.php';
require_once 'carbon-fields.php';
function mos_widgets_init(){
	register_sidebar(array(
		'id' => 'sidebar-right',
		'name' => __('Right Sidebar', 'mos'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mos'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));		
}
add_action('widgets_init', 'mos_widgets_init');