yf.define('backend.list.Tree')
.as(function(yf){
	
	this.init = function($el)
	{
		// get settings
		var settings = $el.data('settings');
		
		// check if sortable
		if(settings.sortable){
			// make li's sortable
			$el.nestedSortable({
				listType : 'ul',
				//protectRoot : true,
				handle: '.yf-handle',
				tolerance: 'intersect',
				items: 'li',
				helper: 'clone',
				opacity: .6,
				placeholder: 'placeholder',
				revert: 250,
				errorClass : 'error',
				isAllowed : function($item,$parent){
					if($item.hasClass('yf-movable') ==false){
						return false;
					}
					if($parent == null){
						return true;
					}
					if($parent.hasClass('yf-leaf')){
						return false;
					}
					return true;
				}
			});


			// bind event on a sortupdate
			$el.bind('sortstop', function(event, ui) {
				// stop event from propagating;
				event.stopPropagation();

				// get the moved id
				var id = ui.item.data('id');

				// get the moved parent id
				var parent = ui.item.parents('li').first();
				if(parent != null && parent.data('id') != null){
					var parentId =  parent.data('id');
				} else {
					var parentId = 0;
				}

				// set first set of odd even items (just the one item)
				var items = ui.item;

				// loop through all layers to correct the depth class and data
				while(items != null && items.length > 0){
					// get the depth by adding one to the parent depth
					var parent = items.parents('li').first();
					var depth = (parent.data('depth') ? parent.data('depth') : 0)+1;
					// update depth data
					items.data('depth',depth);
					// replace depth-[anything] by depth-[depth]
					items.attr('class',function(i, cls){
						return cls.replace(/\bdepth-\S+/g, '');
					}).addClass('depth-'+depth);
					// new set of items
					items = items.children('ul').children('li');
				}

				// get the item after which it moved
				var after = 0;
				var prev = ui.item.prev();
				if(prev.length>0){
					after = prev.data('id');
				}

				// send out ajax req
				$.ajax(settings.url_move.replace('{{id}}',id).replace('{{after}}',after).replace('{{parent}}',parentId));
			});
		}
	}
});


