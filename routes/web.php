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

Route::get('/', 'WebSiteController@getProducts');

Route::get('/admin', 'AdminPanelController@index');
Route::get('/admin/cms', 'AdminPanelController@successLogin');

Route::post('/admin/checklogin', 'AdminPanelController@checkLogin');
Route::get('/admin/logout', 'AdminPanelController@logout');

Route::get('/admin/products', 'ProductsController@index');
Route::get('/admin/product', 'ProductsController@create');
Route::post('/admin/product/store', 'ProductsController@store');
Route::get('/admin/product/{id}', 'ProductsController@show');
Route::post('/admin/product/update', 'ProductsController@update');
Route::get('/admin/product/destroy/{id}', 'ProductsController@destroy');

Route::get('/admin/price_group/create/{id}', 'PriceGroupController@create');
Route::post('/admin/price_group/store', 'PriceGroupController@store');
Route::get('/admin/price_group/{id}', 'PriceGroupController@show');
Route::post('/admin/price_group/update', 'PriceGroupController@update');
Route::get('/admin/price_group/destroy/{id}', 'PriceGroupController@destroy');

Route::get('/admin/gallery', 'CmsAlbumsController@index');
Route::get('/admin/gallery/create', 'CmsAlbumsController@create');
Route::post('/admin/gallery/store', 'CmsAlbumsController@store');
Route::get('/admin/gallery/{id}', 'CmsAlbumsController@show');
Route::get('/admin/gallery/destroy/{id}', 'CmsAlbumsController@destroy');

Route::get('/admin/photos/create/{id}', 'CmsPhotosController@create');
Route::post('/admin/photos/store', 'CmsPhotosController@store');
Route::get('/admin/photos/destroy/{id}', 'CmsPhotosController@destroy');