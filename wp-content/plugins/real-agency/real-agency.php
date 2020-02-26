<?php
/*
Plugin Name: Real Agency
Description: Недвижимость и агентства
Version: 1.0
Author: Nikolay Raikevich
*/

// Ajax Real filter
add_action( 'wp_ajax_nopriv_real_filter', 'function_real_filter' );
add_action('wp_ajax_real_filter', 'function_real_filter');
function function_real_filter() {
	if($_POST['agency']=='all') {
		$meta_query = '';
	} else {
		$meta_query = array(
			'relation'	=> 'AND',
			array(
				'key'     => 'agency',
				'value'   => $_POST['agency'],
				'compare' => '='
			),
		);
	}
	
	$reals=get_posts(array('post_type'=>'real',
		'order'     => 'DESC',
		'orderby'   => 'date',
		'posts_per_page' => -1,
		'meta_query' => $meta_query
	));
	foreach($reals as $real) {
		front_real($real->ID); // create in function.php child-theme
	}

	flush();
	wp_die();
}

// Front Real item
function front_real($id) {
	$output='';
	$output.= '<div class="col-md-4 mb-4">
		<h4 class="text-center"><a href="'.get_the_permalink($id).'">'.get_the_title($id).'</a></h4>';
	
	$properties_real = ['space','cost','address','living_space','floor'];
	
	$output.= '<ul>';
	foreach($properties_real as $prop){
		$prop_name = get_transient('property_name_'.$prop);
		if($prop_name===false){
			$prop_name = get_field_object($prop,$id)['label'];
			set_transient('property_name_'.$prop, $prop_name, DAY_IN_SECONDS);
		}
		
		$prop_value = get_transient('property_'.$prop.'_'.$id);
		if($prop_value===false){
			$prop_value = get_field($prop,$id);
			set_transient('property_'.$prop.'_'.$id, $prop_value, DAY_IN_SECONDS);
		}
		
		$output.= $prop_value?'<li>'.$prop_name.': '.$prop_value.'</li>':'';
	}
	$output.= '</ul>';
	
	$output.= '</div>';
	
	echo $output;
}