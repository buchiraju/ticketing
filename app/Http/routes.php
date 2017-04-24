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

Route::get('/', function () {
    return view('login');
});

Route::post('/brand/login', [
    'uses' => 'BrandController@checkLogic'
]);
Route::get('/ticket/soslogin/', [
    'uses' => 'BrandController@sosLogic'
]);

Route::get('/post/create', [
    'uses' => 'PostController@create'
]);

Route::post('/post/store', [
    'uses' => 'PostController@store'
]);
Route::get('/logout', function() {
 Session::flush();
  if(!Session::has('username'))
   {
      return "signout";
   }
 });
