<?php
require_once 'config.php';

/**
* All methods to manage files and get data
*/
class Files
{

	/**
	 * Return files name from upload dir
	 */
	public function getFilesName()
	{
		$files = scandir(UPLOAD_DIR);
		unset($files[0],$files[1]);
		sort($files);
		if(!empty($files)){
			return $files;
		} else {
			return null;
		}
	}


	public function getFileMTime($filename)
	{
		$filemtime = filemtime(UPLOAD_DIR . $filename);
		return $filemtime;
	}

	public function getFileSize($filename)
	{
		$filesize = filesize(UPLOAD_DIR . $filename) * pow(10, -6);
		return $filesize;
	}

	public function getFilesData()
	{
		$filesdata = array();

		$files = $this->getFilesName();

		if(!empty($files)){
			foreach ($files as $file) {
				$filesdata[] = array(
					'filename' => $file,
					'filesize' => $this->getFileSize($file),
					'filemtime' => $this->getFileMTime($file)
				);
			}

			return $filesdata;
		} else {
			return null;
		}

	}

	public function getFilesDataBy($by = "mtime", $sort = SORT_ASC)
	{
		$orderedFiles = array();
		$fileInfo = array();

		$files = $this->getFilesData();
		if(!empty($files) && isset($by)){
			foreach ($files as $file => $row) {
				if($by == "name"){
					$orderedFiles[$file] = $row['filename'];
				} elseif ($by == "size") {
					$orderedFiles[$file] = $row['filesize'];
				} elseif ($by == "mtime") {
					$orderedFiles[$file] = $row['filemtime'];
				}
			}

			array_multisort($orderedFiles, $sort, $files);

			return $files;
		} else {
			return null;
		}
	}

	public function getFilesDataByMTime()
	{
		$orderedFiles = array();
		$fileInfo = array();

		$files = $this->getFilesData();
		if(!empty($files)){
			foreach ($files as $file => $row) {
				$orderedFiles[$file] = $row['filemtime'];
			}

			array_multisort($orderedFiles, SORT_DESC, $files);

			// foreach ($orderedFiles as $file) {
				
			// }
			return $files;
		} else {
			return "Aucun fichier";
		}
	}

	/**
	 * Return file infos from file name
	 */
	public function getFileData($fileName = null)
	{
		if(file_exists(UPLOAD_DIR . $fileName)){
			
			$filesize = filesize(UPLOAD_DIR . $fileName) * pow(10, -6);
			$filemtime = filemtime(UPLOAD_DIR . $fileName);
			
			$fileInfo = array(
					'filename' => $fileName,
					'filesize' => $filesize,
					'filemtime' => $filemtime
				);

			return $fileInfo;
		} else {
			return "Ce fichier n'existe pas";
		}
	}

	/**
	 * Upload a file to the upload dir with or without custom file name
	 */
	public function upload($files)
	{
		if(!is_null($files)){

		} else {
			return "Verifiez votre fichier";
		}
	}

}
?>