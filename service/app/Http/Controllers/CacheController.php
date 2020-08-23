<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CacheController extends Controller
{
    public function get(Request $request)
	{
		var_dump($request);
		exit;
	}
}
