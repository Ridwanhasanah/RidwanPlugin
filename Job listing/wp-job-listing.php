<?php
/*
  Plugin Name: WP Job Listing
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: Analytify makes Google Analytics simple for everything in WordPress (posts,pages etc). It presents the statistics in a beautiful way under the WordPress Posts/Pages at front end, backend and in its own Dashboard. This provides Stats from Country, Referrers, Social media, General stats, New visitors, Returning visitors, Exit pages, Browser wise and Top keywords. This plugin provides the Real Time statistics in a new UI that is easy to understand and looks good.
  Version: 1.0
  Author: Ridwan Hasnaha
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/

  //Exit if accessed directly
  if(! defined('ABSPATH')){
  	exit;
  }
  
  //cara 1 memanggil file php require 'nama_file_php'
  //require 'wp-job-cpt.php';

  //cara 2 memanggil file php include 'nama_file_php'
  //include 'wp-job-cpt.php';

  /*cara 3 dan ini cara yang terbaik baik dan sesuai, 
  walaupun codingannya lebih banyak dan ini yg harus di pakai
  require_once( plugin_dir_path(__FILE__) . 'nama_file_php');*/
  require_once( plugin_dir_path(__FILE__) . 'wp-job-cpt.php' );
  require_once( plugin_dir_path(__FILE__) . 'wp-job-render-admin.php' );
  require_once( plugin_dir_path(__FILE__) . 'wp-job-fields.php' );

?>