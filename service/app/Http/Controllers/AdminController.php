<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use PerryRylance\DOMDocument;
use App\Tables\RecordsTable;
use App\Tables\RulesTable;

class AdminController extends Controller
{
    public function getPage(Request $request)
	{
		$document = new DOMDocument();
		
		$document->loadHTML( (string)View::make("pages.admin") );
		
		$table = $document->import(new RecordsTable($request));
		$document->querySelector("#records")->append($table);
		
		$table = $document->import(new RulesTable($request));
		$document->querySelector("#rules")->append($table);
		
		return $document->html;
		
	}
}
