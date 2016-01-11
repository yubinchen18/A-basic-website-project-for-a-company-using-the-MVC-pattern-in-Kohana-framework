yf.define('backend.form.group.Link')
.as(function(yf)
{
	this.init = function($el)
	{
		// show / hide internal / external link block
		$el.find('select[name="type"]').change(function(event)
		{
			if($(this).val()=='item'){
				$('.yf-url').hide();
				$('.yf-item').show();
			}
			if($(this).val()=='url'){
				$('.yf-url').show();
				$('.yf-item').hide();
			}
		}).change();
	}
});