<?php

namespace PerryRylance\WordPress\RESTCache;

class FileCache
{
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
		if(!(strlen($hash) == 32 && ctype_xdigit($hash)))
			throw new \Exception("Argument must be an MD5 hash");
		
		return $this->getRecordFolder() . "/$hash.json";
	}
	
	protected function getExpiryInterval()
	{
		// TODO: Implement
		return "1 DAY";
	}
	
	public function isURIAllowed($uri)
	{
		// TODO: Implement
		return true;
	}
}