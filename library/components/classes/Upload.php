<?php
class Upload
{
	
	/**
	 * upload to designated (temp)path
	 * only allow allowedExtensions
	 * 
	 * Create folder in path with path/hash
	 * if succesful files were found, return the hash. If not, return false
	 *
	 * @param string $id file id in $_FILES
 	 * @param string $path $destionation path
	 * @param mixed $limitExtensions only alolow these extenions, false for all
	 * @return boolean $unzip auto unpack zips
	 */
	public static function process($id,$path,$allowedExtensions=false,$unzip=true)
	{
		if(!isset($_FILES[$id]) || empty($_FILES[$id]) || !isset($_FILES[$id]['name'])){
			return false;
		}

		$hash = self::create_hash('upload_');
		
		// create temp dir
		$hashPath = $path.$hash.DIRECTORY_SEPARATOR;
		mkdir($hashPath,0777);
		
		$valid = false;
		if(is_array($_FILES[$id]['name'])){
			for($i=0;$i<count($_FILES[$id]['name']);$i++){
				if($_FILES[$id]['error'][$i] == 0){
					if($_FILES[$id]['name'][$i] != '' && self::process_file($_FILES[$id]['name'][$i],$_FILES[$id]['tmp_name'][$i],$hashPath,$allowedExtensions,$unzip)){
						$valid = true;
					}
				} else {
					if($_FILES[$id]['error'][$i] != UPLOAD_ERR_NO_FILE){
						Kohana::$log->add(Log::ERROR,'Uploaded file :file failed with upload error :error',array(':file'=>$_FILES[$id]['name'][$i],':error'=>$_FILES[$id]['error'][$i]));
					}
				}
			}
		} else {
			if($_FILES[$id]['error'] == 0){
				if($_FILES[$id]['name'] != '' && self::process_file($_FILES[$id]['name'],$_FILES[$id]['tmp_name'],$hashPath,$allowedExtensions,$unzip)){
					$valid = true;
				}
			} else {
				if($_FILES[$id]['error'] != UPLOAD_ERR_NO_FILE){
					Kohana::$log->add(Log::ERROR,'Uploaded file :file failed with upload error :error',array(':file'=>$_FILES[$id]['name'],':error'=>$_FILES[$id]['error']));
				}
			}
		}
		
		if($valid){
			return $hash;
		} else {
			return false;
		}
	}
	
	

	
	/**
	 * upload a single file to $path.
	 * If a zip is encountered, it will be unpacked in $path/zip_[hash].
	 * Valid files will be copied to $path.
	 * Filenames will be lowercased , with only _ allowed for spaces
	 * If files allready exist, append filename with (2)
	 * 
	 *
	 * @param string $name
	 * @param string $tempName
	 * @param string $path
	 * @param array $allowedExtensions
	 * @return bool 
	 */
	public static function process_file($name,$file,$path,$allowedExtensions=false,$unzip=true)
	{		

		
		// sanatize name
		$name = FS::name_clean($name);
		
		// get extension
		$extension = FS::name_extension($name);
				
		if(($unzip == true && $extension == 'zip') || (is_array($allowedExtensions) && in_array($extension,$allowedExtensions) ) || $allowedExtensions===$extension || $allowedExtensions===false ){
			
			
			if($extension == 'zip' && $unzip==true) {
				$hash = self::create_hash('zip_');
				$zipPath = $path.$hash.DIRECTORY_SEPARATOR;
				mkdir($zipPath,0777);
				
				// unzip into temp folder
				$unzippedFilesData = Zip::unzip($file,$zipPath);

				// go through unpacked files
				$valid = false;
				foreach($unzippedFilesData as $unzippedFileData){
					$unzippedFileName = $unzippedFileData['name'];
					$unzippedFile = $unzippedFileData['file'];
					
					// **RECURSIVE CALL ** 
					// start uploading process again, but from temp zip location
					if(self::process_file($unzippedFileName,$unzippedFile,$path,$allowedExtensions)){
						$valid = true;
					}
				}
				return $valid;
			} else {
				// undouble name in the temp dir
				$name = FS::name_unique($name,$path);
				
				if(is_uploaded_file($file)){
					//move the uploadedfile to the temp dir
					move_uploaded_file($file,$path.$name);
				} else {
					//move the unzipped to the temp dir
					rename($file,$path.$name);
				}
				// success!
				return true;
			}
		} else {
			return false;
		}
	}
	
	
	/**
	 * create a random unique hash with an optional prefix
	 *
	 * @param string $prefix
	 * @return string
	 */
	public static function create_hash($prefix='')
	{
		$hash = $prefix.md5(microtime(true).rand(0,100000));
		return $hash;
	}
	
}