<?php
/*
* Template part for displaying content
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('px-lg-2 mx-lg-2 px-xl-5 mx-xl-5'); ?>>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
			the_content();
echo do_shortcode('[socialshare]');
		?>
</article><!-- #post-## -->
