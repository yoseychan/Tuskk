<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiImageUpload extends Controller
{
      public function uploadImage(Request $request)
    {
        $this->validate($request, [

            'image' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        if (!$request->hasFile('file')) {
            return response()->json([
                'error' => 'No File Uploaded'
            ]);
        }

        $file = $request->file('file');

        if (!$file->isValid()) {
            return response()->json([
                'error' => 'File is not valid!'
            ]);
        }
        //saving the file
        $path = $file->store('public/article_images');

        $final_path = substr($path, 7);
        return [
            'status' => 200,
            'name' => $final_path
        ];
    }
}
