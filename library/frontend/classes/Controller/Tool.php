<?php

class Controller_Tool extends Controller_Base
{
	public function action_create_module()
	{
		/**
		 * FORM CREATE
		 */ 
		$form = Form::factory();
		// NAME
		$form->element('name','text',array('label'=>'Naam module','comment'=>''));
		$form->markup('custom',array('html'=>'<hr />'));
		
		// FRONTEND CONTROLLER
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_frontend_controller','checkbox',array(
			'options'=>array('1'=>'Frontend Controller maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('frontend_controller_extends','text',array('label'=>'extends Controller_','comment'=>''))->value('Base');
		
		// FRONTEND TEXT
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_frontend_Text','checkbox',array(
			'options'=>array('1'=>'Frontend ModelText maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('frontend_Text_extends','text',array('label'=>'extends Text_','comment'=>''))->value('Base');
		
		$form->markup('custom',array('html'=>'<hr />'));
		
		// BACKEND CONTROLLER
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_backend_controller','checkbox',array(
			'options'=>array('1'=>'Backend Controller maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('backend_controller_extends','text',array('label'=>'extends Controller_','comment'=>''))->value('Item');
		// BACKEND SETTINGS
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_backend_settings','checkbox',array(
			'options'=>array('1'=>'Backend Settings maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('backend_settings_extends','text',array('label'=>'extends Settings_','comment'=>''))->value('Item');
		// BACKEND TEXT
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_backend_Text','checkbox',array(
			'options'=>array('1'=>'Backend ModelText maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('backend_Text_extends','text',array('label'=>'extends Text_','comment'=>''))->value('Item');
		$form->markup('line_end');
		$form->markup('custom',array('html'=>'LET OP: escape single quotes! \\\' dus'));
		$form->element('backend_Text_module','text',array('label'=>'Modulenaam','comment'=>''))->value('');
		$form->element('backend_Text_module_single','text',array('label'=>'Itemnaam','comment'=>''))->value('');
		$form->element('backend_Text_module_plural','text',array('label'=>'Meervoud','comment'=>''))->value('');
		$form->element('backend_Text_module_member','text',array('label'=>'de / het','comment'=>''))->value('de');
		$form->element('backend_Text_module_this','text',array('label'=>'deze / dit','comment'=>''))->value('deze');
		$form->element('backend_Text_module_that','text',array('label'=>'die / dat','comment'=>''))->value('die');
		$form->element('backend_Text_module_new','text',array('label'=>'nieuw / nieuwe','comment'=>''))->value('nieuwe');
		$form->element('create_backend_Text_en','checkbox',array(
			'options'=>array('1'=>'Engels toevoegen'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('backend_Text_module_en','text',array('label'=>'Modulenaam (EN)','comment'=>''))->value('');
		$form->element('backend_Text_module_single_en','text',array('label'=>'Itemnaam (EN)','comment'=>''))->value('');
		$form->element('backend_Text_module_plural_en','text',array('label'=>'Meervoud (EN)','comment'=>''))->value('');
		$form->element('backend_Text_module_member_en','text',array('label'=>'the','comment'=>''))->value('the');
		$form->element('backend_Text_module_this_en','text',array('label'=>'this','comment'=>''))->value('this');
		$form->element('backend_Text_module_that_en','text',array('label'=>'that','comment'=>''))->value('that');
		$form->element('backend_Text_module_new_en','text',array('label'=>'new','comment'=>''))->value('new');
		
		// BACKEND FORM
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_backend_Form','checkbox',array(
			'options'=>array('1'=>'Backend ModelForm maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('backend_Form_extends','text',array('label'=>'extends Form_','comment'=>''))->value('Item');
		
		$form->markup('custom',array('html'=>'<hr />'));
		
		
		// MODEL
		$form->markup('section_start');
		$form->markup('line_start');
		$form->element('create_model','checkbox',array(
			'options'=>array('1'=>'Model maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('model_extends','text',array('label'=>'extends Model_','comment'=>''))->value('Item');
		$form->markup('line_end');
		$form->element('model_item_fields','checkbox',array(
			'options'=>array('1'=>'reguliere item-velden toevoegen'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		)->value(1);
		$form->markup('custom',array('html'=>'<hr />Extra velden'));
		for($i=0;$i<20;$i++){
			$form->markup('section_start');
			$form->element('model_field_name_'.$i,'text',array('label'=>'Veld','comment'=>''));
			$form->element('model_field_type_'.$i,'select',array(
				'options'=>array(
					'int(11)'=>'int(11)',
					'tinyint(4)'=>'tinyint(4)',
					'varchar(15)'=>'varchar(15)',
					'varchar(63)'=>'varchar(63)',
					'varchar(255)'=>'varchar(255)',
					'text'=>'text',
					'timestamp'=>'timestamp',
				),
				'label'=>'Type',
				'comment'=>'')
			);
			$form->element('model_field_notnull_'.$i,'checkbox',array(
				'options'=>array('1'=>'not null'),
				'single'=>TRUE,
				'label'=>'',
				'comment'=>'')
			)->value('1');
			$form->element('model_field_default_'.$i,'text',array('label'=>'Default. Gebruik \' (single quotes) om stringwaarden aan te geven (ook lege)','comment'=>''));
		}
		
		$form->markup('custom',array('html'=>'<hr />'));
		$form->element('create_table','checkbox',array(
			'options'=>array('1'=>'probeer automatisch tabel te maken'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		
		$form->markup('custom',array('html'=>'<hr />'));
		$form->element('overwrite_files','checkbox',array(
			'options'=>array('1'=>'bestaande bestanden overschrijven'),
			'single'=>TRUE,
			'label'=>'',
			'comment'=>'')
		);
		$form->element('go','submit',array('label'=>'verder','comment'=>''));
		


		/**
		 * FORM PARSE
		 */ 
		if($form->valid()){
			$name = ucfirst($form->value('name'));
			$file = ucfirst($form->value('name')).'.php';
			$overwrite = $form->value('overwrite_files') == '1' ? TRUE : FALSE;
			$create = array();
			
			
			// FRONTEND CONTROLLER
			if($form->value('create_frontend_controller') == '1'){
				$extends = $form->value('frontend_controller_extends') != '' ? 'Controller_'.ucfirst($form->value('frontend_controller_extends')) : 'Controller';
				$content = <<<YUNA
<?php
class Controller_{$name} extends {$extends} 
{

}
YUNA;
				$create[]=array(
					'path'=> FRONTENDPATH.'classes/Controller/'.$file,
					'content'=>$content
				);
			}
			
			
			// FRONTEND TEXT
			if($form->value('create_frontend_Text') == '1'){
				$extends = $form->value('frontend_Text_extends') != '' ? 'Text_'.ucfirst($form->value('frontend_Text_extends')) : 'Text';
				$content = <<<YUNA
<?php
class Text_{$name} extends {$extends} 
{
	protected function init()
	{
		parent::init();
		
	}
}
YUNA;
				$create[]=array(
					'path'=> FRONTENDPATH.'classes/Model/Text/'.$file,
					'content'=>$content
				);
			}
			
			
			
			
			// BACEKND CONTROLLER 
			if($form->value('create_backend_controller') == '1'){
				$extends = $form->value('backend_controller_extends') != '' ? 'Controller_'.ucfirst($form->value('backend_controller_extends')) : 'Controller_Module';
				$content = <<<YUNA
<?php
class Controller_{$name} extends {$extends} 
{

}
YUNA;
				$create[]=array(
					'path'=> BACKENDPATH.'classes/Controller/'.$file,
					'content'=>$content
				);
			}
			
			
			// BACKEND SETTINGS 
			if($form->value('create_backend_settings') == '1'){
				$extends = $form->value('backend_settings_extends') != '' ? 'Settings_'.ucfirst($form->value('backend_settings_extends')) : 'Settings';
				$content = <<<YUNA
<?php
class Settings_{$name} extends {$extends} 
{
	protected function init()
	{
		parent::init();
		
	}
}
YUNA;
				$create[]=array(
					'path'=> BACKENDPATH.'classes/Settings/'.$file,
					'content'=>$content
				);
			}
			
			
			
			// BACKEND TEXT
			if($form->value('create_backend_Text') == '1'){
				$extends = $form->value('backend_Text_extends') != '' ? 'Text_'.ucfirst($form->value('backend_Text_extends')) : 'Text_Base';
				if($extends != 'Text_Base'){
					// add item text data
					$data = <<<YUNA
		\$this->_data['nl']['module'] = '{$form->value('backend_Text_module')}';
		\$this->_data['nl']['substitutes'][':module'] = '{$form->value('backend_Text_module_single')}';
		\$this->_data['nl']['substitutes'][':module_plural'] = '{$form->value('backend_Text_module_plural')}';
		\$this->_data['nl']['substitutes'][':module_member'] = '{$form->value('backend_Text_module_member')}';
		\$this->_data['nl']['substitutes'][':module_this'] = '{$form->value('backend_Text_module_this')}';
		\$this->_data['nl']['substitutes'][':module_that'] = '{$form->value('backend_Text_module_that')}';
		\$this->_data['nl']['substitutes'][':module_new'] = '{$form->value('backend_Text_module_new')}';
YUNA;
					// add en text data
					if($form->value('create_backend_Text') == '1'){
						$data.= <<<YUNA
		
		
		\$this->_data['en']['module'] = '{$form->value('backend_Text_module_en')}';
		\$this->_data['en']['substitutes'][':module'] = '{$form->value('backend_Text_module_single_en')}';
		\$this->_data['en']['substitutes'][':module_plural'] = '{$form->value('backend_Text_module_plural_en')}';
		\$this->_data['en']['substitutes'][':module_member'] = '{$form->value('backend_Text_module_member_en')}';
		\$this->_data['en']['substitutes'][':module_this'] = '{$form->value('backend_Text_module_this_en')}';
		\$this->_data['en']['substitutes'][':module_that'] = '{$form->value('backend_Text_module_that_en')}';
		\$this->_data['en']['substitutes'][':module_new'] = '{$form->value('backend_Text_module_new_en')}';
YUNA;
					}
				}  else {
					$data = '';
				}
				
				$content = <<<YUNA
<?php
class Text_{$name} extends {$extends} 
{
	protected function init()
	{
		parent::init();
{$data}
	}
}
YUNA;
				$create[]=array(
					'path'=> BACKENDPATH.'classes/Model/Text/'.$file,
					'content'=>$content
				);
			}
			
			
			
			// BACKEND FORM 
			if($form->value('create_backend_Form') == '1'){
				$extends = $form->value('backend_Form_extends') != '' ? 'Form_'.ucfirst($form->value('backend_Form_extends')) : 'Form_Base';
				$content = <<<YUNA
<?php
class Form_{$name} extends {$extends} 
{
	protected function init()
	{

	}
}
YUNA;
				$create[]=array(
					'path'=> BACKENDPATH.'classes/Model/Form/'.$file,
					'content'=>$content
				);
			}
			
			
			// BACKEND MODEL 
			if($form->value('create_model') == '1'){
				$tableName = strtolower($name);
				$extends = $form->value('model_extends') != '' ? 'Model_'.ucfirst($form->value('model_extends')) : 'Model_Base';
				$data = '';
				for($i=0;$i<20;$i++){
					if($form->value('model_field_name_'.$i) != ''){
						$fieldName = $form->value('model_field_name_'.$i);
						$fieldType = $form->value('model_field_type_'.$i) != '' ? $form->value('model_field_type_'.$i) : 'NULL';
						$data.= <<<YUNA
		
		'{$fieldName}'=>'$fieldType',
YUNA;
					}
				}
				
				if($form->value('model_item_fields')=='1'){
					$table = <<<YUNA
	protected \$_table_columns = array(
		'id'=>'int',
		'parent_id'=>'int',
		'alias'=>'varchar',
		'created'=>'datetime',
		'timestamp'=>'timestamp',
		'rank'=>'int',
		'branch'=>'int',
		'deletable'=>'int',
		'updatable'=>'int',
		'movable'=>'int',
		'status'=>'varchar',
		'title'=>'varchar',{$data}
		'website_id'=>'varchar',
		'owner_id'=>'int',
		'editor_id'=>'int',
	);
YUNA;
				} else {
					$table = <<<YUNA
	protected \$_table_columns = array(
{$data}
	);
YUNA;
				}
				
				$content = <<<YUNA
<?php
class Model_{$name} extends {$extends} 
{
	protected \$_table_name = '{$tableName}';
		
{$table}
}
YUNA;
				$create[]=array(
					'path'=> COMMONPATH.'classes/Model/'.$file,
					'content'=>$content
				);
			}
			
			
			
			// TABLE
			if($form->value('create_table') == '1'){
				$data = '';
				for($i=0;$i<20;$i++){
					if($form->value('model_field_name_'.$i) != ''){
						$fieldName = $form->value('model_field_name_'.$i);
						$fieldType = $form->value('model_field_type_'.$i) != '' ? $form->value('model_field_type_'.$i) : 'varchar(255)';
						$fieldNotNull = $form->value('model_field_notnull_'.$i) == '1' ? 'NOT NULL' : '';
						$default = $form->value('model_field_default_'.$i) != '' ? ' DEFAULT '.$form->value('model_field_default_'.$i):'';
						$data.= <<<YUNA
		
		`{$fieldName}` {$fieldType} {$fieldNotNull} {$default},
YUNA;
					}
				}
				
				if($form->value('model_item_fields')=='1'){
					$query = <<<YUNA
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `alias` varchar(255) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `branch` tinyint(4) NOT NULL DEFAULT '0',
  `deletable` tinyint(4) NOT NULL DEFAULT '1',
  `updatable` tinyint(4) NOT NULL DEFAULT '1',
  `movable` tinyint(4) NOT NULL DEFAULT '1',
  `status` enum('new','edit','review','live') NOT NULL DEFAULT 'live',
  `rank` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
	{$data}
  `owner_id` int(11) NOT NULL DEFAULT '0',
  `editor_id` int(11) NOT NULL DEFAULT '0',
  `website_id` varchar(63) NOT NULL DEFAULT '',
  KEY `owner_id` (`owner_id`),
  KEY `parent_id` (`parent_id`),
  KEY `website_id` (`website_id`),
YUNA;
				} else {
					$query = <<<YUNA
{$data}
YUNA;
				}
	$tableName = strtolower($name);
	$content = <<<YUNA
CREATE TABLE `{$tableName}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  $query
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
YUNA;

				$create[]=array(
					'path'=> 'mysql',
					'content'=>$content
				);
			}
			

			$body = '';
			foreach($create as $item){
				if($item['path']=='mysql'){
					$body .= 'query wordt uitgevoerd:<br />';
					$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
					DB::query(NULL,$item['content'])->execute();
				} else {
					if(file_exists($item['path'])){
						if($overwrite === TRUE){
							$body .= 'file wordt OVERschreven: '.$item['path'].'<br />';
							$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
							file_put_contents($item['path'],$item['content']);
						} else {
							$body .= 'file bestaat al: '.$item['path'].'<br />';
						}
					} else {
						$body .= 'file wordt geschreven: '.$item['path'].'<br />';
						$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
						file_put_contents($item['path'],$item['content']);
					}
				}
			}


			$body .= <<<YUNA
<br />
<br />
Volgende stappen: <br />
1. Modules toevoegen aan application/backend/config/modules.php<br />
2. Modules toevoegen aan application/common/model/rights<br />
YUNA;
			// create files
			$this->response->body($body);	
		} else {
			
			$style = <<<YUNA
<head>
<style>
	.section{
		background-color: #EEEEEE;
		margin: 5px;
	}
	
	.label{
		float: left;
	}
	
	li{
		list-style: none;
	}
</style>
</head>
YUNA;
			$this->response->body($style.View::factory('form',array('form'=>$form))->render());
		}
	}
}