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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin-page', 'AdminController@index')->name('admin.page');
    Route::get('admin/profile', 'AdminController@profile');
    Route::get('admin/list-pendaftar', 'AdminController@listPendaftar');
    Route::get('admin/kotak-masuk', 'AdminController@kotakMasuk');
});

Route::group(['middleware' => ['role:superUser']], function () {
    Route::get('super-page', 'SuperController@index')->name('super.page');
    Route::get('super/profile', 'SuperController@profile');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout');
