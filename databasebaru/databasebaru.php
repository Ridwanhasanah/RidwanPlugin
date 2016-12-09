<?php
/*
  Plugin Name: Database Baru
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: Latihan membuat table database di wordpress https://codex.wordpress.org/Creating_Tables_with_Plugins
  Version: 1.0
  Author: Ridwan Hasanah
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/


  function db_baru (){
  	global $wpdb;

  	$table_name = $wpdb->prefix . 'dbbaru';
  	$charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name(
  	'id' mediumint(9) NOT NULL AUTO_INCREMENT,
  	'name' text NOT NULL,
  	'text' text NOT NULL,
  	'url' varchar(55) DEFAULT '' NOT NULL,
  	PRIMARY KEY ('id')
  	) $charset_collate;";

  	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
  	dbDelta($sql);
  	ob_start();

  	?>
  	<div>
  		<h2>Insert Data</h2>
  		<form method="post" action="#v_form" id="v_form">
  			<table>
  				<tr>
  					<td>Nama : </td>
  					<td><input type="text" name="name" id="name"/></td>
  				</tr>
  				<tr>
  					<td>Website : </td>
  					<td><input type="text" name="url" id="url"/></td>
  				</tr>
  				<tr>
  					<td>Text : </td>
  					<td><textarea name="text" id="text">tulis pesan ...</textarea></td>
  				</tr>
  				<tr>
  					<td>&nbsp;</td>
  					<td><input type="submit" name="submit" id="submit" value="Kirim"></td>
  				</tr>
  			</table>
  		</form>
  	</div>
  	<?php
  	$html = ob_get_clean();

  	if (isset ( $_POST['submit']) && $_POST['name'] != "") {
  		$name = strip_tags($_POST['name'], "");
  		$text = strip_tags($_POST['text'], "");
  		$url  = strip_tags($_POST['url'], "");
  		$isi = array(
  			'name' => $name
  			//'text' => $text,
  			//'url'  => $url
  			);

  		$table_name = $wpdb->prefix . 'dbbaru';

  		$wpdb->insert(
  			$table_name,$isi);
  		$html = "<p>Your name <strong>$name</strong> was successfully recorded. Thanks!!</p>";
  	}

  	if (isset($_POST['submit']) && $_POST['name'] == "")
  		$html .= "<p>You need to fill the required fields</p>";
  	return $html;


  }

  add_shortcode('xyz', 'db_baru');












  /*global $new_db_version;
  $new_db_version = '1.0';

  function db_baru(){
  	global $wpdb;
  	global $new_db_version;

  	$table_name = $wpdb->prefix . 'dbbaru';

  	$charset_collate = $wpdb->get_charset_collate();

  	$sql = "CREATE TABLE IF NOT EXISTS $table_name(
  	id mediumint(9) NOT NULL AUTO_INCREMENT,
  	time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	name tinytext NOT NULL,
  	text text NOT NULL,
  	url varchar(55) DEFAULT '' NOT NULL,
  	PRIMARY KEY (id)
  	) $charset_collate;";

  	require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
  	dbDelta($sql);
  	ob_start();

  	//add_option( 'new_db_version', $new_db_version);
  }

  function db_baru_data(){

  	?>
  	<div>
  		<h2>Insert Data</h2>
  		<form method="POST" action="#v_form" id="v_form">
  			<table>
  				<tr>
  					<td>Nama : </td>
  					<td><input type="text" name="name" id="name" required /></td>
  				</tr>
  				<tr>
  					<td>Website : </td>
  					<td><input type="text" name="url" id="url" required /></td>
  				</tr>
  				<tr>
  					<td>Text : </td>
  					<td><textarea name="text" id="text">tulis pesan ...</textarea></td>
  				</tr>
  				<tr>
  					<td>&nbsp;</td>
  					<td><input type="submit" name="submit" id="submit" value="Kirim"></td>
  				</tr>
  			</table>
  		</form>
  	</div>
  	<?php
  	$html = ob_get_clean();

  	if (isset($_POST['submit']) ) {
  		global $wpdb;

  		$name = strip_tags($_POST['name'], "");
  		$text = strip_tags($_POST['text'], "");
  		$url  = strip_tags($_POST['url'], "");
  		$isi = array(
  			'time' => current_time('mysql'),
  			'name' => $name,
  			'text' => $text,
  			'url'  => $url
  			);

  		$table_name = $wpdb->prefix . 'dbbaru';

  		$wpdb->insert(
  			$table_name,$isi);
  		$html = "<p>Your name <strong>$name</strong> was successfully recorded. Thanks!!</p>";
  	}

  	if (isset( $_POST['submit']) == ""){
  		$html .= "<p>You need to fill the required fields.</p>";
  		return $html;

  	}

  }

  register_activation_hook(__FILE__, 'db_baru');
  register_activation_hook(__FILE__, 'db_baru_data');

  register_deactivation_hook(__FILE__, 'db_baru');
  register_deactivation_hook(__FILE__, 'db_baru_data');

  function zzz(){
  	add_options_page('DB Baru', 'DB Baru', 'manage_options', '', 'db_baru_data');
  }

  //add_action('admin_menu', 'zzz');

  add_shortcode('xyz', 'db_baru_data');*/
  ?>