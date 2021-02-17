<?php

use App\Http\Controllers\ArticleController;
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

Route::get('/','ArticleController@index');
Route::get('/articles/{name}','ArticleController@indexFilter');
Route::get('/article/{id}','ArticleController@detail');
Route::prefix('/login')->middleware('guest')->group(function () {
    Route::get('/','UserController@index')->name('login');
    Route::post('/','UserController@login');
});
Route::prefix('/register')->middleware('guest')->group(function () {
    Route::get('/','UserController@indexRegister');
    Route::post('/','UserController@store');
});
Route::get('/logout','UserController@logout');
Route::prefix('/admin')->middleware('role:admin')->group(function () {
    Route::get('/manage-user', 'UserController@manageUser');
    Route::post('/user/delete/{id}', 'UserController@destroy');
});
Route::prefix('/user')->middleware('role:user')->group(function () {
    Route::get('/manage-profile', 'UserController@profilePage');
    Route::post('/update-profile','UserController@update');

});
Route::prefix('/manage-article')->middleware('auth')->group(function () {
    Route::get('/','ArticleController@manage');
    Route::post('/delete/{id}', 'ArticleController@destroy');
    Route::post('/create', 'ArticleController@store');
    Route::get('/create','ArticleController@createPage');
});
