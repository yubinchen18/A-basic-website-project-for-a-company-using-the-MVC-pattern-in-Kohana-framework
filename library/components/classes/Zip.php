<?php
class Zip
{
	/**
	 * unzip a file
	 *
	 * @param string $file
	 * @param string $path
	 */
	public static function unzip($file,$path)
	{
		// array to return
		$unzippedFilesData = array();
		
		// open zip
		$zip = zip_open($file);
		
		// check if valid zip
		if (is_resource($zip)){
			// loop through entries
			while ($entry = zip_read($zip)){
				// create dirs if not existing
				if(!file_exists($path.dirname(zip_entry_name($entry)))){
					mkdir($path.dirname(zip_entry_name($entry)),0777);
				}

				
				// checkif it is a file (check for bytesize > 100)
            	if(zip_entry_filesize($entry) > 100){
            		// open entry
	            	if (zip_entry_open($zip,$entry,"r")){
	            		// store info about the file
	            		$unzippedFilesData[]= array(
	            			"name"=>basename(zip_entry_name($entry)),
	            			"file"=>$path.zip_entry_name($entry)
	            		);
	            		// get the data
						$data = zip_entry_read($entry, zip_entry_filesize($entry));
						// save it as a file
						$file = fopen($path.zip_entry_name($entry),"w+");
						fwrite($file,$data);
						// close the file
						fclose($file);
						// close the entry
						zip_entry_close($entry);
					}
				}
			}
		}
		// close the zip
		zip_close($zip);
		
		// return the info
		return $unzippedFilesData;
	}
}