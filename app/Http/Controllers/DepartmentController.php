<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DataTables\DepartmentDataTable;
use App\Models\Department;
use App\Models\Scope;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();

        return view('department.index', compact('departments'));
    }

    public function indexrole()
    {
        $departments = Scope::all();
//        $scopes = Scope::all();

        return view('roles.index', compact('departments'));
//        return view('Department.index');
    }
//    public function index(DepartmentDataTable $departmentSeeder)
//    {
////        return view('Department.index');
//        return $departmentSeeder->render('departmentSeeder.index',['title'=>'الأقسام - Departments']);
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
        ]);
//        $departments = new Department();
//        $departments->name = $request->name;
//        $departments->save();
//        return response('تمت الإضافة');
        Department::create([
            'name' => $request->name,
        ]);
        session()->flash('add');
        return redirect()->route('departmentSeeder.index');
//        return response('تمت الإضافة');
        //       to('departmentSeeder.indexindex')->with('message', 'Thanks for registering!');
//        return redirect()->route('departmentSeeder.index')->with('success','created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($request)
    {
//        $departmentSeeder = Department::findOrFail($request->id);
//        $departmentSeeder->update([
//            'name'=>$request->input('name'),
//        ]);
//        session()->flash('edit');
//        return redirect()->route('departmentSeeder.index');
//        return view('departmentSeeder.edit',compact('departmentSeeder'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
        ]);
        $department = Department::findOrFail($request->id);
        $department->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
        return redirect()->route('departmentSeeder.index');

//        $departmentSeeder = Department::update($request->all());
//        return redirect()->route('departmentSeeder.index')->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::findorFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('departmentSeeder.index');
    }
}
