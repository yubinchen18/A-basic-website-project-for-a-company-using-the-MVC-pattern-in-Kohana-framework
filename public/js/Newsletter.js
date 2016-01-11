yf.define('Newsletter')
.as(function(yf)
{
	this.init = function($el,template)
	{
		$el.find('.yf-button').click(function(){
			var email = $el.find('.yf-email').val();
			if(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(email) == false){
				$el.find('.yf-error').show();
			} else {
				yf.$.ajax($el.data('url'),{
					type: 'POST',
					dataType: 'json',
					data: {email:email}
				}).done(function(data){
					if(data.success){
						$el.find('.yf-button').hide();
						$el.find('.yf-error').hide();
						$el.find('.yf-email').hide();
						$el.find('.yf-before').hide();
						$el.find('.yf-after').show();
					}
				});
			}
			return false;
		});
	}
});


