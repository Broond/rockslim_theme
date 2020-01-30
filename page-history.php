<?php get_header(); ?>
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
    <main id="histories">
        <div class="container is-fluid">
            <div class="columns is-multiline">
                <?php 
                $query = new WP_Query(array( "post_type" => "history"));
                while($query->have_posts()) : $query->the_post();  $slide_image_url = get_the_post_thumbnail_url(get_the_ID(), "full");?>
                <div class="column is-half-desktop is-full-tablet is-full-mobile">
                    <div class="history">
                        <?php if (has_post_thumbnail()): ?>
                        <div class="history-image">
                            <figure class="image is-16by9">
                                <img src="<?php echo esc_url($slide_image_url) ?>" alt="">
                            </figure>
                        </div>
                        <?php endif; ?>
                        <div class="history-text">
                            <div class="history-text-head">
                                <p class="history-text-title"><?php the_title(); ?></p>
                                <span><?php the_excerpt(); ?></span>
                            </div>
                            <div class="history-text-body">
                                <div class="content">
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <?php wp_reset_postdata(); ?>
    <?php get_footer(); ?>
</div>