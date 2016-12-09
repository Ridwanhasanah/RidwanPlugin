<?php
/*
  Plugin Name: Menampilkan Draft di database
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: untuk lbih jelas toto video berikut https://www.youtube.com/watch?v=GAwPa4fP90c&t=522s
  Version: 1.0
  Author: Ridwan Hasanah
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/
  add_action('admin_menu', 'myfirstplugin_admin_action');
  function myfirstplugin_admin_action(){
  	add_options_page('My First Plugin', 'Lihat Draft', 'manage_options',__FILE__,'myfirstplugin_admin');


  }

  function myfirstplugin_admin(){
  	?>
  	<div class="wrap">
  		<h2>A more Interest Hello Ridwan Hasanah</h2>
      <h3>This plugin will search the DB for all draft posts and display their Title and ID</h3>
      <p>Click the button below to begin the search</p>
      <br/>
      <form action="" method="POST">
        <input type="submit" name="search_draft_post" value="Search" class="button-primary"/>
      </form>
      <br/>
      <table class="widefat">
       <thead>
        <tr>
         <th>Post Title</th>
         <th>Post ID</th>
       </tr>
     </thead>
     <tfoot>
      <tr>
       <th>Post Title</th>
       <th>Post ID</th>
     </tr>
   </tfoot>
   <tbody>
    <?php
  				global $wpdb; //unutk database 
          $mytestdrafts = array();

          if(isset($_POST['search_draft_post'])){

  				      $mytestdrafts = $wpdb->get_results( //memanggil metode hasil get kelas unutk query
  					                                        " SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'draft' " //menampilkan semua post draft 
                                                   );
                update_option('myfirstplugin_draft_posts', $mytestdrafts);//tempat hasil di WP option table
              }
              else if (get_option('myfirstplugin_draft_posts')){
                $mytestdrafts = get_option('myfirstplugin_draft_posts');

              }
              foreach ($mytestdrafts as $mytestdraft) {  //menampilkan hasil dari query database 
                ?>
                <tr>

                  <?php
                  echo "<td>" . $mytestdraft->post_title . "</td>";
                  echo "<td>" . $mytestdraft->ID . "</td>";
                  ?>
                </tr>
                <?php
              }

              ?>
            </tbody>
          </table>
        </div>
        <?php

      }
      ?>