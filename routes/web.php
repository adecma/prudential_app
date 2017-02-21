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
//Auth::routes();
//custome route for auth
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/profil', 'HomeController@showProfil')
    ->name('profil.show');
Route::get('/profil/edit', 'HomeController@editProfil')
	->name('profil.edit');
Route::post('/profil/edit', 'HomeController@updateProfil')
    ->name('profil.update');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/kriteria/cetak', 'KriteriaController@cetak')->name('kriteria.cetak');
	Route::get('/kriteria/pdf/{time}', 'KriteriaController@pdf')->name('kriteria.pdf');
    Route::resource('/kriteria', 'KriteriaController', ['except' => 'show']);

    Route::get('/range/cetak', 'RangeController@cetak')->name('range.cetak');
	Route::get('/range/pdf/{time}', 'RangeController@pdf')->name('range.pdf');
    Route::resource('/range', 'RangeController', ['except' => 'show']);
	Route::resource('/produk', 'ProdukController', ['except' => 'show']);
	Route::get('/analisa', 'AnalisaController@analisa')
		->name('analisa');
});

Route::get('/tentang', function() {
	return view('static.tentang');
})->name('tentang');

Route::get('/bantuan', function() {
	return view('static.bantuan');
})->name('bantuan');