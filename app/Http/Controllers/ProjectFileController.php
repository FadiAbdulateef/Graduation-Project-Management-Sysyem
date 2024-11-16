<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectFileRequest;
use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectFileController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectFileRequest $request): \Illuminate\Http\RedirectResponse
    {
        /**@var UploadedFile $file */
        $file = $request->file('file');
        $fileName =$file->getClientOriginalName();
        Storage::disk('projects')->put($request->project_id . '/' . $fileName , $file->getContent());
        $projectfile =ProjectFile::query()->create([
            'project_id'=>$request->project_id,
            'path' => Storage::disk('projects')->path($request->project_id . '/' .$fileName)
               ]);
        Alert::success(' تم العملية بنجاح  ', 'شكراً لك');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectFile $projectFile)
    {
        //
    }
    public function downloadFile(Request $request)
    {
        $path = $request->input('path');
        return response()->download(Storage::disk('projects')->path($path));
    }
    public function deleteFile(Request $request)
    {
        $path = $request->input('filepath');
//        dd($path);
//        ProjectFile::query()->where('path',$path)->delete();
        Storage::disk('projects')->delete($path);
        return redirect()->back();
    }
}
