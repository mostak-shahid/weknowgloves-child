<?php
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) AND $post->post_type == 'page' ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    } else {
        $classes[] = $post->post_type . '-archive';
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
if ( ! function_exists( 'custom_mos_mobile_menu' ) ) :
    function custom_mos_mobile_menu() {
        wp_nav_menu([
            'menu'            => 'mobilemenu',
            'theme_location'  => 'mobilemenu',
            'menu_class'      => 'mos-mobile-menu',
            'container_class' => 'mos-menu-header-container'
        ]);
    }
endif;
add_action( 'wp_body_open', 'custom_mos_mobile_menu' );


//Add theme setup
if ( ! function_exists( 'mosacademy_setup' ) ) :
	function mosacademy_setup() {
		/*add_theme_support('title-tag'); 	
		add_theme_support('post-thumbnails');
		add_theme_support( 'woocommerce' );
	    add_theme_support( 'wc-product-gallery-zoom' );
	    add_theme_support( 'wc-product-gallery-lightbox' );
	    add_theme_support( 'wc-product-gallery-slider' );
		//add_image_size( string $name, int $width, int $height, bool|array $crop = false );
		add_image_size( 'max-size', '1920', '1920', false );
		add_image_size( 'container-full', '1140', '1140', false );
		add_image_size( 'col-8-full', '750', '750', false );
		add_image_size( 'col-4-full', '360', '360', false );

		load_theme_textdomain( 'theme', get_template_directory() . '/languages' );*/
		register_nav_menus( array(
			//'mainmenu' => __('Main Menu', 'mosacademy'),
			'mobilemenu' => __('Mobile Menu', 'mosacademy'),
		));
		/*add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'chat',
		) );*/
	}
endif;
add_action( 'after_setup_theme', 'mosacademy_setup' );