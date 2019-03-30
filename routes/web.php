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
//Routes for zone
Route::get('/zone', 'ZoneController@index')
        -> name('zone.index');
Route::get('/zone/create', 'ZoneController@create')
        -> name('zone.create');
Route::post('/zone', 'ZoneController@store')
        -> name('zone.store');
Route::get('/zone/{id}', 'ZoneController@show')
        -> name('zone.show');
Route::get('/zone/{id}/edit', 'ZoneController@edit')
        -> name('zone.edit');
Route::put('/zone/{id}', 'ZoneController@update')
        -> name('zone.update');
Route::resource('/zone', 'ZoneController');
Route::get('zone/delete/{zone}',['as' => 'zone.delete', 'uses' => 'ZoneController@destroy']);

//Routes for floor
Route::get('/floor', 'FloorController@index')
        -> name('floor.index');
Route::get('/floor/create', 'FloorController@create')
        -> name('floor.create');
Route::post('/floor', 'FloorController@store')
        -> name('floor.store');
Route::get('/floor/{id}', 'FloorController@show')
        -> name('floor.show');
Route::get('/floor/{id}/edit', 'FloorController@edit')
        -> name('floor.edit');
Route::put('/floor/{id}', 'FloorController@update')
        -> name('floor.update');
Route::resource('/floor', 'FloorController');
Route::get('floor/delete/{floor}',['as' => 'floor.delete', 'uses' => 'FloorController@destroy']);

//Routes for category
Route::get('/category', 'CategoryController@index')
        -> name('category.index');
Route::get('/category/create', 'CategoryController@create')
        -> name('category.create');
Route::post('/category', 'CategoryController@store')
        -> name('category.store');
Route::get('/category/{id}', 'CategoryController@show')
        -> name('category.show');
Route::get('/category/{id}/edit', 'CategoryController@edit')
        -> name('category.edit');
Route::put('/category/{id}', 'CategoryController@update')
        -> name('category.update');
Route::resource('/category', 'CategoryController');
Route::get('category/delete/{category}',['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);

//Routes for tenant
Route::get('/tenant', 'TenantController@index')
        -> name('tenant.index');
Route::get('/tenant/create', 'TenantController@create')
        -> name('tenant.create');
Route::post('/tenant', 'TenantController@store')
        -> name('tenant.store');
Route::get('/tenant/{id}', 'TenantController@show')
        -> name('tenant.show');
Route::get('/tenant/{id}/edit', 'TenantController@edit')
        -> name('tenant.edit');
Route::put('/tenant/{id}', 'TenantController@update')
        -> name('tenant.update');
Route::resource('/tenant', 'TenantController');
Route::get('tenant/delete/{tenant}',['as' => 'tenant.delete', 'uses' => 'TenantController@destroy']);

Auth::routes();
Route::get('/admins', 'AdminController@index')->name('admins.index');
Route::post('/admins/store', 'AdminController@store')->name('admins.store');

Route::get('/home', 'HomeController@index')->name('home');
