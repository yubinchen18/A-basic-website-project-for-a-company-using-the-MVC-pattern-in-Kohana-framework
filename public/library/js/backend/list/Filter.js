yf.define('backend.list.Filter')
.use('backend.form.Date')
.as(function(yf){
	
	var $ = yf.$;
	var _ = yf._;
	
	this.init = function($el,template)
	{
		// get settings
		var settings = $el.data('settings');
		
		// elements
		var $field = false;
		var $operator = false;
		var $value = false;
		var $date = false;
		var $add = $el.find('.yf-add');
		
		
		// create a select for the field
		$field = yf.View
		.make(template.filter_select)
		.render({options:settings})
		.insertBefore($add)

		
		$field.find('.yf-value').change(function(){
			// remove fields
			if($operator){
				$operator.remove();
			}
			if($value){
				$value.remove();
			}
			if($(this).val() !== ''){
				
				// get settings
				var filter = settings[$(this).val()];

				// create operator element
				$operator = yf.View
				.make(template.filter_operator)
				.render({options:filter.operators})
				.insertBefore($add);
				
				// hide it if only one option
				if(_.size(filter.operators)<=1){
					$operator.hide();
				}
			
				// values
				switch(filter.type){
					case 'option':
					case 'relation':
						// create value element
						$value = yf.View
						.make(template.filter_options)
						.render({options:filter.options})
						.insertBefore($add);
						break;
					case 'text':
					case 'number':
						// create value element
						$value = yf.View
						.make(template.filter_text)
						.render()
						.insertBefore($add);
						break;
					case 'date':
						// create value element
						$value = yf.View
						.make(template.filter_date)
						.render()
						.insertBefore($add);
						// create date functionality on the element
						yf.backend.form.Date.make($value.find('div.yf'));
						break;
				}
				
				// show search button
				$add.show();
				
				// click add button on onter
				$value.find('.yf-value').keyup(function(e){
					if(e.keyCode === 13){
						$add.click();
					}
				});
			} else {
				$add.hide();
			}
		})
		.change();

		// click on add button: go to url
		$add.click(function(){
			if($value.find('.yf-value').val() !== ''){
				document.location.href  = $(this).attr('href')
				.replace('{{field}}',$field.find('.yf-value').val())
				.replace('{{operator}}',$operator.find('.yf-value').val())
				.replace('{{value}}',$value.find('.yf-value').val());
			}
			return false;
		})
	};
});


