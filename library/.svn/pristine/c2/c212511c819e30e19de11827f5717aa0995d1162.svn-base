<?php
class Controller_Default_Image extends Controller_File
{

	public function init()
	{	
		parent::init();
		// set default url for images
		call_user_func_array(
			array('Model_'.$this->_settings->get('model'),'url_default'),
			array(Kohana::$base_url.$this->_settings->get('url_images'))
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
		Event::listen($this,Event::BEFORE_STORE,array($this,'handle_image_before_store'));
		Event::listen($this,Event::AFTER_DELETE,array($this,'handle_image_after_delete'));
	}
	
	
	/**
	 * Recreate images for a certain size
	 */
	public function action_recreate()
	{
		ini_set('max_execution_time',3600);
		// check if allowed
		if(!Acl::instance()->allowed($this->_controller,'recreate')){
			throw HTTP_Exception::factory(403, 'Not allowed to recreate images');
		}
		// get size
		$size = $this->request->param('id',FALSE);
		if($size !== FALSE){
			// get settings
			if($settings = $this->_settings->get('sizes.'.$size,FALSE)){
				// get all images
				$images = ORM::factory($this->_controller)->find_all();
				foreach($images as $image){
					// check if the original exists
					if(file_exists($this->_settings->get('path_files').$image->file) && is_file($this->_settings->get('path_files').$image->file)){
						// delete the requested size
						FS::delete($this->_settings->get('path_images').$size.DIRECTORY_SEPARATOR.$image->file);
						// get existing sizes
						$sizes = $image->sizes;
						// unset this size
						unset($sizes[$size]);
						
						// recreate the wanted size
						try{
							$image->create_sizes(
								$this->_settings->get('path_files').$image->file,
								array($size=>$settings),
								$this->_settings->get('path_images')
							);
							// merge the original sizes and the newly created
							$sizes = array_merge($sizes,$image->sizes);
							// save these sizes
							$image->sizes = $sizes;
							$image->save();
							//some feedback
							echo 'recreated '.$image->file.' in size: '.$size.'<br />';
						} catch(Exception $e){
							
						}
					}
				}
			}
		}
	}
	
	
	/**
	 * Popup launched from wysiwyg to embed an image
	 * @return void
	 */
	public function action_embed()
	{
		$id = $this->request->param('id',0);
		$sizes = $this->_settings->get('sizes_embed');
		
		if($id > 0) {
			// get size from qs
			$size = $this->param('param1');
		} else {
			// get first size
			$size = $sizes[0];
		}
		
		// create form
		$form = Form::factory($this->_settings->get('form_embed'));
		// set urls
		$form->urls(array(
			'submit'=>URL::to($this->request->controller().'@embed:'.$id,array('query'=>'after=embed')),
			'submit_back'=>URL::to($this->request->controller().'@embed:'.$id,array('query'=>'after=close')),
			'back'=>URL::to($this->request->controller().'@close'),
		));
		// set vars in from
		$form->controller($this->request->controller());
		$form->sizes($sizes);
		
		// populate form
		$form->value('id',$id);
		$form->value('size',$size);
		
		// proces form
		if($form->valid()){
			$data = $form->values();
			// get the image model
			$model = ORM::factory($this->_settings->get('model'),$data['id']);
			// get actual base url for the current website
			$base_url = Website::instance()->base_url($this->_website,Kohana::$base_url).$this->_settings->get('url_images');
			// get the source
			$data['src'] = $model->src($data['size'],$base_url);
			// check if it can be enlarged
			$data['enlarge'] = $model->size($this->_settings->get('size_enlarge'))===FALSE?'0':'1';
			// get callback
			$callback = $this->request->param('callback','');
			// render close dialog
			$view = View::factory($this->_settings->get('view.close'),array('data'=>$data,'callback'=>$callback));
			$this->response->body($view->render());
		} else {
			// create view
			$viewer = Viewer::factory('Form',$form)->text(Text::instance());
			$view = View::factory($this->_settings->get('view.update'),array('viewer'=>$viewer));
			$this->response->body($view->render());
		}
	}
	
	
	//-------------------------------
	// HOOKS
	//-------------------------------
	
	/**
	 * process before creation
	 */
	public function handle_image_before_store($data)
	{
		// process images
		$data->model->create_sizes(
			$this->_settings->get('path_files').$data->model->file, 
			$this->_settings->get('sizes'),
			$this->_settings->get('path_images')
		);
	}
	
	
	/**
	 * delete files after item deletion
	 */
	public function handle_image_after_delete($data)
	{
		$model = $data->deleted;

		// delete sizes
		$model->delete_sizes($this->_settings->get('path_images'));
	}
}