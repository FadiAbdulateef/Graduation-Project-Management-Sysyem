<?php

namespace App\Http\Controllers;

use App\Enums\ProjectState;
use App\Models\Department;
use App\Models\Graduate;
use App\Models\Project;
use App\Models\ProjectDepartment;
use App\Models\ProjectStage;
use App\Models\ProjectTeam;
use App\Models\Setting;
use App\Models\Stage;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuggestionProjectController extends Controller
{
    public function index() {
        $setting = Setting::first();
        $departments = Department::all();
        $supervisors = Supervisor::all();
//        dd(request()->route()->getName());
//        dd(request()->routeIs('suggestion.index'));
        if(auth()->user()->supervisor()->exists()) {
            $departmentId = auth()->user()->supervisor->department_id;
            $projects = Project::whereHas('departments', function ($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })->whereIn('status', [ProjectState::Proposition, ProjectState::Approving])->get();
            $graduates = Graduate::all()->where('project_id', null);
        } elseif (auth()->user()->graduate()->exists())  {
            $departmentId = auth()->user()->graduate->department_id;
            $projects = Project::whereHas('departments', function ($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })->whereIn('status', [ProjectState::Proposition, ProjectState::Approving])->get();
            $graduates = Graduate::where('department_id', $departmentId)->where('project_id', null)->get();
        }
        else
        {
            $projects = Project::all()->whereIn('status', [ProjectState::Proposition, ProjectState::Approving]);
            $graduates = Graduate::all()->where('project_id', null);
        }
        return view('project_suggestion.index', compact('projects', 'supervisors', 'departments', 'graduates', 'setting'));
    }

//    public function index() {
//        $setting = Setting::first();
//        $departments = Department::all();
//        $supervisors = Supervisor::all();
////        $graduate_department = Graduate::query()->where('user_id', auth()->user()->id)->value('department_id');
//        $graduates = Graduate::all()->where('project_id', null);
//
//        if(auth()->user()->supervisor()->exists()) {
//            $departmentId = auth()->user()->supervisor->department_id;
//            $projects = Project::whereHas('departments', function ($query) use ($departmentId) {
//                $query->where('department_id', $departmentId);
//            })->whereIn('status', [ProjectState::Proposition, ProjectState::Approving])->get();
//        } elseif (auth()->user()->graduate()->exists())  {
//            $departmentId = auth()->user()->graduate->department_id;
//            $projects = Project::whereHas('departments', function ($query) use ($departmentId) {
//                $query->where('department_id', $departmentId);
//            })->whereIn('status', [ProjectState::Proposition, ProjectState::Approving])->get();
//        }
//        else
//        {
//            $projects = Project::all()->whereIn('status', [ProjectState::Proposition, ProjectState::Approving]);
//        }
//        return view('project_suggestion.index', compact('projects', 'supervisors', 'departments', 'graduates', 'setting'));
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
            'title' => 'required',
            'goals' => 'required',
            'short_description' => 'required',
            'department_id' => 'required',
//            'supervisor_id' => 'required',
        ]);
//        dd($request->supervisor_id);
        // جلب القيمة من حقل الإدخال
        $tags = $request->input('goals');
        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);
        // الآن يمكنك حفظ القيم في قاعدة البيانات
        $project = Project::query()->insertGetId([
            'title' => $request->title,
            'goals' => $goals,
            'short_description' => $request->short_description,
            'for_year' => now(),
//            'supervisor_id' => $request->supervisor_id ?? null,
            'supervisor_id' => $request->supervisor_id,
            'scope' => $request->scope,
        ]);

        //اضافة قسم المشروع في الجدول الوصيد
            ProjectDepartment::query()->create([
            'department_id' => $request->department_id,
            'project_id' => $project,
        ]);
        Alert::success('تمت الإضافة بنجاح', '');
        return redirect()->route('suggestion.index');
    }

    //دالة التسجيل في مقترح جديد
    public function addRegisterNew(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'goals' => 'required',
            'short_description' => 'required',
            'department_id' => 'required',
//            'supervisor_id' => 'required',
        ]);
        $tags = $request->input('goals');
        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);
        $goals = implode(',', $values);
        // الآن يمكنك حفظ القيم في قاعدة البيانات
        $setting = Setting::first();
//        $setting->registration_start_date->diffInDays(\Carbon\Carbon::now())
        if (now() < $setting->registration_end_date) {
            $project = Project::query()->insertGetId([
                'title' => $request->title,
//                'goals' => $goals,
                'goals' => $goals,
                'short_description' => $request->short_description,
                'for_year' => now(),
                'supervisor_id' => $request->supervisor_id ?? null,
                'scope' => $request->scope,
            ]);
            //اضافة قسم المشروع في الجدول الوصيد
            $project_department = ProjectDepartment::query()->create([
                'department_id' => $request->department_id,
                'project_id' => $project,
            ]);
            $count = ProjectTeam::all()->where('project_id', $project)->count();
            $this->store_tem($request, $project, $count, $setting);

        } else {
            Alert::warning('عذراً', 'إنتهى الوقت المحدد للتسجيل');
            return redirect()->route('suggestion.index');
        }
//        return redirect()->route('suggestion.index');
        return redirect()->back();
    }

    //دالة التسجيل في مقترح
    public function registration(Request $request)
    {
        $setting = Setting::first();
        $count = ProjectTeam::all()->where('project_id', $request->id)->count();
//        $setting->registration_start_date->diffInDays(\Carbon\Carbon::now())
        if (now() < $setting->registration_end_date) {
            foreach ($request->graduates as $graduate) {
                if ($count < $setting->team_members) {
                    if (ProjectTeam::query()->where('project_id', $request->id)->exists() && ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                        Graduate::query()->where('id', $graduate)->update(['project_id' => $request->id]);
                        ProjectTeam::create([
                            'member_type' => 'member',
                            'status' => 0,
                            'project_id' => $request->id,
                            'graduate_id' => $graduate
                        ]);
                        $count++;
                    } elseif (ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                        Graduate::query()->where('id', $graduate)->update(['project_id' => $request->id]);
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
                        $count++;
                    }
                } else {
                    //تعديل حالة المشروع الى انتضار الاعتماد في حالة عدد الاعضاء 5 والمشرف موجود
                    $project = Project::findOrFail($request->id);
                    if ($project->supervisor_id != null) {
                        $project->update(['status' => ProjectState::Approving]);
                    }
                    Alert::warning('عذراً', '  فريق المشروع لا يمكن ان يضم اكثر من _ ' . $setting->team_members . '_خريجين');
                    return redirect()->route('suggestion.show', $request->id);
                }
            }
            Alert::success('تمت الإضافة بنجاح', '');
        } else {
            Alert::warning('عذراً', 'انتهى الوقت المحدد للتسجيل');
            return redirect()->route('suggestion.show', $request->id);
        }
        return redirect()->route('suggestion.show', $request->id);
    }

    public function show($id)
    {
        $user_id = auth()->user()->id;
//        dd($user_id);
        $setting = Setting::first();
        $departments = Department::all();
        $supervisors = Supervisor::all();
        $project = Project::findOrFail($id);
        $project_depts = ProjectDepartment::all()->where('project_id', $id)->pluck('department_id');

        foreach ($project_depts as $project_dept) {
            $graduates[] = Graduate::all()->where('project_id', null)->where('department_id', $project_dept);
        }
        return view('project_suggestion.project-detail', compact('project', 'graduates', 'setting', 'departments', 'supervisors'));
    }
//    public function show($id)
//    {
//        $user_id = auth()->user()->id;
//        $setting = Setting::first();
//        $departments = Department::all();
//        $supervisors = Supervisor::all();
//        $project = Project::findOrFail($id);
//        if (auth()->user()->graduate()->exists()) {
//            $departmentId = auth()->user()->graduate->department_id;
//            $graduates = Graduate::all()->where('department_id', $departmentId)->where('project_id', null);
//            return view('project_suggestion.project-detail', compact('project', 'graduates', 'setting', 'departments', 'supervisors'));
//        }
//        elseif (auth()->user()->supervisor()->exists())
//        {
//            $departmentId = auth()->user()->supervisor->department_id;
//            $graduates = Graduate::all()->where('department_id',$departmentId)->where('project_id', null);
//            return view('project_suggestion.project-detail', compact('project', 'graduates', 'setting', 'departments', 'supervisors'));
//        }
//        else
//        {
//            $graduates = Graduate::all();
//            return view('project_suggestion.project-detail', compact('project', 'graduates', 'setting', 'departments', 'supervisors'));
//        }
//    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuggestionProject $suggestionProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $project = Project::query()->where('id', $request->id)->first();
        if ($request->status =="قيد التطوير" && $project->project_teams()->doesntExist() && $project->supervisor()->doesntExist())
        {
            Alert::warning('   عذراً لم يكتمل فريق التطوير', 'لا يمكنك تعديل حالة المشروع الى قيد التطوير ');
            return redirect()->route('suggestion.show', $project->id);
        }
        elseif ($request->status =="في إنتظار الأعتماد" && $project->project_teams()->doesntExist() || $project->supervisor()->doesntExist())
        {
            Alert::warning('  عذراً لم يكتمل فريق ال11تطوير', 'لا يمكنك تعديل حالة المشروع الى  إنتظار الأعتماد ');
            return redirect()->route('suggestion.show', $project->id);
        }
        else {
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
            if ($project->status == "قيد التطوير") {
                $stages = Stage::query()->where('department_id', $request->departments[0])->pluck('id');
                foreach ($stages as $stage) {
                    ProjectStage::query()->create([
                        'sort' => 0,
                        'project_id' => $project->id,
                        'stage_id' => $stage,
                    ]);
                }
                Alert::success('تم التعديل بنجاح', '');
                return redirect()->route('project.show', $project->id);
            }
            Alert::success('تم التعديل بنجاح', '');
            return redirect()->route('suggestion.show', $project->id);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        Alert::success('تم الحذف ', '');
        return redirect()->route('suggestion.index');
//        if (auth()->user()->can('project-delete'))
//        {
//            Project::findOrFail($id)->delete();
//            Alert::success('تم الحذف ', '');
//            return redirect()->route('suggestion.index');
//        }
//        else
//        {
//            Alert::warning(' ', 'ليس لديك الصلاحية لفعل ذلك ');
//            return redirect()->route('suggestion.index');
//        }
    }

    public function supervise($id)
    {
        $project = Project::findorFail($id);
        if (Supervisor::query()->where('user_id', auth()->user()->id)->exists()) {

            $suoervisor_id = Supervisor::query()->where('user_id', auth()->user()->id)->value('id');

            $project->update(['supervisor_id' => $suoervisor_id]);

            $count = ProjectTeam::all()->where('project_id', $id)->count();

            if ($count == 5) {
                $project->update(['status' => ProjectState::Approving]);
            }
            Alert::success('تم الإشراف على المشروع', 'شكراً لك')->flash();
            return redirect()->route('suggestion.show', $id);

        } else {
            Alert::warning('عذراً لا يمكنك الإشراف على المشروع', 'يجب ان تكون ضمن قائمة المشرفين')->flash();
            return redirect()->route('suggestion.show', $id);
//            }
//            Alert::success(' تم الإشراف على المشروع', 'شكراً لك');
//            return redirect()->back();
//
//        } else {
//            Alert::warning('عذراً لا يمكنك الإشراف على المشروع', 'يجب ان تكون ضمن قائمة المشرفين');
//            return redirect()->back();
        }
    }

    public function unsupervisor($id): \Illuminate\Http\RedirectResponse
    {
        Project::find($id)->update(['supervisor_id' => null, 'state' => ProjectState::Proposition]);
//        if($project->project_teams as $project_team)
        Alert::success(' تمت العملية بنجاح', ' لم تعد مشرف على المشروع ')->flash();
        return redirect()->route('suggestion.show', $id);
    }

    public function approve(Project $project)
    {
        //هنا عند الاعتماد ينتقل المشروع الى انتضارالاعتماد او قيد التطوير فقط
        switch ($project->status) {
            case (ProjectState::Proposition):
            case (ProjectState::Approving):
            if (!$project->supervisor && $project->project_teams->isEmpty()) {
                Alert::warning('', 'لا يمكن اعتماد المشروع الا بعد ان تتوافى جميع الاطراف')->flash();
                return redirect()->route('suggestion.show', ['suggestion' => $project->id]);
            }
            else
            {
                $project->update(['status' => ProjectState::Incomplete]);
                foreach ($project->departments as $departmenta) {
                    $stages = Stage::query()->where('department_id', $departmenta->id)->pluck('id');
                }
                foreach ($stages as $stage) {
                    ProjectStage::query()->create([
                        'sort' => 0,
                        'project_id' => $project->id,
                        'stage_id' => $stage,
                    ]);
                }
            }
                break;
            default:
        }
        Alert::success('تم اعتماد المشروع ونقله الى مرحلة التطوير', $project->status)->flash();
        return redirect()->route('suggestion.index');
    }

    public function disapprove(Project $project)
    {
        $project->update(['status' => ProjectState::Rejected]);
        Alert::warning('', 'تم إلغاء إعتماد المشروع')->flash();
        return redirect()->back();
    }

//دالة اضافة اعضاء
    public function store_tem(Request $request, $id, $count, $setting)
    {
        foreach ($request->graduates as $graduate) {
            if ($count < $setting->team_members) {
                if (ProjectTeam::query()->where('project_id', $id)->exists() && ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                    Graduate::query()->where('id', $graduate)->update(['project_id' => $id]);
                    ProjectTeam::create([
                        'member_type' => 'member',
                        'status' => 0,
                        'project_id' => $id,
                        'graduate_id' => $graduate
                    ]);
                    $count++;
                } elseif (ProjectTeam::query()->where('graduate_id', $graduate)->doesntExist()) {
                    Graduate::query()->where('id', $graduate)->update(['project_id' => $id]);
                    if (auth()->user()->id == $graduate) {
                        ProjectTeam::create([
                            'member_type' => 'leader',
                            'status' => 1,
                            'project_id' => $id,
                            'graduate_id' => $graduate
                        ]);
                    } else {

                        ProjectTeam::create([
                            'member_type' => 'leader',
                            'status' => 1,
                            'project_id' => $id,
                            'graduate_id' => $graduate
                        ]);
                    }
                    $count++;
                }

            } else {
                //تعديل حالة المشروع الى انتضار الاعتماد في حالة عدد الاعضاء 5 والمشرف موجود
                $project = Project::findOrFail($id);
                if ($project->supervisor_id != null) {
                    $project->update(['status' => ProjectState::Approving]);
                }
                Alert::warning('عذراً', ' فريق المشروع لا يمكن ان يضم اكثر من _ ' . $setting->team_members . '_خريجين');
                return redirect()->route('suggestion.show', $id);
            }

        }
        Alert::success('تمت الاضافة بنجاح', '');
        return redirect()->route('suggestion.show', $id);

    }

}
