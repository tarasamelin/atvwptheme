<?php
/**
 * The Archive template
 */
 
get_header(); ?>
<?php //get_sidebar(); ?>
<?php get_template_part( 'template-parts/breadcrumbs'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	
            <?php
            if ( have_posts() ) : ?>
            <header class="page-header">
                <?php
                    //the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
<!--            <div class="row">-->
            <div class="masonry-grid">
            <?php
            while ( have_posts() ) : the_post();
                echo '<div class="masonry-grid-item col-sm-6 col-lg-4 col-xl-3 mb-3">';
                    get_template_part( 'template-parts/content', 'masonry-project' );                
                echo '</div>';
            endwhile;
            echo '</div>';
            tml_pagination();
            else :
            get_template_part( 'template-parts/content', 'none' );
            endif; ?>

            
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();