yf.define('backend.form.Menu')
.as(function(yf)
{
	this.init = function($el)
	{
		// show / hide internal / external link block
		$el.find('select[name="type"]').bind('change',{},function(event)
		{
			if($(this).val()==='none'){
				$el.find('.yf-title').show();
				$el.find('.yf-link').hide();
				$el.find('.yf-controller').hide();
				$el.find('.yf-item').hide();
			}
			
			if($(this).val()==='link'){
				$el.find('.yf-title').show();
				$el.find('.yf-link').show();
				$el.find('.yf-controller').hide();
				$el.find('.yf-item').hide();
			}
			
			if($(this).val()=='controller'){
				$el.find('.yf-title').show();
				$el.find('.yf-link').hide();
				$el.find('.yf-controller').show();
				$el.find('.yf-item').hide();
			}
			
			if($(this).val()=='item'){
				$el.find('.yf-title').show();
				$el.find('.yf-link').hide();
				$el.find('.yf-controller').hide();
				$el.find('.yf-item').show();
			}
			
		}).change();
	}
});