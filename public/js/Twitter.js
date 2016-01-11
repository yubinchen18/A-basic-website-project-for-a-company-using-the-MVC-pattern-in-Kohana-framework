yf.define('Twitter')
.as(function(yf)
{
	var _element = null
	var _current = 0;
	var _timer = null;
	var _data = [];
	var _template = null;
	
	this.init = function($el,template)
	{
		// private global elements
		_element = $el;
		_template = template.twitter;
		
		var settings = $el.data('settings');
		var url = settings.url;
		yf.$.ajax(url,{
			type:'POST',
			data: {
				query: settings.query,
				type: settings.type
			},
			dataType:'json'
		}).done(function(data){
			_data = data;
			if(_data.length > 0){
				rotate();
			}
		});
	}
	
	
	var rotate = function()
	{
		_timer = setInterval(next,4000);
		next();
	}
	
	
	var next = function()
	{
		_element.find('.yf-tweet').remove();
		_current++;
		if(_current >= _data.length){
			_current = 0;
		}
		yf.View.make(_template).render(_data[_current]).appendTo(_element).hide().fadeIn();
	}
});


