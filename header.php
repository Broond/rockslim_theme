<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Blackout Gaming" />
	<meta property="og:image" content="https://blackout-gaming.s3.amazonaws.com/Images/banner.png" />
	<meta name="description" content="">
    <title><?php bloginfo('name'); ?></title>
    
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <nav id="bko-head" class="navbar is-black z-depth-2" role="navigation" aria-label="main navigation">
		<div class="container">
             <div class="navbar-brand">
                <a href="<?php bloginfo('url') ?>">
                    <img src="https://blackout-gaming.s3.amazonaws.com/Images/assets/white-transparent.webp" alt="">
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
                <!-- <div id="desktop-user" class="navbar-end">
                    <div class="navbar-item"> -->
                <?php
                if ( is_active_sidebar( 'custom-header-widget' ) ) : 
                ?>
                <div id="header-widget-area" class="navbar-end">
                    <?php dynamic_sidebar( 'custom-header-widget' ); ?>
                </div>
                <?php endif; ?>
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </nav>
    <?php
        if (function_exists("setup_blackout_mobile_menu")) {
            include_once(BLACKOUT_TEMPLATES_MOBILEMENU);
        }
    ?>
    <?php