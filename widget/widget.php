<?php
/*
  Plugin Name: Widget
  Plugin URI: https://www.facebook.com/ridwan.hasanah3
  Description: Latihan membuat Widget
  Version: 1.0
  Author: Ridwan Hasanah
  Author URI: https://www.facebook.com/ridwan.hasanah3
*/

  class TextWidget extends WP_Widget{
  	public function __construct(){
  		parent::__construct("text_widget", "Simple Text Widget",  //Simple Text Widget nama widget
  			array("description" => "A simple widget to show how WP Plugins work"));
  	}
  	public function form($instance) {
  		$title = "";
  		$text = "";
        // if instance is defined, populate the fields
  		if (!empty($instance)) {
  			$title = $instance["title"];
  			$text = $instance["text"];
  		}

  		$tableId = $this->get_field_id("title");
  		$tableName = $this->get_field_name("title");
  		echo '<label for="' . $tableId . '">Title</label><br>'; //Title adalah Nama Title untuk klom input title
  		echo '<input id="' . $tableId . '" type="text" name="' . 
  		$tableName . '" value="' . $title . '"><br>';

  		$textId = $this->get_field_id("text");
  		$textName = $this->get_field_name("text");
  		echo '<label for="' . $textId . '">Text</label><br>'; //Text adalah nama unutk kloom input text
  		echo '<textarea id="' . $textId . '" name="' . $textName .
  		'">' . $text . '</textarea>';
  	}

  	public function update($newInstance, $oldInstance) {
  		$values = array();
  		$values["title"] = htmlentities($newInstance["title"]);
  		$values["text"] = htmlentities($newInstance["text"]);
  		return $values;
  	}

  	public function widget($args, $instance) {
  		$title = $instance["title"];
  		$text = $instance["text"];

  		echo "<h2>$title</h2>";
  		echo "<p>$text</p>";
  	}

  }

  add_action("widgets_init",
  		function () { register_widget("TextWidget"); });


  
  	?>