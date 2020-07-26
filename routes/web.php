<?php

use Illuminate\Support\Facades\Route;

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

// Status route
Route::get('/statuses', 'StatusController@index');

// Project route
Route::get('/projects', 'ProjectController@index');
Route::get('/projects/{id}', 'ProjectController@show');
Route::post('/projects', 'ProjectController@store');
Route::put('/projects/{id}', 'ProjectController@update');
Route::delete('/projects/{id}', 'ProjectController@destroy');