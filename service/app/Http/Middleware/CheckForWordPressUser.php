<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckForWordPressUser
{
	private function getWordPressAbsolutePath()
	{
		$dir = '../';
		$iter = 0;
		
		while(!file_exists("{$dir}wp-config.php"))
		{
			$dir .= '../';
			
			if(++$iter > 64)
				throw new \Exception("Maximum depth exceeded");
		}
		
		return $dir;
	}
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$table		= "wp_usermeta";
		$key		= $_COOKIE['rest-cache-admin-key'];
		
		$count		= DB::table($table)
			->select(["user_id"])
			->where("meta_key", "=", "rest-cache-admin-hash")
			->whereRaw("meta_value = sha2(CONCAT((
				SELECT meta_value FROM $table AS temp
				WHERE temp.user_id = $table.user_id
				AND meta_key = 'rest-cache-admin-salt'
			), ?), 256)", $key)
			->limit(1)
			->count();
		
		if(!$count)
		{
			if(!$request->wantsJson())
				return redirect( wp_login_url() );
			
			return abort(403, "Access denied");
		}
		
        return $next($request);
    }
}
