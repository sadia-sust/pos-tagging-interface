
<?php

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

Auth::routes();

Route::get('/home2', 'HomeController@index2')->name('home2');
Route::post('create2', 'HomeController@store2')->name('store2');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{id}/{str}', 'HomeController@backindex')->name('home.back');

// Route::get('create', 'HomeController@create')->name('create');
Route::post('create', 'HomeController@store')->name('store');
Route::get('edit', 'HomeController@edit')->name('edit');
Route::post('edit','HomeController@finalStore')->name('finalStore');

Route::get('/adminpanel', 'AnalysisController@adminpanel')->name('adminpanel');
Route::get('/admin', 'AnalysisController@admin')->name('admin');
Route::get('/leaderboard', 'AnalysisController@leaderboard')->name('leaderboard');
Route::get('/leaderboard/all', 'AnalysisController@leaderboardall')->name('leaderboard2');
Route::get('/profilematrix/{id}', 'AnalysisController@profilematrix')->name('profilematrix');
Route::get('/alldata/{id}/{id2}', 'AnalysisController@alldata')->name('alldata');