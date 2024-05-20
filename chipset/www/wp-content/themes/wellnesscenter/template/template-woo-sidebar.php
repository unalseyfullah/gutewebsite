<?php
/**
 * Template Name: Woocommerce With Sidebar
 *
 * The template for displaying single posts.
 */

get_header(); ?>
<!-- Teaser start -->
<div id="teaser-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2 class="title"><?php the_title(); ?></h2>
                <div class="post-head-meta"><?php wellnesscenter_post_meta(); ?></div>
            </div>
            <div class="col-md-6 text-right">
                <?php echo wellnesscenter_get_breadcrumbs( '-' ) ?>
            </div>

        </div>
    </div>
</div>
<!-- Teaser end -->

<!-- Blog Posts start -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="container">
        <div class="row">
           <div class="col-md-8">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                       

                        <!-- Article content -->
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div> <!-- end entry-content -->
                    </article>

                   
                <?php endwhile; ?>
            </div> <!-- end main-content -->
            
            <div class="col-md-4">
                <?php get_sidebar('woo'); ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog Posts end -->

<?php get_footer(); ?>