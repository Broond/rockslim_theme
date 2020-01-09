<?php get_header(); ?>
<?php if ( have_posts()) : while( have_posts()) : the_post(); ?>
<div class="wrapper">
    <div class="parallax-container">
        <div class="parallax-text-wrapper">
            <h1 class="title is-1 has-text-white"><?php the_title(); ?></h1>
        </div>
        <div class="parallax"></div>
    </div>
    <main style="padding-top: 3rem;">
        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>