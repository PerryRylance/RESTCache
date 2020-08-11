<?php

namespace PerryRylance\WordPress\RESTCache;

use \PerryRylance\WordPress\Plugin as Base;

class Plugin extends Base
{
	public function __construct()
	{
		Base::__construct();
	}
	
	public function getPluginSlug()
	{
		return "rest-cache";
	}
	
	public function getPluginDirPath()
	{
		return plugin_dir_path(__DIR__);
	}
	
	public function onAdminMenu()
	{
		add_menu_page(
			"REST Cache", 
			__("REST Cache", 'rest-cache'), 
			"manage_options", 
			"rest-cache", 
			array($this, 'onAdminPage'),
			'dashicons-performance'
		);
	}
	
	public function onAdminPage()
	{
		include(plugin_dir_path(__DIR__) . 'service/public/index.php');
	}
}

$restCachePlugin = new Plugin();
