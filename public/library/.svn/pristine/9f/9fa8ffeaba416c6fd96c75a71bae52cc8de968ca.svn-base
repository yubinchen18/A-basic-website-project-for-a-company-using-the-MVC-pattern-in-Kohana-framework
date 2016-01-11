yf.define('backend.form.Tags')
.as(function(yf)
{
	var _scope;
	var _template;
	var _self = this;
	

	this.init = function(scope,template)
	{
		_scope = scope;
		_template = template;
		
		scope.find('.yf-value').each(function(){
			// add a tag item & value for every value
			_self.add($(this).val());
			// remove the value hidden, as the add function adds it's own value hidden
			$(this).remove();
		});
		
		scope.click(function(e){
			scope.find('.yf-input').focus();
		});
		
		scope.find('.yf-input').blur(function(e){
			var val = $(this).val().trim();
			if(val!=''){
				_self.add(val);
				$(this).val('');
			}
		});
		
		scope.find('.yf-input').keyup(function(e){
			if($(this).val().length > 1){
				$(this).attr('size',$(this).val().length);
			} else {
				$(this).attr('size',1);
			}
			if(e.keyCode == '13' || e.keyCode == '188') {
				var val = $(this).val().trim().replace(/\,/g, '');
				if(val!=''){
					_self.add(val);
					$(this).val('');
				}
            }
		}).keyup();
	}
	
	/**
	 * add a tag item and hidden value
	 */
	this.add = function(val)
	{
		// get the input field
		var input = _scope.find('.yf-input');
		// create item and hidden value
		var item = yf.View.make(_template.tag_item).render({value:val.replace('"','&quot;')});
		var value = yf.View.make(_template.tag_value).render({value:val.replace('"','&quot;')});
		// insert them
		item.insertBefore(_scope.find('.yf-input'));
		_scope.append(value);
		//remove button
		item.find('.yf-remove').click(function(e){
			e.preventDefault();
			item.remove();
			value.remove();
		});
	}
	
	/**
	 * remove all tags
	 * add a new one
	 * @param {type} val
	 * @returns {undefined}
	 */
	this.set = function(val)
	{
		_scope.find('.yf-item').remove();
		_scope.find('.yf-value').remove();
		this.add(val);
	}
});