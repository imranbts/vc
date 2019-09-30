<?php

/**
 * Register a custom post type called "teams".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_teams_init() {
    $labels = array(
        'name'                  => _x( 'teams', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'team', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Our Team', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'team', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New team', 'textdomain' ),
        'new_item'              => __( 'New team', 'textdomain' ),
        'edit_item'             => __( 'Edit team', 'textdomain' ),
        'view_item'             => __( 'View team', 'textdomain' ),
        'all_items'             => __( 'All teams', 'textdomain' ),
        'search_items'          => __( 'Search teams', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent teams:', 'textdomain' ),
        'not_found'             => __( 'No teams found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No teams found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Profile Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set Profile Image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'teams archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        //'insert_into_item'      => _x( 'Insert into Trainer', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this team', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter teams list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'teams list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'teams list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'team' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','thumbnail','excerpt', ),
    );

    register_post_type( 'team', $args );
}

add_action( 'init', 'wpdocs_codex_teams_init' );




