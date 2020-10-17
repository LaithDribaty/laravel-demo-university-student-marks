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


Route::get('/', 'MarksController@main');
Route::get('/compare' , 'MarksController@compare1');
Route::get('/compare/{id1}/{id2}' , 'MarksController@compare2');
Route::get('/subjects' , 'MarksController@subjects');
Route::get('/subjects/specified' , 'MarksController@marksFilter');
Route::get('/findme/{id}' , 'MarksController@findMe');
Route::get('/services' , function(){
    return view('services');
});
Route::get('/about' , function(){
    return view('about');
});

Route::get('/findme' , function(){
    return view('findMe');
});
