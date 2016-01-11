<?php
class Controller_File extends Controller_Base
{
	public function action_download()
	{
		$id = $this->request->param('id');
		$file = ORM::factory('File')
					->filter('status', Model_item::STATUS_LIVE)
					->load($id);
		
		if ($file->loaded() === true){
			$path = DOCROOT.'files/files/'.$file->file;
			$parts = explode('.',$path);
			$extension = strtolower($parts[count($parts)-1]);

			if(file_exists($path)) {
				header('Pragma: public');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Cache-Control: private', false); // required for certain browsers 
				header('Content-Type: application/'.$extension);
				header('Content-Disposition: attachment; filename="'. $file->file . '";');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: ' . filesize($path));
				readfile($path);
			}
		}
	}
}