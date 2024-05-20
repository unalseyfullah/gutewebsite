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
                <h2 class="title">
		            <?php 
						if ( is_day() ) {
							printf( __( 'Daily Blogs for %s', 'wellnesscenter' ), get_the_date() );
						} elseif ( is_month() ) {
							printf( __( 'Monthly Blogs for %s', 'wellnesscenter' ), get_the_date( _x( 'F Y', 'Monthly archives date format', 'wellnesscenter' ) ) );
						} elseif ( is_year() ) {
							printf( __( 'Yearly Blogs for %s', 'wellnesscenter' ), get_the_date( _x( 'Y', 'Yearly archives date format', 'wellnesscenter' ) ) );
						} else {
							printf( __( '%s', 'wellnesscenter' ), single_cat_title("", false));
						}
					?>
                </h2>
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