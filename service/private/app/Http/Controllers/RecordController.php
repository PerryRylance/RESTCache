<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables\RecordsTable;
use App\Record;

class RecordController extends TableController
{
    protected function getModelClass()
	{
		return "\\App\\Record";
	}
	
	public function index(Request $request)
	{
		$table = new RecordsTable($request);
		return $table->getRecords($request);
	}
	
	public function destroyAll(Request $request)
	{
		Record::truncate();
		return ["success" => true];
	}
}
