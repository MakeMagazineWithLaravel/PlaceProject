<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Auth;

Route::group(array('prefix' => 'api'), function() {
    Route::resource('restful-apis','APIController');
});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/',function (){
   return redirect(route('place.index'));
});
Route::resource('categories','CategoriesController');
Route::get('categories/delete/{id}',['as'=>'categories.destroy','uses'=>'CategoriesController@delete']);
Route::post('categories/update/{id}',['as'=>'categories.update','uses'=>'CategoriesController@update']);

Route::get('place',['as'=>'place.index','uses'=>'PlaceController@index']);
Route::get('place/create',['as'=>'place.create','uses'=>'PlaceController@create']);
Route::get('place/show/{id}',['as'=>'place.show','uses'=>'PlaceController@show']);
Route::get('place/edit/{id}',['as'=>'place.edit','uses'=>'PlaceController@edit']);
Route::get('place/delete/{id}',['as'=>'place.destroy','uses'=>'PlaceController@delete']);
Route::post('place',['as'=>'place.store','uses'=>'PlaceController@store']);
Route::post('place/{id}',['as'=>'place.update','uses'=>'PlaceController@update']);

Route::post('place/add',['as'=>'image.add','uses'=>'ImageController@add']);

