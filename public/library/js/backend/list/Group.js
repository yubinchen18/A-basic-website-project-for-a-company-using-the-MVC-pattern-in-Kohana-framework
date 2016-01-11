yf.define('backend.list.Group')
.use('backend.Dialog')
.use('backend.Callback')
.as(function(yf){
	
	// opened dialog
	var _dialog;
	
	// init
	this.init = function($el)
	{
		var settings = $el.data('settings');
		$el.find('.yf-value').change(function(){
			var group = $(this).val();
			if(group==-1){
				window.location.href = settings.url_ungroup;
			} else {
				window.location.href = settings.url_group.replace('{{group}}',group);
			}
		});
		
		$el.find('.yf-manage').click(function(e){
			e.preventDefault();
			_dialog = yf.backend.Dialog.application($(this).attr('href'));
			_dialog.bind('dialogclose', function(event) {
				window.location.reload()
			});
		});
	}
});


