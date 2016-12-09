<?php
/*
Plugin Name: Membuat Menu Page di DashBoard
Plugin URI: https://www.humayraa.com/
Description: Latihan membuat plugin wordpress sederhana dengan menambahkan menu di dashboard wordpress
Author: Bestariweb Studio
Version: 1.0.0
Author URI: https://www.bestariweb.com
*/

add_action( 'admin_menu', 'tambahkan_menu' );

function tambahkan_menu() {

	add_menu_page( 'Contoh', 'contoh menu', 'manage_options', __FILE__, 'isi_menu','dashicons-palmtree', 6 );
	/*
	add_menu_page utk menambahkan Menu di wordpress
	penjelasan parameter yang ada di add_menu_page.
	1.
	parameter 2: Nama menu
	parameter 3: 'manage_options' method mutlak harus ada
	parameter 4: __FILE__ mutlak harus ada
	parameter 5: isi dari menu yang akan di tampilkan 
	parameter 6:dashicons-Nama icon
	parameter 7: urutan dasboard terserah mw urutan ke berapa.
	*/

/*add_submenu_page( 'myplugin/myplugin-admin-page.php', 'My Sub Level Menu Example', 
           'Sub Level Menu', 'manage_options', 'myplugin/myplugin-admin-sub-page.php', 
           'myplguin_admin_sub_page' ); */

  add_submenu_page(__FILE__,'contoh menu','add something','manage_options','','myplguin_admin_page');
  //add_submenu_page(__FILE__,'Contoh','Action','manage_options','myplguin_admin_page');


}

function myplguin_admin_page(){
  ?>

  <html>
  <head>
    <title>BISMILLAH</title>
  </head>
  <body>
  <div class="out-wrapper">
    <div class="main-wrapper">
      <p>Bismillah</p>
    </div>
  </div>
  
  </body>
  </html>
  <?php
}


function isi_menu(){
  /*$isimenu  = "<div class='wrap'>\n";
  $isimenu .= "<h1>JUDUL MENU</h1>";
  $isimenu .= "<div>Ini hanya contoh menu option.. silahkan kembangkan sendiri sesuai dengan kebutuhan</div>";
  echo $isimenu;*/
  ?> 
  <html>
  <head>
  	<title>RIDWAN HASNAH</title>
  </head>
  <body class="out-wrapper">
  <p>Bismillah sedang Belajar WOrdpress Plugin</p>
  <table>
  	<tr>
  		<td>menu1</td>
  		<td>menu2</td>
  		<td>menu3</td>
  		<td>menu4</td>
  		<td>menu5</td>
  		<td>menu6</td>
  	</tr>
  </table>
  
  </body>
  </html>

<?php 
}



?>