<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Tables\RecordsTable;
use App\Tables\RulesTable;

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
	
	global $prefix;
	
	Artisan::call('migrate');
	
	function put_permanent_env($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
           "{$key}={$value}",
           file_get_contents($path)
        ));
    }
	
	put_permanent_env('DB_HOST', DB_HOST);
	put_permanent_env('DB_DATABASE', DB_NAME);
	put_permanent_env('DB_USERNAME', DB_USER);
	put_permanent_env('DB_PASSWORD', DB_PASSWORD);
	put_permanent_env('DB_PREFIX', $table_prefix);
	
});

Route::resource('records', 'RecordController')->only([
	'index', 'store', 'update', 'destroy'
]);

Route::delete('records', 'RecordController@destroyAll');

Route::resource('rules', 'RuleController')->only([
	'index', 'store', 'update', 'destroy'
]);

Route::get('cache', 'CacheController@get');