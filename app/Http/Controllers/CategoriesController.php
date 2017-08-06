<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories/index',compact('categories'));
    }

    public function create(){
        return view('categories/create');
    }

    public function store(Request $request){
        $category = Category::create($request->all());
        $category->save();
        return $this->index();
    }
    public function show($id){
        $category = Category::find($id);
        $places = $category->place;
        $categories = Category::all();
        return view('place/index',compact('categories','places'));
    }
    public function edit($id){
        $category = Category::find($id);
        return view('categories/edit',compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->update($request->all());
        return $this->index();
    }

    public function delete($id){
        Category::destroy($id);
        return $this->index();
    }
}
