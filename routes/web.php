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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('products', 'ProductsController');

Route::resource('bevetelezes', 'BevetelezesController');
Route::patch('/bevetelezes', 'BevetelezesController@update');

Route::resource('kiadas', 'KiadasController');
Route::patch('/kiadas', 'KiadasController@update');

Route::get('/pdf/invoice', 'PDFMaker@make');

Route::resource('feladatok', 'TasksController');
Route::delete('feladatok/{id}','TasksController@destroy');
/*
Route::delete('/feladatok/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/feladatok');
});*/
