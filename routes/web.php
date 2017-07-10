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

/*
Route::get('/', function () {
    return view('auth/welcome');
});*/

Route::get('/','SysController@index');
Route::get('home','SysController@index');

Route::get('/productentry','ProductEntryController@index');
Route::post('/entry','ProductEntryController@create');
Route::get('/api/{id}','ProductEntryController@api');

Route::get('/sellproduct','SellProductController@index');
Route::post('/sell','SellProductController@sell');
Route::post('/sapi','SellProductController@api');

Route::get('/check','CheckAvailabilityController@index');
Route::post('/checkproduct','CheckAvailabilityController@check');
Route::get('/reportdate','DateWiseReportController@index');
Route::get('/reportmonthly','MonthlyReportController@index');
Route::get('/brand','BrandnameController@index');
Route::post('/brandEntry','BrandnameController@brand');
Route::get('/model','ModelController@index');
Route::post('/modelEntry','ModelController@model');


Route::resource('home','SysController');

Auth::routes();

//Route::get('auth/home', 'HomeController@index')->name('home');
