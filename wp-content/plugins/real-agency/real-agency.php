<?php
/*
Plugin Name: Real Agency
Description: Недвижимость и агентства
Version: 1.0
Author: Nikolay Raikevich
*/

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