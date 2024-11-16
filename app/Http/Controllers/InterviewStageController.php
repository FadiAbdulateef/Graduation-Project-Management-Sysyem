<?php

namespace App\Http\Controllers;

use App\Models\InterviewStage;
use Illuminate\Http\Request;

class InterviewStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interview_stages = InterviewStage::all();
        return view('interview.interview_stage.index', compact('interview_stages'));
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
        InterviewStage::create([
            'title' => $request->title,
        ]);
        session()->flash('add');
        return redirect()->route('interview_stage.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(InterviewStage $interviewStage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InterviewStage $interviewStage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $interview_stages = InterviewStage::findOrFail($request->id);
        $interview_stages->update([
            'title'=>$request->input('title'),
        ]);
        session()->flash('edit');
        return redirect()->route('interview_stage.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InterviewStage::findorFail($id)->delete();
        return redirect()->route('interview_stage.index');
    }
}
