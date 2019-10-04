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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',function(){
	return view('welcome');
});
Route::post('/login','UserController@login');

Route::get('/signup',function(){
	return view('auth.signup');
});
Route::post('/signup','UserController@signup');
Route::get('/logout','UserController@logout');

/*Route::get('/hello/{id}/edit/{name}',function($id,$name){
	echo $id."<br/>";
	echo $name;
})->where(["id"=> "[1-5]+", "name" => "[a-c]+"]);*/

Route::middleware('verifyloggedinuser')->group(function(){
	Route::get('/products','UserController@index');
	Route::get('/product','UserController@create');
	Route::post('/product','UserController@store');
	Route::get('/product/{id}','UserController@edit')->where('id', '[1-9]+');
	Route::post('/product/{id}','UserController@update')->where('id', '[1-9]+');
	Route::delete('/product/{id}','UserController@destroy')->where('id', '[1-9]+');
});