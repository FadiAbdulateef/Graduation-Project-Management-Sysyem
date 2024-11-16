<?php

namespace App\Http\Controllers;

use App\Models\InterviewStage;
use App\Models\InterviewStageItem;
use Illuminate\Http\Request;

class InterviewStageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $interview_stages = InterviewStage::all();
        $interview_stage_items = InterviewStageItem::all();
        return view('interview.interview_stage_item.index', compact('interview_stages','interview_stage_items'));
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
            'item_degree'=>'required',
            'interview_stage_id'=>'required',
        ]);
        InterviewStageItem::create([
            'name' => $request->name,
            'item_degree' => $request->item_degree,
            'supervisor_type' => $request->supervisor_type,
            'interview_stage_id' =>$request->interview_stage_id,
        ]);
        session()->flash('add');
        return redirect()->route('interview_stage_item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(InterviewStageItem $interviewStageItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //        $request->validate([
//            'name'=>'required',
//            'item_degree'=>'required',
//        ]);
        $interviewStageItem = InterviewStageItem::findorFail($request->id);
        $interviewStageItem->update([
            'name' => $request->input('name'),
            'item_degree' => $request->input('item_degree'),
            'supervisor_type' => $request->input('supervisor_type'),
            'interview_stage_id' =>$request->input('interview_stage_id'),
        ]);
        session()->flash('edit');
        return redirect()->route('interview_stage_item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        InterviewStageItem::findorFail($id)->delete();
        return redirect()->route('interview_stage_item.index');
    }
}
