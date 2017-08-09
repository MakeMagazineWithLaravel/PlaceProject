<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use App\Rating;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index(){
        $places = Place::all()->sortByDesc('created_at')->take(3);
        $comments = Rating::all()->sortByDesc('created_at')->take(3);
        return view('admin/index',compact('places','comments'));
    }

    public function comment(){
        $comments = Rating::all()->sortByDesc('created_at');
        return view('admin/comment/index',compact('comments'));
    }

    public function accept($id){

        $comment = Rating::find($id);
        $comment->accept = $comment->accept ? 0:1;
        $comment->save();
        return redirect(route('admin.comment.index'));
    }

    public function delete($id){
        Rating::destroy($id);
        return redirect(route('admin.comment.index'));
    }

    public function place(){
        $places = Place::all()->sortByDesc('created_at');
        return view('admin/place/index',compact('places'));
    }

    public function active($id){
        $place = Place::find($id);
        $place->active = !$place->active;
        $place->save();
        return redirect(route('admin.place.index'));
    }

    public function destroy($id){
        $place = Place::find($id);
        File::delete('files/'.$place->photo);
        $place->destroy($id);
        return redirect(route('admin.place.index'));
    }

    public function search(Request $request){
        $word = '%'.$request['search'].'%';
        $places = Place::where('title','LIKE',$word)
            ->orWhere('description','LIKE',$word)->get();
        $categories = Category::where('name','LIKE',$word)->get();
        return view('admin/search',compact('places','categories'));
    }
}
