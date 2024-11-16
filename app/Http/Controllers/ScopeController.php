<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $scopes = Scope::all();

        return view('Scope.indexindex', compact('scopes','departments'));
    }

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
            'name'=>'required',
            'department_id'=>'required',
        ]);

        Scope::create([
            'name' => $request->name,
            'department_id' =>$request->department_id,
        ]);
        session()->flash('add');
        return redirect()->route('scope.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scope $scope)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scope $scope)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scope $scope)
    {
        $request->validate([
            'name'=>'required',
            'department_id'=>'required',
        ]);
        $scope = Scope::findOrFail($request->id);
        $scope->update([
            'name'=>$request->input('name'),
            'department_id'=>$request->input('department_id'),
        ]);
        session()->flash('edit');
        return redirect()->route('scope.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Scope::findorFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('scope.index');
    }
}
