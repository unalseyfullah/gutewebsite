<?php
/**
 * single.php
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
                <div class="blog-box">
                    <div class="blog-post single-post">
                        
                        <?php while (have_posts()) : the_post(); ?>

                        <div class="post-content-text">
                            <!-- Article content -->
                            <?php get_template_part( 'content', get_post_format() ); ?>
                            <!-- end entry-content -->

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

                            <?php wellnesscenter_post_tag(); ?>
                        </div>
                        <?php
                        $display_settings = wellnesscenter_get_option( 'blog_display_settings', array('author_desc'=>'no') );
                        if ( $display_settings['author_desc'] != 'no' ) :
                            $author_id=$post->post_author;

                        ?>
                        <hr />
                        <div class="author-post">
                            <div class="author-img">
                                <?php echo get_avatar( get_the_author_meta( 'ID', $author_id ), 120 ); ?>
                            </div>
                            <div class="author-content">
                                <?php
                                    printf(
                                            '<a href="%1$s" rel="author"><h2>%2$s</h2></a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ), get_the_author_meta( 'nickname', $author_id )
                                    ); 
                                ?>
                                <p><?php the_author_meta( 'description' ); ?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <?php endif; ?>

                        <?php comments_template(); ?>
                        <?php endwhile; ?>
                    </div>
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