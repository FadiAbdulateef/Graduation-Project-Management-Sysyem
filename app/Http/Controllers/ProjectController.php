<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Enums\ProjectState;
use App\Models\AcademicRank;
use App\Models\Department;
use App\Models\Graduate;
use App\Models\InterviewStage;
use App\Models\Project;
use App\Models\ProjectDepartment;
use App\Models\ProjectStage;
use App\Models\ProjectTeam;
use App\Models\Setting;
use App\Models\Stage;
use App\Models\Supervisor;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Auth\Authenticatable;


class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $projects = Project::whereNotIn('status', [ProjectState::Proposition, ProjectState::Approving])->get();
//        $projects = Project::all();
//        $projects = Project::findOrFail(4);
        $supervisors = Supervisor::all();
        $departments = Department::all();
        $gradutes = Graduate::all()->where('project_id', null);
        return view('project.index', compact('projects', 'supervisors', 'departments', 'gradutes', 'setting'));
//        return $project->render('project.index', ['title' => 'Projects - المشاريع'], compact('projects', 'supervisors', 'scopes', 'departments'));
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
            'title' => 'required',
            'goals' => 'required',
            'short_description' => 'required',
            'department_id' => 'required',
//            'supervisor_id' => 'required',
        ]);
//        dd($request->department_id);
        // جلب القيمة من حقل الإدخال
        $tags = $request->input('goals');

        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);
//        $goals = $tags;
        // الآن يمكنك حفظ القيم في قاعدة البيانات
        $project = Project::query()->insertGetId([
            'title' => $request->title,
            'goals' => $goals,
            'short_description' => $request->short_description,
            'status' => $request->status,
//            'for_year' => $request->for_year,
            'for_year' => now(),
            'supervisor_id' => $request->supervisor_id,
            'scope' => $request->scope,
        ]);

        $project_department = ProjectDepartment::query()->create([
            'department_id' => $request->department_id,
            'project_id' => $project,
        ]);

        $stages = Stage::query()->where('department_id', $request->department_id)->pluck('id');
        foreach ($stages as $stage) {
            ProjectStage::query()->create([
                'sort' => 0,
                'project_id' => $project,
                'stage_id' => $stage,
            ]);
        }
        $this->store_tem($request, $project);

        session()->flash('add');
        return redirect()->route('project.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $setting = Setting::first();
        $stages = Stage::all()->pluck('title');
        $count = ProjectStage::query()->where('project_id', $id)->where('sort', 1)->count();
        $countss = ProjectStage::query()->where('project_id', $id)->count();
        if ($count == 0) {
            $result = 0;
        } else {
            $result = round($count / $countss * 100, 1);
        }
        $gradutes = Graduate::all()->where('project_id', null);
        $project = Project::findOrFail($id);
        //       edite in amran
//        $project_departments = ProjectDepartment::query()->where('project_id', $id);

        $files = Storage::disk('projects')->allFiles($id);
        foreach ($files as $file) {
            $fileUrls = Storage::disk('projects')->path($file);
        }
        $supervisors = Supervisor::all();
        $departments = Department::all();

        return view('project.project-detail2', compact('project', 'gradutes', 'stages', 'count', 'countss', 'result', 'files', 'setting', 'departments', 'supervisors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
//        return view('project.project-detail');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $tags = $request->input('goals');
        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);

        $project = Project::findOrFail($request->id);
        $project->update([
            'title' => $request->input('title'),
            'goals' => $goals,
            'short_description' => $request->input('short_description'),
            'status' => $request->input('status'),
            'for_year' => now('Y'),
            'supervisor_id' => $request->input('supervisor_id'),
            'scope' => $request->input('scope'),
        ]);
        //       edite in amran
        ProjectDepartment::query()->where('project_id', $project->id)->delete();
        foreach ($request->departments as $department_id) {
            $project_department = ProjectDepartment::query()->where('project_id', $project->id)->create([
                'department_id' => $department_id,
                'project_id' => $project->id,
            ]);
        }
        session()->flash('edit');
        return redirect()->route('project.index');
//        return view('project.project-detail2');

    }

    // تعديل بيانات المشروع من قبل الخريج المرتبط بالمشروع
    public function project_graduate_update(Request $request)
    {
//        $project = Project::query()->where('id', $request->id)->first();
        $project = Project::findOrFail($request->id);
        $tags = $request->input('goals');

        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);
        $project->update([
            'title' => $request->input('title'),
            'goals' => $goals,
            'short_description' => $request->input('short_description'),
            'scope' => $request->input('scope'),
        ]);
        Alert::success('تم التعديل بنجاح', '');
        return redirect()->route('project.project_graduate', $project->id);
    }
    // تعديل بيانات المشروع من قبل مشرف المشروع
    public function project_supervisor_update(Request $request)
    {
//        $project = Project::query()->where('id', $request->id)->first();
        $project = Project::findOrFail($request->id);
        $tags = $request->input('goals');

        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);
        $project->update([
            'title' => $request->input('title'),
            'goals' => $goals,
            'short_description' => $request->input('short_description'),
            'scope' => $request->input('scope'),
        ]);
        Alert::success('تم التعديل بنجاح', '');
        return redirect()->route('project.projects_supervisor', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('project.index');
    }

//    public function register($id)
//    {
//        return "jhckjshck";
//    }

    public function abandon($id): \Illuminate\Http\RedirectResponse
    {
//        Project::find($id)->update(['supervisor_id' => null, 'state' => ProjectState::Proposition]);
        Project::find($id)->update(['supervisor_id' => null]);
        Alert::success(' تمت العملية بنجاح ', ' ');
//        return redirect()->back()->with('success', 'Unassigned supervisor successfully');
        return redirect()->route('suggestion.show', $id);
    }

    public function supervise($id)
    {
        $project = Project::findorFail($id);
        if (Supervisor::query()->where('user_id', auth()->user()->id)->exists()) {
            $suoervisor_id = Supervisor::query()->where('user_id', auth()->user()->id)->value('id');
            $project->update([
                'supervisor_id' => $suoervisor_id
            ]);
            $count = ProjectTeam::all()->where('project_id', $id)->count();
            if ($count == 5) {
                $project->update(['status' => ProjectState::Approving]);
            }
            Alert::success(' تم الاشراف على المشروع', 'شكراً لك')->flash();
            return redirect()->back();
        } else {

            return back()->with(Alert::warning('عذراً لايمكنك الاشراف على المشروع', 'يجب ان تكون ضمن قائمة المشرفين'))->flash();

        }

    }

    public function approve(Project $project)
    {
        switch ($project->status) {
            case (ProjectState::Rejected):
            case (ProjectState::Approving):
                $project->update(['status' => ProjectState::Incomplete]);

                break;
            case (ProjectState::Proposition):
                $project->update(['status' => ProjectState::Approving]);
                break;
//            case (ProjectState::Evaluating):
//                $project->update(['status' => ProjectState::Complete]);
                break;
            default:

//                $project->group->update(['state' => GroupState::Full]);
        }
        Alert::success('', 'تم اعتماد المشروع ونقله الى مرحلة التطوير')->flash();
        return redirect()->back();
    }

    public function disapprove(Project $project)
    {
        $project->update(['status' => ProjectState::Rejected]);
        Alert::warning('', 'تم إلغاء إعتماد المشروع')->flash();
        return redirect()->back();
    }

    public function Registration_report($id)
    {
        $counter = 1;
        $project = Project::query()->where('id', $id)->first();
        $academic_rank = $project->supervisor->academic_rank;
        return view('project.Registration_report', compact('project', 'counter', 'academic_rank'));
    }

    public function projects_supervisor()
    {
        $projects = Project::query()->where('supervisor_id', auth()->user()->supervisor->id)->get();
        $supervisors =Supervisor::all();
        $setting =Setting::first();
        $interview_stages=InterviewStage::all();
        return view('project.projects_supervisor', compact('projects','setting','supervisors','interview_stages'));

//        if (Supervisor::query()->where('user_id', auth()->user()->id)->exists()) {
//            $projects = Project::query()->where('supervisor_id', auth()->user()->supervisor->id)->get();
//            return view('project.projects_supervisor', compact('projects'));
//        }
//        else {
//            Alert::warning('عذراً انت لست مشرف', '')->flash();
//            return redirect()->back();
//        }
    }

    public function store_tem(Request $request, $id): void
    {
        foreach ($request->graduates as $graduate) {
            if (ProjectTeam::query()->where('project_id', $id)->exists() && ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                Graduate::query()->where('id', $graduate)->update(['project_id' => $id]);
                ProjectTeam::create([
                    'member_type' => 'member',
                    'status' => 1,
                    'project_id' => $id,
                    'graduate_id' => $graduate
                ]);
            } elseif (ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                Graduate::query()->where('id', $graduate)->update(['project_id' => $id]);
                ProjectTeam::create([
                    'member_type' => 'leader',
                    'status' => 0,
                    'project_id' => $id,
                    'graduate_id' => $graduate
                ]);
            }
        }
        //تعديل حالة المشروع الى انتضار الاعتماد في حالة عدد الاعضاء 5 والمشرف موجود
        $project = Project::findOrFail($id);
        $counts = ProjectTeam::all()->where('project_id', $id)->count();
        if ($counts == 5 && $project->supervisor_id != null) {
            $project->update(['status' => ProjectState::Approving]);
        }
    }

    public function project_graduate($id)
    {
        $setting = Setting::first();
        $stages = Stage::all()->pluck('title');
        $count = ProjectStage::query()->where('project_id', $id)->where('sort', 1)->count();
        $countss = ProjectStage::query()->where('project_id', $id)->count();
        if ($count == 0) {
            $result = 0;
        } else {
            $result = round($count / $countss * 100, 1);
        }
//        $gradutes = Graduate::all()->where('project_id', null);
        // جلبت الخريجين المرتبطين بالمشروع بس
        $gradutes = Graduate::all()->where('project_id', $id);
        $project = Project::findOrFail($id);
        //       edite in amran
//        $project_departments = ProjectDepartment::query()->where('project_id', $id);

        $files = Storage::disk('projects')->allFiles($id);
        foreach ($files as $file) {
            Storage::disk('projects')->path($file);
        }
        $supervisors = Supervisor::all();
//        $departments = Department::all();
        $departments = ProjectDepartment::query()->where('project_id', $id);
        return view('project.project_graduate', compact('project', 'gradutes', 'departments','stages', 'count', 'countss', 'result', 'files', 'setting', 'supervisors'));
    }
}
