<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* routes for the article approval api */

Route::get('articles','Api\Articles@index');
Route::get('article/{id}','Api\Articles@story');

Route::put('appr/{id}/{permission}', 'Api\Articles@updatePermission');
Route::get('story/{id}', 'Api\Articles@story');

Route::delete('story/{id}', 'Api\Articles@delete');
Route::put('changepermission', 'Api\Articles@changePermission');
Route::get('arp/{permission}','Api\Articles@arp');

/* routes for profile api */
Route::post('userprofile','Auth\Profile@userprofile');

/* delete an user */
Route::delete('deleteuser/{id}','Auth\Profile@deleteprofile');

/* stories by catagory */
Route::get('catagory/{catagory}/{sort}','Api\Articles@get_stories_by_catagory');

/* get stories on dashboard of a specific user */
Route::get('dashstory/{userid}/{permission}/{sort}','Api\Articles@dashboardstory');

/* get total views of articles of a specific user */
Route::get('totalviews/{id}','Api\Articles@totalviews');

/* sidebar of home page */
Route::get('homesidebar','Api\Articles@HomeSideBar');

/* view all users */
Route::get('profile','Auth\Profile@allusers');
Route::post('editname','Auth\Profile@editname');
Route::post('editemail','Auth\Profile@editemail');

/* this is a test for cropping images */
Route::post('dummy','Dummy@savedata');
