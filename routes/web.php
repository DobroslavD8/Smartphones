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

Route::resource('phones', 'PhonesController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manufacturerlist', function(){
    return view('ManufacturerList', ['phones'=>'']);
});

Route::get('/modellist', function(){
    return view('ModelList', ['phones'=>'']);
});

Route::get('/adminpanel', function(){
    return view('adminPanel', ['phones'=>'']);
});
