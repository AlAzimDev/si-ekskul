<?php

//Admin
Route::group(['prefix' => 'tutor'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin-home');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Admin\UsersController@index')->name('admin-users');
        Route::get('/siswa', 'Admin\UsersController@index_siswa')->name('admin-users-siswa');
        Route::get('/get-data-siswa', 'Admin\UsersController@data_siswa')->name('admin-users-siswa-data');
        Route::post('/siswa/store', 'Admin\UsersController@store_siswa')->name('admin-users-siswa-store');
        Route::get('/siswa/{id}/{nama_lengkap}/edit', 'Admin\UsersController@edit_siswa');
        Route::get('/siswa/{id}/{nama_lengkap}/hapus', 'Admin\UsersController@destroy_siswa');
    });
});
Auth::routes();

Route::get('/', function(){
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
