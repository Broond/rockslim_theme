<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php if (is_front_page() || is_home()) : ?>
    <title><?php bloginfo('name'); ?></title>
    <?php else: ?>
    <title><?php wp_title(); ?></title>
    <? endif; ?>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <nav id="bko-head" class="navbar is-black z-depth-2" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a href="<?php bloginfo('url') ?>">
                    <img src="https://blackout-gaming.s3.amazonaws.com/Images/assets/280w_80h_sm.png" alt="">
                </a>
                <a role="button" class="navbar-burger toggle" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div class="navbar-menu">
                <?php
                  wp_nav_menu( array( 
                    'theme_location' => 'primary',
                    'depth' => 0,
                    'items_wrap' => '<div class="navbar-start">%3$s</div>',
                    'container' => false,
                    'menu_class' => 'navbar-start',
                    'menu_id' => '',
                    'after' => '</div>',
                    'walker' => new Navwalker()
                  ));
                ?>
                <div id="desktop-user" class="navbar-end">
                    <?php if (!is_user_logged_in()) :?>
                    <div class="navbar-item">
                        <div class="buttons">
                            <?php 
                            if (get_option("users_can_register") && function_exists("setup_blackout_mobile_menu")) :
                            ?>
                            <a class="button is-outlined is-dark auth" role="button" data-action="register">
                                <span class="button-content">
                                    <i class="fas fa-user-circle"></i>
                                    <span class="auth-label"> Sign Up</span>
                                </span>
                            </a>
                            <? endif; ?>
                            <a class="button is-outlined is-dark auth" role="button" data-action="login">
                                <span class="button-content">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span class="auth-label"> Sign In</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <?php 
                     else :
                       include_once(WP_CONTENT_DIR . "/plugins/blackout-mobile-menu/templates/user-panel.php");
                     endif; 
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <?php
        if (function_exists("setup_blackout_mobile_menu")) :
            $templates = WP_CONTENT_DIR . "/plugins/blackout-mobile-menu/templates";
            include_once($templates . "/mobile.php");
        endif;
    ?>