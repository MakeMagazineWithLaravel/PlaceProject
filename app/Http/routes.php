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

Route::get('categories/show/{id}',['as'=>'categories.show','uses'=>'CategoriesController@show']);
Route::get('place',['as'=>'place.index','uses'=>'PlaceController@index']);
Route::get('place/create',['as'=>'place.create','uses'=>'PlaceController@create','middleware' => 'auth']);
Route::get('place/show/{id}',['as'=>'place.show','uses'=>'PlaceController@show']);
Route::get('place/edit/{id}',['as'=>'place.edit','uses'=>'PlaceController@edit','middleware' => 'auth']);
Route::get('place/delete/{id}',['as'=>'place.destroy','uses'=>'PlaceController@delete','middleware' => 'auth']);
Route::post('place',['as'=>'place.store','uses'=>'PlaceController@store','middleware' => 'auth']);
Route::post('place/{id}',['as'=>'place.update','uses'=>'PlaceController@update','middleware' => 'auth']);
Route::get('place/comment/{id}',['as'=>'place.comment','uses'=>'PlaceController@comment','middleware' => 'auth']);
Route::get('place/comment/{id}/update',['as'=>'place.comment.update','uses'=>'PlaceController@comment_update','middleware' => 'auth']);
Route::post('place/show/{id}',['as'=>'image.add','uses'=>'ImageController@add','middleware'=>'auth']);
Route::get('image/edit/{id}',['as'=>'image.edit','uses'=>'ImageController@edit','middleware'=>'auth']);
Route::post('image/edit/{id}',['as'=>'image.update','uses'=>'ImageController@update','middleware'=>'auth']);
Route::get('image/delete/{id}',['as'=>'image.delete','uses'=>'ImageController@delete','middleware'=>'auth']);
Route::get('search',['as'=>'search','uses'=>'PlaceController@search']);

Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
   Route::get('/',['as'=>'admin.index','uses'=>'AdminController@index']);
    //categories
    Route::resource('categories','CategoriesController');
    Route::get('categories/delete/{id}',['as'=>'categories.destroy','uses'=>'CategoriesController@delete']);
    Route::post('categories/update/{id}',['as'=>'categories.update','uses'=>'CategoriesController@update']);
    Route::get('comment',['as'=>'admin.comment.index','uses'=>'AdminController@comment']);
    Route::get('accept/{id}',['as'=>'admin.comment.accept','uses'=>'AdminController@accept']);
    Route::get('delete/{id}',['as'=>'admin.comment.delete','uses'=>'AdminController@delete']);
    Route::get('place',['as'=>'admin.place.index','uses'=>'AdminController@place']);
    Route::get('place/active/{id}',['as'=>'admin.place.active','uses'=>'AdminController@active']);
    Route::get('place/delete/{id}',['as'=>'admin.place.delete','uses'=>'AdminController@destroy']);
    Route::get('search',['as'=>'admin.search','uses'=>'AdminController@search']);
});

