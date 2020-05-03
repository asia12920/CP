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




Route::get('/','PlatformController@welcome')->name('welcome'); 

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){ //wszystkie routy przejdą przez filtr middleware 
    Route::get('/platform','PlatformController@links')->name('workers'); 
    Route::get('/sickleaves','PlatformController@searchsickleaves')->name('sickleaves'); 
    Route::post('/sickleaves','PlatformController@insertSickleave'); 
    Route::get('/vacation','PlatformController@searchvacation')->name('vacation'); 
    Route::post('/vacation','PlatformController@insertVacation');
    Route::get('/workhours','PlatformController@workersearch')->name('workerSearch'); 
    Route::post('/workhours/{id?}','PlatformController@insertWorkersHours');
    
    

});



Auth::routes();

