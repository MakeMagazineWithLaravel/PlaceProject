<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    public function add(Request $request){

        return redirect(route('place.index'));
    }
}
