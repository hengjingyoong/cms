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

Route::get('/', 'PagesController@index')->name('welcome');

Route::resource('container','ContainersController');
Route::resource('warehouse','WarehousesController', ['except' => ['show']]);
Route::resource('shipment','ShipmentsController', ['except' => ['create', 'store', 'destroy']]);
Route::resource('customer','CustomersController', ['except' => ['show']]);
