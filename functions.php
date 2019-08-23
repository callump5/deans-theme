<?php

# Enqueue Style

    function theme_name_scripts() {
        wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    }

    add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


# Enqueue jQuery

function my_init() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', false, '1.3.2');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'my_init');


# Register Menu

    function register_my_menu() {
        register_nav_menu('header-menu',__( 'Header Menu' ));
        register_nav_menu('social-menu',__( 'Social Menu' ));
    }

    add_action( 'init', 'register_my_menu' );





# Turn Into Single Page

if(get_page_by_title("Home") == null)
{
    $post = array(
        "post_title" => "Home",
        "post_status" => "publish",
        "post_type" => "page",
        "menu_order" => "-100",
        "page_template" => "index.php"
    );

    wp_insert_post($post);

    $home_page = get_page_by_title("Home");
    update_option("page_on_front",$home_page->ID);
    update_option("show_on_front","page");
}



#Custom Logo

add_theme_support( 'custom-logo' );

function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );



?>