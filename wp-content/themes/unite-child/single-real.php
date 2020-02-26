<?php get_header(); ?>
<div class="col-xs-12">
	<h1><? the_title(); ?></h1>
	<?
	$id = get_the_ID();
	$terms = get_the_terms($id, 'real-type');
	$term_str='';
	foreach($terms as $term){
		$term_str.=$term->name.', ';
	}
	$term_str = substr($term_str, 0, -2);
	?>
	<p><?=$term_str?></p>
	<ul>
		<?
		$properties_real = ['space','cost','address','living_space','floor','agency'];

		foreach($properties_real as $prop){
			$prop_name = get_transient('property_name_'.$prop);
			if($prop_name===false){
				$prop_name = get_field_object($prop,$id)['label'];
				set_transient('property_name_'.$prop, $prop_name, DAY_IN_SECONDS);
			}
			
			$prop_value = get_transient('property_'.$prop.'_'.$id);
			if($prop_value===false){
				if($prop=='agency') {
					$prop_value = get_field($prop,$id);
					$prop_value = '<a href="/real/?agent='.$prop_value->post_name.'">'.$prop_value->post_title.'</a>';
				} else {
					$prop_value = get_field($prop,$id);
				}
				set_transient('property_'.$prop.'_'.$id, $prop_value, DAY_IN_SECONDS);
			}
			
			$output = $prop_value?'<li>'.$prop_name.': '.$prop_value.'</li>':'';
			echo $output;
		}
		?>
	</ul>
</div>
<?php get_footer(); ?>