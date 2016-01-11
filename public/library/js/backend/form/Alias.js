yf.define('backend.form.Alias')
.as(function(yf)
{
	var _element;
	
	this.init = function($el)
	{
		_element = $el;
		var source = $('input[name='+$el.data('source')+']');
		var mode = value()==''?'create':'update';
		var sync = false;

		source.bind('focus',{},function(e){
			// get alias
			var alias = prepare_uri($(this).val());
			// if the alias is the same as the title, or the alias is blank, it's ok to sync
			if( alias == value() || value() ==''){
				sync = true;
			} else {
				sync = false;
			}
		});
		
		
		source.bind('change',{},function(event){
			// if we are creating and it's ok to sync
			if(mode=='create' && sync == true){
				// get the alias
				var alias = prepare_uri($(this).val());
				// set it
				set(alias);
			}
		});
	}
	
	
	var value = function()
	{
		if(_element.data('multiple'===true)){
			var values = _element.find('.yf-value');
			if(values.length > 1){
				return 'Array';
			} else if(values.length==1){
				return values.first().val();
			} else {
				return '';
			}
		} else {
			return _element.find('.yf-value').val();
		}
	}
	
	
	var set = function(val)
	{
		if(_element.data('multiple')===true){
			_element.data('backend.form.Tags').set(val);
		} else {
			return _element.find('.yf-value').val(val);
		}
	}
	
	
	var prepare_uri = function(uri)
	{
		uri = uri.trim();
		uri = uri.replace(/ /g,'-');
		uri = iconv(uri);
		uri = uri.replace(/[^A-Za-z0-9-\/\%\s]/g, '');
		uri = uri.toLowerCase();
		return uri;
	}
	
	
	
	var iconv = function(s){
		var in_chrs   = 'àáâãäçèéêëìíîïñòóôõöøùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝß';
		var out_chrs  = 'aaaaaceeeeiiiinoooooouuuuyyAAAAACEEEEIIIINOOOOOOUUUUYs';
		var chars_rgx = new RegExp('[' + in_chrs + ']', 'g');
		var transl = {};
		
		var lookup = function (m) {
			if(m=='ß'){
				return 'ss';
			} else {
				return transl[m] || m; 
			}
		};
		
		for (i=0; i<in_chrs.length; i++) {
			transl[ in_chrs[i] ] = out_chrs[i];
		}
		return s.replace(chars_rgx, lookup);
	}
});