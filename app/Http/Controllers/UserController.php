<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Exception;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
//use App\Enums\Specialization;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules\Enum;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
//        $users = User::with('roles')->latest()->filter(request(['search', 'departmentSeeder']))
//            ->paginate(10)->withQueryString();
        $users = User::with('roles')->latest()->filter(request(['search', 'departmentSeeder']))->get();
        $departments = Department::all();
        $roles = Role::pluck('name', 'name')->all();
        return view('users.newindex', compact('users', 'departments', 'roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
//        $specs = Specialization::cases();
        $departments = Department::all();
        $roles = Role::pluck('name', 'name')->all();
//        return view('users.created', compact('roles', 'specs'));
        return view('users.created', compact('roles', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'serial_number' => 'nullable|digits:7|unique:users,stdsn',
//            'department_id' =>'required',
//            'spec' => [new Enum(Specialization::class)],
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|same:confirm-password',
        ]);
        $user = User::create([
            'first_name' => ucwords(strtolower($request->first_name)),
            'last_name' => ucwords(strtolower($request->last_name)),
            'stdsn' => $request->serial_number,
            'department_id' => $request->department_id,
//            'spec' => $request->spec,
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'avatar' => 'default.jpg'
        ]);
//        if ($request->roles) {
//          //  Http::withToken(env('GITHUB_TOKEN'))->post(env('GITHUB_ORG').'/invitations', ['email' => $user->email ,'role' => 'direct_member']);
//        }
        $user->assignRole($request->roles);
        session()->flash('add');
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $userRole=$user->getRoleNames();
        return view('profile.show', compact('user','userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
//        $specs = Specialization::cases();
        $departments = Department::all();
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('users.editeded', compact('user', 'roles', 'userRole', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'stdsn' => 'unique:users,stdsn,' . $id,
//            'department_id' => 'required',
//            'spec' => [new Enum(Specialization::class)],
            'password' => 'nullable|min:8|same:confirm-password',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:5048'
        ]);
        $user = User::find($id);
        $input = $request->all();
        if (!empty($input['password'])) {
            $user->update([
                'first_name' => ucwords(strtolower($request->first_name)),
                'last_name' => ucwords(strtolower($request->last_name)),
                'stdsn' => $request->serial_number,
                'department_id' => $request->department_id,
                'email' => strtolower($request->email),
                'password' => Hash::make($request->password),
            ]);
        } else {
            $input = Arr::except($input, array('password'));
            $user->update([
                'first_name' => ucwords(strtolower($request->first_name)),
                'last_name' => ucwords(strtolower($request->last_name)),
                'stdsn' => $request->serial_number,
                'department_id' => $request->department_id,
                'email' => strtolower($request->email),
            ]);
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->roles);
        if ($request->roles) {
           // Http::withToken(env('GITHUB_TOKEN'))->post(env('GITHUB_ORG').'/invitations', ['email' => $user->email ,'role' => 'direct_member']);
        }
        session()->flash('edit');
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
       if ($user->graduate){
           Alert::warning(' ','هذا المستخدم موجود ك خريج في النظام يمكنك تعطيل المستخدم هذا ولا يمكنك حذفه إلا بعد حذفه من قائمة الخريجين, ');
            return back();
       }
       elseif ($user->supervisor)
       {
           Alert::warning(' ','هذا المستخدم موجود ك مشرف في النظام يمكنك تعطيل المستخدم هذا ولا يمكنك حذفه إلا بعد حذفه من إدارة المشرفين, ');
           return back();
       }
        $user->delete();
        session()->flash('delete');
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');

    }

 public function userStatus($id): \Illuminate\Http\RedirectResponse
    {
       $user = User::find($id);
       if ($user){
           if($user->status){
               $user->status = 0;
           }
           else{
               $user->status = 1;
           }
           $user->save();
       }
       return back();
//        session()->flash('edit');
//     return redirect()->route('users.index');
    }
}
