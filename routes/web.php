<?php

use App\Events\OrderStatusUpdate;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/projects', 'ProjectController@index');
    Route::get('/projects/{project}', 'ProjectController@show');
    Route::post('/projects', 'ProjectController@store');
    Route::put('/projects/{id}', 'ProjectController@update');
    Route::delete('/projects/{id}', 'ProjectController@destroy');
    Route::get('/projects/{project}/tasks', 'ProjectController@getTasks');
});



// Book Route
Route::get('/books', 'BookController@index');
Route::get('/books/create', 'BookController@create');
Route::get('/books/{book}', 'BookController@show');
Route::post('/books', 'BookController@store');
Route::get('/books/{book}/edit', 'BookController@edit');
Route::put('/books/{book}', 'BookController@update');
Route::delete('/books/{book}', 'BookController@destroy');


// Mail
Route::get('/mail', 'MailController@index');
Route::post('/mail', 'MailController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Task
Route::post('/tasks', 'TaskController@store');