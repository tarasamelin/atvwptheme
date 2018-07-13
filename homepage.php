<?php
/**
 * The template for displaying the homepage(frontpage).
 *
 * Template name: homepage
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--        <article id="post-<?php the_ID(); ?>" <?php post_class('mb-4 px-lg-2 mx-lg-2 px-xl-5 mx-xl-5'); ?>>-->
            
            <?php the_content(); ?>
        
        </article><!-- #post-## -->
        
        <?php
            endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; 
        ?>

            
        <!-- SHOW PROJECTS -->
        <?php           
        $query_project = new WP_Query( array(
            'post_type' => 'project',
            'posts_per_page' => 8,
        ) );
        
        echo '<div class="row py-3 bg-light" id="recent-projects">';
        if ( $query_project->have_posts() ) {
            while ( $query_project->have_posts() ) {
                $query_project->the_post();
                echo '<div class="col-sm-6 col-xl-3 mb-3">';
                    get_template_part( 'template-parts/content', 'home-project' );                
                echo '</div>';
            }
        }
        echo '</div>';
        wp_reset_postdata();    
        ?>         
            
            
            
            

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();