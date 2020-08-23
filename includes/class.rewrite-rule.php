<?php

namespace PerryRylance\WordPress\RESTCache;

class RewriteRule
{
	const GUID = "c8922699-19ff-4283-b638-377caf72cd5d";
	private $htaccessFilename;
	
	public function __construct()
	{
		$this->htaccessFilename = ABSPATH . ".htaccess";
		
		if(!$this->isPresent())
			$this->add();
	}
	
	public function isPresent()
	{
		$guid		= RewriteRule::GUID;
		
		return strpos(file_get_contents($this->htaccessFilename), "rest-cache-$guid") !== false;
	}
	
	public function remove()
	{
		if(!$this->isPresent())
			return;
		
		$htaccess	= file_get_contents($this->htaccessFilename);
		$guid		= RewriteRule::GUID;
		$regex		= "/# BEGIN rest-cache-$guid.+# END rest-cache-$guid\s*/ism";
		$htaccess	= preg_replace($regex, '', $htaccess);
		
		return file_put_contents($this->htaccessFilename, $htaccess);
	}
	
	public function add()
	{
		if($this->isPresent())
			return;
		
		$guid		= RewriteRule::GUID;
		$shim		= REST_CACHE_DIR_PATH . 'shim.php';
		$block		= "# BEGIN rest-cache-$guid
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_METHOD} ^GET [NC]
RewriteCond %{QUERY_STRING} !skip_cache
RewriteRule ^wp-json /wp-content/plugins/codecabin-rest-cache/shim.php [L]
</IfModule>
# END rest-cache-$guid";
		$htaccess	= file_get_contents($this->htaccessFilename);
		$htaccess	= $block . "\r\n\r\n" . $htaccess;
		
		file_put_contents($this->htaccessFilename, $htaccess);
	}
}