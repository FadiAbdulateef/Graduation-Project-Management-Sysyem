<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\View\View;
use App\Http\Controllers\ProjectController;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  LoginRequest  $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        Auth::user()->last_login_at = Carbon::now();
        Auth::user()->last_login_ip = $request->getClientIp();
        Auth::user()->save();

        if($request->password == '12345678') {
            session()->flash('يجب تغيير كلمة السر');
                \auth()->user()->password_checked = false;
                \auth()->user()->save();
            return redirect(route('profile.editpassword'));
        }

        if (Auth::user()->can('setting-control'))
        {
            return redirect()->intended(RouteServiceProvider::HOME)->with('success','Logged in successfully');
        }
        elseif (Auth::user()->graduate && Auth::user()->graduate->project_id)
        {
            return  redirect(route('project.project_graduate', ['project' => Auth::user()->graduate->project_id]));
        }
        elseif (Auth::user()->supervisor)
        {
            return redirect(route('project.projects_supervisor'));
        }
        else
        {
            return redirect()->route('suggestion.index')->with('success','Logged in successfully');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
