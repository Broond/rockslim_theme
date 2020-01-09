<?php wp_footer(); ?>
<?php
if (!is_front_page() || is_single() || is_category()) :
?>
<script>
(function() {
    new Rellax(".parallax", {
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
    </div>
    <div class="sub-footer">
        <span class="policy">
            <p>New World, Squad and Ark assets and artwork are all copyright of respected owners.</p>
        </span>
        <span class="social-icons">
            <span>
                <a class="social-icon" href="">
                    <img src="<?php echo get_template_directory_uri()."/images/icons/instagram.png" ?>" alt="">
                </a>
            </span>
            <span>
                <a class="social-icon" href="http://twitter.com/BlackoutGmingGG"> <img
                        src="<?php echo get_template_directory_uri()."/images/icons/twitter.png" ?>" alt="">
                </a>
            </span>
            <span>
                <a class="twitch" href="https://www.twitch.tv/blackoutgaminggg">
                    <img src="<?php echo get_template_directory_uri()."/images/icons/twitch.png" ?>" alt="">
                </a>
            </span>
        </span>
    </div>
</footer>
</body>

</html>