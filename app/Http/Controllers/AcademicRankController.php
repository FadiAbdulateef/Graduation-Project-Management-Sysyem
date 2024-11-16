<?php

namespace App\Http\Controllers;

use App\Models\AcademicRank;
use Illuminate\Http\Request;

class AcademicRankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AcademicRank = AcademicRank::all();
        return view('setting.index', compact('AcademicRank'));
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
//        $rank = new AcademicRank;
//        $rank->academic_degree = $request->academic_degree;
//        $rank->max_graduation_projects = $request->max_graduation_projects;
//        $rank->save();
        $request->validate([
            'academic_degree' => 'required',
            'max_graduation_projects' => 'required|email|unique:graduates,email',
        ]);
        $academicRank = AcademicRank::query()->create([
            'academic_degree' => $request->academic_degree,
        'max_graduation_projects' => $request->max_graduation_projects,
        ]);
        return redirect('/academic_ranks');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicRank $AcademicRank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicRank $AcademicRank)
    {
        return view('edit', compact('AcademicRank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicRank $AcademicRank)
    {
        $AcademicRank->academic_degree = $request->academic_degree;
        $AcademicRank->max_graduation_projects = $request->max_graduation_projects;
        $AcademicRank->save();

        return redirect('/academic_ranks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicRank $AcademicRank)
    {
        $AcademicRank->delete();
        return redirect('/academic_ranks');
    }
}
