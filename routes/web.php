<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'UserController@index');
Route::get('/cekStatus', 'UserController@cekStatus');
Route::post('/addPesan', 'UserController@addPesan');
Route::post('/postRegister', 'UserController@addRegister');

Auth::routes();
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin-page', 'AdminController@index')->name('admin.page');
    Route::get('admin/profile', 'AdminController@profile');
    Route::get('admin/list-pendaftar', 'AdminController@listPendaftar');
    Route::get('admin/list-pendaftar/{id}', 'AdminController@validasiFile');
    Route::get('admin/kotak-masuk', 'AdminController@kotakMasuk');
    Route::post('changeImageUserAdmin', 'AdminController@changeImage');
    Route::post('updatePasswordAdmin', 'AdminController@changePassword');
    Route::post('updateEmailAdmin', 'AdminController@changeEmail');
    Route::post('deletePesan', 'AdminController@deletePesan');
    Route::post('deleteStudent', 'AdminController@deleteStudent');
    Route::post('validasiFile', 'AdminController@validateFile');
});

Route::group(['middleware' => ['role:superUser']], function () {
    Route::get('super-page', 'SuperController@index')->name('super.page');
    Route::get('super/profile', 'SuperController@profile');
    Route::get('super/laporan', 'SuperController@laporan');
    Route::get('super/tambah-admin', 'SuperController@admin');
    Route::get('super/admin-activity', 'SuperController@activity');
    Route::get('super/admin-activity/{nama}', 'SuperController@activityDetail');
    Route::post('changeImageUser', 'SuperController@changeImage');
    Route::post('updatePassword', 'SuperController@changePassword');
    Route::post('updateEmail', 'SuperController@changeEmail');
    Route::post('addAdmin', 'SuperController@addAdmin');
    Route::post('deleteActivity', 'SuperController@deleteActivity');
    Route::post('deleteAdmin', 'SuperController@deleteAdmin');
    Route::post('resetPassword', 'SuperController@resetPassword');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
