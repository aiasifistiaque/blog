<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class CKEditorController extends Controller

{
    public function uploadImage(Request $request) {

        $CKEditor = $request->input('CKEditor');
        $funcNum  = $request->input('CKEditorFuncNum');
        $message  = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            if ($file->isValid()) {
                $filename =rand(1000,9999).$file->getClientOriginalName();
                //$file->move(public_path().'/wysiwyg/', $filename);
                //$file = $request->file('upload');
               // $url = url('wysiwyg/' . $filename);
                Storage::disk('s3')->put($filename, file_get_contents($file), 'public');
                $url = Storage::url($filename);
            } else {
                $message = 'An error occurred while uploading the file.';
            }
        } else {
            $message = 'No file uploaded.';
        }
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }
}
