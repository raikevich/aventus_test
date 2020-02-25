<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="col-md-9">
	<h3>Недвижимость</h3>
	<? global $query_string;
	$meta_query = '';
	if($_GET['agent']){
		$meta_query = array(
			'relation'	=> 'AND',
			array(
				'key'     => 'agency',
				'value'   => $_GET['agent'],
				'compare' => '='
			),
		);
	}
	parse_str($query_string, $args);
	$args['meta_query'] = $meta_query;
	$args['posts_per_page'] = -1;
	query_posts($args);
	if(have_posts()):?>
	<div class="row js-real-filter d-flex">
	<? while(have_posts()): the_post();
		front_real(get_the_ID()); // create in function.php child-theme
	endwhile;?>
	</div>
	<? endif;?>
</div>
<?php get_footer(); ?>