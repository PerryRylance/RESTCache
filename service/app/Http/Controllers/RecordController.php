<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tables\RecordsTable;
use App\Models\Record;

class RecordController extends Controller
{
    protected function getModelClass()
	{
		return Record;
	}
	
	public function index(Request $request)
	{
		$table = new RecordsTable($request);
		return $table->getRecords($request);
	}
}
