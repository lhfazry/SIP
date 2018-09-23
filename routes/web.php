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

Route::get('/test', function() {
    return view('test', ['message' => 'Hello Laravel']);
});


Route::get('/test2', function() {
    //return "Hello World";
    // defisnikan array data
    $subdata1 = [
        'sd11' => "123",
        'sd12' => "456"
    ];
    
    $subdata2 = [
        'sd22' => "789",
        'sd23' => "101112",
        'sd24' => "101113",
        'sd25' => "101114",
        'sd26' => "101115",
    ];

    $data = [
        'kata' => 'Saya suka Laravel',
        'kata2' => 'Saya tidak suka CodeIgniter',
        'url' => 'http://facebook.com',
        'tanggal' => date('d-m-Y'),
        'subdata1' => $subdata1,
        'subdata2' => $subdata2    
    ];

    return view('test')->with($data);
});

/*Route::get('/admin', function(){
    return view('admin/dashboard');
});*/

Route::get('/admin', 'DashboardController@index')->middleware('auth');

Route::get('/admin/category', 'CategoryController@index');

Route::get('/admin/category/{id}', 'CategoryController@show')->where('id', '[0-9]+')->middleware('auth');
Route::get('/admin/category/create', 'CategoryController@create')->name('category.create')->middleware('auth');
Route::post('/admin/category', 'CategoryController@store')->middleware('auth');
Route::get('/admin/category/{id}/edit/', 'CategoryController@edit')->where('id', '[0-9]+')->middleware('auth');
Route::put('/admin/category/{id}', 'CategoryController@update')->where('id', '[0-9]+')->middleware('auth');;
Route::delete('/admin/category/{id}', 'CategoryController@destroy')->where('id', '[0-9]+')->middleware('auth');;

Route::resource('/admin/product', 'ProductController')->middleware('auth');;

Route::get('/admin/trx', 'TransactionController@index')->middleware('auth');;
Route::get('/admin/trx/create', 'TransactionController@create')->middleware('auth');;
Route::post('/admin/trx/import', 'TransactionController@import')->middleware('auth');;

Route::get('/admin/login', 'LoginController@index')->name('login');
Route::post('/admin/login', 'LoginController@login');
Route::post('/admin/logout', 'LoginController@logout');