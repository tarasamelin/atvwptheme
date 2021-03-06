<?php
/**
 * ShortCode [gallery] for Mansory Gallery with Photoswipe
**/ 

remove_shortcode( 'gallery' );
add_shortcode( 'gallery', 'tml_gallery' );
function tml_gallery($atts){
    
	$img_id = explode(',', $atts['ids']);
	$html = '<div class="tml-photoswipe-gallery masonry-grid">';
	
    foreach($img_id as $item){
		$img_data = get_posts( array(
			'p' => $item,
			'post_type' => 'attachment'
		) );
        
		$img_caption = $img_data[0]->post_excerpt;
		$img_title = $img_data[0]->post_title;
		$img_thumb = wp_get_attachment_image_src( $item, 'medium_large' );
		$img_full = wp_get_attachment_image_src( $item, 'full' );
        
        $html .= '<figure class="m-0 p-1 col-sm-6 col-lg-4 col-xl-3 masonry-grid-item" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
		$html .= '<a href="'.$img_full[0].'" itemprop="contentUrl" data-size="'.$img_full[1].'x'.$img_full[2].'" >';
        $html .= '<img class="border m-0 figure-img img-fluid" src="'.$img_thumb[0].'" itemprop="thumbnail" alt="'.$img_title.'">';
        $html .= '</a>';
        $html .= '</figure>';
	}
	$html .= '</div><div class="clearfix w-100"></div>';
	return $html;
}

/**
 * Photoswipe for gallery
 */
add_action('wp_footer', 'photoswipe_footer');
function photoswipe_footer() {
    if ( is_singular( array( 'post', 'project' ) ) ) {
        get_template_part( 'template-parts/photoswipe' );
    }
}


















