<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page" class="site">
        <header id="masthead" class="site-header all-shadows bg-white" role="banner" itemscope itemtype="https://schema.org/WPHeader">                
        <nav class="container-fluid navbar navbar-expand-lg navbar-light">
                <?php tml_the_custom_logo();?>
                <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
<!--                    <span class="navbar-toggler-icon"></span>-->
                        <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown" itemscope itemtype="https://www.schema.org/SiteNavigationElement">
                <hr class="d-block d-md-none">
                <?php 
                wp_nav_menu( array(
                    'theme_location' => 'primary-menu',
                    'container'       => '', 
//                    'container_class' => '',
//                    'container_id'    => '',
                    'menu_class' => 'navbar-nav text-right',
                    'walker' => new Primary_Walker_Nav_Menu()
                    ) );
                ?>
  
            </div>
            <div class="d-none d-lg-inline-block" >
            <?php 
            wp_nav_menu( array(
                'theme_location' => 'polylang-menu',
                'container'       => '', 
                'container_class' => '',
                'menu_class' => 'navbar-nav justify-content-end',
                'walker' => new Primary_Walker_Nav_Menu()
            ) );
            ?> 
            </div>
        </nav>
    </header>
    
    <div class="d-lg-none navbar-expand" >
            <?php 
            wp_nav_menu( array(
                'theme_location' => 'polylang-menu',
                'container'       => '', 
                'container_class' => '',
                'menu_class' => 'navbar-nav justify-content-center',
                'walker' => new Primary_Walker_Nav_Menu()
            ) );
            ?> 
            <?php 
            wp_nav_menu( array(
                'theme_location' => 'phonenumber-menu',
                'container'       => '', 
                'container_class' => '',
                'menu_class' => 'navbar-nav justify-content-center h4',
                'walker' => new Primary_Walker_Nav_Menu()
            ) );
            ?> 
    </div>
    
<div id="content" class="site-content container-fluid bg-white">