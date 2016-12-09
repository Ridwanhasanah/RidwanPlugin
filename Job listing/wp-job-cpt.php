<?php
function dwwp_regiter_post_type(){

  	$singular = 'Job Listing'; //di panggil di labels
  	$plural   = 'Job Listings'; //nama yang akan di tampilkan di dashboard ini di panggil di $labels

  	$labels = array(
  		'name'                => $plural, //nama yang akan di tampilkan di dashboard
  		'singular_name'       => $singular, //nama untuk satu objek dari jenis posting ini. Default adalah Post / Halaman
  		'add_name'            => 'Add Name', /*menambahkan teks baru. defaultnya adalah "Add New" untuk kedua jenis posting hierarkis dan non-hirarkis. Ketika internasionalisasi string ini, silakan gunakan konteks gettext cocok Jenis posting Anda. Contoh: _x ('Add New', 'produk');*/
  		'add_name_item'       => 'Add New ' . $singular, //Defaultnya adalah Add New Post / Add New Halaman.
  		'edit'                => 'Edit',  //Default is Edit Post/Edit Page.
  		'edit_item'           => 'Edit '. $singular, //Default is Edit Post/Edit Page.
  		'new_item'            => 'New ' . $singular, // Default is New Post/New Page.
  		'view'                => 'View ' . $singular, 
  		'view_item'           => 'View ' . $singular, //Default is View Post/View Page.
  		'search_items'        => 'Search ' . $plural,  // Default is Search Posts/Search Pages.
  		'parent'              => 'Parent' . $singular,
  		'not_found'           => 'No ' . $plural . ' found', //Default is No posts found/No pages found.
  		'not_found_in_trash'  => 'No ' . $plural . ' in Trash' //Default is No posts found in Trash/No pages found in Trash.
  		);

  	$args= array(  //array('public' => true, 'label' => 'Job Listing');
  	'labels'              => $labels,
  	'public'              => true,
  	'publicly_queryable'  => true,
  	'exclude_from_search' => false,
  	'show_in_nav_menus'   => true, //agar tampil di navigasi menu
  	'show_ui'             => true, //agar tapmil dimenu dashboard
  	'show_in_menu'        => true, //agar tapmil dimenu dashboard
  	'show_in_admin_bar'   => true, //agar tampil di admin bar "+New"
  	'menu_position'       => 10, //mengatur posisi tampilan di dashboard
  	'menu_icon'           => 'dashicons-hammer', //menambahkan icon
  	'can_export'          => true,
  	'delete_with_user'    => false,
  	'hierarchical'        => false,
  	'has_archive'         => true,
  	'query_var'           => true,
  	'capability_type'     => 'page', //bisa diganti dengan post
  	'map_meta_cap'        => true,
  	//'capabilities' => array(),
  	'rewrite'             => array(
  		'slug'       => 'jobs',
  		'with_front' => true,
  		'pages'      => true,
  		'feeds'      => false,
  		),
  	'supports'            => array( /*ini berada di add new, ini adalah metabox namun saya akan membuat metabox sendiri jadi di komen agar tidak aktiv*/
  		'title'/*,
  		'editor', 
  		'author', //unutk memberikan nama penulis
  		'custom-fields',
  		'thumbnail'     //untuk menambahkan gambar utama*/
  		)
  	);
  	register_post_type('job',$args); //job disini adalah character bebas isi yang penting relevan 
  }
  add_action('init','dwwp_regiter_post_type');

  function dwwp_register_taxonomy(){

  	$plural = 'Loactions';
  	$singular = 'Loaction';

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
  add_action('init', 'dwwp_register_taxonomy');
?>