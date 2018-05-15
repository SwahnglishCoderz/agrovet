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

Route::post('/logout', "LoginController@logout");

Route::get('/admin', "AdminController@index");
Route::get('/not-allowed', "ErrorController@index");

Route::get('/manufacturer/index', "ManufacturerController@index");
Route::get('/manufacturer/create', "ManufacturerController@create");
Route::post('/manufacturer/store', "ManufacturerController@store");
Route::get('/manufacturer/view', "ManufacturerController@view");
Route::get('/manufacturer/edit/{id}', "ManufacturerController@edit");
Route::post('/manufacturer/update/{id}', "ManufacturerController@update");
Route::get('/manufacturer/delete/{id}', "ManufacturerController@delete");

Route::get('/type/index', "TypeController@index");
Route::get('/type/create', "TypeController@create");
Route::post('/type/store', "TypeController@store");
Route::get('/type/view', "TypeController@view");
Route::get('/type/edit/{id}', "TypeController@edit");
Route::post('/type/update/{id}', "TypeController@update");
Route::get('/type/delete/{id}', "TypeController@delete");

Route::get('/product/index', "ProductController@index");
Route::get('/product/create', "ProductController@create");
Route::post('/product/store', "ProductController@store");
Route::get('/product/view', "ProductController@view");
Route::get('/product/edit/{id}', "ProductController@edit");
Route::post('/product/update/{id}', "ProductController@update");
Route::get('/product/delete/{id}', "ProductController@delete");

Route::get('/stock/index', "StockController@index");
Route::get('/stock/create', "StockController@create");
Route::post('/stock/store', "StockController@store");
Route::get('/stock/view', "StockController@view");
Route::get('/stock/edit/{id}', "StockController@edit");
Route::post('/stock/update/{id}', "StockController@update");
Route::get('/stock/delete/{id}', "StockController@delete");

Route::get('/price/index', "PriceController@index");
Route::get('/price/create', "PriceController@create");
Route::post('/price/store', "PriceController@store");
Route::get('/price/view', "PriceController@view");
Route::get('/price/edit/{id}', "PriceController@edit");
Route::post('/price/update/{id}', "PriceController@update");
Route::get('/price/delete/{id}', "PriceController@delete");

Route::get('/sale/index', "SaleController@index");
Route::get('/sale/create', "SaleController@create");
Route::post('/sale/store', "SaleController@store");
Route::get('/sale/view', "SaleController@view");
Route::get('/sale/edit/{id}', "SaleController@edit");
Route::post('/sale/update/{id}', "SaleController@update");
Route::get('/sale/delete/{id}', "SaleController@delete");

//visitors links
Route::group(['middleware' => 'visitors'], function (){
    Route::get('/', "LoginController@login");
    Route::post('/login', "LoginController@postLogin");

    Route::get('/forgot-password','ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password','ForgotPasswordController@postForgotPassword');

    Route::get('/reset/{email}/{resetCode}','ForgotPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}','ForgotPasswordController@postResetPassword');
});

