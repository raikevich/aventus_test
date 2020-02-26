var $=jQuery.noConflict();

$(document).ready(function() {
	if($('[data-real-filter]').length){
		$('[data-real-filter]').on('click',function(){
			let el = $(this);
			$('[data-real-filter]').removeClass('active');
			let js_real_filter = $('.js-real-filter');
			let data={
				action:'real_filter', // in plugin Real Agency
				agency:$(this).attr('data-real-filter')
			};

			$.ajax({
				url:'/wp-admin/admin-ajax.php',
				data:data,
				type:'POST',
				beforeSend:function() {
					js_real_filter.addClass('ajax_active');
				},
				success:function(data) {
					el.addClass('active');
					js_real_filter.html(data);
					js_real_filter.removeClass('ajax_active');
				}
			});
		});
	}
});