<?php

namespace App\Http\Controllers;

use App\Enums\ProjectState;
use App\Models\InterviewStage;
use App\Models\Project;
use App\Models\ProjectInterview;
use App\Models\Stage;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class ProjectInterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::whereNotIn('status', [ProjectState::Proposition, ProjectState::Approving,ProjectState::Rejected])->get();
        $project_interviews = ProjectInterview::all();
        $supervisors =Supervisor::all();
        $interview_stages=InterviewStage::all();
        return view('project_interview.index', ['title'=>'Interview - المناقشة'],compact('projects','project_interviews','supervisors','interview_stages'));
//        id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at`
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
    //        id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at`
    public function store(Request $request)
    {
        $interviewers = implode(',',$request->interviewers);

        ProjectInterview::create([
            'interview_date' => $request->interview_date,
            'interviewers' => $interviewers,
            'place' => $request->place,
            'notes' => $request->notes,
            'project_id' =>$request->project_id,
            'interview_type'=>$request->interview_type,
        ]);
        $project_status=Project::query()->where('id',$request->project_id)->first();
//        $project_status->update(
//            [
//                'status'=>ProjectState::Evaluating
//            ]
//        );
        session()->flash('add');
        return redirect()->route('project_interview.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectInterview $projectInterview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectInterview $projectInterview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $interviewers = implode(',',$request->interviewers);

        $project_interview =ProjectInterview::findOrFail($request->id);
        $project_interview->update([
            'interview_date'=>$request->input('interview_date'),
            'interviewers'=>$interviewers,
            'place'=>$request->input('place'),
            'notes'=>$request->input('notes'),
            'project_id'=>$request->input('project_id'),
            'interview_type'=>$request->input('interview_type'),
        ]);
        session()->flash('edit');
        return redirect()->route('project_interview.index');
    }

    public function suggestions_recommendations(Request $request) {
        // جلب القيمة القديمة
//        dd($request->all());
        $old_project_interview = ProjectInterview::query()->where('id', $request->id)->first();

        $suggestions = $request->suggestions ? $old_project_interview->suggestions . ' ' . $request->suggestions : $request->suggestions;
        $recommendations = $request->recommendations ? $old_project_interview->recommendations . ' ' . $request->recommendations : $request->recommendations;

        $project_interview = ProjectInterview::query()->where('id', $request->id)->update([
            'suggestions' => $suggestions,
            'recommendations' => $recommendations
        ]);

        session()->flash('edit');
        return redirect()->route('project_interview_score.show',$request->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project_interview = ProjectInterview::query()->where('id', $id)->first();
        $project_interview->delete();
        session()->flash('delete');
        return redirect()->route('project_interview.index');
    }
}
