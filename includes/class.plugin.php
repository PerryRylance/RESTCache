<?php

namespace PerryRylance\WordPress\RESTCache;

use PerryRylance\WordPress\Plugin as Base;
use PerryRylance\DataTable;
use App\Tables\RecordsTable;

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
	
	public function isAdminPage()
	{
		return $_GET['page'] == 'rest-cache';
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
		include(REST_CACHE_DIR_PATH . 'service/public/index.php');
		
		wp_enqueue_script('jquery-ui');
		wp_enqueue_script('jquery-ui-tabs');
		
		wp_enqueue_style('jquery-ui-smoothness', REST_CACHE_DIR_URL . 'lib/jquery-ui.css');
		
		wp_enqueue_script(
			'datatables', 
			$this->getTranslatedScriptURL(DataTable::getLibraryScriptFilename()),
			array('jquery')
		);
		
		wp_enqueue_style(
			'datatables', 
			$this->getTranslatedScriptURL(DataTable::getLibraryStyleFilename())
		);
		
		wp_enqueue_script(
			'perry-rylance/datatable', 
			$this->getTranslatedScriptURL((new RecordsTable())->getScriptFilename()),
			array('datatables')
		);
		
		wp_enqueue_script('rest-cache-admin', REST_CACHE_DIR_URL . 'js/admin.js', array('jquery-ui-tabs'));
	}
	
	private function getTranslatedScriptURL($file)
	{
		$basename	= basename($file);
		$url		= plugin_dir_url($file) . $basename;
		
		return plugin_dir_url($file) . $basename;
	}
}

$restCachePlugin = new Plugin();
