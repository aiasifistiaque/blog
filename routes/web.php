<?php

use Illuminate\Http\Request;
use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lalalla', function () {
    return view('welcome');
});

Route::get('home/{catagory}','Catagory@catagory');
Route::get('catagory/{catagory}','Catagory@catagory_page');

Route::get('/write','Pages@write');

Route::get('/login','Pages@login');

Route::get('/approval','ApproveController@index');

//Route::get('/log','Pages@log');

Route::get('/form','Pages@form');
Route::get('/noaccess', function () {
    return view('Pages.Layouts.noaccess');
});

Route::get('/ind', function () {
    return view('index');
});

Route::get('/story/{id}','StoryController@writing');

Route::get('signup',function(){
    return view('auth.register');
});

Route::post('create','InsertController@insert');

/* Route::get('/','viewController@index'); */
Route::get('/approve','ApproveController@index');


Route::get('/home','viewController@index');

Route::get('/editPost/{id}','EditController@index');

Route::get('/index','viewController@index');

Route::post('createpost','InsertController@insertpost');
Route::post('editpost/{id}','UpdateController@editpost');

Route::get('/dashboard','viewController@profile');
Route::get('/userprofile','Auth\Profile@profile');

Route::get('/showprofile','Auth\Profile@showprofile');

Route::get('auth/facebook', 'Auth\FacebookController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleProviderCallback');
Auth::routes();

Route::post('upload_image','CKEditorController@uploadImage')->name('upload');

//Route::get('ajax-image-upload', 'AjaxCoverPostController@index');
Route::post('ajax-image-upload', 'AjaxCoverPostController@upload');

Route::get('postapproval','PostApproval@index');
Route::post('postapproval','PostApproval@approve');

Route::get('/approvewithoutajax','ApproveController@index');
Route::post('/approvewithoutajax','PostApproval@approve');

Route::get('/deletewithoutajax','ApproveController@index');
Route::delete('/deletewithoutajax/{id}','PostApproval@delete');

Route::get('/rejectwithoutajax','ApproveController@index');
Route::post('/rejectwithoutajax','PostApproval@reject');


Route::get('/changepostcover/{id}','ChangePostCover@index');
Route::post('/changepostcover/{id}','ChangePostCover@upload');

Route::post('/uploadcover','UploadCoverController@upload');

Route::get('/delete/{id}','DeleteArticle@destroy');




Route::get('/approve/arp', function () {
    return view('arp');
});

Route::get('/users', function () {
    return view('Users.showallusers');
});

Route::get('/cat', function () {
    return view('Pages.catagorybyapi');
});

Route::get('/profile', function () {
    return view('Users.Profile');
}); 

Route::get('/', function () {
    return view('Pages.indexFinal');
}); 

Route::get('/page', function () {
    return view('Pages.pagination');
});



