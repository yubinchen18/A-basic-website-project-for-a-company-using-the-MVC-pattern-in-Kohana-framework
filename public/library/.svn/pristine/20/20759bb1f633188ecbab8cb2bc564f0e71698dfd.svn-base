yf.define('backend.form.Collection')
.use('backend.Callback')
.as(function(yf)
{
	var _collection = null;
	var _settings = null;
	var _dialog = null;
	var _item = null;
	var _self = this;
	var _meta = {}

	this.init = function($el)
	{
		// store collection
		_collection = $el;
		
		// store settings
		_settings = $el.data('settings');
		
		// get values
		var ids_data = $el.data('ids');
		
		
	   /*
		* ids_data can be of the form [1,2,3] or [{id:1,foo:'bar'},{id:2,foo:'bar'}]
		* in the first case we just copy over the ids
		* in the second case, we need to weed out the ids and store the info in meta
		* mostly used to pass around data for pivot tables
		*/
		var ids = [];
		for(var i = 0; i< ids_data.length; i++){
			if(yf.is_object(ids_data[i]) && yf.is_set(ids_data[i]['id'])){
				ids.push(ids_data[i]['id']);
				_meta[ids_data[i]['id']] = ids_data[i];
			} else {
				ids.push(ids_data[i]);
			}
		}
		
		// fetch items
		if(ids.length > 0){
			$.ajax({
				url:_settings.url_json.replace('{{id}}',ids.join('-')),
				dataType:'json'
			}).done(function(data){
				if(yf.is_array(data)){
					for(var i=0;i<data.length;i++){
						add(data[i]);
					}
					// show or hide add button / remove backups
					update();
				} else if(yf.is_object(data)) {
					add(data);
					// show or hide add button / remove backups
					update();
				} else {
					// if data is something else (some kind of exception)
					// do not remove the backup values
					// and turn off the add button
					_collection.find('.yf-add').hide();
				}
			}).fail(function(){
				_collection.find('.yf-add').hide();
			});
		} else {
			// show or hide add button / remove backups
			update();
		}

		// open window dialog
		$el.find('.yf-add').click(function(){
			// set yf browse callback
			var callback = yf.outer().backend.Callback.register(browsed);
			// create url
			var url = _settings.url_add.replace('{{type}}',$el.find('.yf-type').val()).replace('{{callback}}',callback);
			// open browser
			_dialog = yf.outer().backend.Dialog.application(url,$(this).attr('title'),{width:1000,height:700});
			return false;
		});
	}
	
	
	
	/**
	* make sortable
	*/
	var sortable = function()
	{
		if(_settings.multiple && _settings.max > 1) {
			_collection.find('.yf-item').addClass('movable');
			_collection.find('.yf-items').sortable({
				items:'.yf-item', 
				containment: 'parent',
				tolerance:'pointer'
			});
		}
	}
	
	
	/**
	* add an item with given params to given collection
	*/
	var add = function(data)
	{
		// if there is additional metadata: mix it in
		// before creating an item
		if(_meta[data.id]!=null){
			for(var prop in _meta[data.id]){
				data[prop]=_meta[data.id][prop];
			}
		}
		
		// get template
		var template = _collection.find('.yf-template').html();
		// create item
		var item = yf.View.make(template).render(data);
		// append to items
		_collection.find('.yf-items').append(item);
		// refresh sortable
		sortable();
		
		// make collection items removable
		item.find('.yf-delete').click(function(event){
			// remove item
			item.remove();
			// update add-button
			update();
			// prevent click
			return false;
		});
		
		
		if(data.allow_update){
			// make collection items updatable
			item.find('.yf-update').click(function(event){
				// remeber this as the current item
				_item = item;

				// set yf browse callback
				var callback = yf.outer().backend.Callback.register(updated);
				// create url
				var url = _settings.url_update.replace('{{id}}',data.id).replace('{{callback}}',callback);
				// open browser
				_dialog = yf.outer().backend.Dialog.application(url,$(this).attr('title'),{width:1000,height:700});

				// prevent click
				return false;
			});
		} else {
			item.find('.yf-update').hide();
		}

		
		return item;
	}


	/**
	* callback funtion that is called from popup when browsed
	*/
	var browsed = function(data)
	{
		// close dialog
		_dialog.dialog('close');
		// add item
		add(data);
		// update add-button
		update();
	}
	
	
	/**
	* callback funtion that is called from popup when updated
	*/
	var updated = function(data)
	{
		// close dialog
		_dialog.dialog('close');
		// if data is given
		if(yf.is_object(data)){
			// create and add a new item
			var item = add(data);
			// replace the old item
			_item.replaceWith(item);

		}
	}
	
	
	/**
	* update add button
	*/
	var update = function()
	{
		// get item count
		var count = _collection.find('.yf-item').length;
		
		// update button
		if(count >= _settings.max){
			_collection.find('.yf-add').hide();
		} else {
			_collection.find('.yf-add').show();
		}
		
		// add new backup item for single items: set a hidden with id 0
		if(count <= 0 && _settings.multiple == false){
			var template = _collection.find('.yf-template-backup').html();
			// create item
			var item = yf.View.make(template).render({value:0});
			// append to items
			_collection.append(item);
		} else {
			_collection.find('.yf-value-backup').remove();
		}
	}
});