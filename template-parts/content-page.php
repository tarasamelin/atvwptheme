<?php
/**
* Template part for displaying content in page.php
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('px-lg-2 mx-lg-2 px-xl-5 mx-xl-5'); ?>>
		<?php the_title( '<h1 class="h3 text-secondary entry-title">', '</h1>' ); ?>
        <?php the_content(); ?>
</article><!-- #post-## -->