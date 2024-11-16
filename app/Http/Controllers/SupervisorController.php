<?php

namespace App\Http\Controllers;

//use App\Enums\SupervisorDegree;
use App\Imports\SupervisorImport;
use App\Models\AcademicRank;
use App\Models\Department;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $supervisors = Supervisor::all();
        $academicRanks = AcademicRank::all();
        return view('supervisor.index', compact('supervisors','departments','academicRanks'));
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
        $request->validate([
//            'name'=>'required',
            'email'=>'required|email|unique:supervisors,email',
            'department_id'=>'required',
            'academic_rank_id'=>'required',
//            'is_external' => 'required',
//            'is_external' => 'required|in:0,1',
//            'for_year'=>'required',
        ],[],
        ['email'=>'البريد الالكتروني', 'department_id'=>' القسم', 'academic_rank_id'=>' الدرجة الاكاديمية']);
        if (Role::where('name', 'مشرف')->exists()) {
        $supervisor = Supervisor::query()->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'academic_rank_id'=>$request->academic_rank_id,
            'is_external' => $request->is_external,
            'for_year' => $request->for_year,
            'department_id' =>$request->department_id,
        ]);
      $user =  User::query()->create([
          'first_name' => $request->first_name,
          'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>Hash::make('12345678'),
        ]);
        $supervisor->update([
           'user_id' => $user->id
        ]);
        $user->assignRole(Role::findByName('مشرف'));
//            Alert::success('تم الاضافة بنجاح', '')->flash();
            return redirect()->route('supervisor.index');
        }
        else {
            Alert::warning('معذرةً', 'يجب أن تقوم باضافة دور باسم "مشرف" قبل إضافة أي مشرف ')->flash();
//            Alert::warning('معذرةً, لا يمكنك الإضافة في هذه الحالة', 'يجب أن تقوم بأضافة دور باسم "مشرف" قبل إضافة أي مشرف ');
            return back();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Supervisor $supervisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supervisor $supervisor)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $supervisor = Supervisor::findOrFail($request->id);
        $supervisor->update([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'academic_rank_id'=>$request->input('academic_rank_id'),
            'is_external'=>$request->input('is_external'),
            'for_year'=>$request->input('for_year'),
            'department_id'=>$request->input('department_id'),
        ]);
        $users = User::findOrFail($id);
        $users->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
        session()->flash('edit');
        return redirect()->route('supervisor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        Supervisor::findorFail($request->id)->delete();
        User::findorFail($id)->delete();
        session()->flash('delete');
        Supervisor::findorFail($id)->delete();
        return redirect()->route('supervisor.index');
    }

    public function import(Request $request) {
        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx'
        ]);
        try {

            $filename = $request->file('import_file');
            //dd($filename);
            //$excel = App::make('excel');
            Excel::import(new SupervisorImport, $filename);

            return back()->with('success', trans('messages.success'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
