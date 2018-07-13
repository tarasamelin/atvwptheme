<?php
/**
 * Register CPT
 */

function cpt_project() {
        register_taxonomy('project_cat', array('project'), array(
		'label'                 => __( 'Project Categories', 'atvwptheme' ),
        'labels'                => array(
                'name'              => __( 'Project Categories', 'atvwptheme' ),
                'singular_name'     => __( 'Project Category', 'atvwptheme' ),
                'search_items'      => __( 'Search project category', 'atvwptheme' ),
                'all_items'         => __( 'All project categories', 'atvwptheme' ),
                'parent_item'       => __( 'Parent project category', 'atvwptheme' ),
                'parent_item_colon' => __( 'Parent project category:', 'atvwptheme' ),
                'edit_item'         => __( 'Edit project category', 'atvwptheme' ),
                'update_item'       => __( 'Update project category', 'atvwptheme' ),
                'add_new_item'      => __( 'Add project category', 'atvwptheme' ),
                'new_item_name'     => __( 'New project category', 'atvwptheme' ),
                'menu_name'         => __( 'Project Categories', 'atvwptheme' ),
		),
		'description'           => 'Categories for projects',
		'public'                => true,
		'show_in_nav_menus'     => false,
		'show_ui'               => true,
		'show_tagcloud'         => false,
		'show_admin_column'     => true,
		'hierarchical'          => true,
		'rewrite'               => array( 
                'slug'              => 'project-category',
                'hierarchical'      => false,
                'with_front'        => false,
                'feed'              => false
        ),
	) );
                          
    register_post_type('project', array(
        'label'             => 'Projects',
		'labels'            => array(
                'name'          => __( 'Projects', 'atvwptheme' ),
                'singular_name' => __( 'Project', 'atvwptheme' ),
                'menu_name'     => __( 'Portfolio', 'atvwptheme' ),
                'all_items'     => __( 'All Projects', 'atvwptheme' ),
                'add_new'       => __( 'Add New Project', 'atvwptheme' ),
                'add_new_item'  => __( 'New Project', 'atvwptheme' ),
                'edit'          => __( 'Edit', 'atvwptheme' ),
                'edit_item'     => __( 'Edit Project', 'atvwptheme' ),
                'new_item'      => __( 'New Project', 'atvwptheme' ),
		),
//		'description'         => '',
		'public'              => true,
//		'publicly_queryable'  => true,
//		'show_ui'             => true,
//		'show_in_rest'        => false,
//		'rest_base'           => '',
//		'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => admin_url() . 'images/media-button-image.gif',
//		'exclude_from_search' => false,
//		'capability_type'     => 'post',
//		'map_meta_cap'        => true,
//		'hierarchical'        => false,
		'rewrite'             => array(
                'slug'            => 'portfolio',
                'with_front'      => false,
                'pages'           => true,
                'feeds'           => false,
                'feed'            => false
        ),
		'has_archive'         => 'portfolio',
		'query_var'           => true,
		'supports'            => array( 'title', 'editor', 'thumbnail'  ),
		'taxonomies'          => array( 'project_cat' ),
	) );
}
add_action( 'init', 'cpt_project' );

//is_post_type_archive( 'project' );


//function project_permalink( $permalink, $post ){
//	if( strpos( $permalink, '%project_cat%' ) === false )
//		return $permalink;
//	$terms = get_the_terms( $post, 'project_cat' );
//	if( ! is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) )
//		$term_slug = array_pop( $terms )->slug;
//	else
//		$term_slug = 'no-project_cat';
//	return str_replace( '%project_cat%', $term_slug, $permalink );
//}
//add_filter( 'post_type_link', 'project_permalink', 1, 2 );

