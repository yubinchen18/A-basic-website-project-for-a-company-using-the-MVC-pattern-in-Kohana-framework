yf.define('backend.form.Item')
.use('backend.Callback')
.use('backend.Dialog')
.as(function(yf)
{
	var _dialog;
	var _el;
	var _items = [];
	
	/**
	* init
	*/
	this.init = function($el)
	{	
		// store element
		_el = $el;
		
		// get settings and module selector
		var settings =$el.data('settings');
		var $module = $el.find('select.yf-item-module');
		
		// first hide the buttons
		update_buttons('hide');
		
		// module select
		$module.change(function(){
			// reset all
			$el.find('.yf-request').val('');
			$el.find('.yf-item_id').val(0);
			$el.find('.yf-item-preview').html('&nbsp');
			
			if($(this).find('option:selected').data('request') == '1'){
				// selected a request
				// set request value
				$el.find('.yf-request').val($(this).val());
				// hide all the buttons
				update_buttons('hide');
			} else {
				if(yf.is_set(_items[$(this).val()])){
					// selected a module
					// data is known for this module, show item
					show(_items[$(this).val()]);
					// show update buttons
					update_buttons('update');
				} else {
					// data is not known 
					// show create button
					update_buttons('create');
				}
			}
		});
		
		// button create
		$el.find('.yf-create').click(function(){
			// show dialog
			dialog(
				settings.url_create.replace('{{module}}',$module.val()),
				$module.find('option:selected').text()+' '+$(this).attr('title')
			);
			return false;
		});
		
		// button update
		$el.find('.yf-update').click(function(){
			// show dialog
			dialog(
				settings.url_create.replace('{{module}}',$module.val()),
				$module.find('option:selected').text()+' '+$(this).attr('title')
			);
			return false;
		});
		
		// button delete
		$el.find('.yf-delete').click(function(){
			// set item_id to 0
			$el.find('.yf-item_id').val(0);
			// clear preview
			$el.find('.yf-item-preview').html('&nbsp');
			// unload data for this module
			_items[$module.val()] = null;
			// show create buttons
			update_buttons('create');
			return false;
		});
		
		//check if there is an initial item id
		var id = $el.find('.yf-item_id').val();
		// get the selected module
		var module = $module.val();
		// load when an id is set and the selected module is not a request
		if(id != '0' && id!='' && $module.find('option:selected').data('request') != '1'){
			// get data
			$.ajax({
				url:settings.url_json.replace('{{module}}',module).replace('{{id}}',id),
				dataType:'json'
			})
			.done(function(data){
				// store data
				_items[module] = data;
				// fire change
				$module.change();
			});
		} else {
			// fire change immidiately
			$module.change();
		}
	}
	
	/**
	 * set callback and open dialog
	 * @param {type} url
	 * @param {type} title
	 * @returns {undefined}
	 */
	var dialog = function(url,title)
	{
		var callback = yf.outer().backend.Callback.register(update);	
		_dialog = yf.outer().backend.Dialog.application(url.replace('{{callback}}',callback),title);
	}
	
	/**
	 * Dialog responds
	 * @param {type} data
	 * @returns {undefined}
	 */
	var update = function(data)
	{
		// close dialog
		_dialog.dialog('close');
		// store data
		_items[_el.find('select.yf-item-module').val()] = data;
		// show item
		show(data);
		// update buttons
		update_buttons('update');
	}
	
	/**
	 * show itsm
	 * @param {type} data
	 * @returns {undefined}
	 */
	var show = function(data)
	{
		// set preview
		_el.find('.yf-item-preview').text(data.title);
		// set item id
		_el.find('.yf-item_id').val(data.id);
		// set item alias and website and request
		_el.find('.yf-params').val(JSON.stringify({
			alias: data.alias, 
			website_id: data.website_id, 
			route: data.route
		}));
	}
	
	
	var update_buttons = function(action)
	{
		if(action === 'hide'){
			_el.find('.yf-create').hide();
			_el.find('.yf-update').hide();
			_el.find('.yf-delete').hide();
			_el.find('.yf-item-preview').hide();
		} else if(action === 'create') {
			_el.find('.yf-create').show();
			_el.find('.yf-update').hide();
			_el.find('.yf-delete').hide();
			_el.find('.yf-item-preview').show();
		} else {
			_el.find('.yf-create').hide();
			_el.find('.yf-update').show();
			_el.find('.yf-delete').show();
			_el.find('.yf-item-preview').show();
		}
	}
});


