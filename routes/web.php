<?php

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

Route::group([],function(){
    Route::get('/',function (){
        if(auth('admin')->check() || request()->hasCookie('rememeber') || auth()->check()){
            return redirect('/home');
        }else{
            return redirect('/login');
        }
    });
});

Route::group([],function(){
    Route::get('/login','AuthController@index');
    Route::post('/login','AuthController@store');
    Route::get('/logout','AuthController@logout');
});

Route::group([],function(){
    Route::get('/admin-logout','AuthController@adminlogout');
    Route::get('/admin','AdminController@index');
    Route::get('/update-user/{id}','AdminController@update_index');
    Route::post('/updates','AdminController@update');
    Route::post('/delete-user/{id}','AdminController@delete');
    Route::get('/insert','AdminController@insert_index');
    Route::post('/insert','AdminController@insert');
    Route::post('/resetpw','AdminController@reset');
});

Route::get('storage/{filename}',function ($filename){
    $path = storage_path('public/' . $filename);
    if(!File::exists($path)){
        //error
    }
    $file = \File::get($path);
    $type = \File::mimeType($path);
    $res = \Response::make($file,200);
    $res->header("Content-Type",$type);
    return $res;
});

Route::group([],function (){
    Route::get('/home','HomeController@index');
    Route::get('/profile','HomeController@profile');
    Route::post('/profile','HomeController@update_profile');
    Route::get('/schedule','HomeController@schedule');
    Route::post('/update_pw_user','HomeController@updatepw');
});
