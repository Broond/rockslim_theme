<?php


/*
Function: blackout_v1_setup
Description: Does some inital wordpress theme setup.
*/
if ( ! function_exists( 'blackout_theme_setup' )) :

    function blackout_theme_setup() {
        require_once("navwalker.php");
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'post-formats', array ('aside', 'gallery', 'quote', 'image', 'video') );
        
        register_nav_menus( array( 
            'primary' => __('Desktop Horizontal Menu', 'blackout_v1'),
            'footer' => __('Footer_Menu', 'blackout_v1')
        ));
    }
endif;

add_action('after_setup_theme', 'blackout_theme_setup');


function blackout_login_logo() { ?>
<style type="text/css">
#login h1 a,
.login h1 a {
    background-image: url(https://blackout-gaming.s3.amazonaws.com/Images/assets/280w_80h_sm.png);
    background-size: 280px 100px;
    height: 100px;
    width: 280px;
    background-repeat: no-repeat;
    padding-bottom: 10px;
}

#login h1 a,
.login h1 a:visited {
    color: none;
    border: none;
}

#loginform {
    background-color: #0a0a0a;

}

#loginform>.input {
    background: #0f0f0f;
}

#loginform>.submit>.button {
    background-color: #0f0f0f;
    border: none;
    text-shadow: none;
    box-shadow: none;
}

#loginform>.submit>.button:hover {
    background-color: #141414;
}

.login {
    background-color: #121212;
}
</style>

<?php }

add_action("login_enqueue_scripts", "blackout_login_logo");


function blackout_login_logo_url() {
    return home_url();
}

add_filter("login_headerurl", "blackout_login_logo_url");

function blackout_login_logo_url_title() {
    return "Blackout Gaming";
}

add_filter("login_headertitle", "blackout_login_logo_url_title");

function load_stylesheets() {
    wp_enqueue_style('toast-css', "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css", array(), false, "all");
    wp_register_style('style', get_template_directory_uri() . "/style.min.css", array(), false, "all");
    wp_enqueue_style("style");
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_scripts() {
    wp_enqueue_script("toast", "https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js", array("jquery"), false, false);
    if (!is_front_page()) {
        wp_enqueue_script("rellax", get_template_directory_uri() . "/js/libs/rellax.min.js", array(), false, true);
        wp_enqueue_script("parallax", get_template_directory_uri() . "/js/parallax.js", array("rellax"), false, true);
    }
}

add_action("wp_enqueue_scripts", "load_scripts");


function include_jquery() {
    wp_deregister_script("jquery");
    wp_register_script("jquery", get_template_directory_uri() . "/js/libs/jquery-3.4.1.min.js", array(), false, false);
    wp_enqueue_script("jquery");
}

add_action("wp_enqueue_scripts", "include_jquery");

function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Login Button',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="Login">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="Login">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );

function blackout_history_custom_post() {
    $labels = array(
        "menu_name" => __("Histories"),
        "name" => __("History", "post type general name"),
        "singular_name" => __("History", "post type singular name"),
        "add_new" => __("Add new", "history"),
        "edit_item" => __("Edit History"),
        "view_item" => __("View History"),
    );
    $args = array(
        "labels" => $labels,
        "description" => "History blocks for our history page",
        "public" => true,
        "menu_position" => 5,
        "has_archive" => false,
        "supports" => array("title", "editor", "thumbnail", "excerpt")
    );
    register_post_type("history", $args);
}

add_action("init", "blackout_history_custom_post");

/* DISABLE THE WP USER BAR */
add_filter("show_admin_bar", "__return_false");
?>