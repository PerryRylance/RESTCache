<?php

namespace App\Tables;

use Illuminate\Support\Facades\DB;
use PerryRylance\DataTable;

class RulesTable extends DataTable
{
	const ID_PLACEHOLDER = '__3d29cb658e258833084dbbe854d44efc';
	
	public function __construct($request=null)
	{
		DataTable::__construct($request);
	}
	
	protected function getColumns()
	{
		$id_placeholder = RulesTable::ID_PLACEHOLDER;
		
		$columns = Parent::getColumns();
		
		$columns['actions'] = [
			'caption'	=> 'actions',
			'type'		=> 'text',
			'sql'		=> DB::raw('
				REPLACE(CONCAT(\'
						<div class="codecabin-rest-cache-action-buttons">
							<button class="button button-secondary"
								title="Remove" 
								data-delete-rule-id="' . $id_placeholder . '">
								<i class="fas fa-trash-alt"></i>
							</button>
						</div>
					\'),
					"' . $id_placeholder . '",
					id
				) AS actions
			')
		];
		
		return $columns;
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
