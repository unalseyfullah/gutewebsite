<?php 
/**
 * archive.php
 *
 * The template for displaying archive pages.
 */

get_header(); ?>

<!-- Teaser start -->
<section id="teaser-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title text-center"><?php bloginfo('name'); ?></h2>
            </div>
        </div>
    </div>
</section>
<!-- Teaser end -->

<!-- Blog Posts start -->
<section id="post-<?php the_ID(); ?>" <?php post_class('blog-posts'); ?> >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="blog-post blog-card single-post">
                    
                    <?php if ( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <div class="archive-content">
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
</section>
<!-- Blog Posts end -->

<?php get_footer(); ?>