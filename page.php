<?php get_header(); ?>
<?php if ( have_posts()) : while( have_posts()) : the_post(); ?>
<div class="wrapper">
    <div class="parallax-container">
        <div class="parallax-text-wrapper">
            <h1 class="title is-1 has-text-white"><?php the_title(); ?></h1>
        </div>
        <div class="parallax">
            <?php
                $featured_img_url = get_the_post_thumbnail_url("full");
            ?>
            <img src="<?php echo $featured_img_url ?>" alt="">
        </div>
    </div>
    <main>
        <div class="container">
            <?php the_content(); ?>
        </div>
    </main>
    <?php get_footer(); ?>
</div>
<?php endwhile; endif; ?>