<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $stages = Stage::all();
        return view('stage.index',compact('stages', 'departments'));

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
            'title'=>'required',
            'department_id'=>'required',
        ]);
        Stage::create([
            'title' => $request->title,
//            'title' => $request->title,
            'department_id' =>$request->department_id,
        ]);
        session()->flash('add');
        return redirect()->route('stage.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $stage = Stage::findorFail($request->id);
        $stage->update([
           'title'=>$request->input('title'),
//           'title_en'=>$request->input('title_en'),
           'department_id'=>$request->input('department_id'),
        ]);
        session()->flash('edit');
        return redirect()->route('stage.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Stage::findorFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('stage.index');
    }
}
