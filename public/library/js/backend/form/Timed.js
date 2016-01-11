yf.define('backend.form.Timed')
.as(function(yf)
{
	this.init = function($el)
	{
		// use start
		$el.find('.yf-start .yf-use').change(function(){
			if($(this).is(':checked')){
				$el.find('.yf-start .yf-date').removeAttr('disabled');
			} else {
				$el.find('.yf-start .yf-date').attr('disabled','disabled');
			}
		}).change();
		
		// use end
		$el.find('.yf-end .yf-use').change(function(){
			if($(this).is(':checked')){
				$el.find('.yf-end .yf-date').removeAttr('disabled');
			} else {
				$el.find('.yf-end .yf-date').attr('disabled','disabled');
			}
		}).change();
		
		/*
		// start after end
		$el.find('.yf-start .yf-date').change(function(){
			var dateStart = $(this).datepicker('getDate');
			var dateEnd = $el.find('.yf-end .yf-date').datepicker('getDate');
			if(dateStart.getTime() > dateEnd.getTime()){
				$el.find('.yf-end .yf-date').datepicker('setDate',dateStart);
			}
		});
		
		// end before start
		$el.find('.yf-end .yf-date').change(function(){
			var dateEnd = $(this).datepicker('getDate');
			var dateStart = $el.find('.yf-start .yf-date').datepicker('getDate');
			if(dateEnd.getTime() < dateEnd.getTime()){
				$el.find('.yf-start .yf-date').datepicker('setDate',dateEnd);
			}
		});
		*/
		
	}
});