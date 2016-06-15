<?php
	# Habilita o thumbnail dos posts;
	if (function_exists("add_theme_support")) { 
		add_theme_support("post-thumbnails"); 
	}
	
	# Adiciona o selo de novo nos posts com menos de 30 dias;
	function is_new() {
		$daysold = round((current_time(timestamp) - get_the_time('U') - (get_settings('gmt_offset')))/(24*60*60));
		if ($daysold <= 30 ) {
			echo "<span class='flag_new'>new post</span>";
		}
	}

	# Adicionando Custom Fields
	$new_meta_boxes = array(
		"skills" => array(
			"name" => "skills",
			"title" => "Skills",
			"description" => ""
		),
		"url" => array(
			"name" => "url",
			"title" => "URL",
			"description" => ""
		)
	);
	function new_meta_boxes() {
		global $post, $new_meta_boxes;
		
		foreach($new_meta_boxes as $meta_box) {
			$meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);
			
			if($meta_box_value == "") $meta_box_value = $meta_box['std'];
			
			echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
			echo'<label style="font-weight: bold; display: block; padding: 5px 0 2px 2px" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
			echo'<input type="text" name="'.$meta_box['name'].'" id="'.$meta_box['name'].'" value="'.$meta_box_value.'" style="width:100%" /><br />';
			echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
		}
	}
	function create_meta_box() {
		global $theme_name;
		if ( function_exists('add_meta_box') ) {
			add_meta_box( 'work-informations', 'Work Informations', 'new_meta_boxes', 'post', 'normal', 'default' );
		}
	}
	function save_postdata( $post_id ) {
		global $post, $new_meta_boxes;
		foreach($new_meta_boxes as $meta_box) {
			if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
			return $post_id;
		}
	
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ))
				return $post_id;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ))
				return $post_id;
		}
		
		$data = $_POST[$meta_box['name']];
		
		if(get_post_meta($post_id, $meta_box['name']) == "")
			add_post_meta($post_id, $meta_box['name'], $data, true);
		elseif($data != get_post_meta($post_id, $meta_box['name'], true))
			update_post_meta($post_id, $meta_box['name'], $data);
		elseif($data == "")
			delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
		}
	}
	add_action('admin_menu', 'create_meta_box');
	add_action('save_post', 'save_postdata');
?>