<?php

function pnk_codex_Category_init() {
    $labels = array(
        'name'                  => __( 'Categories', 'Post type general name', 'textdomain' ),
        'singular_name'         => __( 'Category', 'Post type singular name', 'textdomain' ),
        'menu_name'             => __( 'Categories', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => __( 'Category', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Category', 'textdomain' ),
        'new_item'              => __( 'New Category', 'textdomain' ),
        'edit_item'             => __( 'Edit Category', 'textdomain' ),
        'view_item'             => __( 'View Category', 'textdomain' ),
        'all_items'             => __( 'All Categories', 'textdomain' ),
        'search_items'          => __( 'Search Categories', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Categories:', 'textdomain' ),
        'not_found'             => __( 'No Categories found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Categories found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Category Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Category archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Category', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Category', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Categories list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Categories list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Categories list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => "blog",
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Category' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'category', $args );
}
 
add_action( 'init', 'pnk_codex_Category_init' );


 ?>