<?php

namespace App\Tables;

use PerryRylance\DataTable;

class RulesTable extends DataTable
{
	public function __construct($request=null)
	{
		DataTable::__construct($request);
	}
	
	public function getTableName()
	{
		return "rest_cache_rules";
	}
	
	public function getRoute()
	{
		// TODO: Move this to a parent class, in the very least make a prefix function
		// TODO: Remove plugins_url - use Laravel instead
		$prefix = plugins_url('', public_path()) . '/public/api';
		return "$prefix/rules";
	}
}
