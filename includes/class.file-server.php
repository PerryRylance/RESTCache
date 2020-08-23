<?php

namespace PerryRylance\WordPress\RESTCache;

require_once(__DIR__ . '/class.file-cache.php');

class FileServer extends FileCache
{
	public function __construct()
	{
		
	}
	
	protected function array_map_recursive($function, &$data)
	{
		foreach ($data as $i => $item)
			$data[$i] = is_array($item) ? $this->array_map_recursive($function, $item) : $function($item);
		
		return $data;
	}
	
	public function isServingCurrentURI()
	{
		$uri	= $this->getURI();
		$hash	= md5($uri);
		$file	= $this->getRecordFile($hash);
		
		if(!is_file($file))
			return false;
		
		// TODO: Rest if URI is allowed
		
		return true;
	}
	
	public function serve()
	{
		$uri	= $this->getURI();
		$hash	= md5($uri);
		$file	= $this->getRecordFile($hash);
		
		// Send file
		header("Content-type: application/json; charset=UTF-8");
		header("X-Robots-Tag: noindex");
		header("X-Content-Type-Options: nosniff");
		header("X-Served-By: rest-cache");
		
		// TODO: Send expiry time
		
		readfile($file);
		
		exit;
	}
}
