<?php

namespace App\Http\Controllers;

use App\Models\ProjectStage;
use App\Models\Stage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectStageController extends Controller
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
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // جلب القيمة من حقل الإدخال
        $tags = $request->input('tags2');

        // تحويل القيمة إلى صيغة JSON
        $tagsArray = json_decode($tags, true);
        // استخراج القيم
        $values = array_map(function ($tag) {
            return $tag['value'];
        }, $tagsArray);

        // الآن يمكنك حفظ القيم في قاعدة البيانات
        // ...
        foreach ($values as $value) {

            $stag_id = Stage::create([
                'title' => $value,
            ]);
            $projectStage = ProjectStage::create([
                'project_id' => $request->project_id,
                'stage_id' => $stag_id->id,
            ]);
        }
        Alert::success(' تمت العملية بنجاح ', ' ');
        return redirect()->route('project.show',$request->project_id);

    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectStage $projectStage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectStage $projectStage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
//
    }
    public function update_status(Request $request): \Illuminate\Http\RedirectResponse
    {

        ProjectStage::query()->where('project_id',$request->project_id)->update(['sort' => 0,]);
        foreach ($request->stage_status as $stagess) {
            ProjectStage::query()->where('stage_id', $stagess)->update([
                'sort' => 1,
            ]);
        }
        Alert::success(' تمت العملية بنجاح ', ' ');
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectStage $projectStage)
    {
        //
    }
}
