<?php
/*
* Template part for displaying content single project
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('px-lg-2 mx-lg-2 px-xl-5 mx-xl-5 pb-3'); ?>>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );

		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        
        //Show Project Category
        $project_terms = get_the_terms( $post->ID, 'project_cat' );
        if( $project_terms ){
            $project_term = array_shift( $project_terms );
            echo '<a class="px-2 mb-1 mr-1 border bg-white d-inline-block" href="'. get_term_link( (int)$project_term->term_id, $project_term->taxonomy ) .'">'.__( 'Project Category', 'atvwptheme' ).': '. $project_term->name .'</a>';
        }
        
        //Show WebSite Link
        ?>
        <br><a class="px-2 mb-1 mr-1 border bg-white d-inline-block" href="<?php echo get_post_meta( $post->ID, 'websitelink', true ); ?>" alt="<?php the_title(); ?>" target="_blank" >
            <?php echo __( 'link:', 'atvwptheme' ); ?>
            <i class="fa fa-link" aria-hidden="true"></i> <?php echo tml_remove_protocol( get_post_meta( $post->ID, 'websitelink', true ) ); ?>
        </a>        
        <?php

        //Show Content
        the_content();
    
        //Show Social Links
        if( $sociallinks = get_post_meta( $post->ID, 'sociallink' ) ){
            echo '<hr><div class="h2 text-secondary d-block">'.__( 'project in social networks', 'atvwptheme' ).'</div>';
            foreach ($sociallinks as $sociallink) {
            ?>
                <a class="px-2 mb-1 mr-1 border bg-white d-inline-block" href="<?php echo $sociallink; ?>" alt="<?php the_title(); ?>" target="_blank" >
                    <i class="fa fa-link" aria-hidden="true"></i> <?php echo tml_remove_protocol( $sociallink ); ?>
                </a>
            <?php
            }
        }
        
        ?>
</article><!-- #post-## -->
