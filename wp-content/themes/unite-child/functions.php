<?php
// Connection parent style.css and bootstrap 4
add_action( 'wp_enqueue_scripts', 'custom_style' , 20);
function custom_style() {
	//wp_dequeue_style( 'bootstrap' );
	//wp_enqueue_style( 'bootstrap-4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	
}

// Connection script.js
function enqueue_script() {
	wp_enqueue_script( 'script', get_stylesheet_directory_uri().'/js/script.js');
}
add_action( 'get_footer', 'enqueue_script' );

// Creation post type Real
function real_init()
{
  $labels = array(
    'name' => 'Недвижимость',
    'singular_name' => 'Недвижимость',
    'add_new' => 'Добавить новую',
    'add_new_item' => 'Добавить новую',
    'edit_item' => 'Редактировать',
    'new_item' => 'Новая недвижимость',
    'view_item' => 'Посмотреть недвижимость',
    'search_items' => 'Найти недвижимость',
    'not_found' =>  'Не найдено',
    'not_found_in_trash' => 'В корзине не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Недвижимость'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-multisite',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('real',$args);
  register_taxonomy(
                'real-type', array('portfolio'), array(
                'hierarchical'   => true,
                'label'          => 'Тип недвижимости', 
                'singular_label' => 'Тип недвижимости', 
                'rewrite'        => true));
  register_taxonomy_for_object_type('real-type', 'real'); 
}
add_action('init', 'real_init');

// Creation post type Agency
function agency_init()
{
  $labels = array(
    'name' => 'Агентство',
    'singular_name' => 'Агентство',
    'add_new' => 'Добавить новое',
    'add_new_item' => 'Добавить новое',
    'edit_item' => 'Редактировать',
    'new_item' => 'Новое агентство',
    'view_item' => 'Посмотреть агентство',
    'search_items' => 'Найти агентство',
    'not_found' =>  'Не найдено',
    'not_found_in_trash' => 'В корзине не найдено',
    'parent_item_colon' => '',
    'menu_name' => 'Агентство'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'menu_icon' => 'dashicons-groups',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('agency',$args); 
}
add_action('init', 'agency_init');
?>