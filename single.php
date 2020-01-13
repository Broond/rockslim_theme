<?php get_header(); ?>
<?php if ( have_posts()) : while( have_posts()) : the_post(); ?>
<?php 
$author_id = get_the_author_meta("ID");
$display_name = get_the_author_meta("display_name");
$avatar_url = get_avatar_url($author_id, array("size" => 96));
?>
<div class="wrapper">
    <div class="parallax-container">
        <div class="parallax-text-wrapper">
            <h1 class="title is-1 has-text-white"><?php the_title(); ?></h1>
        </div>
        <div class="parallax">
            <?php
                $featured_img_url = get_the_post_thumbnail_url("full");
                if (has_post_thumbnail()) :
            ?>
            <img src="<?php echo $featured_img_url ?>" alt="">
            <?php  else : ?>
            <img src="https://blackout-gaming.s3.amazonaws.com/Images/assets/banners/banner.png">
            <?php endif; ?>
        </div>
    </div>
    <main>
        <div class="container">
            <div class="columns">
                <div class="column is-four-fifths">
                    <div class="post-content">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="column is-one-fifth">
                    <div id="author-info">
                        <figure class="image is-96x96">
                            <img class="is-rounded" src="<?php echo $avatar_url; ?>" alt="">
                        </figure>
                        <div class="author-meta">
                            <span class="name"><?php echo $display_name; ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
</main>
<?php get_footer(); ?>
</div>
<?php endwhile; endif; ?>