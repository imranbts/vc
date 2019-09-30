<?php


/* Register Custom Post Type */

function team_members() {

	$labels = array(
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'tm-custom-post-type' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'tm-custom-post-type' ),
		'menu_name'             => __( 'Team Members', 'tm-custom-post-type' ),
		'name_admin_bar'        => __( 'Team Members', 'tm-custom-post-type' ),
		'archives'              => __( 'Team Member Archives', 'tm-custom-post-type' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'tm-custom-post-type' ),
		'all_items'             => __( 'All Team Members', 'tm-custom-post-type' ),
		'add_new_item'          => __( 'Add New Team Member', 'tm-custom-post-type' ),
		'add_new'               => __( 'Add New', 'tm-custom-post-type' ),
		'new_item'              => __( 'New Team Member', 'tm-custom-post-type' ),
		'edit_item'             => __( 'Edit Team Member', 'tm-custom-post-type' ),
		'update_item'           => __( 'Update Team Member', 'tm-custom-post-type' ),
		'view_item'             => __( 'View Team Member', 'tm-custom-post-type' ),
		'search_items'          => __( 'Search Team Member', 'tm-custom-post-type' ),
		'not_found'             => __( 'Not found', 'tm-custom-post-type' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'tm-custom-post-type' ),
		'featured_image'        => __( 'Featured Image', 'tm-custom-post-type' ),
		'set_featured_image'    => __( 'Set featured image', 'tm-custom-post-type' ),
		'remove_featured_image' => __( 'Remove featured image', 'tm-custom-post-type' ),
		'use_featured_image'    => __( 'Use as featured image', 'tm-custom-post-type' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'tm-custom-post-type' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'tm-custom-post-type' ),
		'items_list'            => __( 'Team Members list', 'tm-custom-post-type' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'tm-custom-post-type' ),
		'filter_items_list'     => __( 'Filter Team Members list', 'tm-custom-post-type' ),
	);
	$args = array(
		'label'                 => __( 'Team Member', 'tm-custom-post-type' ),
		'description'           => __( 'Chalk and Ward Team Members', 'tm-custom-post-type' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'capabilities' ),
		'taxonomies'            => array('team_member_category','team_member_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'            => array( 'slug' => 'team-members' ),
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
        'can_export'            => true,
         /* if true then archive-posttype.php will work and 
        if same slug is dovated to page then both will confil 
        https://codelight.eu/conflicting-custom-post-type-archive-slug-and-page-slug-in-wordpress/
        */	
        'has_archive'           => false,	 
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'team_members', $args );

}
add_action( 'init', 'team_members', 0 );




   // Custom Taxonomy Code
   add_action( 'init', 'team_member_category', 0 );
   function team_member_category() {
   $labels = array(
       'name'              => _x( 'Categories', 'taxonomy general name' ),
       'singular_name'     => _x( 'category', 'taxonomy singular name' ),
       'search_items'      => __( 'Search Categories' ),
       'all_items'         => __( 'All Categories' ),
       'parent_item'       => __( 'Parent Categories' ),
       'parent_item_colon' => __( 'Parent Categories:' ),
       'edit_item'         => __( 'Edit Categories' ),
       'update_item'       => __( 'Update Categories' ),
       'add_new_item'      => __( 'Add New Category' ),
       'new_item_name'     => __( 'New Category Name' ),
       'menu_name'         => __( 'Categories' ),
     );
   
      $args = array(
       'hierarchical'      => true,
       'labels'            => $labels,
       'show_ui'           => true,
       'show_admin_column' => true,
       'query_var'         => true,
       'rewrite'           => array( 'slug' => 'team_member_category' ),
   );
   register_taxonomy( 'team_member_category', array( 'team_members' ), $args );
   
   $labels = array(
       'name'                       => _x( 'Tag', 'taxonomy general name' ),
       'singular_name'              => _x( 'tag', 'taxonomy singular name' ),
       'search_items'               => __( 'Search tag' ),
       'popular_items'              => __( 'Popular tag' ),
       'all_items'                  => __( 'All tag' ),
       'parent_item'                => null,
       'parent_item_colon'          => null,
       'edit_item'                  => __( 'Edit tag' ),
       'update_item'                => __( 'Update tag' ),
       'add_new_item'               => __( 'Add New tag' ),
       'new_item_name'              => __( 'New tag Name' ),
       'separate_items_with_commas' => __( 'Separate tag with commas' ),
       'add_or_remove_items'        => __( 'Add or remove tags' ),
       'choose_from_most_used'      => __( 'Choose from the most used tags' ),
       'not_found'                  => __( 'No tag found.' ),
       'menu_name'                  => __( 'Tags' ),
   );
   
   $args = array(
       'hierarchical'          => FALSE,
       'labels'                => $labels,
       'show_ui'               => true,
       'show_admin_column'     => true,
       'update_count_callback' => '_update_post_term_count',
       'query_var'             => true,
       'rewrite'               => array( 'slug' => 'team_member_tag' ),
   );
   
   register_taxonomy( 'team_member_tag', 'team_members', $args );
   }
