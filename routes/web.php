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

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function(){

    // home
    Route::get('home', 'HomeController@index')->name('admin.home');
    Route::get('/', 'HomeController@index')->name('admin.home');

    // user
    Route::get('user/edit/password', 'User\UserController@editPassword')->name('user.edit.password');
    Route::put('user/password/{user}', 'User\UserController@updatePassword')->name('user.update.password');
    Route::put('user/destroy/{user}', 'User\UserController@destroy')->name('user.destroy');
    Route::put('user/create', 'User\UserController@create')->name('user.create');
    Route::post('user/store', 'User\UserController@store')->name('user.store');
    Route::resource('user', 'User\UserController', ['only' => ['index', 'edit', 'update']]);
    Route::get('users','User\UserController@listAll')->name('user.listAll');

    //client
    //Route::get('clientes', 'ClientController@index')->name('contract.index');
    Route::resource('clients', 'ClientController', ['as' => ''])->except(['show']);
    Route::post('clients/create/image/upload', 'ClientController@imageUpload')->name('imageUpload');
    Route::resource('contracts', 'ContractController', ['as' => ''])->except(['show']);
    Route::get('contracts/print{id}', 'ContractController@print')->name('contracts.print');
    Route::get('teste', 'ContractController@teste')->name('contracts.teste');
    Route::get('contracts/create','ContractController@create')->name('contracts.create');

    Route::get('/test', 'ContractController@test');




});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
