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

    Route::get('/produk/cetak', 'ProdukController@cetak')->name('produk.cetak');
	Route::get('/produk/pdf/{time}', 'ProdukController@pdf')->name('produk.pdf');
	Route::resource('/produk', 'ProdukController');

	Route::get('/analisa/cetak', 'AnalisaController@cetak')->name('analisa.cetak');
	Route::get('/analisa/pdf/{time}', 'AnalisaController@pdf')->name('analisa.pdf');
	Route::get('/analisa', 'AnalisaController@index')
		->name('analisa');

	Route::get('/riwayat/cetak', 'RiwayatController@cetak')->name('riwayat.cetak');
	Route::get('/riwayat/pdf/{time}', 'RiwayatController@pdf')->name('riwayat.pdf');
	Route::resource('/riwayat', 'RiwayatController', ['except' => ['create', 'store', 'edit', 'update']]);
});

Route::get('/konsultasi', 'AnalisaController@konsultasi_reg')->name('konsultasi.registrasi');
Route::post('/konsultasi', 'AnalisaController@konsultasi_store')->name('konsultasi.store');
Route::get('/konsultasi/{riwayat}', 'AnalisaController@konsultasi_result')->name('konsultasi.result');
Route::get('/konsultasi/{riwayat}/cetak', 'AnalisaController@konsultasi_cetak')->name('konsultasi.cetak');
Route::get('/konsultasi/{riwayat}/pdf/{time}', 'AnalisaController@konsultasi_pdf')->name('konsultasi.pdf');

Route::get('/tentang', function() {
	$produks = App\Produk::all();

	return view('static.tentang', compact('produks'));
})->name('tentang');

Route::get('/bantuan', function() {
	return view('static.bantuan');
})->name('bantuan');