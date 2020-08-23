<?php

namespace PerryRylance\WordPress\RESTCache;

class FileServer
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
	
	protected function getURI()
	{
		$uri	= $_SERVER['REQUEST_URI'];
		
		if(!empty($_GET))
		{
			$arr = array_merge(array(), $_GET);
			
			$this->array_map_recursive('stripslashes', $arr);
			
			$uri .= "?" . http_build_query($arr);
		}
		
		return $uri;
	}
	
	protected function getRecordFolder()
	{
		if(!defined('ABSPATH'))
			$uploads_dir 	= '../../uploads';
		else
			$uploads_dir	= wp_upload_dir()['basedir'];
		
		$cache_dir			= "$uploads_dir/rest-cache";
		
		return $cache_dir;
	}
	
	protected function getRecordFile($hash)
	{
		return $this->getRecordFolder() . "/$hash.json";
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
		header("X-Robots-Tag", "noindex");
		header("X-Content-Type-Options", "nosniff");
		
		readfile($file);
	}
}
