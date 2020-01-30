<?php get_header(); ?>
<?php if ( have_posts()) : while( have_posts()) : the_post(); ?>
<div class="wrapper">
    <div class="parallax-container">
        <div class="parallax-text-wrapper">
            <h1 class="title is-1 has-text-white"><?php the_title(); ?></h1>
        </div>
        <div class="parallax">
            <?php
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), "full");
                if (has_post_thumbnail()) :
            ?>
            <img src="<?php echo esc_url($featured_img_url) ?>" alt="">
            <?php  else : ?>
            <img src="https://blackout-gaming.s3.amazonaws.com/Images/assets/banners/banner.png">
            <?php endif; ?>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="post-content">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</div>
<?php endwhile; endif; ?>