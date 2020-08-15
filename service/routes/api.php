<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Tables\RecordsTable;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('install', function (Request $request) {
	
	Artisan::call('migrate');
	
});

Route::get('records', function (Request $request) {
	
	$table = new RecordsTable($request);
	return $table->getRecords($request);
	
});
