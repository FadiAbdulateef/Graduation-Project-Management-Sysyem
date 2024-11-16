<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
//             إذا لم يكن هناك مستخدم مسجل الدخول، أرجع إلى صفحة تسجيل الدخول
//            if (!Auth::user()) {
//                return redirect()->route('login');
//            }
//            // إذا كانت حالة المستخدم 0، أرجع رسالة خطأ
//            if (Auth::user()->status == 0) {
//                return response()->json(['message' => 'الوصول إلى الموقع غير مصرح لك'], 403);
//            }
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
