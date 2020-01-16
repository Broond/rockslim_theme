<?php
if (!is_user_logged_in()) :
    /* Check to see if the plugin is active */
    if (function_exists("setup_blackout_mobile_menu")) {
        $templates = WP_CONTENT_DIR . "/plugins/blackout-mobile-menu/templates";
        include_once($templates . "/modal.php");
    }
    
endif;
?>
<?php wp_footer(); ?>
<?php
if (!is_front_page() || is_single() || is_category()) :
?>
<script>
(function() {
    new Rellax(".parallax > img", {
        center: true,
        wrapper: null,
        vertical: true,
        horizontal: false,
        speed: -9
    });
})();
</script>
<? endif; ?>
<footer class="footer is-black">
    <div class="footer-content">
        <div class="container is-fluid">
            <div class="columns justify-center">
                <div class="column is-4">
                    <div class="content">
                        <img src="https://blackout-gaming.s3.amazonaws.com/Images/assets/280w_80h_sm.png" alt="">
                        <p>Blackout Gaming is a collective of like minded players that primarily play and enjoy the PvP
                            (player vs. player) content of video games. Our objective is both to excel at whatever game
                            we
                            play and provide
                            content in
                            the form of entertainment and valuable information to the masses.</p>
                        <p>New World is trademark of Amazon and Amazon Game Studios.</p>
                    </div>
                </div>
                <div class="column is-4 is-offset-2">
                    <div class="links">
                        <p>SITE LINKS</p>
                        <?php wp_nav_menu(array( "theme_location" => "primary", "depth" => 1)); ?>
                    </div>
                </div>
                <div class="column is-narrow">
                    <div class="social">
                        <p>FOLLOW US</p>
                        <a href="http://twitter.com/BlackoutGmingGG" class="icon is-large">
                            <i class="fab fa-2x fa-twitter"></i>
                        </a>
                        <a href="https://www.twitch.tv/blackoutgaminggg" class="icon is-large">
                            <i class="fab fa-2x fa-twitch"></i>
                        </a>
                        <a href="https://www.instagram.com/blackoutgming/" class="icon is-large">
                            <i class="fab fa-2x fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCaW1Grafo2jwHlsB28VQZ6Q" class="icon is-large">
                            <i class="fab fa-2x fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container is-fluid">
            <div class="content">
                <a href="<?php bloginfo('url') ?>/privacy">Privacy Policy</a>
                <span>&#8226;</span>
                <a href="<?php bloginfo('url')?>/terms-of-use">Terms of Use</a>
            </div>
        </div>
    </div>
</footer>

</body>

</html>