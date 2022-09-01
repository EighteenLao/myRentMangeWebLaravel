<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::post('login','App\Http\Controllers\UserController@login');
Route::get('login','App\Http\Controllers\UserController@showLoginPage');
Route::get('logout','App\Http\Controllers\UserController@logout');
Route::get('/','App\Http\Controllers\PageController@index')->middleware('userAuth');

Route::get('goToAddMember','App\Http\Controllers\PageController@goToAddMember')->middleware('userAuth');
Route::post('addMember','App\Http\Controllers\UserController@addMember');

Route::get('goToDeleteMember','App\Http\Controllers\PageController@goToDeleteMember')->middleware('userAuth');
Route::post('deleteMember','App\Http\Controllers\UserController@deleteMember');

Route::get('goToUpdateMember','App\Http\Controllers\PageController@goToUpdateMember')->middleware('userAuth');
Route::post('updateMember','App\Http\Controllers\UserController@updateMember');

Route::get('exit','App\Http\Controllers\UserController@exit');
