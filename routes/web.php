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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('home','Frontend\HomeController@index');
Route::post('save','Frontend\HomeController@save')->name('save');

Route::get('verify_code/{id}','Frontend\HomeController@verify')->name('verify.code');


Route::post('accept_code','Frontend\HomeController@verifycode')->name('accept.verify');
