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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'HomeController@index');
Route::get('test', 'TestsController@index');

// Khusus untuk yang sudah login, apapun role-nya
Route::group(['middleware' => ['auth']], function() {

});

// Khusus role adminnadyne
Route::group(['middleware' => ['auth', 'role:adminnadyne']], function () {
    Route::get('/business', 'BusinessController@index')->name('business');
    Route::get('category', 'DatatablesController@index');
	Route::get('get-business-data', 'DatatablesController@businessData')->name('datatables.business');
});

