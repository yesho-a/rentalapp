<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    public function dropzone()
    {
        return view('dropzone');
    }
     
    /**
     * Image Upload Code
     *
     * @return void
     */
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
    
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
    
        return response()->json(['success'=>$imageName]);
    }
}
