<?php
/**
 * template Name: Woocommerce
 *
 * The template for displaying all pages.
 */
?>

<?php get_header(); ?>
<!-- Teaser start -->
<div id="teaser-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2 class="title"><?php the_title(); ?></h2>
            </div>
            <div class="col-md-6 text-right">
                <?php // echo wellnesscenter_get_breadcrumbs('-') ?>
            </div>

        </div>
    </div>
</div>
<!-- Teaser end -->


<!-- Blog Posts start -->
<div id="post-<?php the_ID(); ?>" <?php post_class('blog-posts'); ?> >

    <div class="blog-box">
        <div class="container">
            <div class="row">
                <?php
                while (have_posts()) : the_post();
                    ?>
                    <!-- Article content -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div> <!-- end entry-content -->
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog Posts end -->

<?php get_footer(); ?>