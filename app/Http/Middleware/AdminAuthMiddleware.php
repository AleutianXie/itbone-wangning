<?php

namespace App\Http\Middleware;

use App\Tools\Helper;
use Closure;
use Illuminate\Support\Facades\DB;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 判断自动登录
        if (isset($_COOKIE['auto']) && !$request->session()->has('user')) {
            $value = explode('|', Helper::encryption($_COOKIE['auto'], 1));
            // 本次登录ip和上次ip一致时
            if ($value[1] == $_SERVER['REMOTE_ADDR']) {
                $user = DB::table('users')->where('name', $value[0])->select('id', 'name', 'email')->first();
                if ($user) {
                    session(['user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ]]);
                }
            }
        }
        // 判断用户是否已登录
        if (!$request->session()->has('user')) {
            return redirect('admin/auth/login')->withErrors('请先登录！');
        }
        return $next($request);
    }

}
