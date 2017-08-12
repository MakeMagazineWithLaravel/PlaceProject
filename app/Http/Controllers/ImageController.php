<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function edit($id){
        $image = Image::find($id);
        return view('place/image/edit',compact('image'));
    }

    public function update(Request $request, $id){
        $image = Image::find($id);
        if($request->hasFile('image')){
                File::delete('images/'.$image->name);
                $destinationPath = 'images/';
                $name = $request->file('image')->getClientOriginalName();
                $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $request->file('image')->move($destinationPath, $fileName); // uploading file to given path'
                $image->update([
                    'original_name' => $name,
                    'name' => $fileName,
                ]);
        }
        return redirect(route('place.show',$image->place->id));
    }

    public function delete($id){
        $image = Image::find($id);
        $id = $image->place->id;
        File::delete('images/'.$image->name);
        $image->delete();
        return redirect(route('place.show',$id));
    }
}
