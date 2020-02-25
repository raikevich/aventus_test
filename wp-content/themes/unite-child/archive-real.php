<?php get_header(); ?>
<?php get_sidebar(); ?>
<div class="col-md-9">
	<h3>Недвижимость</h3>
	<? global $query_string; 
	$posts = query_posts($query_string.'&posts_per_page=-1');
	if(have_posts()):?>
	<div class="row js-real-filter d-flex">
	<? while(have_posts()): the_post();
		front_real(get_the_ID()); // create in function.php child-theme
	endwhile;?>
	</div>
	<? endif;?>
</div>
<?php get_footer(); ?>