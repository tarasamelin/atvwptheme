<?php
/*
* Template part for breadcrumbs
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php if ( !is_front_page() ) : ?>
<nav class="wrap-breadcrumbs mb-3" aria-label="breadcrumb" role="navigation">
    <ol class="justify-content-center text-secondary breadcrumb bg-white pl-0 pt-2 pb-2 mb-0">
<?php endif; ?>

<?php if ( is_home() && !is_front_page() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <?php
            $posts_page = get_post( get_option( 'page_for_posts') );
            $title_blog_page = ' ' . $posts_page->post_title . ' ';
        ?>
        <li class="breadcrumb-item active"><?php echo $title_blog_page ?></li>

<?php elseif ( is_category() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
<!--        <li class="breadcrumb-item active"><?php the_archive_title(); ?></li>-->
        <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" rel="home">
            <?php
                $posts_page = get_post( get_option( 'page_for_posts') );
                echo $title_blog_page = ' ' . $posts_page->post_title . ' ';
            ?>
        </a></li>
        <li class="breadcrumb-item active"><?php single_cat_title(); ?></li>

<?php elseif (  is_singular( 'post' ) ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>" rel="home">
            <?php
                $posts_page = get_post( get_option( 'page_for_posts') );
                echo $title_blog_page = ' ' . $posts_page->post_title . ' ';
            ?>
        </a></li>
        <li class="breadcrumb-item"><?php the_category(' & '); ?></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>

<?php elseif ( ( is_page() && !is_front_page() && !tml_is_child_page() ) || is_404() || is_search() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>

<?php elseif ( tml_is_child_page() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <?php
        $parent = get_post($post->post_parent);
        $parent_title = get_the_title($parent);
        $parent_permalink = get_the_permalink($parent);
        ?>
        <li class="breadcrumb-item"><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></li>
        <li class="breadcrumb-item active"><?php the_title() ?></li>


<?php elseif ( is_post_type_archive( 'project' )) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="breadcrumb-item active"><h1 class="h5 d-inline"><?php echo __( 'Portfolio', 'atvwptheme' );?></h1></li>

<?php elseif ( is_archive() ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        
            <?php if( $terms = get_the_terms( $post->ID, 'project_cat' ) ): ?>
                <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link( 'project' ); ?>" rel="home"><?php echo __( 'Portfolio', 'atvwptheme' );?></a></li> 
            <?php endif; ?>
        
        <li class="breadcrumb-item active"><?php echo get_the_archive_title( '', '' ); ?></li>

<?php elseif (  is_singular('project') ) : ?>
        <li class="breadcrumb-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php //echo get_the_title( get_option('page_on_front') ); ?>
            <i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="breadcrumb-item"><a href="<?php echo get_post_type_archive_link( 'project' ); ?>" rel="home"><?php echo __( 'Portfolio', 'atvwptheme' );?></a></li>     

<!--
        <li class="breadcrumb-item">
<?php 
//    $terms = get_the_terms( $post->ID, 'project_cat' );
//    if( $terms ){
//        $term = array_shift( $terms );
//        echo $term->name;
//        echo $term->taxonomy;
//    } 
?>
        </li>
-->
<!--
    <li class="breadcrumb-item">
     <?php //the_taxonomies(); ?>
    </li>
-->
 
        <li class="breadcrumb-item active"><?php the_title() ?></li>

<?php endif; ?>

<?php if ( !is_front_page() ) : ?>
    </ol>
</nav>
<?php endif; ?>
