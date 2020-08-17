<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables\RulesTable;
use App\Models\Rule;

class RuleController extends Controller
{
	public function index(Request $request)
	{
		$table = new RulesTable($request);
		return $table->getRecords($request);
	}
	
    public function store(Request $request)
	{
		$rule = new Rule();
		$rule->save();
		
		return $rule;
	}
}
