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
Route::post('/addData', 'HomeController@storeSales')->name('storeSales');
Route::get('/addData', 'HomeController@viewSales')->name('getSales');
Route::get('/salesData/{id}/edit', 'HomeController@editSales')->name('editSalesData');
Route::post('/salesData/{id}/edit', 'HomeController@updateSales')->name('updateSales');
Route::get('/salesData/{id}/', 'HomeController@deleteSales')->name('deleteSales');
Route::get('/uploadCsv','HomeController@showCsvScreen')->name('csv');
Route::post('/uploadCsv','HomeController@parseCsv')->name('parseCsv');
