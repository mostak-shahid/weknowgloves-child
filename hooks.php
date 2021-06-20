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
        ?>
        <div class="mos-header-wrapper justify-content-between p-5 bg-white position-relative">
            <div class="logo-area text-left">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $site_icon_url = get_site_icon_url();
                ?>
                <a href="<?php home_url() ?>" class="mos-logo"><img src="<?php echo aq_resize($site_icon_url, 30,30,true) ?>" alt="<?php echo get_bloginfo('name') ?> - Logo"></a>
            </div>
            <div class="menu-area text-right">
                <span class="menu-activator">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="30" height="30" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                    <g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path d="m12 24c-6.617 0-12-5.383-12-12s5.383-12 12-12 12 5.383 12 12-5.383 12-12 12zm0-23c-6.065 0-11 4.935-11 11s4.935 11 11 11 11-4.935 11-11-4.935-11-11-11z" fill="#000000" data-original="#000000" style="" class=""></path>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path d="m16.5 8h-9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h9c.276 0 .5.224.5.5s-.224.5-.5.5z" fill="#000000" data-original="#000000" style="" class=""></path>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path d="m16.5 12.5h-9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h9c.276 0 .5.224.5.5s-.224.5-.5.5z" fill="#000000" data-original="#000000" style="" class=""></path>
                        </g>
                        <g xmlns="http://www.w3.org/2000/svg">
                            <path d="m16.5 17h-9c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h9c.276 0 .5.224.5.5s-.224.5-.5.5z" fill="#000000" data-original="#000000" style="" class=""></path>
                        </g>
                    </g>
                </svg>
                </span>
            </div>
            <div class="mos-menu-header-container z-index-9 bg-white">                    
                <?php 
                wp_nav_menu([
                    'menu'            => 'mobilemenu',
                    'theme_location'  => 'mobilemenu',
                    'menu_class'      => 'mos-mobile-menu',
                    'container' => false
                ]);
                ?>
            </div>
        </div>               
        <?php
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