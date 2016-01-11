yf.define('form.Date')
.as(function(yf){
	
	var _self = this;
	var _el;
	
	this.init = function($el)
	{
		_el = $el;
		var settings = $el.data('settings');
		var $input = $el.find('input[type=text]')
		var $value = $el.find('input[type=hidden]')
		
		/**
		* timepicker
		*/

		$input.datepicker({
			dateFormat: settings.format_date,
			dayNames : settings.days,
			dayNamesMin : settings.days_short,
			dayNamesShort : settings.days_short,
			monthNames : settings.months,
			monthNamesShort : settings.months_short,
			currentText : settings.today,
			closeText : settings.close,
			previousText : settings.previous,
			nextText : settings.next,
			changeMonth: settings.change_month,
			changeYear: settings.change_year,
			yearRange: settings.year_range
		});
		
		// set initial time / date from hidden or now
		if($value.val() == ''){
			var date = new Date();
		} else {
			if(settings.type === 'time'){
				var date = _time_mysql_js($value.val());
			} else {
				var date = _date_mysql_js($value.val());
			}
		}
		$input.datepicker('setDate',date);


		// change hidden time on update
		$input.bind('change',{},function(){
			var mysql = _date_js_mysql($input.datepicker('getDate'));
			$value.val(mysql);	
		}).change();
		
	}
	
	
	this.val = function()
	{
		return _el.find('input[type=hidden]').val();
	}
	
	
	/**
	* helper: go to mysql date
	*/
	var _date_js_mysql = function(js)
	{
		var date = new Date(js);
		return date.getFullYear()+'-'+_two_digits(date.getMonth()+1)+'-'+_two_digits(date.getDate());
	}
	
	/**
	* helper: go to mysql datetime
	*/
	var _time_js_mysql = function(js)
	{
		var date = js;
		return date.getFullYear()+'-'+_two_digits(date.getMonth()+1)+'-'+_two_digits(date.getDate())+' '+_two_digits(date.getHours())+':'+_two_digits(date.getMinutes())+':'+_two_digits(date.getSeconds());
	}
	
	/**
	* helper: go to js date from mysql date
	*/
	var _date_mysql_js = function(mysql)
	{
		var regex=/^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9])/;
    	var parts=mysql.replace(regex,"$1 $2 $3").split(' ');
    	return new Date(parts[0],parts[1]-1,parts[2]);
	}
		
	/**
	* helper: go to js date from mysql datetime
	*/
	var _time_mysql_js = function(mysql)
	{
		var regex=/^([0-9]{2,4})-([0-1][0-9])-([0-3][0-9]) (?:([0-2][0-9]):([0-5][0-9]):([0-5][0-9]))?$/;
    	var parts=mysql.replace(regex,"$1 $2 $3 $4 $5 $6").split(' ');
    	return new Date(parts[0],parts[1]-1,parts[2],parts[3],parts[4],parts[5]);
	}
	
	
	/**
	* helper: ensure to digits (like 01-01-2012 insetad of 1-1-2012)
	*/
	var _two_digits = function(digits)
	{
		var digits = String(digits);
		while(digits.length <= 1){
			digits = '0'+digits;
		}
		return digits;
	}
	
});