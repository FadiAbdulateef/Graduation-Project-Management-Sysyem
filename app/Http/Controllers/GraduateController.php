<?php

namespace App\Http\Controllers;

use App\Imports\GraduateImport;
use App\Models\Department;
use App\Models\Graduate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class GraduateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $graduates = Graduate::all();
        return view('Graduate.index', compact('graduates', 'departments'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:graduates,email',
            'department_id' => 'required',
//            'phone'=>'nullable|digits:9|unique:users,phone',
        ]);
        if ($request->file) {
            $imageName = $request->name . '_' . date('Y-m-d-H') . '_' . uniqid() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('assets/img/'), $imageName);
            $images = 'assets/img/' . $imageName;
        }
        if (Role::where('name', 'خريج')->exists()) {
            $graduate = Graduate::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'avatar' => $images ?? null,
                'for_year' => $request->for_year,
                'department_id' => $request->department_id,
            ]);
            $user = User::query()->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'stdsn' => $request->serial_number,
                'email' => $request->email,
                'password' => Hash::make('12345678'),
            ]);
//             $user->assignRole('خريج');
            $graduate->update([
                'user_id' => $user->id
            ]);

            $user->assignRole(Role::findByName('خريج'));
            Alert::success('تم الاضافة بنجاح', '');

            return redirect()->route('graduate.index');
        }
        else {
//            Alert::warning('معذرةً, لا يمكنك الإضافة في هذه الحالة', 'يجب أن تقوم بإضافة دور باسم "خريج" قبل إضافة الطالب(الخريج) ');
            Alert::warning('معذرةً', 'يجب أن تقوم بإضافة دور باسم "خريج" قبل إضافة الطالب(الخريج) ');
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public
    function show(Graduate $graduate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(Graduate $graduate)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public
    function update(Request $request, $id)
    {
//        $request->validate([
//            'email'=>'required|unique:Graduates',
//            'phone'=>'required|unique:Graduates',
//        ]);

        $graduate = Graduate::findOrFail($request->id);
        $graduate->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'for_year' => $request->input('for_year'),
            'department_id' => $request->input('department_id'),
        ]);
        $users = User::findOrFail($id);
        $users->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
        ]);
        session()->flash('edit');
        return redirect()->route('graduate.index');
    }

    public
    function destroy(Request $request, $id)
    {
        $img = Graduate::findOrFail($request->id);
        if ($img->avatar) {
            unlink(public_path($img->avatar));
        }
        Graduate::findorFail($request->id)->delete();
        User::findorFail($id)->delete();
        session()->flash('delete');
        return redirect()->route('graduate.index');
//        $img = Graduate::findOrFail($id);
//        if ($img->avatar) {
//            unlink(public_path($img->avatar));
//        }
//        Graduate::findorFail($id)->delete();
//        session()->flash('delete');
//        return redirect()->route('graduate.index');

    }

    /**
     * Remove the specified resource from storage.
     */

    public
    function destroy_select(Request $request)
    {
        // delete selector graduate
        $delete_select_id = explode(",", $request->delete_select_id);
        foreach ($delete_select_id as $ids_gradute) {
            $img = Graduate::findorfail($ids_gradute);
            if ($img->avatar) {
                unlink(public_path($img->avatar));
            }
        }
        Graduate::destroy($delete_select_id);
        session()->flash('delete');
        return redirect()->route('graduate.index');
    }

    public function import(Request $request) {
        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx'
        ]);
        try {

            $filename = $request->file('import_file');
            //dd($filename);
            //$excel = App::make('excel');
            Excel::import(new GraduateImport, $filename);

            return back()->with('success', trans('messages.success'));
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
