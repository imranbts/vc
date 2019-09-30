<?php


/* Register Custom Post Type */

function trainings() {

	$labels = array(
		'name'                  => _x( 'Trainings', 'Post Type General Name', 'trainings-cpt' ),
		'singular_name'         => _x( 'Training', 'Post Type Singular Name', 'trainings-cpt' ),
		'menu_name'             => __( 'Trainings', 'trainings-cpt' ),
		'name_admin_bar'        => __( 'Trainings', 'trainings-cpt' ),
		'archives'              => __( 'Training Archives', 'trainings-cpt' ),
		'parent_item_colon'     => __( 'Parent Training:', 'trainings-cpt' ),
		'all_items'             => __( 'All Trainings', 'trainings-cpt' ),
		'add_new_item'          => __( 'Add New Training', 'trainings-cpt' ),
		'add_new'               => __( 'Add New', 'trainings-cpt' ),
		'new_item'              => __( 'New Training', 'trainings-cpt' ),
		'edit_item'             => __( 'Edit Training', 'trainings-cpt' ),
		'update_item'           => __( 'Update Training', 'trainings-cpt' ),
		'view_item'             => __( 'View Training', 'trainings-cpt' ),
		'search_items'          => __( 'Search Training', 'trainings-cpt' ),
		'not_found'             => __( 'Not found', 'trainings-cpt' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'trainings-cpt' ),
		'featured_image'        => __( 'Featured Image', 'trainings-cpt' ),
		'set_featured_image'    => __( 'Set featured image', 'trainings-cpt' ),
		'remove_featured_image' => __( 'Remove featured image', 'trainings-cpt' ),
		'use_featured_image'    => __( 'Use as featured image', 'trainings-cpt' ),
		'insert_into_item'      => __( 'Insert into Training', 'trainings-cpt' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Training', 'trainings-cpt' ),
		'items_list'            => __( 'Trainings list', 'trainings-cpt' ),
		'items_list_navigation' => __( 'Trainings list navigation', 'trainings-cpt' ),
		'filter_items_list'     => __( 'Filter Trainings list', 'trainings-cpt' ),
	);
	$args = array(
		'label'                 => __( 'Training', 'trainings-cpt' ),
		'description'           => __( 'Chalk and Ward Trainings', 'trainings-cpt' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'capabilities' ),
		'taxonomies'            => array('training_category','training_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'            => array( 'slug' => 'trainings' ),
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
	register_post_type( 'trainings', $args );

}
add_action( 'init', 'trainings', 0 );




   // Custom Taxonomy Code
   add_action( 'init', 'training_category', 0 );
   function training_category() {
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
       'rewrite'           => array( 'slug' => 'training_category' ),
   );
   register_taxonomy( 'training_category', array( 'trainings' ), $args );
   
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
       'rewrite'               => array( 'slug' => 'training_tag' ),
   );
   
   register_taxonomy( 'training_tag', 'trainings', $args );
   }
