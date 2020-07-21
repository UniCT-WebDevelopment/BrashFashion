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

Route::post('/main/checklogin', 'MainsController@checklogin');
Route::get('/main/logout', 'MainsController@logout');

Route::get('/staff/{staff}/index', 'StaffsController@index');
Route::post('/staff/statusOn/{cod_order}', 'StaffsController@statusOn');
Route::post('/staff/statusOff/{cod_order}', 'StaffsController@statusOff');

Route::get('/users/{user}/index', 'UsersController@index');
Route::post('/users/store', 'UsersController@store');
Route::get('/users/showInvoice/{order}', 'UsersController@showInvoice');
Route::get('/users/removeOrder/{order}', 'UsersController@removeOrder');

Route::get('/product/store', 'ProductsController@store');
Route::post('/product/destroy', 'ProductsController@destroy');

Route::post('/orders/store', 'OrdersController@store');