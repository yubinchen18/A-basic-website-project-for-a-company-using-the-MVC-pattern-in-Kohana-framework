<?php
class Controller_Page extends Controller_Base
{
	public function action_view()
	{
		$uri = $this->request->detect_uri();
		if ($uri == '') {
				$this->redirect(URL::to('page@view:home'));
			}
		$id = $this->request->param('id');
		$query = $this->request->query();
		$username = $this->request->post('username');
		$password = $this->request->post('password');
		$login = $this->request->post('login');		
		$identity = Identity::instance();
		$info = ORM::factory('Page')
		->filter('alias', $id)
		->load();
		
		if ($info->loaded()) {
			
			//downloads
			if ($id == 'download') {
				$downloads = true;
			}
			
			//contact
			if ($id == 'contact') {
				$form = Form::factory('Contact');
				//$form = Form::
				if ($form->valid()) {
					//var_dump($form->values());
					$this->redirect(URL::to('page@view:contact').'?form=sent');
				}
			} else {
				$form = FALSE;
			}
			
			//login mechanism
			if (empty($username) && $login == 'Login') {
				$this->redirect(URL::current().'?auth=nameError');
			} elseif (empty($password) && $login == 'Login') {
				$this->redirect(URL::current().'?auth=false');
			} elseif (!empty($username) && !empty($password) && $login == 'Login') {			
				$auth = $identity->authenticate($username, $password);
				if ($auth) {
					$this->redirect(URL::current());
				} else {
					$this->redirect(URL::current().'?auth=false');
				}
			}
			
			//logout mechanism
			if ($login == 'Logout') {
				$identity->destroy();
				$this->redirect(URL::current());
			}
			
			$view = View::factory('page/item', array(
				'item' => Viewer::factory($info),
				'form' => $form,
				'query' => $query,
				'downloads' => isset($downloads)? $downloads: null
				//'post' => $post
			));
			$this->response->body($view->render());
		} else {
			throw HTTP_Exception::factory(404, 'Page not found');
		}

	}
}