<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // nếu user đã đăng nhập
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level =1 (admin), status = 1 (actived) thì cho qua.
            if ($user->level == 1 && $user->status == 1 )
            {
                return $next($request);
            }
            else
            {
                $alert='Không thể thực hiện vì bạn không phải Admin!';
                return redirect()->back()->with('alert',$alert);
            }
        }
            $alert='Không thể thực hiện vì bạn không phải Admin!';
            return redirect()->back()->with('alert',$alert);
    }
}
