yf.define('backend.form.Upload')
.as(function(yf)
{
	this.init = function($el)
	{
		$el.find('input[type=file]').change(function(){
			$(this).nextAll('[type=file]').first().show();
		});
		$el.find('input[type=file]').hide();
		$el.find('input[type=file]').first().show();
	}
});