<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Wellnesscenter
 */
/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'wellnesscenter_paging_nav' ) ) {

	function wellnesscenter_paging_nav( $wp_query = null ) {

		if ( ! $wp_query ) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.

		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link,
			'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%',
			'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'type'		=> 'list',
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '&larr; Previous', 'wellnesscenter' ),
			'next_text' => __( 'Next &rarr;', 'wellnesscenter' ),
		) );

		if ( $links ) :

			?>
			<nav class="navigation paging-navigation" >
				<h1 class="sr-only"><?php _e( 'Posts navigation', 'wellnesscenter' ); ?></h1>

				<div class="pagination loop-pagination">
					<?php echo wellnesscenter_return($links); ?>
				</div>
				<!-- .pagination -->
			</nav><!-- .navigation -->
		<?php
		endif;
	}

}


// breadcrumbs

function wellnesscenter_get_breadcrumbs($seperator){
                echo '<div id="crumbs" class="breadcrumbs">';
        if (!is_home()) {
                echo '<span><a href="';
                echo esc_url(get_home_url('/'));
                echo '">';
                echo 'Home';
                echo "</a></span> - ";
                if (is_category() || is_single()) {
                        echo '<span>';
                        $category = get_the_category(); 
                        echo esc_html($category[0]->cat_name).'</span>';
                        if (is_single()) {
                                echo " - <span>";
                                echo wp_trim_words(get_the_title(), 3);
                                echo '</span>';
                        }
                } elseif (is_page()) {
                        echo '<span>';
                        echo wp_trim_words(get_the_title(), 3);
                        echo '</span>';
                }
        }
        if (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<span>".__('Blogs for', 'wellnesscenter')." "; the_time('F jS, Y'); echo'</span>';}
        elseif (is_month()) {echo"<span>".__('Blogs for', 'wellnesscenter')." "; the_time('F, Y'); echo'</span>';}
        elseif (is_year()) {echo"<span>".__('Blogs for', 'wellnesscenter')." "; the_time('Y'); echo'</span>';}
        elseif (is_author()) {echo"<span>".__('Author Blogs', 'wellnesscenter'); echo'</span>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<span>".__('Blogs', 'wellnesscenter'); echo'</span>';}
        elseif (is_search()) {echo"<span>".__('Search Result', 'wellnesscenter'); echo'</span>';}
        elseif (is_404()) {echo"<span>".__('404 Not Found', 'wellnesscenter'); echo'</span>';}
        echo '</div>';
}


// Display meta information for a specific post.

function wellnesscenter_post_meta() {
	global $post;
	echo '<ul class="list-inline entry-meta post-date">';

	if ( get_post_type() === 'post' ) {
		// If the post is sticky, mark it.
		if ( is_sticky() ) {
			echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Featured', 'wellnesscenter' ) . ' </li>';
		}
		$blogDefaults = array(
			'post_author' => 'yes',
			'post_date' => 'yes',
			'post_categories' => 'yes'
		);

		$display_settings = wellnesscenter_get_option( 'blog_display_settings', $blogDefaults );

		// Get the post author.
		if ( $display_settings['post_author'] != 'no' ) :
		    $author_id=$post->post_author;
			printf(
					'<li class="meta-author"><i class="fa fa-user"></i> <a href="%1$s" rel="author">%2$s</a></li>', esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ), get_the_author_meta( 'nickname', $author_id )
			);
		endif;

		if ( $display_settings['post_date'] != 'no' ) :
			// Get the date.
			echo '<li class="meta-date"><i class="fa fa-calendar"></i>  ' . get_the_date() . ' </li>';
		endif;

		// The categories.

		$category_list = explode(',', get_the_category_list( ', ' ));
		$html = ''; $i = 0;

		if ( is_array($category_list) && $display_settings['post_categories'] != 'no' ) {
			foreach ($category_list as $value) {
				$i++;
				if ($i<=3) {
					$html .= $value. ', ';
				}
			}

			if ($i>3) {
				$html .= '...';
			}

			$html = trim($html, ', ');
			echo '<li class="meta-categories"><i class="fa fa-folder-o"></i>   ' . $html . ' </li>';
		}
        // Edit link.
		
		if ( is_user_logged_in() ) {
			echo '<li>';
			edit_post_link( __( 'Edit', 'wellnesscenter' ), '<span class="meta-edit">', '</span>' );
			echo '</li>';
		}
	}

	echo '</ul>';
}


// Displays tag.

function wellnesscenter_post_tag() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		echo '<div class="tagcloud"> '.__('Tags', 'wellnesscenter') .': ' . $tag_list . ' </div>';
	}
}


