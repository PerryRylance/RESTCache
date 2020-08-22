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
	
	public function update(Request $request, $id)
	{
		$rule = Rule::find($id);
		
		foreach($request->input() as $key => $value)
			$rule->{$key} = $value;
		
		$rule->save();
		
		return $rule;
	}
	
	public function destroy(Request $request, $id)
	{
		$rule = Rule::find($id);
		$rule->delete();
		
		return true;
	}
}
