<?php
/*
 *
 * Custome TML functions
 *
 */

 /**
  * Check is Child Page
  */
 function tml_is_child_page() {
     global $post;
     if( is_page() && ( $post->post_parent ) ){ return true; }
     else { return false; }
 }
 add_action( 'init', 'tml_is_child_page' );

 /**
  * Excerpt Hooks Read More
  */
 function tml_excerpt_more($more) {
 	global $post;
 	return '<a href="'. get_permalink($post->ID) . '"> '. sprintf( __( 'Continue reading %s' ), '') .'</a>';
 }
 add_filter('excerpt_more', 'tml_excerpt_more');
 /**
  * Child Page Loop excerpt Length
  */
 function tml_child_page_excerpt_length($length) {
     global $post;
     if( tml_is_child_page() ){
 	return 50;
     }
     else {
 	return 20;
     }
 }
 add_filter('excerpt_length', 'tml_child_page_excerpt_length');

/**
 * pagination
 */
if (!function_exists('tml_pagination')):
	function tml_pagination() {
		global $wp_query;
		$big = 999999999;
		echo '<div class="page-links d-table mx-auto my-5 h5">';
		echo paginate_links( array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_next' => true,
        'prev_text'    => '&larr;',
		'next_text'    => '&rarr;',
		));
		echo '</div>';
	}
endif;

/**
 * Remove p tags from text widgets
 */
remove_filter('widget_text_content', 'wpautop');

/**
 * Displays the optional CUSTOME LOGO.
 * Does nothing if the custom logo is not available.
 */
if ( ! function_exists( 'tml_the_custom_logo' ) ) :
function tml_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

add_filter( 'get_custom_logo',  'tml_custom_logo_url' );
function tml_custom_logo_url ( $html ) {

$custom_logo_id = get_theme_mod( 'custom_logo' );
    $url = esc_url( home_url( '/' ) );
$html = sprintf( '<a href="%1$s" class="navbar-brand custom-logo-link" rel="home"
itemprop="url">%2$s</a>',
    esc_url( $url  ),
    wp_get_attachment_image( $custom_logo_id, 'full', false, array(
        'class'    => 'custom-logo img-fluid',
        'itemprop'    => 'image',
    ) )
);
return $html;
}

/**
 * Remove Archive: Category: etc from Breadcrumbs
 */
add_filter('get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

/**
 * Remove Protocol from urls
 */
function tml_remove_protocol($url){
    $remove = array( 'http://www.', 'https://www.','http://', 'https://' );
    return str_replace( $remove, '', $url );
}


/**
 * Remove "Archive" word from <title>
 */
//function _wp_render_title_tag() {
//	if ( ! current_theme_supports( 'title-tag' ) ) {
//		return;
//	}
//
//	echo '<title>' . wp_get_document_title() . '</title>' . "\n";
//}

function tml_yoast_fixed_wp_render_title_tag() {
	if ( ! current_theme_supports( 'title-tag' ) ) {
		return;
	}
	if ( is_archive() ) {
        $remove_archive_word = array( 'Archive', 'Архив', 'Архів' );
        $without_archive_word = str_replace( $remove_archive_word, '', wp_get_document_title() );
        
        $find_for_rename_word = array( 'Projects', 'Проекты', 'Проекти' );
        $title_with_renamed_word = str_replace( $find_for_rename_word, __( 'Portfolio', 'atvwptheme' ), $without_archive_word );
        
        echo '<title>' . $title_with_renamed_word . '</title>' . "\n";
    }
    else {
	   echo '<title>' . wp_get_document_title() . '</title>' . "\n";
    }
}

remove_action( 'wp_head', '_wp_render_title_tag', 1 );
add_action( 'wp_head', 'tml_yoast_fixed_wp_render_title_tag', 1 );




