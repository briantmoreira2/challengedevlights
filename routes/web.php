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

Route::get('/', 'dealsController@views');

Route::get('backend/deals', 'dealsController@backenddeals');
Route::get('backend/dealsform', 'dealsController@backendcreate');
Route::get('backend/dealsform/{id}', 'dealsController@backendupdate');
Route::post('deals', 'dealsController@post');
Route::post('deals/{id}', 'dealsController@update');
Route::get('delete/{id}', 'dealsController@delete_deals');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
