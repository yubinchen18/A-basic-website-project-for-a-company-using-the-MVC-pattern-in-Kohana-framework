<?php
class Model_Form extends Model_Item
{
	protected $_table_name = 'form';

	
	// column names
	protected $_table_columns = array(
		'id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'status'=>'enum',
		
		'title'=>'varchar',
		'button'=>'varchar',
		'before'=>'text',
		'after'=>'text',
		'elements'=>'text',
		'emails'=>'text',
		
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);
	
	protected $_serialize_columns = array('elements','emails');
	
	protected $_form = NULL;
	
	public function build($form)
	{
		$this->_form = $form;
		
		if(is_array($this->elements)){
			foreach($this->elements as $name => $element){
				$element['options'] = isset($element['options']) ? $element['options'] : array();
				if(count($element['options'])>0){
					$options = array_combine($element['options'],$element['options']);
				} else {
					$options = array();
				}
				// set value
				$elm = $form->element($name, $element['type'],array(
					'label'=>$element['label'],
					'comment'=>$element['comment'],
					'options'=>$options,
					'place_after'=>isset($element['place_after']) && $element['place_after'] ==1  ? TRUE : FALSE
				));
				
				if(isset($element['rule']) && is_array($element['rule'])){
					foreach($element['rule'] as $rule){
						if($rule['type'] == 'not_empty'){
							$elm->required = true;
						}
					}
				}
				
				// run it through the validator
				$form->rule($name,array($this,'validate'),array(':validation',':field',':value'));
			}
		}
	}
	
	public function email($email)
	{
		if(is_array($this->emails)){
		
			foreach($this->emails as $settings){
				$send = TRUE;
				
				if($settings['to_element']!=='manual'){
					// replace to_email with value from form
					$settings['to_email'] = $this->_form->value($settings['to_element']);
				}
				
				// replace text in body
				$settings['body'] = Template::factory($settings['body'],$this->_form->values())->render();

				// check if email is ok
				if(filter_var($settings['to_email'], FILTER_VALIDATE_EMAIL) === FALSE) {
					$send = FALSE;
				}
					
				//if it's ok to send: do it
				if($send){
					// feed the settings to the mailer
					$email->settings($settings);
					// send it out
					try{
						$email->send();
					} catch(Exception $e){
						Kohana::$log->add(Log::ERROR,'Failed sending email: '. var_export($settings,TRUE).' with exception: '.var_export($e,TRUE));
					}
				}
			}
		}
	}
	
	
	
	public function validate($validator,$field,$value)
	{
		$element = $this->elements[$field];
		if(isset($element['rule']) && is_array($element['rule'])){
			foreach($element['rule'] as $rule){
				$args = array();
				$args[]=$value;
				//var_dump($rule['type']);
				//var_dump($args);
				//var_dump(call_user_func_array(array('Valid',$rule['type']),$args));
				if(call_user_func_array(array('Valid',$rule['type']),$args) === FALSE){
					$validator->error($field,$rule['error']);
				}
			}
		}
	}
}