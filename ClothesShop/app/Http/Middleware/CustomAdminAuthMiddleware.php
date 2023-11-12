<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CustomAdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    // Kiểm tra nếu người dùng không có quyền truy cập cụ thể
    if (!Auth::check() || !$this->userHasAccessToCustomArea(Auth::user())) {
        return redirect('admin/users/login'); // Hoặc chuyển hướng đến trang khác tùy theo yêu cầu của bạn
    }

    return $next($request);
    }
    protected function userHasAccessToCustomArea($user)
    {
        // Xác định logic kiểm tra quyền truy cập ở đây
        // Ví dụ: Nếu người dùng có role là "admin", họ có quyền truy cập
            // Kiểm tra nếu người dùng không có quyền truy cập cụ thể
        return $user->property === 1;
    }
}
