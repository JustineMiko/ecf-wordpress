<?php

/* Chargement des styles du parent. */
add_action( 'wp_enqueue_scripts', 'wpchild_enqueue_styles' );
function wpchild_enqueue_styles(){
  wp_enqueue_style( 'wpm-astra-style', get_template_directory_uri() . '/style.css' );
}


/*
add_filter( 'excerpt_length', 'your_prefix_excerpt_length' );
function your_prefix_excerpt_length() {
    return 500;
}*/

add_filter( 'get_the_excerpt', function( $excerpt, $post ) {
    if ( has_excerpt( $post ) ) {
        $excerpt_length = apply_filters( 'excerpt_length', 100000 );
        $excerpt_more   = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
        $excerpt        = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
    }
    return $excerpt;
}, 10, 2 );

// CPT Manager Formations

function wpc_cpt_formation() {
	/* Formation */
	$labels = array(
		'name'                => _x('Formations', 'Post Type General Name', 'astra-child'),
		'singular_name'       => _x('Formation', 'Post Type Singular Name', 'astra-child'),
		'menu_name'           => __('Formations', 'astra-child'),
		'name_admin_bar'      => __('Formations', 'astra-child'),
		'parent_item_colon'   => __('Parent Item:', 'astra-child'),
		'all_items'           => __('All Items', 'astra-child'),
		'add_new_item'        => __('Add New Item', 'astra-child'),
		'add_new'             => __('Add New', 'astra-child'),
		'new_item'            => __('New Item', 'astra-child' ),
		'edit_item'           => __('Edit Item', 'astra-child'),
		'update_item'         => __('Update Item', 'astra-child'),
		'view_item'           => __('View Item', 'astra-child'),
		'search_items'        => __('Search Item', 'astra-child'),
		'not_found'           => __('Not found', 'astra-child'),
		'not_found_in_trash'  => __('Not found in Trash', 'astra-child')
	);
	$rewrite = array(
		'slug'                => _x('formation', 'formation', 'astra-child'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false
	);
	$args = array(
		'label'               => __('formation', 'astra-child'),
		'description'         => __('Formations', 'astra-child'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail', 'comments', 'revisions', 'excerpt', 'custom-fields', 'post-formats', 'taxonomies' => array('category', 'post_tag')),
		'taxonomies'          => array('category', 'post_tag'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'formation',
		'rewrite'             => $rewrite,
		'capability_type'     => 'post'
	);
	register_post_type('formation', $args);	
}

add_action('init', 'wpc_cpt_formation', 10);

// Custom Taxonomies Formations

function wpc_ct_formation() {

	/* Formation Type */
	$labels = array(
		'name'                       => _x('Types', 'Taxonomy General Name', 'astra-child'),
		'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'astra-child'),
		'menu_name'                  => __('Types', 'astra-child'),
		'all_items'                  => __('All Types', 'astra-child'),
		'parent_item'                => __('Parent Type', 'astra-child'),
		'parent_item_colon'          => __('Parent Type:', 'astra-child'),
		'new_item_name'              => __('New Type Name', 'astra-child'),
		'add_new_item'               => __('Add New Type', 'astra-child'),
		'edit_item'                  => __('Edit Type', 'astra-child'),
		'update_item'                => __('Update Type', 'astra-child'),
		'view_item'                  => __('View Type', 'astra-child'),
		'separate_items_with_commas' => __('Separate types with commas', 'astra-child'),
		'add_or_remove_items'        => __('Add or remove types', 'astra-child'),
		'choose_from_most_used'      => __('Choose from the most used', 'astra-child'),
		'popular_items'              => __('Popular Types', 'astra-child'),
		'search_items'               => __('Search Types', 'astra-child'),
		'not_found'                  => __('Not Found', 'astra-child'),
		'no_terms'                   => __('No types', 'astra-child'),
		'items_list'                 => __('Types list', 'astra-child'),
		'items_list_navigation'      => __('Types list navigation', 'astra-child')
	);
	$rewrite = array(
		'slug'                       => _x('type', 'formation_type', 'astra-child'),
		'with_front'                 => true,
		'hierarchical'               => true
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
		'show_in_quick_edit'         => true,
		'taxonomies'                 => array('category', 'post_tag')
	);
	register_taxonomy('formation_type', 'formation_category', array('formation'), $args);
}
add_action('init', 'wpc_ct_formation', 10);

// CPT Manager Team
function wpc_cpt_team() {

	/* Team */
	$labels = array(
		'name'                => _x('Teams', 'Post Type General Name', 'astra-child'),
		'singular_name'       => _x('Team', 'Post Type Singular Name', 'astra-child'),
		'menu_name'           => __('Teams', 'astra-child'),
		'name_admin_bar'      => __('Teams', 'astra-child'),
		'parent_item_colon'   => __('Parent Item:', 'astra-child'),
		'all_items'           => __('All Items', 'astra-child'),
		'add_new_item'        => __('Add New Item', 'astra-child'),
		'add_new'             => __('Add New', 'astra-child'),
		'new_item'            => __('New Item', 'astra-child' ),
		'edit_item'           => __('Edit Item', 'astra-child'),
		'update_item'         => __('Update Item', 'astra-child'),
		'view_item'           => __('View Item', 'astra-child'),
		'search_items'        => __('Search Item', 'astra-child'),
		'not_found'           => __('Not found', 'astra-child'),
		'not_found_in_trash'  => __('Not found in Trash', 'astra-child')
	);
	$rewrite = array(
		'slug'                => _x('team', 'team', 'astra-child'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => false
	);
	$args = array(
		'label'               => __('team', 'astra-child'),
		'description'         => __('Teams', 'astra-child'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail', 'comments', 'revisions', 'excerpt', 'custom-fields', 'post-formats', 'taxonomies' => array('category', 'post_tag')),
		'taxonomies'          => array('category', 'post_tag'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-groups',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'team',
		'rewrite'             => $rewrite,
		'capability_type'     => 'post'
	);
	register_post_type('team', $args);	
}

add_action('init', 'wpc_cpt_team', 10);

// Custom Taxonomies Team

function wpc_ct_team() {

	/* Team Type */
	$labels = array(
		'name'                       => _x('Types', 'Taxonomy General Name', 'astra-child'),
		'singular_name'              => _x('Type', 'Taxonomy Singular Name', 'astra-child'),
		'menu_name'                  => __('Types', 'astra-child'),
		'all_items'                  => __('All Types', 'astra-child'),
		'parent_item'                => __('Parent Type', 'astra-child'),
		'parent_item_colon'          => __('Parent Type:', 'astra-child'),
		'new_item_name'              => __('New Type Name', 'astra-child'),
		'add_new_item'               => __('Add New Type', 'astra-child'),
		'edit_item'                  => __('Edit Type', 'astra-child'),
		'update_item'                => __('Update Type', 'astra-child'),
		'view_item'                  => __('View Type', 'astra-child'),
		'separate_items_with_commas' => __('Separate types with commas', 'astra-child'),
		'add_or_remove_items'        => __('Add or remove types', 'astra-child'),
		'choose_from_most_used'      => __('Choose from the most used', 'astra-child'),
		'popular_items'              => __('Popular Types', 'astra-child'),
		'search_items'               => __('Search Types', 'astra-child'),
		'not_found'                  => __('Not Found', 'astra-child'),
		'no_terms'                   => __('No types', 'astra-child'),
		'items_list'                 => __('Types list', 'astra-child'),
		'items_list_navigation'      => __('Types list navigation', 'astra-child')
	);
	$rewrite = array(
		'slug'                       => _x('type', 'team_type', 'astra-child'),
		'with_front'                 => true,
		'hierarchical'               => true
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
		'show_in_quick_edit'         => true,
		'taxonomies'                 => array('category', 'post_tag')
	);
	register_taxonomy('team_type', 'team_category', array('team'),  $args);
}
add_action('init', 'wpc_ct_team', 10);

// WP_QUERY SHORTCODE FORMATIONS
/*add_shortcode( 'fd_shortcode', 'fd_shortcode' );
    function fd_shortcode()
    function have_posts_formation() {
        $formation_query = new WP_Query(array(
            'post_type' => 'formation',
            'posts_per_page' => 15
        ));
        while ($formation_query->have_posts()) {
            $formation_query->the_post();
            return get_the_title() . '<br>'. get_the_date() . get_the_post_thumbnail() . get_the_excerpt();

        }
        
        
        wp_reset_postdata();
}*/

