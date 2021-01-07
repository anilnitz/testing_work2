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

Route::get('/', function () {
    return view('form');
});
Route::post('/statelist','Controller@statelist')->name('statelist');
Route::post('/formsubmit','Controller@formsubmit')->name('formsubmit');

Route::get('/chatStart','Controller@chatStart')->name('chatStart');
Route::get('/getUserList','Controller@getUserList')->name('getUserList');
