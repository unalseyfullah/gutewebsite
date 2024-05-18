<?php 
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>
    <?php
	    if (has_post_thumbnail() && !post_password_required() && !is_search()) :
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		?>
	        <div class="post-attachment">
	            <a href="<?php
	                if(is_single() || is_page()){
	                    echo esc_url($src[0]);
	                }else{
	                    the_permalink();
	                }
	             ?>" title="<?php the_title_attribute(); ?>">
	                <?php
	                	if(function_exists('wellnesscenter_resize')){
		                	echo '<img src="'.esc_url(wellnesscenter_resize( $src[0], 750, 300, true, true, true )).'" alt="'.get_the_title().'" class="img-responsive" />';
		                }else{
		                	the_post_thumbnail();
		                }
	                ?>
	            </a>
	        </div>
	    <?php endif; ?>
	<!-- Article content -->
	<div class="entry-content">
		<?php if(!is_single()) : ?>
			<div class="entry-header">
			        <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			        <?php wellnesscenter_post_meta(); ?>
			</div> <!-- end entry-header -->
		<?php endif; ?>

        <?php

        $display_settings = wellnesscenter_get_option( 'blog_display_settings', array('post_excerpt' => 'no') );
        $show_excerpt = $display_settings['post_excerpt'];

        if (is_search() || ($show_excerpt == 'yes' && !is_single() && !is_page())) {
            the_excerpt();
        } else {
            the_content(__('Continue reading &rarr;', 'wellnesscenter'));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'wellnesscenter'),
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'next_or_number' => 'number',
                'separator' => ' ',
                'nextpagelink' => __('Next page', 'wellnesscenter'),
                'previouspagelink' => __('Previous page', 'wellnesscenter'),
                'pagelink' => '%',
                'echo' => 1
            ));
        }
        ?>
	</div> <!-- end entry-content -->
