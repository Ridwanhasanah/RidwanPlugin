<?php
/*
  Plugin Name: Basic Plugin
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: remove dasboard widget dan menambahkan menu bar
  Version: 1.0
  Author: Ridwan Hasnaha
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/

function dwwp_remove_dasboard_widget(){
	remove_meta_box('dashboard_primary','dashboard','post_container_1');
}
add_action('wp_dashboard_setup','dwwp_remove_dasboard_widget');

/*function dwwwp_add_google_link(){  //ini untuk melihat sourcecode dashboard
	global $wp_admin_bar;
	var_dump($wp_admin_bar);
}
add_action('wp_before_admin_bar_render','dwwwp_add_google_link');*/
function dwwwp_add_google_link(){ //ini untuk menambahkan menuadmin yang atas
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id'=>'google_analytics',
		'title'=>'Google Analytics',
		'href'=>'http://google.com/analytics'
		));
}
add_action('wp_before_admin_bar_render','dwwwp_add_google_link');
?>