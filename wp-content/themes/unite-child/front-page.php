<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="col-md-9 my-3">
	<h3>Недвижимость</h3>
	<div class="row js-real-filter">
	<?
		$reals=get_posts(array('post_type'=>'real',
			'order'     => 'DESC',
			'orderby'   => 'date',
			'posts_per_page' => -1
		));
		foreach($reals as $real) {
			front_real($real->ID); // create in function.php child-theme
		}
	?>
	</div>
</div>
<?php get_footer(); ?>