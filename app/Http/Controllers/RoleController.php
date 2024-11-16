<?php

namespace App\Http\Controllers;


use App\Enums\Specialization;
use App\Http\Requests\RoleStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::get();

        $roles = Role::where([
            ['name','!=',Null],
            [function ($query) use ($request){
                if (($search = $request->search)){
                    $query->orWhere('name' , 'LIKE' , '%' . $search .'%')->get();
                }
            }]
        ])->orderBy('id','DESC')->paginate(15)->withQueryString();

        return view('roles.indexed',compact('roles','permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleStoreRequest $request
     * @return RedirectResponse
     */
    public function store(RoleStoreRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions(Permission::query()->find($request->input('permission')));
        session()->flash('add');
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
            //dd($permissions);
        return view('roles.edit',compact('role','permissions','rolePermissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            ['name' => 'required',
            'permission' => 'required|array',
        ]);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions(Permission::query()->find($request->input('permission')));
        session()->flash('edit');
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = DB::table("roles")->where('id',$id);
        $role->delete();
        session()->flash('delete');
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }

    private function makePermationArray(array $permissions)
    {
        $newArray =[];
        foreach ($permissions as $permission){
            $newArray[$permission] = $permission;
        }
        return $newArray;
    }

}
