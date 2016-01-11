yf.define('backend.list.Table')
.as(function(yf){
		
	this.init = function($el)
	{
		// get settings
		var settings = $el.data('settings');
		
		// check if sortable
		if(settings.sortable){
			// make li's sortable
			$el.find('tbody').sortable({
				listType : 'tbody',
				//protectRoot : true,
				handle: '.yf-handle',
				tolerance: 'intersect',
				items: 'tr',
				helper: 'clone',
				opacity: .6,
				placeholder: 'placeholder',
				revert: 250,
			});

			// bind event on a sortupdate
			$el.bind('sortupdate', function(event,ui) {

				// get the moved id
				var id = ui.item.data('id');

				// get the item after which it moved
				var after = 0;
				var prev = ui.item.prev();
				if(prev.length>0){
					after = prev.data('id');
				}

				// send out ajax req
				$.ajax(settings.url_move.replace('{{id}}',id).replace('{{after}}',after));
			});
		}
		
		
		// group clicks
		$el.find('.yf-group').click(function(){
			
			if($(this).data('group_id') != settings.active_group && settings.active_group !== false){
				// remove from list visually
				$(this).closest('.yf-list-item').remove();
			} else {
				// change selected
				$(this).siblings().removeClass('disabled');
				$(this).addClass('disabled');
			}
			// really remove
			$.ajax(settings.url_group
				.replace('{{id}}',$(this).data('item_id'))
				.replace('{{group}}',$(this).data('group_id'))
			);
		});
	}
});

