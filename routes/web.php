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

Route::get('/auth','UserController@auth')->name('auth');

//GET STOCK BY ID
Route::get('/stock/{id}','StockController@getById')->name('stock.getById');
//GET STOCK BY PRODUCT ID
Route::get('/stock/product/{id}','StockController@getByProductId')->name('stock.getById');
//GET STOCK LIST
Route::get('/stock','StockController@get')->name('stock.get');
//REFRESH STOCK
Route::get('/stock_update','StockController@update')->name('stock.update');

//GET PRODUCT BY ID
Route::get('/product/{id}','ProductController@getById')->name('product.getById');
//GET PRODUCT BY CATEGORY ID
Route::get('/product/category/{id}','ProductController@getByCategoryId')->name('product.getByCategoryId');
//GET PRODUCT BY SKU
Route::get('/product/sku/{id}','ProductController@getBySku')->name('product.getBySku');
//GET PRODUCT LIST
Route::get('/product','ProductController@get')->name('product.get');
//REFRESH PRODUCT
Route::get('/product_update','ProductController@update')->name('product.update');

//GET PHARMACY BY ID
Route::get('/pharmacy/{id}','PharmacyController@getById')->name('pharmacy.getById');
//GET PHARMACY LIST
Route::get('/pharmacy','PharmacyController@get')->name('pharmacy.get');
//REFRESH PHARMACY
Route::get('/pharmacy_update','PharmacyController@update')->name('pharmacy.update');

//GET DELIVERY METHOD BY ID
Route::get('/delivery_methods/{id}','DeliveryMethodController@getById')->name('delivery.method.getById');
//GET DELIVERY METHOD LIST
Route::get('/delivery_methods','DeliveryMethodController@get')->name('delivery.method.get');
//REFRESH DELIVERY METHOD
Route::get('/delivery_methods_update','DeliveryMethodController@update')->name('delivery.method.update');

//GET PAYMENT METHOD BY ID
Route::get('/payment_methods/{id}','PaymentMethodController@getById')->name('payment.method.getById');
//GET PAYMENT METHOD LIST
Route::get('/payment_methods','PaymentMethodController@get')->name('payment.method.get');
//REFRESH PAYMENT METHOD
Route::get('/payment_methods_update','PaymentMethodController@update')->name('payment.method.update');

//GET CATEGORY BY ID
Route::get('/category/{id}','CategoryController@getById')->name('category.getById');
//GET CATEGORY LIST
Route::get('/category','CategoryController@get')->name('category.get');
//REFRESH CATEGORY
Route::get('/category_update','CategoryController@update')->name('category.update');

//GET CITY BY ID
Route::get('/city/{id}','CityController@getById')->name('city.getById');
//GET CITY LIST
Route::get('/city','CityController@get')->name('city.get');
//REFRESH CITY DATABASE
Route::get('/city_update','CityController@update')->name('city.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
