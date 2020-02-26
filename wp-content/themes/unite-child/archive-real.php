<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="col-md-9">
	<h3>Недвижимость</h3>
	<? global $query_string;
	$meta_query = '';
	if(isset($_GET['agent'])){
		$agent_post = get_page_by_path($_GET['agent'], OBJECT, 'agency');
		$meta_query = array(
			'relation'	=> 'AND',
			array(
				'key'     => 'agency',
				'value'   => $agent_post->ID,
				'compare' => '='
			),
		);
	}
	parse_str($query_string, $args);
	$args['meta_query'] = $meta_query;
	$args['posts_per_page'] = -1;
	query_posts($args);
	if(have_posts() && function_exists('front_real')):?>
	<div class="row js-real-filter d-flex">
	<? while(have_posts()): the_post();
		front_real(get_the_ID()); // create in function.php child-theme
	endwhile;?>
	</div>
	<? endif;?>
</div>
<?php get_footer(); ?>