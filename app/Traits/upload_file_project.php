<?php

namespace App\Traits;

use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait upload_file_project{

    public function verifyAndStoreFile(Request $request, $inputname , $foldername , $disk, $imageable_id, $imageable_type) {

        if( $request->hasFile( $inputname ) ) {

            // Check img
            if (!$request->file($inputname)->isValid()) {
                flash('Invalid Image!')->error()->important();
                return redirect()->back()->withInput();
            }

            $photo = $request->file($inputname);
            $name = \Str::slug($request->input('name'));
            $filename = $name. '.' . $photo->getClientOriginalExtension();

            // insert Image
            $File = new ProjectFile();
            $File->filename = $filename;
            $File->imageable_id = $imageable_id;
            $File->imageable_type = $imageable_type;
            $File->save();
            return $request->file($inputname)->storeAs($foldername, $filename, $disk);
        }

        return null;

    }


    public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {

        // insert Image
        $Image = new Image();
        $Image->filename = $varforeach->getClientOriginalName();
        $Image->imageable_id = $imageable_id;
        $Image->imageable_type = $imageable_type;
        $Image->save();
        return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
    }



    public function Delete_attachment($disk,$path,$id){

        Storage::disk($disk)->delete($path);
        image::where('imageable_id',$id)->delete();

    }





}
