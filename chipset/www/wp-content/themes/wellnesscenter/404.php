<?php
/**
 * page.php
 *
 * The template for displaying all pages.
 */

get_header(); ?>

<!-- Teaser start -->
<section id="teaser-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2 class="title"><?php echo __('404 Not Found', 'wellnesscenter'); ?></h2>
            </div>
            <div class="col-md-6 text-right">
                <?php echo wellnesscenter_get_breadcrumbs( '-' ) ?>
            </div>

        </div>
    </div>
</section>
<!-- Teaser end -->

<!-- Blog Posts start -->
<section id="404-not-found" >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-box">
                    <div class="blog-post text-center page404 single-post">
                        <?php get_search_form( ); ?>
                        <?php get_template_part( 'content', 'none' ); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Posts end -->

<?php get_footer(); ?>