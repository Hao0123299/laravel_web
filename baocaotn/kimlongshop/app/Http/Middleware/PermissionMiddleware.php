<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Route;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasRole('admin'))
        {
            return $next($request);
        }
        return redirect()->back()->with('message','Bạn không có quyền truy cập vào truy cập vào');

        /*nhiều quyền*/
        /*if(Auth::user()->hasRole(['admin','quyền thứ n']))
        {
            return $next($request);
        }
        return redirect()->back()->with('message','Bạn không có quyền truy cập vào truy cập vào');*/

    }
}
