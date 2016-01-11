yf.define('backend.form.Link')
.use('backend.Dialog')
.use('backend.Callback')
.as(function(yf)
{
	// element
	var _el;
	// settings
	var _settings;
	// dialog
	var _dialog;
	
	/**
	* init
	*/
	this.init = function($el)
	{	
		// save element & settings
		_el = $el;
		_settings = $el.data('settings');
		
		// button actions
		$el.find('.yf-create').click(function(){
			var callback = yf.outer().backend.Callback.register(update);
			_dialog = yf.outer().backend.Dialog.application(_settings.url_create.replace('{{callback}}',callback),$(this).attr('title'));
			return false;
		});
		
		$el.find('.yf-update').click(function(){
			var id = $el.find('.yf-value').val();
			var callback = yf.outer().backend.Callback.register(update);
			_dialog = yf.outer().backend.Dialog.application(_settings.url_update.replace('{{id}}',id).replace('{{callback}}',callback),$(this).attr('title'));
			return false;
		});
		
		$el.find('.yf-delete').click(function(){
			var id = $el.find('.yf-value').val();
			_dialog = yf.outer().backend.Dialog.confirm($(this).data('question'),$(this).attr('title'),function(){
				// delete with ajax
				$.ajax(_settings.url_delete.replace('{{id}}',id));
				// unset preview
				show(false);
			});
			return false;
		});
		
		// only create button to start it of
		update_buttons(false);
			
		// show linked item
		// get id
		var id = $el.find('.yf-value').val();
		if(id != null && id != '0' && id != ''){
			$.ajax({
				url: _settings.url_json.replace('{{id}}',id),
				dataType: 'json'
			})
			.done(function(data){
				show(data)
			})
		} else {
			// set link_id to 0
			$el.find('.yf-value').val(0);
		}
	}
	
	
	var update = function(data)
	{
		_dialog.dialog('close');
		if(yf.is_object(data)){
			show(data);
		}
	}
	
	
	var show = function(data)
	{
		if(yf.is_object(data)){
			_el.find('.yf-value').val(data.id);
			_el.find('.yf-preview').html(data.url);
			update_buttons(data.id);
		} else {
			_el.find('.yf-value').val(0);
			_el.find('.yf-preview').html('');
			update_buttons(false);
		}
	}
	
	
	var update_buttons = function(id)
	{
		if(id === false){
			_el.find('.yf-create').show();
			_el.find('.yf-update').hide();
			_el.find('.yf-delete').hide();
		} else {
			_el.find('.yf-create').hide();
			_el.find('.yf-update').data('id',id).show();
			_el.find('.yf-delete').data('id',id).show();
		}
	}
});