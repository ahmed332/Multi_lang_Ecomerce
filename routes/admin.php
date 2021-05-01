<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Dashboard','middleware' => 'auth:admin'],function(){
    Route::get('/','DashboardcController@index')->name('admin.dashboard');
    Route::get('/user',function(){
        return 'g';
    });
});


Route::group(['namespace' => 'Dashboard','middleware' => 'guest:admin'],function(){
    Route::get('login','LoginController@login')->name('admin.login');
    Route::post('login','LoginController@postlogin')->name('admin.post.login');
});


