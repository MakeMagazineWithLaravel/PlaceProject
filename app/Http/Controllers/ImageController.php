<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function add(Request $request,$id){
        if($request->hasFile('images')){
            foreach ($request->file('images') as $my_file){
                $destinationPath = 'images/';
                $name = $my_file->getClientOriginalName();
                $extension = $my_file->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $my_file->move($destinationPath, $fileName); // uploading file to given path'
                Image::create([
                    'original_name' => $name,
                   'name' => $fileName,
                    'place_id' => $id,
                    'user_id' => Auth::user()->id
                ]);
            }
        }
        return redirect(route('place.show',$id));
    }
}
