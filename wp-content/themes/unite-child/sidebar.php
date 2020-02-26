<div class="col-md-3">
	<h3>Агентства</h3>
	<ul class="agencies_list">
	<?
		$get_agent=0;
		if(isset($_GET['agent'])) {
			$agent_post = get_page_by_path($_GET['agent'], OBJECT, 'agency');
			$get_agent=$agent_post->ID;
		}
		$agencies=get_posts(array('post_type'=>'agency',
			'order'     => 'DESC',
			'orderby'   => 'date',
			'posts_per_page' => -1
		));
		foreach($agencies as $agency) {
			$cl='';
			if($agency->ID==$get_agent) $cl=' class="active"';
			echo '<li data-real-filter="'.$agency->ID.'"'.$cl.'>'.$agency->post_title.'</li>';
		}
	?>
	</ul>
	<button data-real-filter="all" class="btn btn-info mt-3">Вся недвижимость</button>
</div>