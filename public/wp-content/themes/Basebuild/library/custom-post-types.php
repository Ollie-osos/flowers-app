<?php 

// add options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Global Settings',
		'menu_title'	=> 'Global Settings',
	));	
	//    ARCHIVES SETTINGS ---------------
    acf_add_options_page(array(
        'page_title'    =>'Archives',
        'menu_title'    =>'Archives',
        'menu_slug' 	=> 'archive',
        'capability'	=> 'edit_posts',
        'parent_slug'	=> '',
        'position'		=> 5,
        'redirect'		=> true,
        'icon_url'		=> 'dashicons-archive'
    ));

} 

//  // to add custom post types to the sites menu
// add_action( 'init', 'create_post_type' );

// function create_post_type() {
// 	register_post_type( 'flowers',
// 		array(
// 			'labels' => array(
// 				'name' => __( 'Flowers' ),
// 				'singular_name' => __( 'Flower' )
// 			),
// 			'public' => true,
// 			'show_in_nav_menus' => true,
// 			'has_archive' => true,
// 			'taxonomies' => array('category', 'post_tag'),
// 			'supports' => array('title', 'thumbnail', 'author'),
// 			'menu_icon' => 'dashicons-welcome-learn-more'
// 		)
// 	);
	
// }