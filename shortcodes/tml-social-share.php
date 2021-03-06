<?php
/*
 * Social Share ShortCode
 */
//echo do_shortcode('[socialshare]');
add_shortcode('socialshare', 'tml_social_share');

function tml_social_share() { 
	$decoded_title = html_entity_decode(get_the_title($post->ID),ENT_QUOTES,'UTF-8');
	$clean_title = preg_replace('#<[a-zA-Z]+>(.*?)</[a-zA-Z]+>#', '$1', $decoded_title);
	$encoded_title = urlencode($clean_title);
	$share_email_title = str_replace("+"," ",$encoded_title);
	$link = get_permalink();
	$twitter_URL = wp_get_shortlink();
    $textscialshare = __( 'share in social networks', 'atvwptheme' );
	$return_string = '<div class="container-fluid social-share-buttons"><hr class="row">
    <div class="row h5 justify-content-start text-secondary">'.$textscialshare.'</div>
    <div class="row h5 justify-content-start">
		<a class="mr-2 social-link" href="https://www.facebook.com/sharer/sharer.php?u='.$link.'" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
		<a class="mr-2 social-link" href="https://twitter.com/intent/tweet?text='.$encoded_title.'&url='.$twitter_URL.'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		<a class="mr-2 social-link " href="http://www.linkedin.com/shareArticle?url='.$link.'&title='.$encoded_title.'" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
		<a class="mr-2 social-link" href="https://plus.google.com/share?url='.$link.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		<a class="mr-2 social-link" href="mailto:?subject='.$share_email_title.'&body='.$link.'"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
	</div></div>';
	return $return_string;
}