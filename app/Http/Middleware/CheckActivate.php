<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Toaster;

class CheckActivate
{
    public function handle($request, Closure $next )
    {
        if (\auth()->check() && (\auth()->user()->status == 0)){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login');
        }
//      if(auth()->user->status ==1)//->with('error' , 'Your account is not activated.')
//      {
//          return $next($request);
//      }
//      else
//      {
//      return redirect()->route('login')->withErrors(['status' => 'Your account is not activated.']);
//      }
        if ($request->user() && $request->user()->status === '0') {
            Auth::logout(); // سجل خروج المستخدم إذا كان متصلاً
            return redirect()->route('login');
//            return redirect('/disabled');->withErrors(['status' => 'Your account is not activated.'])
            // قم بإعادة توجيه المستخدم إلى صفحة خطأ أو غيرها
        }
        return $next($request);
//     return redirect(route('login'))->withErrors();
//        return redirect(route('login'))->withErrors(['status' => 'Your account is not activated.']);
    }

}
