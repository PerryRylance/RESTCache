<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables\RulesTable;
use App\Models\Rule;

class RuleController extends TableController
{
	protected function getModelClass()
	{
		return Rule;
	}
	
	public function index(Request $request)
	{
		$table = new RulesTable($request);
		return $table->getRecords($request);
	}
}
