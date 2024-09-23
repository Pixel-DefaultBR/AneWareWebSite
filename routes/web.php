<?php

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

Route::get('/', 'HomeController@index')->name('site.home');

Route::get('/report', 'ReportController@index')->name('site.report');

Route::get('/report/{id}', 'ReportController@getById')->where('id', '[0-9]+');

Route::get('/about', 'AboutController@index')->name('site.about');

Route::get('/codes', 'CodeController@index')->name('site.codes');

// App routes (Private Route)
Route::prefix('/app')->group(function () {
    Route::get('/login', 'LoginController@index')->name('app.login');
});





Route::fallback('Error404Controller@index');

