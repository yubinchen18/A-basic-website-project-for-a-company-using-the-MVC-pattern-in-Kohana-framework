yf.define('backend.Anchor')
.use('backend.Dialog')
.as({
	// run once from Main
	init: function(yf)
	{
		// get jquery
		var $ = yf.$;
		
		// check all a.yf elements
		$('a.yf').click(function(){
			var $el = $(this);
			var to = $el.data('to');
			
			// get titel for dialogs
			var title = $el.attr('title') ?  $el.attr('title') :'';
			// get body for dialogs
			var body = $el.data('body') ? $el.data('body') : '';
			// get href
			var href = $el.attr('href');
			// get callback
			if($el.data('callback')){
				var self = $el;
				eval('var callback = function(){ '+$el.data('callback')+'(self) }');
			} else {
				if(to === 'alert' || to === 'confirm'){
					// get target
					var target =$el.attr('target');
					// open new window
					if(target == '_blank'){
						var callback = function(){
							window.open(href);
						}
					// goto url in existing window
					} else {
						var callback = function(){
							window.location.href = href;
						}
					}
				} else {
					var callback = function(){};
				}
			}
			
			// do whatever is necessary
			if(to === 'alert'){
				// open the alert dialog
				yf.backend.Dialog.alert(body,title,callback,{});
			} else if(to === 'confirm'){
				// open the confirm dialog
				yf.backend.Dialog.confirm(body,title,callback,{})
			} else if(to === 'application'){
				// open the window dialog
				yf.backend.Dialog.application(href,title,{width:900,height:700});
			} else if(to === 'callback'){
				callback();
			} else if(to === 'ajax'){
				var url = $(this).attr('href');
				$.ajax(url).done(callback);
			}
			
			// stop default <a> behaviour
			return false;
		});
	}
});