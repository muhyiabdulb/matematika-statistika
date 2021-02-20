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

// ROUTE ADMIN LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // ROUTE PROFILE
    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/myprofile', 'UserController@myProfile')->name('myprofile');
        Route::patch('/updateprofile', 'UserController@updateProfile')->name('update');
        Route::get('/password', 'UserController@changePassword')->name('changepassword');
        Route::patch('/updatepassword', 'UserController@updatePassword')->name('updatepassword');
    });

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });

    Route::get('/dashboard/index', function(){
        return view('admin.statistika.index');
    });

    Route::prefix('statistika')->name('statistika.')->middleware('auth')->group(function () {
        // ROUTE ADMIN STATISTIKA MATERI
        Route::get('/materi', 'Statistika\MateriController@index')->name('materi.index');
        Route::get ('/materi/{id}', 'Statistika\MateriController@edit')->name('materi.edit');
        Route::put('/materi/{id}', 'Statistika\MateriController@update')->name('materi.update');
        Route::get('/create-materi', 'Statistika\MateriController@create')->name('materi.create');
        Route::post('/materi', 'Statistika\MateriController@store')->name('materi.store');
        Route::delete('/materi/{id}', 'Statistika\MateriController@destroy')->name('materi.delete');
        // ROUTE ADMIN STATISTIKA SOAL
        Route::get('/soal', 'Statistika\SoalController@index')->name('soal.index');
        Route::get ('/soal/{id}', 'Statistika\SoalController@edit')->name('soal.edit');
        Route::put('/soal/{id}', 'Statistika\SoalController@update')->name('soal.update');
        Route::get('/create-soal', 'Statistika\SoalController@create')->name('soal.create');
        Route::post('/soal', 'Statistika\SoalController@store')->name('soal.store');
        Route::delete('/soal/{id}', 'Statistika\SoalController@destroy')->name('soal.delete');
    });
});

// ROUTE SISWA
Route::get('/siswa', 'SiswaController@materi');
Route::get('/siswa/statistika', 'SiswaController@materiStatistika');
Route::get('/siswa/statistika/soal', 'SiswaController@soalStatistika');