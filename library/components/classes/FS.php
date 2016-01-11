<?php
class FS
{
	/**
	 * read files from a given (temp)path
	 *
	 * returns an array with filenames
	 * 
	 * @param string $path
	 * @param bool $fullPath return the full path
	 * @return string
	 */
	public static function files($path,$fullPath = FALSE)
	{
		$files = array();
		if(substr($path,-1) !== '/' && substr($path,-1) !== '\\' && substr($path,-1) !== DIRECTORY_SEPARATOR){
			$path = $path.DIRECTORY_SEPARATOR;
		}
		if ($handle = opendir($path)) {
		    while (false !== ($file = readdir($handle))) {
		        if (is_file($path.$file)) {
		        	if($fullPath === TRUE){
		        		$file = $path.$file;
	        		}
		            $files[]=$file;
		        }
		    }
		    closedir($handle);
		    return $files;
		} else {
			return FALSE;
		}
	}
	
	

	/**
	 * move a file (probably from temp to final destination
	 *
	 * @param string $source
	 * @param string $dest
	 */
	public static function move($source,$dest)
	{
		rename($source,$dest);
	}
	
	
	
	/**
	 * FS::permissions()
	 * chmod a file
	 * 
	 * @param string $file
	 * @param string $permissions
	 * @return boolean success
	 */
	public static function permissions($file,$permissions)
	{
		if(file_exists($file)){
			chmod($file,$permissions);
			return TRUE;
		} else {
			return FALSE;
		}
	}
	

	/**
	 * FS::delete()
	 * 
	 * @param string $file full path
	 * @return boolean success
	 */
	public static function delete($file)
	{	
		// remove file
		if(file_exists($file) && is_file($file)){
			unlink($file);
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
	
	
	/**
	 * FS::xcopy()
	 * copt tree from source to dest
	 * 
	 * @param mixed $source
	 * @param mixed $dest
	 * @return void
	 */
	public static function xcopy($source,$dest) { 
	    $dir = opendir($source); 
	    @mkdir($dest); 
	    while(false !== ( $file = readdir($dir)) ) { 
	        if (( $file != '.' ) && ( $file != '..' )) { 
	            if ( is_dir($source . '/' . $file) ) { 
	                self::xcopy($source . '/' . $file,$dest . '/' . $file); 
	            } else { 
	                copy($source . '/' . $file,$dest . '/' . $file); 
	            } 
	        } 
	    } 
	    closedir($dir); 
	} 
	



	/**
	 * FS::xdelete()
	 * remove tree
	 * 
	 * @param mixed $source
	 * @param mixed $dest
	 * @return void
	 */
	public static function xdelete($folder) { 
		if(is_dir($folder)){
		    $dir = opendir($folder); 
		    while(false !== ( $file = readdir($dir)) ) { 
		        if (( $file != '.' ) && ( $file != '..' )) { 
		            if ( is_dir($folder . '/' . $file) ) { 
		                self::xdelete($folder . '/' . $file); 
		            } else { 
		                unlink($folder . '/' . $file); 
		            } 
		        } 
		    }
		    closedir($dir); 
		    rmdir($folder);
	    } elseif(is_file($folder)) {
	    	unlink($folder);
    	}
	} 

	
	
	/**
	 * increment file id, or create file id, windows style
	 * 
	 * "file" will become "file(2)"
	 * "file(2)" will become "file(3)" etc.
	 *
	 * @return string
	 */
	public static function name_unique($name,$path)
	{
		$extension = FS::name_extension($name);
		$body = FS::name_body($name);

		while(file_exists($path.$name)){

			if(substr($body,-1) == ')'){
				
				// if the body ends in ')'
				// strip the trailing ')' and explode on '('
				$bodyParts = explode('(',substr($body,0,strlen($body)-1));
				
				if(is_numeric($bodyParts[count($bodyParts)-1])){
					
					// if the last part of the explode is numeric, it means
					// the last part was '('numeric')'
					// get the number as int
					$number = (int)$bodyParts[count($bodyParts)-1];
					// increment
					$number++;
					//remove last part of the name bodyparts
					array_pop($bodyParts);
					// stick it back on 
					// implode on '(' because we explode on '(' before
					// so this way we reinsert '(' elsewhere in the body name
					$body = implode('(',$bodyParts).'('.$number.')';
				} else {
					// last part was not (numeric)
					// just stick (2) on it
					$body = $body.'(2)';
				}
			} else {
				// last part was not (numeric)
				// just stick (2) on it
				$body = $body.'(2)';
			}
			
			// reassemble name
			$name = $body.'.'.$extension;
		}
		return $name;
	}
	

	/**
	 * strip unwanted chars
	 * @param string $name
	 * @return string
	 */
	public static function name_clean($name)
	{
		// strip unwanted
		return preg_replace('/[^a-zA-Z0-9\s\(\)\-\_\.\,]+/','',$name);
	}
	

	/**
	 * get extension of a given name
	 *
	 * @param string $name
	 * @return string
	 */
	public static function name_extension($name)
	{
		$nameParts = explode('.',$name);
		$extension = strtolower($nameParts[count($nameParts)-1]);
		return $extension;
	}
	
	

	/**
	 * get body of a filename
	 * for a filename: 'image(3).jpg' the body is 'image'
	 *
	 * @param unknown_type $name
	 * @return unknown
	 */
	public static function name_body($name)
	{
		$nameParts = explode('.',$name);
		//remove the extension
		array_pop($nameParts);
		// put it back together
		$nameBody = implode('.',$nameParts);
		// check for (integer) part
		if(substr($nameBody,-1) == ')'){	
			// if the namebody ends in ')'
			// strip the trailing ')' and explode on '('
			$nameBodyParts = explode('(',substr($nameBody,0,strlen($nameBody)-1));
			// if the last part is an integer
			if(is_numeric($nameBodyParts[count($nameBodyParts)-1])){

				//remove last part of the name bodyparts
				array_pop($nameBodyParts);
				
				// re-assemble body
				$nameBody = implode('(',$nameBodyParts);
				
				return $nameBody;
			} else {
				return $nameBody;
			}
		} else {
			return $nameBody;
		}		
	}
}