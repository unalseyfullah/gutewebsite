<?php 
/**
 * archive.php
 *
 * The template for displaying archive pages.
 */

get_header(); ?>

<!-- Teaser start -->
<div id="teaser-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2 class="title"><?php printf( __( 'Search Results for "%s"', 'wellnesscenter' ), get_search_query() ); ?></h21>
            </div>
            <div class="col-md-6 text-right">
                <?php echo wellnesscenter_get_breadcrumbs( '-' ) ?>
            </div>

        </div>
    </div>
</div>
<!-- Teaser end -->

<!-- Blog Posts start -->
<div id="archive-page" >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-post blog-card single-post">
                    
                    <?php if ( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class('archive-content'); ?>>
                                <?php get_template_part( 'content', get_post_format() ); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wellnesscenter_paging_nav(); ?>
                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Blog Posts end -->

<?php get_footer(); ?>