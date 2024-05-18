<?php
/**
 * page.php
 *
 * The template for displaying all pages.
 */

get_header(); ?>

<!-- Teaser start -->
<!--div id="teaser-blog">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2 class="title"><?php the_title(); ?></h2>
            </div>
            <div class="col-md-6 text-right">
                <?php echo wellnesscenter_get_breadcrumbs( '-' ) ?>
            </div>

        </div>
    </div>
</div-->
<!-- Teaser end -->

<!-- Blog Posts start -->
<div class="clearfix"></div>
<div class="col-md-12">
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
        <div class="container">
            <div class="row">
                <div class="blog-box">
                    <div class="blog-post single-post">
                        
                        <?php
                        while (have_posts()) : the_post();

                        if (has_post_thumbnail() && !post_password_required() && !is_search()) : ?>
                            <div class="post-attachment">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php

                                        if(function_exists('wellnesscenter_resize')){
                                            $src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                            echo '<img src="'.esc_url(wellnesscenter_resize( $src[0], 750, 353, true, true, true )).'" alt="'.get_the_title().'" class="img-responsive" />';
                                        }else{
                                            the_post_thumbnail();
                                        }
                                    ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content-text">
                            <!-- Article content -->
                            <div class="entry-content">
                                <?php the_content(); ?>

                                <?php wp_link_pages(array(
                                    'before' => '<p>' . __('Pages:', 'wellnesscenter'),
                                    'after' => '</p>',
                                    'next_or_number' => 'next_and_number', # activate parameter overloading
                                    'nextpagelink' => __('Next', 'wellnesscenter'),
                                    'previouspagelink' => __('Previous', 'wellnesscenter'),
                                    'pagelink' => '%',
                                    'echo' => 1 )
                                ); ?>
                            </div> <!-- end entry-content -->

                            <!-- Article footer -->
                            <footer class="entry-footer">
                                <?php
                                if (is_user_logged_in()) {
                                    echo '<p>';
                                    edit_post_link(__('Edit', 'wellnesscenter'), '<span class="meta-edit">', '</span>');
                                    echo '</p>';
                                }
                                ?>
                            </footer> <!-- end entry-footer -->
                        </div>

                        <?php comments_template(); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <!--div class="col-md-8">
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div-->
        </div>
    </div>
</div>
<!-- Blog Posts end -->

<?php get_footer(); ?>