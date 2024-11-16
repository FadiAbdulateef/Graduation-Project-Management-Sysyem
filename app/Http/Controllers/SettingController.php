<?php

namespace App\Http\Controllers;

use App\Models\AcademicRank;
use App\Models\AcademicRanks;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = $this->createDefaultSettings();
        }
        $academicRanks = AcademicRank::all();

        return view('setting.index',compact('academicRanks','setting'));
    }

    private function createDefaultSettings()
    {
        return Setting::create([
            'team_members' => 5,
            'supervisor_score' => 60,
            'committee_member_score' => 40,
            'registration_start_date' => Carbon::now(),
            'registration_end_date' => Carbon::now()->addDays(10),
        ]);

//        $settings = Setting::all();
            return view('setting.index', compact('settings'));
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
            'academic_degree'=>'required',
            'max_graduation_projects'=>'required',
        ]);
        $academicRanks = AcademicRank::query()->create([
            'academic_degree' => $request->academic_degree,
            'max_graduation_projects' => $request->max_graduation_projects,
        ]);
        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'team_members'=>'required',
            'supervisor_score'=>'required',
            'committee_member_score'=>'required',
            'registration_start_date'=>'required',
            'registration_end_date'=>'required',
        ]);
        $setting = Setting::first();

        if (!$setting) {
            $setting = $this->createDefaultSettings();
        }
//        $data = $request->all();
        $setting->update([
            'team_members'=>$request->team_members,
            'supervisor_score'=>$request->supervisor_score,
            'committee_member_score'=>$request->committee_member_score,
            'registration_start_date'=>$request->registration_start_date,
            'registration_end_date'=>$request->registration_end_date,
        ]);
        Alert::success('', 'تم تحديث البيانات بنجاح ..');
//        return redirect()->back()->with('success', 'Settings updated successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
    public function reset()
    {
        $setting = Setting::first();

        if ($setting) {
            $setting->delete();
        }

        $this->createDefaultSettings();
        Alert::success(' نجاح  ', 'تم إعادة القيم الإفتراضية ');
        return redirect()->back()->with('success', 'Settings reset successfully');
    }

    public function updateacademicRanks(Request $request)
    {
        $request->validate([
            'academic_degree'=>'required',
            'max_graduation_projects'=>'required',
        ]);
//        dd($request->max_graduation_projects);
        foreach ($request->id as $key=>$id){
            $academicRanks = AcademicRank::query()->where('id',$id)->update([
                'academic_degree'=>$request->academic_degree[$key],
                'max_graduation_projects'=>$request->max_graduation_projects[$key]
            ]);
        }
//        $academicRanks = AcademicRanks::query()->update(request()->all());
        //            'academic_degree'=>$request->academic_degree,
//            'max_graduation_projects'=>$request->max_graduation_projects,
        Alert::success('', 'تم تحديث البيانات بنجاح ..');
//        return redirect()->back()->with('success', 'Settings updated successfully');
        return redirect()->back();
    }
}
