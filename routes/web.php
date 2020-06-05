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

//ユーザー
Route::group(['prefix' => 'reservations', 'middleware' => 'auth'], function(){
    Route::get('index', 'ReservationController@index')->name('reservations.index');
    Route::get('create', 'ReservationController@create')->name('reservations.create');
    Route::post('store', 'ReservationController@store')->name('reservations.store');
    Route::get('show/{id}', 'ReservationController@show')->name('reservations.show');
    Route::get('edit/{id}', 'ReservationController@edit')->name('reservations.edit');
    Route::post('update/{id}', 'ReservationController@update')->name('reservations.update');
    Route::post('destroy/{id}', 'ReservationController@destroy')->name('reservations.destroy');
});

//管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});





Route::get('/home', 'HomeController@index')->name('home');
