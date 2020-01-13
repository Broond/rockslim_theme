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
    wp_register_style('style', get_template_directory_uri() . "/style.min.css", array(), false, "all");
    wp_enqueue_style("style");
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_scripts() {
    if (!is_front_page() || is_single() || is_singular()) {
        wp_enqueue_script("rellax", get_template_directory_uri() . "/js/libs/rellax/rellax.min.js", array(), false, true);
    }
}

add_action("wp_enqueue_scripts", "load_scripts");


/*----- UNCOMMENT THIS IF YOU WANT JQUERY -----*/
// function include_jquery() {
//     wp_deregister_script("jquery");
//     wp_register_script("jquery", get_template_directory_uri() . "/js/libs/jquery-3.4.1.min.js", array(), false, false);
//     wp_enqueue_script("jquery");
// }

// add_action("wp_enqueue_scripts", "include_jquery");
?>