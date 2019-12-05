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
//    return view('welcome', ['laravel_version' => App()->version()]);
    return view('welcome');
});

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// use ressource
Route::resource('birthday', 'BirthdayController');
Route::get('export_excel','ExportController@export_excel')->name('export_excel');
Route::get('export_csv','ExportController@export_csv')->name('export_csv');