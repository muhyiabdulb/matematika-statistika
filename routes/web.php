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

// ROUTE SISWA
Route::get('/siswa', 'SiswaController@materi');
Route::get('/siswa/statistika', 'SiswaController@materiStatistika');
Route::get('/siswa/statistika/soal', 'SiswaController@soalStatistika');


// ROUTE ADMIN LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/myprofile', 'UserController@myProfile')->name('myprofile');
    Route::patch('/updateprofile', 'UserController@updateProfile')->name('update');
    Route::get('/password', 'UserController@changePassword')->name('changepassword');
    Route::patch('/updatepassword', 'UserController@updatePassword')->name('updatepassword');
});

// ROUTE ADMIN DASHBOARD
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// ROUTE ADMIN DASHBOARD STATISTIKA
Route::get('/admin/statistika', function () {
    return view('admin.statistika.index');
});

// ROUTE ADMIN STATISTIKA MATERI
Route::get('/admin/statistika/materi', 'Statistika\MateriController@index')->name('materi.index');
Route::get ('/admin/statistika/materi/{id}', 'Statistika\MateriController@edit')->name('materi.edit');
Route::put('/admin/statistika/materi/{id}', 'Statistika\MateriController@update')->name('materi.update');
Route::post('/admin/statistika/materi', 'Statistika\MateriController@store')->name('materi.store');
Route::delete('/admin/statistika/materi/{id}', 'Statistika\MateriController@destroy')->name('materi.delete');

// ROUTE ADMIN STATISTIKA SOAL
Route::get('/admin/statistika/soal', 'Statistika\SoalController@index')->name('soal.index');
Route::get ('/admin/statistika/soal/{id}', 'Statistika\SoalController@edit')->name('soal.edit');
Route::put('/admin/statistika/soal/{id}', 'Statistika\SoalController@update')->name('soal.update');
Route::post('/admin/statistika/soal', 'Statistika\SoalController@store')->name('soal.store');
Route::delete('/admin/statistika/soal/{id}', 'Statistika\SoalController@destroy')->name('soal.delete');
