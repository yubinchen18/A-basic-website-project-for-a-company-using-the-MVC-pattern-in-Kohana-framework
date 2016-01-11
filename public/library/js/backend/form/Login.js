yf.define('backend.form.Login')
.as(function(yf){
	this.init = function($el)
	{
		// submit form on enter
		$('input').keyup(function(e){
			if(e.keyCode === 13){
				$(this).closest('form').submit();
			}
		})
	}
});