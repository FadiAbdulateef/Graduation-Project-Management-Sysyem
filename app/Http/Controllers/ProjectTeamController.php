<?php

namespace App\Http\Controllers;

use App\Enums\ProjectState;
use App\Models\Graduate;
use App\Models\Project;
use App\Models\ProjectTeam;
use App\Models\SuggestionProject;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProjectTeamController extends Controller
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
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

//        $registrationDate = ProjectTeam::query()->where('project_id', $request->id)->where('status', 1)->value('created_at');
//        $status = ProjectTeam::query()->where('project_id', $request->id)->max('status');
//        if ($status == 5 || $registrationDate->diffInDays(\Carbon\Carbon::now()) > 10) {
//            Project::query()->where('id', $request->id)->update([
//                'status' => ProjectState::Approving,
//            ]);
//            Alert::warning('عذراً لايمكنك التسجيل في المشروع', 'انتهاء الوقت الزمني للتسجيل');
//            return redirect()->route('project.show', $request->id);
//        }
//        else{
        foreach ($request->graduates as $graduate) {
            if (ProjectTeam::query()->where('project_id', $request->id)->exists() && ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                Graduate::query()->where('id', $graduate)->update(['project_id' => $request->id,]);
                ProjectTeam::create([
                    'member_type' => 'member',
                    'status' => 1,
                    'project_id' => $request->id,
                    'graduate_id' => $graduate
                ]);
            } elseif (ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                Graduate::query()->where('id', $graduate)->update(['project_id' => $request->id,]);
                if (auth()->user()->id == $graduate) {
                    ProjectTeam::create([
                        'member_type' => 'leader',
                        'status' => 1,
                        'project_id' => $request->id,
                        'graduate_id' => $graduate
                    ]);
                } else {
                    ProjectTeam::create([
                        'member_type' => 'leader',
                        'status' => 1,
                        'project_id' => $request->id,
                        'graduate_id' => $graduate
                    ]);
                }
            }
        }
        return redirect()->route('suggestion.show', $request->id);
    }
//        foreach ($request->graduates as $graduate) {
//            $project = Project::find($request->id);
//            $graduate = Graduate::find($graduate);
//
//            if (!$project || !$graduate) {
//                // الخريج أو المشروع غير موجود
//                continue;
//            }
//    }

    public function show($id)
    {
        $deleteProject = ProjectTeam::findorFail($id);
//        edite in amran
        Graduate::findorFail($deleteProject->graduate_id)->update([
            'project_id' => null,
        ]);
        ProjectTeam::findorFail($id)->delete();
        Alert::success('تمت العملية بنجاح ', '')->flash();
        return redirect()->route('project.show', $deleteProject->project_id);
    }

//    public function showSuggestion($id)
//    {
//        $deleteProject = ProjectTeam::findorFail($id);
////        edite in amran
//        Graduate::findorFail($deleteProject->graduate_id)->update([
//            'project_id' => null,
//        ]);
//        ProjectTeam::findorFail($id)->delete();
//        Alert::success('تمت العملية بنجاح ', '')->flash();
//        return redirect()->route('suggestion.show', $deleteProject->project_id);
//    }


    public function edit(ProjectTeam $projectTeam)
    {
        //
    }

    public function update(Request $request, ProjectTeam $projectTeam)
    {
        //
    }

    public function destroy($id)
    {
        $deleteProject = ProjectTeam::findorFail($id);
        Graduate::query()->where('project_id', $deleteProject->project_id)->update([
            'project_id' => null,
        ]);
        ProjectTeam::findorFail($id)->delete();
        Alert::warning('عذراً لايمكنك الاشراف على المشروع', 'يجب ان تكون ضمن قائمة المشرفين');
        return redirect()->route('project.show', $deleteProject->project_id);
    }

    public function destroySuggestion($id)
    {
        $deleteProject = ProjectTeam::findorFail($id);
        Graduate::query()->where('project_id', $deleteProject->project_id)->update([
            'project_id' => null,
        ]);
        ProjectTeam::findorFail($id)->delete();
//        Alert::warning('عذراً لايمكنك الاشراف على المشروع', 'يجب ان تكون ضمن قائمة المشرفين');
        return redirect()->route('suggestion.show', $deleteProject->project_id);
    }
}

