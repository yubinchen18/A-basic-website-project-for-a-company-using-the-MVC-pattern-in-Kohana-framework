yf.define('Slider')
.as(function(yf)
{
	this.init = function($el)
	{
		if($el.find('.yf-slide').length > 1){
			// start slide
			var current = $el.find('.yf-slide').first();
			var counter = 0;
			var hold = false;
			var sliderInterval = setInterval(function(){

				if (!hold){
					counter++;
				}
				if(counter > 100){
					counter = 0;
					// get next
					var next = current.next('.yf-slide');
					// if there is no next, use first
					if(next.length <= 0){
						next = $('.yf-slide').first();
					}
					/*
					// navigation buttons
					$el.find('.yf-slide-button-'+current.data('id')).removeClass('active');
					$el.find('.yf-slide-button-'+next.data('id')).addClass('active');
					*/
					current.fadeOut();
					next.fadeIn();
					current = next;
				}
			},50);
			
			$el.find('.yf-slide-button-next').click(function(){
				// reset counter
				counter = 0;
				// get next
				var next = current.next('.yf-slide');
				// if there is no next, use first
				if(next.length <= 0){
					next = $('.yf-slide').first();
				}
				current.fadeOut();
				next.fadeIn();
				current = next;
				return false;
			});
			
			
			$el.find('.yf-slide-button-previous').click(function(){
				// reset counter
				counter = 0;
				// get next
				var next = current.prev('.yf-slide');
				// if there is no next, use first
				if(next.length <= 0){
					next = $('.yf-slide').last();
				}
				current.fadeOut();
				next.fadeIn();
				current = next;
				return false;
			});
			

			$el.find('.yf-slide').mouseover(function(){
				hold = true;
			});

			$el.find('.yf-slide').mouseout(function(){
				hold = false;
			});
		}
	}

});