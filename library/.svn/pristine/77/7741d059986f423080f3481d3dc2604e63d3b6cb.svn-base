<?php
class Controller_Default_File extends Controller_Item
{
	

	public function init()
	{	
		parent::init();
		// set the correct url to the files
		call_user_func_array(
			array('Model_'.$this->_settings->get('model'),'url_default'),
			array(Kohana::$base_url.$this->_settings->get('url_files'))
		);
	}

	
	/**
	 * Controller_Default_File::listeners()
	 * set listeners
	 * 
	 * @return void
	 */
	protected function listeners()
	{
		parent::listeners();
		Event::listen($this,Event::AFTER_DELETE,array($this,'handle_file_after_delete'));
	}
	

	/**
	 * try to upload item(s)
	 * if succeeded, redirect to meta form
	 */
	public function action_create()
	{
		// create form
		$form = Form::factory($this->_settings->get('form_upload'));
		// default urls
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@create'),
			'back'=>URL::to($this->request->controller()),
		));
		// parse upload
		if($hash = $this->create(NULL,$form)){
			$this->redirect(URL::to($this->request->controller().'@store:'.$hash));
		} 
	}

	
	/**
	 * create items
	 */
	public function action_store()
	{
		// get the hash of the temp dir
		$hash = $this->request->param('id');
		// create a form
		$form = Form::factory($this->_settings->get('form_store'));
		//  urls
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@store:'.$hash),
			'back'=>URL::to($this->request->controller()),
		));
		
		Event::raise($this,Event::AFTER_STORE_FORM,array('form'=>$form));
		
		// store them
		if($this->store($form,$hash)){
			$this->redirect_done('uploaded');
		}
	}
	

	//-------------------------------
	// HELPERS
	//-------------------------------
	
	/**
	 * upload files
	 */
	protected function create($model,$form)
	{
		// check rights
		if(!Acl::instance()->allowed($this->_controller,'create')){
			throw HTTP_Exception::factory(403,'Create not allowed on :controller',array(
				':controller'=>$this->_controller
			));
		}
		$hash = FALSE;
		
		Event::raise($this,Event::BEFORE_CREATE_FORM_PARSE,array('model'=>NULL,'form'=>$form));
		
		if($form->valid()){
			$hash = Upload::process(
				'file',
				$this->_settings->get('path_temp'),
				$this->_settings->get('extensions'),
				$this->_settings->get('unzip')
			);
		}
	
		if($hash !== FALSE){
			return $hash;
		} else {
			if($form->submitted()){
				// set error in form
				$form->element('file',0)->error('not_empty');
			}
			// create viewer
			$viewer = Viewer::factory('Form',$form)->text(Text::instance());
			// render form
			$view = View::factory($this->_settings->get('view.create'),array('viewer'=>$viewer));
			// event
			Event::raise($this,Event::BEFORE_CREATE_RENDER,array('model'=>NULL,'form'=>$form,'viewer'=>$viewer,'view'=>$view));
			// render
			$this->response->body($view->render());
			return FALSE;
		}
	}
	
	
	/**
	 * create files in db
	 */
	protected function store($form,$hash)
	{
		// get files in the temp/hash dir
		$files = FS::files($this->_settings->get('path_temp').$hash.DIRECTORY_SEPARATOR);

		// set the files in the form
		$form->files($files);
		
		Event::raise($this,Event::BEFORE_STORE_FORM_PARSE,array('form'=>$form));
		
		if($form->valid()){
			
			// get the hash of the temp dir from qs
			$hash = $this->request->param('id');
			// get the form values
			$values = $form->values();

			// loop through temp files
			for($i=0;$i<count($files);$i++){	
				// createmodel 
				$model = ORM::factory($this->_settings->get('model'));
				// set group if one is active
				if($group = $this->_state->get('group',FALSE) ){
					$model->group_id = $group;
				}
				// undouble filename
				$file = FS::name_unique($files[$i],$this->_settings->get('path_files'));
				// store it
				FS::move($this->_settings->get('path_temp').$hash.DIRECTORY_SEPARATOR.$files[$i],$this->_settings->get('path_files').$file);
				// permissions		
				FS::permissions($this->_settings->get('path_files').$file,0744);
				
				// set item properties
				$model->created = date('y-m-d H:i:s',time());
				$model->owner_id = Identity::instance()->id;
				$model->editor_id = Identity::instance()->id;
				$model->website_id = $this->_website;
			
				// set file
				$model->file = $file;

				// set additional info (mostly title)
				foreach($values as $key => $value){
					if(is_array($value) && isset($value[$i])){
						$model->{$key} = $value[$i];
					}
				}
				// call hook
				Event::raise($this,Event::BEFORE_STORE,array('model'=>$model,'form'=>$form));

				//save
				$model->save();
				
				// call hook
				Event::raise($this,Event::AFTER_STORE,array('model'=>$model,'form'=>$form));
			}
			// return true
			return TRUE;
		} else {
			// create viewer
			$viewer = Viewer::factory('Form',$form)->text(Text::instance());
			// render form
			$view = View::factory($this->_settings->get('view.create'),array('viewer'=>$viewer));
			// event
			Event::raise($this,Event::BEFORE_STORE_RENDER,array('model'=>NULL,'form'=>$form,'viewer'=>$viewer,'view'=>$view));
			// render
			$this->response->body($view->render());
			// return false
			return FALSE;
		}
	}
	
	
	//-------------------------------
	// HOOKS
	//-------------------------------
	/**
	 * delete files prior to item deletion
	 */
	public function handle_file_after_delete($data)
	{
		$model = $data->deleted;
		// get file
		$file = $this->_settings->get('path_files').$model->file;

		// delete it
		FS::delete($file);
		
	}
}