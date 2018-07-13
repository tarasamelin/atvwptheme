<?php
/**
 *
 * Theme SetUp
 *
 */

/*
 * Load Theme Textdomain (Localize theme)
 */
add_action( 'after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
	load_theme_textdomain( 'atvwptheme', get_template_directory() . '/languages' );
}

function tml_add_theme_support() {
    add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
    add_theme_support('post-formats', array('gallery'));
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'widgets',
    ) );
	add_theme_support( 'custom-logo', array(
//		'width'       => 235,
//		'height'      => 45,
		'width'       => 180,
		'height'      => 60,
		'flex-height' => true,
	) );
    add_image_size( 'home_project_thumb', 576, 576, array( 'center', 'top' ) );
}
add_action( 'after_setup_theme', 'tml_add_theme_support' );

/**
 *
 * Register Nav Menus
 *
 */
function tml_register_nav_menus() {  
	register_nav_menus( array(
		'primary-menu' => 'Primary Menu',
        'polylang-menu' => 'Polylang Menu',
        'phonenumber-menu' => 'Phone Number Menu',
	) );
}
add_action( 'after_setup_theme', 'tml_register_nav_menus' );

/**
 *
 * Register widget area.
 *
 */
function tml_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets here.',
		'before_widget' => '<section id="%1$s" class="mb-4 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => 'Footer text left',
		'id'            => 'footer-1',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Footer text right',
		'id'            => 'footer-2',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
		'name'          => 'Above Footer col 1',
		'id'            => 'above-footer-col1',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
        register_sidebar( array(
		'name'          => 'Above Footer col 2',
		'id'            => 'above-footer-col2',
		'description'   => 'Add text widgets here.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'tml_widgets_init' );

/**
 *
 * Custome Fields Support for CPT project
 *
 */
function project_custom_fields() {
	add_post_type_support( 'project', 'custom-fields');
}
add_action('init', 'project_custom_fields');


