yf.define('backend.form.group.Form')
.use('backend.Dialog')
.as(function(yf)
{
	var _form = null;
	var _template = null;
	
	var _element_id = 0;
	var _rule_id = 0;
	var _email_id = 0;
	
	var _elements_email = {};
	
	/**
	 * Init
	 * @param {type} $el
	 * @param {type} template
	 * @returns {undefined}
	 */
	this.init = function(form,template)
	{
		// store form globally
		_form = form;
		// store templates globally
		_template = template;
		
		
		// Set elements from given value
		var elements = form.find('.yf-elements').data('elements');
		var top_element_id = 0;
		var top_rule_id = 0;
		for(var element_id in elements){
			// add element
			var element = add_element(form,element_id,elements[element_id]);
			// get id from the end of the id string
			// it needs to be a string, otherwise the POST cannot get the order right
			var parts = element_id.split('_');
			var id = parts.length > 1 ? Number(parts[parts.length-1]) : 0;
			// store highest id
			if(id > top_element_id){
				top_element_id = id;
			}
			
			// add element type options
			if(yf.is_set(elements[element_id]['options'])){
				for(var i = 0; i<elements[element_id]['options'].length; i++){
					add_option(element,element_id,elements[element_id]['options'][i]);
				}
			}
			
			// add rules
			if(yf.is_set(elements[element_id]['rule'])){
				for(var rule_id in elements[element_id]['rule']){
					// add rule
					add_rule(element,element_id,rule_id,elements[element_id]['rule'][rule_id]);
					// store highest elemenent_id
					if(Number(rule_id) > top_rule_id){
						top_rule_id = Number(rule_id);
					}
				}
			}
		}
		
		// Set emails from given value
		var top_email_id = 0;
		var emails = form.find('.yf-emails').data('emails');
		for(var email_id in emails){
			yf.log(email_id);
			// add email
			var email = add_email(form,email_id,emails[email_id]);
			// get id from the end of the id string
			// it needs to be a string, otherwise the POST cannot get the order right
			var parts = email_id.split('_');
			var id = parts.length > 1 ? Number(parts[parts.length-1]) : 0;
			// store highest id
			if(id > top_email_id){
				top_email_id = id;
			}
		}
		
		
		// Use top ids as starting point for next ids
		_element_id = top_element_id;
		_rule_id = top_rule_id;
		_email_id = top_email_id;
		
		
		// Click Add an element
		var element_prefix = form.data('element_prefix');
		form.find('a.yf-add-element').click(function(){
			// increment id
			_element_id++;
			// add an element
			add_element(form,element_prefix+'_'+_element_id);
			return false;
		});
		

		// Click Add an email
		var email_prefix = form.data('email_prefix');
		form.find('a.yf-add-email').click(function(){
			// increment id
			_email_id++;
			// add an element
			add_email(form,email_prefix+'_'+_email_id);
			return false;
		});
	};
	
	
	/**
	 * add an element
	 * @param {type} $el
	 * @param {type} element_id
	 * @param {type} value
	 * @returns {Boolean}
	 */
	var add_element = function(form,element_id,value)
	{
		// add an element
		var element = yf.View.make(_template['form-element']).render({element_id:element_id});
		// ad id to it
		element.data('id',element_id);
		// append
		form.find('.yf-elements').append(element);
		// set values if given
		if(value != null){
			element.find('.yf-element-type').val(value['type']);
			element.find('.yf-element-label').val(value['label']);
			element.find('.yf-element-comment').val(value['comment']);
			if(yf.is_set(value['place_after']) && value['place_after'] == '1'){
				element.find('.yf-element-place-after input').attr('checked','checked');
			}
		}
		
		// make elements sortable
		form.find('.yf-elements').sortable({
			items:'.yf-element', 
			handle:'.yf-handle-element', 
			containment: 'parent',
			tolerance: 'pointer',
			forcePlaceholderSize: true 
		});
		
		// activate delete button on element
		element.find('.yf-remove').click(function(){
			element.remove();
			update_emails();
			return false;
		});

		// type change
		element.find('.yf-element-type').change(function(){
			if($(this).val() === 'select' || $(this).val() === 'checkbox'){
				// show options
				element.find('.yf-section-options').show();
			} else {
				// hide options
				element.find('.yf-section-options').hide();
			}
			/*
			 * always use place after
			if($(this).val() === 'input_small'){
				// show options
				element.find('.yf-element-place-after').show();
			} else {
				// hide options
				element.find('.yf-element-place-after').hide();
			}
			*/
			// update email options
			update_emails();
		}).change();


		/**
		 * Add an option
		 */
		element.find('a.yf-add-option').click(function(){
			add_option(element,element_id);
			return false;
		});


		/**
		 * Add a rule
		 */
		// unique rule id
		element.find('a.yf-add-rule').click(function(){
			_rule_id++;
			add_rule(element,element_id,_rule_id)
			return false;
		});
		
		return element;
	}
	
	
	/**
	 * Add an option
	 * @param {type} element
	 * @param {type} element_id
	 * @returns {undefined}
	 */
	var add_option = function(element,element_id,value)
	{
		// create option
		var option = yf.View.make(_template['form-option']).render({element_id:element_id});
		// add it to the elements options
		element.find('.yf-options').append(option);
		// set value
		if(value != null){
			option.find('.yf-option-value').val(value);
		}
		// make them sortable
		element.find('.yf-options').sortable({
			items:'.yf-option', 
			handle:'.yf-handle-option', 
			containment: 'parent',
			tolerance: 'pointer',
			forcePlaceholderSize: true 
		});
		// activate delete button on option
		option.find('.yf-remove-option').click(function(){
			option.remove();
			return false;
		});
		
		return option;
	}
	
	/**
	 * Add a rule
	 * @param {type} element
	 * @param {type} element_id
	 * @param {type} rule_id
	 * @param {type} value
	 * @returns {undefined}
	 */
	var add_rule = function(element,element_id,rule_id,value)
	{
		// create rule
		var rule = yf.View.make(_template['form-rule']).render({element_id:element_id,rule_id:rule_id});
		// add it to the element rules
		element.find('.yf-rules').append(rule);
		// set value
		if(value != null){
			rule.find('.yf-rule-type').val(value.type);
			rule.find('.yf-rule-value').val(value.value);
			rule.find('.yf-rule-error').val(value.error);
		}
		// activate delete button on a rule
		rule.find('.yf-remove-rule').click(function(){
			rule.remove();
			return false;
		});
		
		// type change
		rule.find('.yf-rule-type').change(function(){
			if($(this).val() === 'is' || $(this).val() === 'not_is'){
				// show value
				rule.find('.yf-rule-value').show();
			} else {
				// hide value
				rule.find('.yf-rule-value').hide();
			}
		}).change();
		
		return rule;
	}
	
	
	
	/**
	 * add an email
	 * @param {type} $el
	 * @param {type} element_id
	 * @param {type} value
	 * @returns {Boolean}
	 */
	var add_email = function(form,email_id,value)
	{
		// add an element
		var email = yf.View.make(_template['form-email']).render({email_id:email_id});
		// append
		form.find('.yf-emails').append(email);
		
		// update available e-mail fields
		update_emails();
		
		// set bodytekst
		var body = '';
		_form.find('.yf-element').each(function(){
			body += '{{'+$(this).data('id')+'}}\n';
		});
		email.find('.yf-email-body').val(body);
		
		// set values if given
		if(value != null){
			email.find('.yf-email-to_element').val(value['to_element']);
			email.find('.yf-email-to_email').val(value['to_email']);
			email.find('.yf-email-to_name').val(value['to_name']);
			email.find('.yf-email-from_email').val(value['from_email']);
			email.find('.yf-email-from_name').val(value['from_name']);
			email.find('.yf-email-subject').val(value['subject']);
			email.find('.yf-email-body').val(value['body']);
		}
		

		// activate delete button on element
		email.find('.yf-remove').click(function(){
			email.remove();
			return false;
		});

		// type change
		email.find('.yf-email-to_element').change(function(){
			if($(this).val() === 'manual'){
				// show options
				email.find('.yf-section-email-to_email').show();
			} else {
				// hide options
				email.find('.yf-section-email-to_email').hide();
			}
		}).change();
		
		// ensure a correct from address
		email.find('.yf-email-from_email').change(function(){
			var name = $(this).val().split('@')[0];
			name = name !== '' ? name : 'no_reply';
			$(this).val(name + '@' +$(this).data('domain'));
		}).change();

		return email;
	}
	
	
	/**
	 * update email to options
	 * @returns {undefined}
	 */
	var update_emails = function()
	{
		// harvest email elements
		_elements_email = {};
		_form.find('.yf-element').each(function(){
			if($(this).find('select.yf-element-type').val() === 'email'){
				// set element to true (it's there)
				_elements_email[$(this).data('id')] = true;
			}
		});
		
		// update email field selectors accordingly
		_form.find('select.yf-email-to_element').each(function(){
			// get the current value
			var value = yf.is_set($(this).val()) ? $(this).val() : 'manual';
			// refill the options
			$(this).empty();
			for(var element in _elements_email){
				var option = $('<option value="'+element+'">'+element+'</option>');
				$(this).append(option);
			}
			// add manual option
			yf.View.make(_template['form-email-option-manual']).render().appendTo($(this));

			if(_elements_email[value] === true || value === 'manual'){
				// set the value back to what it was
				$(this).val(value);
			} else{
				// value is gone: reset to manual and launch an alert
				$(this).val('manual');
				// trigger further changes
				$(this).change();
				// alert hte user
				yf.backend.Dialog.alert(_form.data('email_alert'));
			}

		});
	}
});

