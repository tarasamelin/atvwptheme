<?php
/**
 * Template part for displaying posts in category in 1 coll
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-2 all-shadows'); ?>>

	<header class="entry-header bg-white">
        <?php //the_title( '<h2 class="p-1 mb-0 text-center h4 entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <?php //Show WebSite Link ?>
        <?php if ( get_post_meta($post->ID, 'websitelink', true) ) : ?>
        <h3 class="p-1 mb-0 text-center h4 entry-title">
            <a class="px-2 my-1 ml-1 bg-white d-inline-block" href="<?php echo get_post_meta( $post->ID, 'websitelink', true ); ?>" alt="<?php the_title(); ?>" target="_blank" >
                <i class="fa fa-link" aria-hidden="true"></i> 
                <?php echo tml_remove_protocol( get_post_meta( $post->ID, 'websitelink', true ) ); ?>
            </a>
        </h3>   
        <?php endif; ?>
	</header> <!-- .entry-header -->
    
    <a href="<?php the_permalink(); ?>">
        <?php 
        the_post_thumbnail('home_project_thumb', array(
            'class' => 'img-fluid border border-right-0 border-left-0 ',
            'alt' => 'Responsive image',
        )); 

        ?>
    </a>

        
	<div class="d-inline d-sm-flex justify-content-sm-center bg-white entry-content">
        <?php //Show Link Read More ?>
        <a class="px-2 my-1 ml-1 border bg-white d-inline-block" href="<?php the_permalink(); ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo __( 'Details', 'atvwptheme' ); ?></a>

        <?php //Show Project Category
        $project_terms = get_the_terms( $post->ID, 'project_cat' );
        if( $project_terms ){
            $project_term = array_shift( $project_terms );
            echo '<a class="px-2 my-1 ml-1 border bg-white d-inline-block" href="'. get_term_link( (int)$project_term->term_id, $project_term->taxonomy ) .'"><i class="fa fa-cog" aria-hidden="true"></i> '. $project_term->name .'</a>';
        }
        ?>
	</div><!-- .entry-content -->
    
</article><!-- #post-<?php the_ID(); ?> -->