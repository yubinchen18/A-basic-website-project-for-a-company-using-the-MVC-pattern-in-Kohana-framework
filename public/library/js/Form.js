yf.define('Form')
.as(function(yf){
	
	this.init = function(element)
	{
		/**
		* Submit
		*/
	   element.find('.submit').click(function(){
		   element.submit();
		   return false;
	   });
	   
		/**
		* comments / errors
		*/
		// hide all comments
		
		/*
		this.element.find('.caption.comment').hide();

		this.element.find('.contents').each(function(){
			
			// show comment on focus
			$(this).click(function(){
				// close all cations
				$('.caption.comment').hide();
				
				// get caption
				var caption = $(this).find('.caption.comment');
				// show if not closed by user before
				if(caption.data('hide') != true) {
					// show this caption
					$(this).find('.caption.comment').show();
				}
			});
			
			// enable close buttons
			$(this).find('.close').click(function(event){
				// prevent click on element
				event.stopPropagation();
				// hide caption
				var caption = $(this).closest('.caption');
				caption.data('hide',true);
				caption.hide();
			});
		});	
		*/
	};
});