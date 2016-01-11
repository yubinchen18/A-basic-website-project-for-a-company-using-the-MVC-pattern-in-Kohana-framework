<?php
class Form_Module extends Form
{
	protected $_languages = array();
	
	public function languages($languages)
	{
		$this->_languages = $languages;
	}
	
	public function build()
	{
		// module name
		$this->element('name','text',array('label'=>'Module-name'));
		// files to create
		$this->element('generate','checkbox',array(
			'label'=>'Generate the following',
			'options'=>array(
				'model'=>'Model',
				'table'=>'Table',
				'collection'=>'Collection',
				'collection_table'=>'Collection table',
				'controller_frontend'=>'Frontend controller',
				'text_frontend'=>'Text file frontend',
				'controller_backend'=>'Backend controller',
				'form'=>'Form backend',
				'text_backend'=>'Text file backend',
				'settings_backend'=>'Settings file backend',
			),
			'spacer'=>'<br />',
			'attributes'=>array('class'=>'yf-generate')
		));
		
		// overwrite files and tables
		$this->element('overwrite','checkbox',array(
			'label'=>'Overwrite if exists',
			'options'=>array(
				'files'=>'Files',
				'tables'=>'Tables',
			),
			'spacer'=>'<br />'
		));

		// Model extends
		$this->element('model_extends','text',array('label'=>'Model extends'))->value('Model_Item');
		
		// Table
		$this->element('model_table','text',array('label'=>'Table name'));
		
		// Model Sortable
		$this->element('model_sortable','checkbox',array(
			'options'=>array('1'=>'Model is sortable'),
			'single'=>TRUE,
		))->value('0');
		
		// Model Parent
		$this->element('model_parent','checkbox',array(
			'options'=>array('1'=>'Include parent_id (when extending Model_Branch)'),
			'single'=>TRUE,
		))->value('0');
		
		// Model Metadata
		$this->element('model_meta','checkbox',array(
			'options'=>array('1'=>'Include fields for metadata'),
			'single'=>TRUE,
		))->value('0');
		
		// Model default fields
		$this->element('model_item_fields','checkbox',array(
			'options'=>array('1'=>'Include Model_Item default fields (alias, rank, updatable, title, website_id, etc...)'),
			'single'=>TRUE,
		))->value('1');
		
		// Model fields
		$this->markup('custom',array('html'=>'<div class="row-fluid"><h3 name="model_header">Model fields. Foreign keys for collections and belongs to will we automatically added, so don\'t set them here</h3></div>'));
		for($i=0; $i<10; $i++){
			$this->element('model_fields['.$i.'][name]','text',array('attributes'=>array('placeholder'=>'name')));
			$this->element('model_fields['.$i.'][type]','select',array(
				'options'=>array(
					'int(11)'=>'int(11)',
					'tinyint(4)'=>'tinyint(4)',
					'varchar(15)'=>'varchar(15)',
					'varchar(63)'=>'varchar(63)',
					'varchar(255)'=>'varchar(255)',
					'text'=>'text',
					'timestamp'=>'timestamp',
				),
				'place_after'=>TRUE
			));
			$this->element('model_fields['.$i.'][notnull]','checkbox',array(
				'options'=>array('1'=>'not null'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('1');
			$this->element('model_fields['.$i.'][default]','checkbox',array(
				'options'=>array('1'=>'use default'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('1');
			$this->element('model_fields['.$i.'][value]','text',array(
				'place_after'=>TRUE,
				'attributes'=>array('placeholder'=>'default')
			));
			$this->element('model_fields['.$i.'][label]','text',array(
				'attributes'=>array('placeholder'=>'label')
			));
			$this->element('model_fields['.$i.'][rules][]','checkbox',array(
				'options'=>array('not_empty'=>'Not empty','email'=>'E-mail'),
				'single'=>TRUE,
				'spacer'=>'<br />',
				'place_after'=>TRUE
			))->value('1');
			$this->element('model_fields['.$i.'][not_empty_error]','text',array(
				'attributes'=>array('placeholder'=>'not empty error'),
				'place_after'=>TRUE
			));
			$this->element('model_fields['.$i.'][email_error]','text',array(
				'attributes'=>array('placeholder'=>'e-mail error'),
				'place_after'=>TRUE
			));
			
			$this->markup('custom',array('html'=>'<div class="row-fluid"><hr name="model_hr"></div>'));
		}

		// Model collections
		$this->markup('custom',array('html'=>'<div class="row-fluid"><h3 name="model_header">Model collections</h3></div>'));
		for($i=0; $i<5; $i++){
			$this->element('model_collections['.$i.'][name]','text',array('attributes'=>array('placeholder'=>'name_collection')));
			$this->element('model_collections['.$i.'][model]','text',array('attributes'=>array('placeholder'=>'Model'),'place_after'=>TRUE));
			$this->element('model_collections['.$i.'][key]','text',array('attributes'=>array('placeholder'=>'table_collection_id'),'place_after'=>TRUE));
			$this->element('model_collections['.$i.'][load]','checkbox',array(
				'options'=>array('1'=>'Automatic load'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('0');
			$this->element('model_collections['.$i.'][first]','checkbox',array(
				'options'=>array('1'=>'Automatic load first'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('0');
			$this->element('model_collections['.$i.'][view]','text',array('attributes'=>array('placeholder'=>'view')));
			$this->element('model_collections['.$i.'][controller]','text',array('attributes'=>array('placeholder'=>'Controller'),'place_after'=>TRUE));
			$this->element('model_collections['.$i.'][label]','text',array('attributes'=>array('placeholder'=>'label'),'place_after'=>TRUE));
			$this->element('model_collections['.$i.'][rules][]','checkbox',array(
				'options'=>array('not_empty'=>'Not empty'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('0');
			$this->element('model_collections['.$i.'][not_empty_error]','text',array(
				'attributes'=>array('placeholder'=>'not empty error'),
				'place_after'=>TRUE
			));
			
			$this->markup('custom',array('html'=>'<div class="row-fluid"><hr name="model_hr"></div>'));
		}

		// Model belongs to
		$this->markup('custom',array('html'=>'<div class="row-fluid"><h3 name="model_header">Model belongs to</h3></div>'));
		for($i=0; $i<5; $i++){
			$this->element('model_belongs['.$i.'][name]','text',array('attributes'=>array('placeholder'=>'name')));
			$this->element('model_belongs['.$i.'][model]','text',array('attributes'=>array('placeholder'=>'Model'),'place_after'=>TRUE));
			$this->element('model_belongs['.$i.'][key]','text',array('attributes'=>array('placeholder'=>'table_id'),'place_after'=>TRUE));
			$this->element('model_belongs['.$i.'][load]','checkbox',array(
				'options'=>array('1'=>'Automatic load'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('0');
			$this->element('model_belongs['.$i.'][view]','text',array('attributes'=>array('placeholder'=>'view')));
			$this->element('model_belongs['.$i.'][controller]','text',array('attributes'=>array('placeholder'=>'Controller'),'place_after'=>TRUE));
			$this->element('model_belongs['.$i.'][label]','text',array('attributes'=>array('placeholder'=>'label'),'place_after'=>TRUE));
			$this->element('model_belongs['.$i.'][rules][]','checkbox',array(
				'options'=>array('not_empty'=>'Not empty'),
				'single'=>TRUE,
				'place_after'=>TRUE
			))->value('0');
			$this->element('model_belongs['.$i.'][not_empty_error]','text',array(
				'attributes'=>array('placeholder'=>'not empty error'),
				'place_after'=>TRUE
			));
			$this->markup('custom',array('html'=>'<div class="row-fluid"><hr name="model_hr"></div>'));
		}
	
		// FE controller extends
		$this->element('controller_frontend_extends','text',array('label'=>'Frontend controller extends'))->value('Controller_Module');
		// FE text extends
		$this->element('text_frontend_extends','text',array('label'=>'Frontend text extends'))->value('base');
		// FE languages
		$this->element('text_frontend_language','checkbox',array(
			'label'=>'Frontend text languages',
			'options'=>$this->_languages,
			'spacer'=>'<br />',
		));
		foreach($this->_languages as $language => $label){
			$this->element('text_frontend_'.$language.'[name]','text',array('label'=>'Text Frontend '.$label,'attributes'=>array('placeholder'=>'name')));
			$this->element('text_frontend_'.$language.'[single]','text',array('attributes'=>array('placeholder'=>'single')));
		}
		
		
		// BE controller extends
		$this->element('controller_backend_extends','text',array('label'=>'Backend controller extends'))->value('Controller_Item');
		

		// BE form extends
		$this->element('form_extends','text',array('label'=>'Backend form extends'))->value('Form_Base');
		// BE form buttons
		$this->element('form_buttons','checkbox',array(
			'options'=>array(
				'submit'=>'Submit',
				'submit_back'=>'Submit Back',
				'back'=>'Back',
				'preview'=>'Preview',
			),
			'label'=>'Buttons'
		));
		// BE form seo fields
		$this->element('form_seo','checkbox',array(
			'options'=>array('1'=>'Add Seo fields'),
			'single'=>TRUE,
		))->value('0');
		// BE form title field
		$this->element('form_title','checkbox',array(
			'options'=>array('1'=>'Add Title field'),
			'single'=>TRUE,
		))->value('0');
		// BE form alias field
		$this->element('form_alias','checkbox',array(
			'options'=>array('1'=>'Add Alias field'),
			'single'=>TRUE,
		))->value('0');
		// BE form elements
		$this->element('form_fields','checkbox',array(
			'options'=>array('1'=>'Create text iputs for all model fields (change manually later)'),
			'single'=>TRUE,
		))->value('0');
		// BE form collections
		$this->element('form_collections','checkbox',array(
			'options'=>array('1'=>'Create collections'),
			'single'=>TRUE,
		))->value('0');
		// BE form belongs
		$this->element('form_belongs','checkbox',array(
			'options'=>array('1'=>'Create collections for belongs_to fields'),
			'single'=>TRUE,
		))->value('0');
		
		
		// BE text extends
		$this->element('text_backend_extends','text',array('label'=>'Backend text extends'))->value('item');
		
		// BE text labels
		$this->element('text_backend_labels','checkbox',array(
			'options'=>array('1'=>'Create labels for model fields'),
			'single'=>TRUE,
		))->value('0');
		
		$this->element('text_backend_errors','checkbox',array(
			'options'=>array('1'=>'Create errors for all rules'),
			'single'=>TRUE,
		))->value('0');
		
		// BE languages
		$this->element('text_backend_language','checkbox',array(
			'label'=>'Backend text languages',
			'options'=>$this->_languages,
			'spacer'=>'<br />',
		));
		foreach($this->_languages as $language => $label){
			$this->element('text_backend_'.$language.'[name]','text',array('label'=>'Text Backend '.$label,'attributes'=>array('placeholder'=>'name')));
			$this->element('text_backend_'.$language.'[article]','text',array('attributes'=>array('placeholder'=>'the')));
			$this->element('text_backend_'.$language.'[single]','text',array('attributes'=>array('placeholder'=>'single')));
			$this->element('text_backend_'.$language.'[plural]','text',array('attributes'=>array('placeholder'=>'plural')));
			$this->element('text_backend_'.$language.'[this]','text',array('attributes'=>array('placeholder'=>'this')));
			$this->element('text_backend_'.$language.'[that]','text',array('attributes'=>array('placeholder'=>'that')));
			$this->element('text_backend_'.$language.'[new]','text',array('attributes'=>array('placeholder'=>'new')));
			$this->element('text_backend_'.$language.'[description]','text',array('attributes'=>array('placeholder'=>'description')));
		}
		// BE settings extends
		$this->element('settings_backend_extends','text',array('label'=>'Backend settings extends'))->value('item');
		$this->element('submit','submit',array('label'=>'submit'));
	}
}