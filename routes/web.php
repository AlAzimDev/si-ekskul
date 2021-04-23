<?php

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Free User
Route::get('/', function(){
    return redirect()->route('home');
})->name('index');
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/blog/{id}/{judul_blog}/data', 'HomeController@blog_detail');
    Route::get('/events', 'HomeController@events')->name('events');
});

//Admin
Route::group(['prefix' => 'tutor','as'=>'admin-','middleware'=>'checkuser:2'], function () {
    Route::get('/', 'Admin\HomeController@index')->name('home');
    Route::group(['prefix' => 'users','as'=>'users-'], function () {
        Route::get('/', 'Admin\UsersController@index')->name('home');
        //Admin
        Route::get('/admin', 'Admin\UsersController@index_admin')->name('admin');
        Route::get('/get-data-admin', 'Admin\UsersController@data_admin')->name('admin-data');
        Route::post('/admin/store', 'Admin\UsersController@store_admin')->name('admin-store');
        Route::get('/admin/{id}/{name}/edit', 'Admin\UsersController@edit_admin');
        Route::post('/admin/{id}/{name}/update', 'Admin\UsersController@update_admin');
        Route::get('/admin/{id}/{name}/hapus', 'Admin\UsersController@destroy_admin');
        //Operator
        Route::get('/operator', 'Admin\UsersController@index_operator')->name('operator');
        Route::get('/get-data-operator', 'Admin\UsersController@data_operator')->name('operator-data');
        Route::post('/operator/store', 'Admin\UsersController@store_operator')->name('operator-store');
        Route::get('/operator/{id}/{name}/edit', 'Admin\UsersController@edit_operator');
        Route::post('/operator/{id}/{name}/update', 'Admin\UsersController@update_operator');
        Route::get('/operator/{id}/{name}/hapus', 'Admin\UsersController@destroy_operator');
        //Siswa
        Route::get('/siswa', 'Admin\UsersController@index_siswa')->name('siswa');
        Route::get('/get-data-siswa', 'Admin\UsersController@data_siswa')->name('siswa-data');
        Route::post('/siswa/store', 'Admin\UsersController@store_siswa')->name('siswa-store');
        Route::get('/siswa/{id}/{nama_lengkap}/edit', 'Admin\UsersController@edit_siswa');
        Route::post('/siswa/{id}/{nama_lengkap}/update', 'Admin\UsersController@update_siswa');
        Route::get('/siswa/{id}/{nama_lengkap}/hapus', 'Admin\UsersController@destroy_siswa');

        Route::post('/download-data-siswa', 'Admin\UsersController@download_datasiswa')->name('siswa-download');
        Route::post('/download-data-import', 'Admin\UsersController@import')->name('siswa-import');
    });
    Route::group(['prefix' => 'absensi','as'=>'absensi-'], function () {
        Route::get('/', 'Admin\AbsensiController@index')->name('home');
        Route::post('/store', 'Admin\AbsensiController@store')->name('store');
        Route::post('/download', 'Admin\AbsensiController@download_dataabsen')->name('download');
        Route::get('/{id}/{materi_pembelajaran}/hapus', 'Admin\AbsensiController@destroy');
        Route::get('/detail/{id}/{materi_pembelajaran}/detail', 'Admin\AbsensiController@detail');
        Route::get('/detail/get-data-detail/{id}/{materi_pembelajaran}/detail', 'Admin\AbsensiController@data_detail')->name('detail');
    });
    Route::group(['prefix' => 'soal', 'as' => 'soal-'], function(){
        Route::get('/', 'Admin\SoalController@index')->name('home');
        Route::post('/store', 'Admin\SoalController@store')->name('store');
        Route::get('/get-data', 'Admin\SoalController@data')->name('data');
        Route::get('/{id}/{judul_soal}/edit', 'Admin\SoalController@edit');
        Route::post('/{id}/{judul_soal}/update', 'Admin\SoalController@update');
        Route::get('/{id}/{judul_soal}/hapus', 'Admin\SoalController@destroy');
        Route::get('/{id}/{judul_soal}/data', 'Admin\SoalController@data_soal');
        Route::post('/{id}/{judul_soal}/data/store', 'Admin\SoalController@data_store')->name('data-store');
        Route::get('/{id}/{judul_soal}/data/{id_datasoal}/hapus', 'Admin\SoalController@data_hapus');
    });
    Route::group(['prefix' => 'nilai', 'as' => 'nilai-'], function(){
        Route::get('/', 'Admin\NilaiController@index')->name('home');
        Route::get('/{id}/detail-nilai/{judul_soal}', 'Admin\NilaiController@nilai');
        Route::get('/{id}/detail-nilai/{judul_soal}/{id_user}/{name}', 'Admin\NilaiController@detail_nilai');
    });
    Route::group(['prefix' => 'jawaban', 'as' => 'jawaban-'], function(){
        Route::get('/', 'Admin\AnswerController@index')->name('home');
        Route::get('/{id}/user/{judul_soal}', 'Admin\AnswerController@user_jawaban');
        Route::get('/{id}/user/{judul_soal}/{id_user}/{name}/periksa-jawaban', 'Admin\AnswerController@periksa_jawaban');
        Route::post('/periksa-jawaban/store', 'Admin\AnswerController@store')->name('store');
    });
    Route::group(['prefix' => 'blog', 'as' => 'blog-'], function(){
        Route::get('/', 'Admin\BlogController@index')->name('home');
        Route::post('/store', 'Admin\BlogController@store')->name('store');
        Route::get('/{id}/{judul_blog}/data', 'Admin\BlogController@data');
        Route::get('/{id}/{judul_blog}/hapus', 'Admin\BlogController@destroy');
    });
    Route::group(['prefix' => 'home', 'as' => 'home-'],function(){
        Route::get('/', 'Admin\HomeController@home')->name('home');
        Route::post('/modal1', 'Admin\HomeController@modal1')->name('modal1');
        Route::post('/modal2', 'Admin\HomeController@modal2')->name('modal2');
        Route::post('/modal3', 'Admin\HomeController@modal3')->name('modal3');
        Route::post('/modal4', 'Admin\HomeController@modal4')->name('modal4');
        Route::post('/modal5', 'Admin\HomeController@modal5')->name('modal5');
    });
});

//Petugas
Route::group(['prefix' => 'operator','as'=>'operator-','middleware'=>'checkuser:1'], function () {
    Route::get('/', 'Operator\HomeController@index')->name('home');
    Route::get('/siswa', 'Operator\SiswasController@index_siswa')->name('siswa');
    Route::get('/get-data-siswa', 'Operator\SiswasController@data_siswa')->name('siswa-data');
    Route::post('/download-data-siswa', 'Operator\SiswasController@download_datasiswa')->name('siswa-download');
    Route::group(['prefix' => 'absensi','as'=>'absensi-'], function () {
        Route::get('/', 'Operator\AbsensiController@index')->name('home');
        Route::post('/store', 'Operator\AbsensiController@store')->name('store');
        Route::post('/download', 'Operator\AbsensiController@download_dataabsen')->name('download');
        Route::get('/{id}/{materi_pembelajaran}/hapus', 'Operator\AbsensiController@destroy');
        Route::get('/detail/{id}/{materi_pembelajaran}/detail', 'Operator\AbsensiController@detail');
        Route::get('/detail/get-data-detail/{id}/{materi_pembelajaran}/detail', 'Operator\AbsensiController@data_detail')->name('detail');
    });
    Route::group(['prefix' => 'soal', 'as' => 'soal-'], function(){
        Route::get('/', 'Operator\SoalController@index')->name('home');
        Route::post('/store', 'Operator\SoalController@store')->name('store');
        Route::get('/get-data', 'Operator\SoalController@data')->name('data');
        Route::get('/{id}/{judul_soal}/edit', 'Operator\SoalController@edit');
        Route::post('/{id}/{judul_soal}/update', 'Operator\SoalController@update');
        Route::get('/{id}/{judul_soal}/hapus', 'Operator\SoalController@destroy');
        Route::get('/{id}/{judul_soal}/data', 'Operator\SoalController@data_soal');
        Route::post('/{id}/{judul_soal}/data/store', 'Operator\SoalController@data_store')->name('data-store');
        Route::get('/{id}/{judul_soal}/data/{id_datasoal}/hapus', 'Operator\SoalController@data_hapus');
    });
    Route::group(['prefix' => 'nilai', 'as' => 'nilai-'], function(){
        Route::get('/', 'Operator\NilaiController@index')->name('home');
        Route::get('/{id}/detail-nilai/{judul_soal}', 'Operator\NilaiController@nilai');
        Route::get('/{id}/detail-nilai/{judul_soal}/{id_user}/{name}', 'Operator\NilaiController@detail_nilai');
    });
    Route::group(['prefix' => 'jawaban', 'as' => 'jawaban-'], function(){
        Route::get('/', 'Operator\AnswerController@index')->name('home');
        Route::get('/{id}/user/{judul_soal}', 'Operator\AnswerController@user_jawaban');
        Route::get('/{id}/user/{judul_soal}/{id_user}/{name}/periksa-jawaban', 'Operator\AnswerController@periksa_jawaban');
        Route::post('/periksa-jawaban/store', 'Operator\AnswerController@store')->name('store');
    });
});

//Siswa
Route::group(['prefix' => 'siswa','as'=>'siswa-','middleware'=>['checkuserreturnlogin:0','checkstatussoal']], function(){
    Route::get('/', 'Siswa\ProfileController@index')->name('profile');
    Route::get('/notif/{id}/delete', 'Siswa\ProfileController@hapus_notifikasi');
    Route::get('/clear-notif', 'Siswa\ProfileController@clear_notifikasi');
    Route::get('/absensi-nilai', 'Siswa\AbsensiController@index')->name('absensi-nilai');
    Route::get('/absensi-nilai/{id}/detail-nilai/{judul_soal}/{id_user}/{name}', 'Siswa\AbsensiController@detail_nilai');

    Route::get('/absensi/materi-pembelajaran/{id}/{data}', 'Siswa\AbsensiController@absen');
});
Route::get('siswa/{id}/soal/{data}', 'Siswa\SoalController@index')->name('siswa-soal');
Route::post('siswa/soal/answer/{id}/answer/{jawaban}', 'Siswa\AnswerController@jawab');
Route::get('siswa/soal/selesaikan', 'Siswa\AnswerController@selesaikan')->name('selesaikan-test');
