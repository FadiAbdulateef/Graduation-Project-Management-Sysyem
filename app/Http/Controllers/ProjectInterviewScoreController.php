<?php

namespace App\Http\Controllers;

use App\Models\AcademicRank;
use App\Models\Graduate;
use App\Models\InterviewStage;
use App\Models\InterviewStageItem;
use App\Models\Project;
use App\Models\ProjectInterview;
use App\Models\ProjectInterviewScore;
use App\Models\ProjectTeam;
use App\Models\Setting;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectInterviewScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        foreach ($request->interview_stage_item_id as $graduate_id => $item_id) {
            $scores = $request->score[$graduate_id];
            foreach ($scores as $key => $score) {
                ProjectInterviewScore::create([
                    'supervisor_type' => $request->supervisor_type,
                    'score' => $score,
                    'interview_stage_item_id' => $item_id[$key],
                    'project_id' => $request->project_id,
                    'supervisor_id' => $request->supervisor_id,
                    'graduate_id' => $key,
                ]);

            }
        }


        Alert::success(' تم العملية بنجاح ', ' ');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $project_interview = ProjectInterview::query()->where('id', $id)->first();

        $interview = ProjectInterview::query()->where('id', $id)->value('interview_type');
        $project_id = ProjectInterview::query()->where('id', $id)->value('project_id');
        $project = Project::findorFail($project_id);
        $iterview_stage = InterviewStage::query()->where('title', $interview)->value('id');
        $interview_stage_items = InterviewStageItem::all()->where('interview_stage_id', $iterview_stage);
//        dd($interview_stage_items);
        $count = 1;
        $interviewers = ProjectInterview::query()->where('id', $id)->value('interviewers');
        $interview_suoer = explode(',', $interviewers);
        foreach ($interview_suoer as $interview)
            if (Supervisor::query()->where('user_id', auth()->user()->id)->exists() &&auth()->user()->first_name==$interview ) {
                $supervisor = Supervisor::query()->where('first_name', $interview)->value('id');
                $files = Storage::disk('projects')->allFiles($project_id);

                return view('project_interview.interview_show', compact('project', 'files','interview_stage_items', 'project_interview', 'supervisor',));
            }
        Alert::warning('عذراً', 'لست من بين اعضاء المناقشة ');
        return redirect()->route('project_interview.index');

//        session()->flash('delete');
//        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectInterviewScore $projectInterviewScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectInterviewScore $projectInterviewScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectInterviewScore $projectInterviewScore)
    {
        //
    }

    public function interview_report($id)
    {
        $project_interview = ProjectInterview::query()->where('id', $id)->first();
        //تحويل الاعضاء الى مصفوفه
        $interviewers=     explode(',',$project_interview->interviewers);
        $interview = ProjectInterview::query()->where('id', $id)->value('interview_type');
        $project_id = ProjectInterview::query()->where('id', $id)->value('project_id');
        $project = Project::findorFail($project_id);
        $interview_stage = InterviewStage::query()->where('title', $interview)->value('id');
        $interview_stage_items_primary = InterviewStageItem::all()->where('interview_stage_id', $interview_stage)->where('supervisor_type','primary')->pluck('id');
        $interview_stage_items_secondary= InterviewStageItem::all()->where('interview_stage_id', $interview_stage)->where('supervisor_type','secondary')->pluck('id');
        $interview_stage_items_primary_degree = InterviewStageItem::all()->where('interview_stage_id', $interview_stage)->where('supervisor_type','primary')->sum('item_degree');
        $interview_stage_items_secondary_degree= InterviewStageItem::all()->where('interview_stage_id', $interview_stage)->where('supervisor_type','secondary')->sum('item_degree');
//      dd (gettype($interview_stage_items_primary_degree));
        $project_teams = ProjectTeam::query()->where('project_id', $project_id)->pluck('graduate_id');
        foreach ($project_teams as $key => $project_team) {
            $setting = Setting::query()->first();
            $primary_degree = ProjectInterviewScore::query()->where('graduate_id', $project_team)->whereIn('interview_stage_item_id', $interview_stage_items_primary)->sum('score');
            $secondary_degree = ProjectInterviewScore::query()->where('graduate_id', $project_team)->whereIn('interview_stage_item_id', $interview_stage_items_secondary)->sum('score');
            $graduate_primary_degree[$key] =round( ($setting->supervisor_score / $interview_stage_items_primary_degree) * $primary_degree,2);
            $graduate_secondary_degree[$key] =round( ($setting->committee_member_score / $interview_stage_items_secondary_degree) * $secondary_degree,2);
            $graduate = Graduate::query()->where('id', $project_team)->update([
                'project_degree' => $graduate_primary_degree[$key] + $graduate_secondary_degree[$key]
            ]);
//

        }

        return view('project_interview.interview_report', compact('project', 'graduate_primary_degree', 'graduate_secondary_degree','project_interview','interviewers'));

    }
}
