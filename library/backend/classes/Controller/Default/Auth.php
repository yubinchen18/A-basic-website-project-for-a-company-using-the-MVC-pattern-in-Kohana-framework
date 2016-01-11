<?php
class Controller_Default_Auth extends Controller_Base
{

	/**
	 * init: check if user is logged in
	 * 
	 * if not: redirect to login
	 */
	public function init()
	{
		// call parent before first
		parent::init();
		
		// only check if the controller is not auth
		if(Request::initial()->controller() != 'Auth'){
			// url to loginpage
			$url = URL::to('Auth@login');

			// init identity
			$identity = Identity::instance();
			//revert identity to original user (maybe assume was called somewhere else)
			$identity->revert();
			

			// check authentication
			if(!$identity->authenticated()){
				// if user is not allready authenticated, redirect to login page
				$this->redirect($url);
			} else {
				$website = Website::instance();
				
				// else: initialise acl
				Acl::init($identity,new Model_Rights($website->websites()));
                
				// set current environment
				Acl::environment($website->id());

				// if user is not entitled to access backend
				if(!Acl::instance()->allowed('Backend','access')){
					$this->redirect($url);
				}

				// if user is not entitled to access controller
				if(!Acl::instance()->allowed(Request::initial()->controller(),'access')){
					$this->redirect($url);
				}
			}
		} 
	}
	
	
	/**
	 * do login
	 *
	 * @param string $username
	 * @param string $password
	 */
	public function action_login()
	{
		// create text
		$text = Text::instance();

		// create form
		$form = Form::factory('Login');
		$form->urls(array('submit'=>URL::to('Auth@login')));

		// check form
		$authenticated = false;
		$message = false;
		
		if($form->valid()){
			// get the values
			$values = $form->values();
			
			// create identity
			$identity = Identity::instance();
			
			// check if these are valid credentials
			$authenticated = $identity->authenticate($values['username'],$values['password']);
			
			// add error if not authenticated
			if($authenticated){
				// check if user is blocked
				if($identity->user && $identity->user->status==Model_User::STATUS_ACTIVE){
					
				} else {
					$identity->destroy();
					$authenticated = false;
					$message = $text->get('error.blocked');
				}
			} else {
				$message = $text->get('error.credentials');
			}
		}
		if($authenticated){
			// if ok, set flash message and redirect to default page
			
			// set message
			$message = array(
				'status'=>'success',
				'message'=>$text->get('message.success')
			);
			Session::instance('database')->set('message',$message);
			
			//redirect
			$url = URL::to('Default@redirect_website');

			$this->redirect($url);
		} else {
			// else show form
			$body = View::factory('login',
				array(
					'viewer'=>Viewer::factory('Form',$form)->text(Text::instance()),
					'message'=>$message,
					'text'=>$text
				)
			)->render();
			$this->response->body($body);
		}
	}
	
	
	/**
	 * do logout and redirect to login
	 */
	public function action_logout()
	{
		$identity = Identity::instance();
		$identity->destroy();
		$url = URL::to('Auth@login');
		$this->redirect($url,302);
	}
}