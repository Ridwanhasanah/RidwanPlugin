<?php
function tk_post_produk(){
	
	$singular = 'Product';
	$plural = 'Products';

	$labels = array(
		'name'               => 'Toko Online',
		'singular_name'      => 'Toko Online',
		'add_name'           => 'Add Name',
		'add_new_item'       => 'Add New ' . $singular,
		'edit'               => 'Edit',
		'edit_item'          => 'Edit ' . $singular,
		'new_item'           => 'New ' .$singular,
		'view'               => 'View ' . $singular,
		'search_item'        => 'Search ' . $plural,
		'parent'             => 'Parent',
		'not_found'          => 'Not ' . $plural . ' found',
		'not_found_in_trash' => 'No ' . $plural . 'in Trash' 
		);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-products',
		'can_export'          => true,
		'delte_with_user'     => false,
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'capability_type'     => true,
		'map_meta_cap'        => true,
		'rewrite'             => array(
			'slug'       => 'online',
			'with_front' => true,
			'pages'      => true,
			'fees'       => false,
			),
		'support'             => array(
			'title',
			'editor',
			'author',
			'custom-fields',
			'thumnail'
			)
		);
	register_post_type('online',$args);

}

add_action('init', 'tk_post_produk');


function dwwpx_register_taxonomy(){

  	$plural = 'Products';
  	$singular = 'Product';

  	$labels = array(
  		'name'                       => $plural,
  		'singular_name'              => $singular,
  		'search_items'               => 'Search ' . $plural,
  		'popular_items'              => 'Popular ' . $plural,
  		'all_items'                  => 'All ' . $plural,
  		'parent_item'                => null,
  		'parent_item_colon'          => null,
  		'edit_item'                  => 'Edit ' . $singular,
  		'update_item'                => 'Update ' . $singular,
  		'add_new_item'               => 'Add New ' . $singular,
  		'new_item_name'              => 'New ' . $singular . 'Name',
  		'separate_items_with_commas' => 'Separate ' . $plural . 'with commas',
  		'add_or_remove_items'        => 'Add or remove ' . $plural,
  		'choose_from_most_used'      => 'Choose from most used ' . $plural,
  		'not_found'                  => 'Not ' . $plural . 'found',
  		'menu_name'                  => $plural, 
  		);

  	$args = array(
  		'hierarchical'          => true,
  		'labels'                => $labels,
  		'show_ui'               => true,
  		'show_admin_column'     => true,
  		'update_count_callback' => '_update_post_term_count',
  		'query_var'             => true,
  		'rewrite'               => array( 'slug' => 'location'),
  		);
  	register_taxonomy('location', 'job', $args);
  }
  add_action('init', 'dwwpx_register_taxonomy');
?>