yf.define('backend.form.Tinymce')
.use('backend.Callback')
.use('backend.Dialog')
.as(function(yf)
{
	var _self = this;
	// settings
	var _settings = null;
	// currenttinymce instance
	var _tinymce = null;
	// template for images
	var _template = null;
	// the opened linkdialog
	var _linkDialog = null;
	// the opened imagedialog
	var _imageDialog = null;
	
	
	/**
	 * init
	 */
	this.init = function($el,template)
	{
		// store image template(s)
		_template = template;
		// create a unique selector class
		var cls = 'tinymce-'+Math.round(10000000*Math.random());
		// add it to the textarea
		$el.find('textarea').addClass(cls);
		// get settings
		_settings = $el.data('settings');
		// set selector
		_settings.tinymce.selector = '.'+cls;
		// add init callback
		_settings.tinymce.setup = function(editor){
			// add this to the editor so it can be called from plugin
			editor.yf_tinymce = _self;
		}
		//init!
		tinymce.init(_settings.tinymce);
	};
	
	/**
	 * link button was pressed
	 * @param {type} tinymce
	 * @returns {undefined}
	 */
	this.link = function(tinymce)
	{
		// store tiny for later
		_tinymce = tinymce;
		
		// get selected node
		var node = $(tinymce.selection.getNode()).closest('a');
		
    	if(node.length > 0){
    		// if node is a a element: update
    		var action = 'update';
    		var id = $(node).data('id');
    		if(id == null){
				action = 'create';
   				id = '';
			}
   		} else {
   			// if not: create
			var action = 'create';
			var id = '';
		}
		
		// point callback to this.callback
		var callback = yf.outer().backend.Callback.register(update_link);
		
		// create link dialog url
		var url = _settings.url_link.replace('{{action}}',action).replace('{{id}}',id).replace('{{callback}}',callback);
		
		// open a dialog
		_linkDialog = yf.outer().backend.Dialog.application(url,_settings.title_link,{width:800,height:'auto'});
	};
	
	
	/**
	 * Image button was pressed: Embed an image
	 * @param {type} tinymce
	 * @returns {undefined}
	 */
	this.image = function(tinymce)
	{
		// store tiny for later
		_tinymce = tinymce;
		
		// get selected node
		var node = tinymce.selection.getNode();
		
    	if(node.nodeName == 'IMG'){
    		var $node = $(node);
    		var id = $node.data('id');
    		var size = $node.data('size');
    		if(id == null){
   				id = '';
    			size = '';
			}
   		} else {
			var id = '';
			var size = '';
		}
		
		// point callback to this.callback
		var callback = yf.outer().backend.Callback.register(update_image);
		
		// create link dialog url
		var url = _settings.url_image.replace('{{id}}',id).replace('{{size}}',size).replace('{{callback}}',callback);

		// open a dialog
		_imageDialog = yf.outer().backend.Dialog.application(url,_settings.title_image,{width:800,height:'auto'});
	};
	
	
	/**
	* callback called from the link dialog
	*/
	var update_link = function(data)
	{
		// close dialog
		_linkDialog.dialog('close');
		// if not cancel
		if(yf.is_object(data)){
			var node = $(_tinymce.selection.getNode()).closest('a');
			if(node.length == 0){
				// create
   				var title = data.title!= '' ? data.title : '';
   				var content = '<a data-id="'+data.id+'" href="'+data.url+'" _mce_href="'+data.url+'" data-mce-href="'+data.url+'" title="'+title+'" target="'+data.target+'">'+_tinymce.selection.getContent()+'</a>';
				_tinymce.selection.setContent(content);
			} else {
				// update
				node.attr('href',data.url);
				node.attr('data-mce-href',data.url);
				node.attr('_mce_href',data.url);
				node.attr('title',data.title!=''? data.title: '');
				node.attr('target',data.target);
			}
   		} 
	};
	
	
	/**
	 * Dialog responds with image-data
	 * @param {type} info
	 * @returns {undefined}
	 */
	var update_image = function(data)
	{
		// close dialog
		_imageDialog.dialog('close');
		// if not cancel
		if(yf.is_object(data)){
			if(data.template == null){
				data.template = 'default';
			}
			// create item
			var template = _template['tinymce-image-'+data.template];
			var content = yf.View.make(template).render(data,true);

			// change node
			_tinymce.selection.setContent(content);

   		} 
	};
});
