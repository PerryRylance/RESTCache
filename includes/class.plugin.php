<?php

namespace PerryRylance\WordPress\RESTCache;

use PerryRylance\WordPress\Plugin as Base;
use PerryRylance\WordPress\JsonOption;
use PerryRylance\DataTable;
use App\Tables\RecordsTable;

require_once(REST_CACHE_DIR_PATH . 'includes/class.rewrite-rule.php');
require_once(REST_CACHE_DIR_PATH . 'includes/class.file-cache.php');
require_once(REST_CACHE_DIR_PATH . 'includes/class.file-server.php');
require_once(REST_CACHE_DIR_PATH . 'includes/class.file-storer.php');

class Plugin extends Base
{
	private $_settings;
	private $_rewriteRule;
	
	public function __construct()
	{
		Base::__construct();
		
		$this->_rewriteRule = new RewriteRule();
		$this->_fileStorer = new FileStorer();
		
		add_action('init', array($this, 'onInit'));
		
		if(!$this->_rewriteRule->isPresent())
			add_action('admin_notices', array($this, 'onRewriteRuleNotice'));
		else
			add_filter('rest_post_dispatch', array($this, 'onRESTPostDispatch'), 10, 3);
	}
	
	public function __get($name)
	{
		switch($name)
		{
			case "settings":
				return $this->{"_$name"};
				break;
		}
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
		return isset($_GET['page']) && $_GET['page'] == 'rest-cache';
	}
	
	public function onInit()
	{
		if(!$this->isAdminPage())
			return;
		
		$this->settings = new JsonOption("rest-cache-settings");
		
		$this->setAuthCookie();
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
		
		wp_enqueue_style('jquery-ui', REST_CACHE_DIR_URL . 'lib/jquery-ui.css');
		wp_enqueue_style('jquery-ui-redmond', REST_CACHE_DIR_URL . 'lib/theme.css');
		
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
		
		wp_enqueue_style('fontawesome5', REST_CACHE_DIR_URL . "lib/fontawesome/css/all.css");
		
		wp_enqueue_style('rest-cache-admin', REST_CACHE_DIR_URL . 'css/admin.css');
		
		// wp_enqueue_script('rest-cache-admin', REST_CACHE_DIR_URL . 'js/dist/main.js', array('jquery-ui-tabs'));
		wp_enqueue_script('rest-cache-admin', REST_CACHE_DIR_URL . 'js/dist/entry.js', array('jquery-ui-tabs'));
	}
	
	private function setAuthCookie()
	{
		$user		= get_current_user_id();
		$salt		= bin2hex( openssl_random_pseudo_bytes(64) );
		$key		= bin2hex( openssl_random_pseudo_bytes(64) );
		$hash		= hash('sha256', $salt . $key);
		
		update_user_meta(
			get_current_user_id(),
			'rest-cache-admin-salt',
			$salt
		);
		
		update_user_meta(
			get_current_user_id(),
			'rest-cache-admin-hash',
			$hash
		);
		
		setcookie("rest-cache-admin-key", $key, time() + 60 * 60 * 24, "/");
		$_COOKIE["rest-cache-admin-key"] = $key;
	}
	
	private function getTranslatedScriptURL($file)
	{
		$basename	= basename($file);
		$url		= plugin_dir_url($file) . $basename;
		
		return plugin_dir_url($file) . $basename;
	}
	
	public function onDeactivate()
	{
		$this->_rewriteRule->remove();
	}
	
	public function onRewriteRuleNotice()
	{
		?>
		<div class="notice notice-error">
			<p>
				<i class="fas fa-hand-paper"></i>
			
				<strong>
					<?php
					_e('REST Cache:', 'rest-cache');
					?>
				</strong>
				<?php
				_e('We couldn\'t find the REST Cache redirect rules in your .htaccess file. Please try de-activating and re-activating the plugin', 'rest-cache');
				?>
			</p>
		</div>
		<?php
	}
	
	public function onRESTPostDispatch(\WP_REST_Response $result, \WP_REST_Server $server, \WP_REST_Request $request)
	{
		if(defined('WP_DEBUG') && function_exists('xdebug_disable'))
			xdebug_disable();
		
		$fileStorer = new FileStorer();
		
		if($fileStorer->isStoringRequest($request))
			$fileStorer->store($result);
		
		return $result;
	}
}

$restCachePlugin = new Plugin();
