yf.define('backend.Form')
.as(function(yf)
{
	this.init = function($el)
	{
		var $ = yf.$;
		
		// submit
	   $el.find('.yf-submit').click(function(){
		   $el.submit();
		   return false;
	   });

		// submit back
	   $el.find('.yf-submit-back').click(function(){
		   $el.attr('action',$(this).attr('href'));
		   $el.submit();
		   return false;
	   });
	   
		// show/hide error tooltips
		$el.find('.yf-error').tooltip();
		$el.find('.yf-error').click(function(){
			$(this).tooltip('hide');
		});
		
		
		// init show comment tooltips
		$el.find('.yf-comment').popover();
		
	}	
});