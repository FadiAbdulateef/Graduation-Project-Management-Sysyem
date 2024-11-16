<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Department;
use App\Models\Graduate;
use App\Models\Project;
use App\Models\ProjectStage;
use App\Models\Setting;
use App\Models\Stage;
use App\Models\Supervisor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::find($id);
        $userRole=$user->getRoleNames();
//        dd($userRole);
        if (Graduate::query()->where('user_id', auth()->user()->id)->exists()) {
            $dd=Graduate::query()->where('user_id', auth()->user()->id)->pluck('project_id');
            $project = Project::query()->where('id',$dd)->first();
            return view('profile.new', compact('user','userRole','project'));
        }
        return view('profile.new', compact('user','userRole'));
    }

    public function show(User $user)
    {

        $id = Auth::id();
        $user = User::find($id);
        $userRole=$user->getRoleNames();
        if (Supervisor::query()->where('user_id', auth()->user()->id)->exists()) {
            $projects = Project::query()->where('supervisor_id', auth()->user()->supervisor->id)->get();
//            dd($projects);
            return view('profile.new', compact('user','userRole','projects'));
        }
        return view('profile.new', compact('user','userRole'));
    }


    public function update(Request $request)
    {

//        dd($request->all());
        $user = Auth::user();
//        $oldpassword = $request->old_password;
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'stdsn' => 'digits:7|unique:users,stdsn,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'new_password' => 'nullable|min:8|same:confirm-password',
            'avatar' => 'nullable|mimes:jpg,jpeg,png|max:5048'

        ]);
        $input = $request->all();
//        dd($input);
        if (!empty($input['new_password'])) {
            $user->update([
                'email' => $request->email,
                'password' => Hash::make($request->new_password),
            ]);
        } else {
            $input = Arr::except($input, array('password'));
            $user->update([
                'email' => $request->email,
            ]);
        }
        return redirect()->route('profile.index')
            ->with('success', 'Profile updated successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function editpassword()
    {
        $user = Auth::user();
        return view('profile.editpassword', compact('user'));
    }

    /**
     * @throws ValidationException
     */
    public function updatepassword(UpdatePasswordRequest $request)
    {

        $user = Auth::user();

        $input = $request->all();
        if($input['password'] == '12345678'){
            return view('profile.editpassword', compact('user'));
        }
        if (!empty($input['password'])) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

        }
        $user->password_checked = true;
        $user->save();
        return redirect()->intended(RouteServiceProvider::HOME);
    }

}
