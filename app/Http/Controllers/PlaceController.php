<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use App\Rating;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PlaceController extends Controller
{
    public function __call($method, $parameters)
    {

        parent::__call($method, $parameters); // TODO: Change the autogenerated stub
    }

    public function index(){
        $places = Place::all();
        $categories = Category::all();
        return view('place/index',compact('places','categories'));
    }
    public function create(){
        $categories = Category::all();
        return view('place/create',compact('categories'));
    }
    public function store(Request $request){
        $destinationPath = 'files'; // upload path
//        $name = $request->file('photo')->getClientOriginalName();
        $extension = $request->file('photo')->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $request->file('photo')->move($destinationPath, $fileName); // uploading file to given path'
        $category = Category::find($request['category']);
        $place = Place::create([
            'title' => $request['title'],
            'categories_id' => $request['category'],
            'description' => $request['description'],
            'photo' => $fileName,
            'user_id' => Auth::user()->id
        ]);
        $place->save();
        return redirect(route('place.show',$place->id));
    }
    public function show($id){
        $place = Place::find($id);

        $place->reviews = $place->reviews+1;
        $place->save();

        $ratings = Rating::all();
        $data = $place->explain($id);
        return view('place/show',compact('place','ratings','data'));
    }
    public function edit($id){
        $place = Place::find($id);
        $categories = Category::all();
        return view('place/edit',compact('place','categories'));
    }

    public function update(Request $request,$id){
        $place = Place::find($id);
        if ($request->hasFile('photo')){
            if ($request->file('photo') !== $place->photo){
                File::delete('files/'.$place->photo);
            }
            $destinationPath = 'files'; // upload path
            $extension = $request->file('photo')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $request->file('photo')->move($destinationPath, $fileName); // uploading file to given path'
            $place->update([
                'title' => $request['title'],
                'categories_id' => $request['categories_id'],
                'description' => $request['description'],
                'photo' => $fileName
            ]);
        }
        else
            $place->update([
                'title' => $request['title'],
                'categories_id' => $request['categories_id'],
                'description' => $request['description'],
            ]);

        return redirect(route('place.show',$id));
    }
    public function delete($id){
        $place = Place::find($id);
        File::delete('files/'.$place->photo);
        $place->destroy($id);
        return redirect(route('place.index'));
    }

    public function comment(Request $request,$id){
        Rating::create([
            'user_id' => Auth::user()->id,
            'place_id' => $id,
            'comment'=>$request['comment'],
            'q_of_food' => $request['q_of_food'],
            'service_q' => $request['service_q'],
            'interior' => $request['interior']
        ]);
        return redirect(route('place.show',$id));
    }
    public function comment_update(Request $request,$id){
        $rating = Rating::find($id);
        $rating->update([
            'comment' => $request['comment'],
            'q_of_food' => $request['q_of_food'],
            'service_q' => $request['service_q'],
            'interior' => $request['interior']
        ]);
        return redirect(route('place.show',$rating->place->id));
    }

    public function search(Request $request){
        $word = '%'.$request['search'].'%';
        $places = Place::where('title','LIKE',$word)
            ->orWhere('description','LIKE',$word)->get();
        $categories = Category::where('name','LIKE',$word)->get();
        return view('place/search',compact('places','categories'));
    }
}
