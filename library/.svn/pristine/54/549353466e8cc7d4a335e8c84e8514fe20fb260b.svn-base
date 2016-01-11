<?php
class Controller_Manager extends Controller_Base
{
	
	public function init()
	{
		parent::init();
		
	}
	
	public function action_index()
	{
		echo HTML::anchor(URL::to('Manager@create'),'Create a module').'<br />';
	}
	
	
	public function action_create()
	{
		$form = Form::factory('module');
		$languages = array(
			'nl'=>'Dutch',
			'en'=>'English',
			'de'=>'German',
			'fr'=>'French',
			'es'=>'Spanish'
		);
		
		$form->languages($languages);
		
		if($form->valid()){
			$this->response->body('done');
			$name = ucfirst($form->value('name'));
			$file = ucfirst($form->value('name')).'.php';
			$values = $_POST;
			$generate = $values['generate'];
			$create = array();
			
			
			// FRONTEND CONTROLLER
			if(in_array('controller_frontend',$generate)){
				$content = "<?php\n".View::factory('manager/file/controller_frontend',array(
					'name'=>$name,
					'extends'=>isset($values['controller_frontend_extends']) ? ucfirst($values['controller_frontend_extends']) : 'Controller'
				))->render();
				
				$create[]=array(
					'path'=> FRONTENDPATH.'classes/Controller/'.$file,
					'content'=>$content
				);	
			}
			
			// FRONTEND SETTINGS
			if(in_array('settings_frontend',$generate)){
				$content = "<?php\n".View::factory('manager/file/settings_frontend',array(
					'extends'=>isset($values['settings_frontend_extends']) ? strtolower($values['settings_frontend_extends']) : FALSE
				))->render();

				$create[]=array(
					'path'=> FRONTENDPATH.'settings/'.strtolower($file),
					'content'=>$content
				);	
			}
			
			// FRONTEND TEXT
			if(in_array('text_frontend',$generate)){
				foreach($languages as $language => $label){
					if(in_array($language,$values['text_frontend_language'])){
						$content = "<?php\n".View::factory('manager/file/text_frontend',array(
							'text'=>$values['text_frontend_'.$language],
							'extends'=>isset($values['text_frontend_extends']) ? strtolower($values['text_frontend_extends']) : FALSE
						))->render();
						
						$create[]=array(
							'path'=> FRONTENDPATH.'text/'.strtolower($language).'/'.strtolower($file),
							'content'=>$content
						);	
					}
				}
			}
			
			// BACKEND CONTROLLER
			if(in_array('controller_backend',$generate)){
				$content = "<?php\n".View::factory('manager/file/controller_backend',array(
					'name'=>$name,
					'extends'=>isset($values['controller_backend_extends']) ? ucfirst($values['controller_backend_extends']) : 'Controller_Module'
				))->render();
				
				$create[]=array(
					'path'=> BACKENDPATH.'classes/Controller/'.$file,
					'content'=>$content
				);	
			}

			// BACKEND SETTINGS
			if(in_array('settings_backend',$generate)){
				$content = "<?php\n".View::factory('manager/file/settings_backend',array(
					'extends'=>isset($values['settings_backend_extends']) ? strtolower($values['settings_backend_extends']) : FALSE
				))->render();

				$create[]=array(
					'path'=> BACKENDPATH.'settings/'.strtolower($file),
					'content'=>$content
				);	
			}
			
			// BACKEND TEXT
			if(in_array('text_backend',$generate)){
				foreach($languages as $language => $label){
					if(in_array($language,$values['text_backend_language'])){
						
						$content = "<?php\n".View::factory('manager/file/text_backend',array(
							'text'=>$values['text_backend_'.$language],
							'labels'=>isset($values['text_backend_labels']) && $values['text_backend_labels'] == '1',
							'errors'=>isset($values['text_backend_errors']) && $values['text_backend_errors'] == '1',
							'fields'=>$values['model_fields'],
							'belongs'=>$values['model_belongs'],
							'collections'=>$values['model_collections'],
							'extends'=>isset($values['text_backend_extends']) ? strtolower($values['text_backend_extends']) : FALSE
						))->render();
						
						$create[]=array(
							'path'=> BACKENDPATH.'text/'.strtolower($language).'/'.strtolower($file),
							'content'=>$content
						);
					}
				}
			}
			
			// BACKEND FORM 
			if(in_array('form',$generate)){
				$content = "<?php\n".View::factory('manager/file/form',array(
					'name'=>$name,
					'buttons'=>isset($values['form_buttons']) ? $values['form_buttons'] : array(),
					'title'=>isset($values['form_title']) &&$values['form_title'] == '1',
					'alias'=>isset($values['form_alias']) &&$values['form_alias'] == '1',
					'seo'=>isset($values['form_seo']) &&$values['form_seo'] == '1',
					'fields'=>isset($values['form_fields']) && $values['form_fields'] == '1' ? $values['model_fields'] : array(),
					'collections'=>isset($values['form_collections']) && $values['form_collections'] == '1' ? $values['model_collections'] : array(),
					'belongs'=>isset($values['form_belongs']) && $values['form_belongs'] == '1' ? $values['model_belongs'] : array(),
					'extends'=>isset($values['form_extends']) ? ucfirst($values['form_extends']) : 'Form_Base'
				))->render();

				$create[]=array(
					'path'=> BACKENDPATH.'classes/Form/'.$file,
					'content'=>$content
				);
			}

			// MODEL 
			if(in_array('model',$generate)){
				$content = "<?php\n".View::factory('manager/file/model',array(
					'name'=>$name,
					'extends'=>isset($values['model_extends']) ? ucfirst($values['model_extends']) : 'Model_Base',
					'table'=>$values['model_table'],
					'parent'=>isset($values['model_parent']) && $values['model_parent'] =='1',
					'item_fields'=>isset($values['model_item_fields']) && $values['model_item_fields'] =='1',
					'fields'=>$values['model_fields'],
					'meta'=>isset($values['model_meta']) && $values['model_meta'] =='1',
					'belongs'=>$values['model_belongs'],
					'collections'=>$values['model_collections'],
					'sortable'=>isset($values['model_sortable']) && $values['model_sortable'] =='1',
				))->render();

				$create[]=array(
					'path'=> COMMONPATH.'classes/Model/'.$file,
					'content'=>$content
				);
			}
			
			// COLLECTION MODEL
			if(in_array('collection',$generate)){
				$content = "<?php\n".View::factory('manager/file/model_collection',array(
					'name'=>$name,
					'table'=>$values['model_table'],
				))->render();

				$create[]=array(
					'path'=> COMMONPATH.'classes/Model/Collection/'.$file,
					'content'=>$content
				);
			}
			
			// TABLE
			if(in_array('table',$generate)){
				$content = View::factory('manager/file/table',array(
					'overwrite'=>isset($values['overwrite']) && in_array('tables', $values['overwrite']),
					'table'=>$values['model_table'],
					'parent'=>isset($values['model_parent']) && $values['model_parent'] =='1',
					'item_fields'=>isset($values['model_item_fields']) && $values['model_item_fields'] =='1',
					'fields'=>$values['model_fields'],
					'meta'=>isset($values['model_meta']) && $values['model_meta'] =='1',
					'belongs'=>$values['model_belongs'],
					'collections'=>$values['model_collections']
				))->render();

				$create[]=array(
					'path'=> 'database',
					'content'=>$content
				);
			}
					
			// COLLECTION TABLE
			if(in_array('collection_table',$generate)){
				$content = View::factory('manager/file/table_collection',array(
					'overwrite'=>isset($values['overwrite']) && in_array('tables', $values['overwrite']),
					'table'=>$values['model_table'],
				))->render();

				$create[]=array(
					'path'=> 'database',
					'content'=>$content
				);
			}
			
			
			// EXECUTE
			$body = '';
			foreach($create as $item){
				if($item['path']=='database'){
					$body .= 'Query is executed:<br />';
					$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
					DB::query(NULL,$item['content'])->execute();
				} else {
					if(file_exists($item['path'])){
						if(isset($values['overwrite']) && in_array('files', $values['overwrite'])){
							$body .= 'File is OVERWRITEN: '.$item['path'].'<br />';
							$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
							file_put_contents($item['path'],$item['content']);
						} else {
							$body .= 'File EXISTS: '.$item['path'].'<br />';
						}
					} else {
						$body .= 'File is writen: '.$item['path'].'<br />';
						$body .= nl2br(htmlspecialchars($item['content'])).'<br />';
						file_put_contents($item['path'],$item['content']);
					}
				}
			}
			$body .= <<<YUNA
<br />
<br />
---------------------------------===================<br />
Volgende stappen: <br />
1. Module toevoegen aan application/backend/settings/modules.php<br />
3. Module toevoegen aan application/backend/settings/navigation.php<br />
3. Module toevoegen aan application/common/Model/Rights.php<br />
YUNA;
			$this->response->body($body);
		} else {
			$this->response->body(View::factory('manager/module',array('form'=>$form))->render());
		}
	}
}
