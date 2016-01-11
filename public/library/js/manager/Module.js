yf.define('manager.Module')
.as(function(yf){
	this.init = function($el)
	{
		$el.find('.yf-generate').change(function(e){
		   
			
			if($(this).attr('value') == 'model'){
				if($(this).is(':checked')){
					$el.find('[name^="model_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="model_"]').closest('.row-fluid').hide();
				}
			}
			
		  	if($(this).attr('value') == 'form'){
				if($(this).is(':checked')){
					$el.find('[name^="form_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="form_"]').closest('.row-fluid').hide();
				}
			}
			
		   	if($(this).attr('value') == 'controller_frontend'){
				if($(this).is(':checked')){
					$el.find('[name^="controller_frontend_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="controller_frontend_"]').closest('.row-fluid').hide();
				}
			}
			
			if($(this).attr('value') == 'text_frontend'){
				if($(this).is(':checked')){
					$el.find('[name^="text_frontend_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="text_frontend_"]').closest('.row-fluid').hide();
				}
				$el.find('[name="text_frontend_language[]"]').change();
			}
			
			if($(this).attr('value') == 'controller_backend'){
				if($(this).is(':checked')){
					$el.find('[name^="controller_backend_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="controller_backend_"]').closest('.row-fluid').hide();
				}
			}
			
			if($(this).attr('value') == 'form_backend'){
				if($(this).is(':checked')){
					$el.find('[name^="form_backend"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="form_backend"]').closest('.row-fluid').hide();
				}
			}

			if($(this).attr('value') == 'text_backend'){
				if($(this).is(':checked')){
					$el.find('[name^="text_backend_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="text_backend_"]').closest('.row-fluid').hide();
				}
				$el.find('[name="text_backend_language[]"]').change();
			}
			

			if($(this).attr('value') == 'settings_backend'){
				if($(this).is(':checked')){
					$el.find('[name^="settings_backend_"]').closest('.row-fluid').show();
				} else {
					$el.find('[name^="settings_backend_"]').closest('.row-fluid').hide();
				}
			}
	   }).change();
	   
	   
		$el.find('[name="text_frontend_language[]"]').change(function(e){
			if($(this).is(':checked')){
				$el.find('[name^="text_frontend_'+$(this).attr('value')+'"]').closest('.row-fluid').show();
			} else {
				$el.find('[name^="text_frontend_'+$(this).attr('value')+'"]').closest('.row-fluid').hide();
			}
		}).change();
		
		
		$el.find('[name="text_backend_language[]"]').change(function(e){
			if($(this).is(':checked')){
				$el.find('[name^="text_backend_'+$(this).attr('value')+'"]').closest('.row-fluid').show();
			} else {
				$el.find('[name^="text_backend_'+$(this).attr('value')+'"]').closest('.row-fluid').hide();
			}
		}).change();
	};
});