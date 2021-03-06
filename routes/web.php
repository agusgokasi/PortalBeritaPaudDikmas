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
Route::get('/bersihincache', 'CommandController@bersihincache');

Route::get('/', 'WelcomeController@welcome')->name('welcome');

Route::get('/visi-dan-misi', 'WelcomeController@visi_misi')->name('visi_misi');
Route::get('/tugas-dan-fungsi', 'WelcomeController@tugas_fungsi')->name('tugas_fungsi');
Route::get('/struktur-organisasi', 'WelcomeController@struktur_organisasi')->name('struktur_organisasi');
Route::get('/reformasi-birokrasi', 'WelcomeController@reformasi_birokrasi')->name('reformasi_birokrasi');
Route::get('/unit-vertikal-ditjenpaud', 'WelcomeController@_vertikal')->name('_vertikal');
Route::get('/unduh-dokumen', 'WelcomeController@_unduh')->name('_unduh');
// Route::get('/', 'WelcomeController@welcome')->name('welcome');

// Route::get('/unit-vertikal-ditjenpaud', function () {
// 	return view('vertikal/_vertikal');
// });

Auth::routes( [ 'register' => false, ] );

Route::group(['middleware'=>['auth']], function(){

	Route::get('home', 'HomeController@index')->name('home');
	//permission
	Route::get('permission', 'RoleController@index')->name('permission');
	Route::get('permission/create_permission', 'RoleController@create')->name('create_permission');
	Route::post('permission/create', 'RoleController@post')->name('post_permission');
	Route::get('permission/{id}/edit', 'RoleController@edit')->name('edit_permission');
	Route::post('permission/{id}', 'RoleController@update')->name('update_permission');
	Route::delete('permission/{id}', 'RoleController@destroy')->name('hapus_permission');
	//user
	Route::get('user/get', 'UserController@get')->name('get-user');
	Route::get('user', 'UserController@index')->name('user');
	Route::get('user/create_user', 'UserController@create')->name('create_user');
	Route::post('user/create', 'UserController@post')->name('post_user');
	Route::get('user/{id}/edit', 'UserController@edit')->name('edit_user');
	Route::post('user/{id}', 'UserController@update')->name('update_user');
	Route::delete('user/{id}', 'UserController@destroy')->name('hapus.user');
	//kategori
	Route::get('/kategori', 'CategoryController@index')->name('kategori');
	Route::get('/kategori/{id}/edit', 'CategoryController@edit')->name('edit_kategori');
	Route::post('/kategori/{id}', 'CategoryController@update')->name('update_kategori');

	// all konten
		// view
		Route::get('konten', 'ContentController@indexKonten')->name('konten');
		Route::get('api/konten', 'ContentController@apiKonten')->name('apiKonten');

		// detail
		Route::get('konten/{id}', 'ContentController@showKonten')->name('detail_Konten');

	// news

		// create
		Route::get('news/create', 'CreateContentController@newsCreate')->name('create_news');
		Route::post('news/create', 'CreateContentController@postNews')->name('post_news');

		// view
		Route::get('news', 'ContentController@indexNews')->name('news');
		Route::get('api/news', 'ContentController@apiNews')->name('apiNews');

		// detail
		Route::get('news/{id}', 'ContentController@showNews')->name('detail_news');

		
		// editor, penulis -> edit
		Route::get('news/{id}/edit', 'EditContentController@editNews')->name('edit_news');
		Route::put('news/{id}', 'EditContentController@updateNews')->name('update_news');


		// **************
		// penulis -> submit
		Route::get('/news/{id}/submit', 'EditContentController@submit_news')->name('submit_news');

		// editor -> approve -> btn
		Route::get('/news/{id}/approve', 'EditContentController@approve_news')->name('approve_news');
		Route::get('/news/{id}/reject', 'EditContentController@reject_news')->name('reject_news');
		//delete
		Route::delete('news/{id}', 'EditContentController@destroy')->name('delete_news');


	
	// headlines


		// create
		Route::get('headline/create', 'HeadlineController@Create')->name('create_headline');
		Route::post('headline/create', 'HeadlineController@post')->name('post_headline');

		// view
		Route::get('headline', 'HeadlineController@index')->name('headline');
		Route::get('api/headline', 'HeadlineController@apiHeadlines')->name('apiHeadline');

		// detail
		Route::get('headline/{id}', 'HeadlineController@show')->name('detail_headline');

		
		// editor, penulis -> edit
		Route::get('headline/{id}/edit', 'HeadlineController@edit')->name('edit_headline');
		Route::put('headline/{id}', 'HeadlineController@update')->name('update_headline');


		// **************
		// penulis -> submit
		Route::get('/headline/{id}/submit', 'HeadlineController@submit')->name('submit_headline');

		// editor -> approve -> btn
		Route::get('/headline/{id}/approve', 'HeadlineController@approve')->name('approve_headline');
		Route::get('/headline/{id}/reject', 'HeadlineController@reject')->name('reject_headline');
		//delete
		Route::delete('headline/{id}', 'HeadlineController@destroy')->name('delete_headline');


	// galleries


		// create
		Route::get('gallery/create', 'GalleryController@Create')->name('create_gallery');
		Route::post('gallery/create', 'GalleryController@post')->name('post_gallery');

		// view
		Route::get('gallery', 'GalleryController@index')->name('gallery');
		Route::get('api/gallery', 'GalleryController@apiGallery')->name('apiGallery');

		// detail
		Route::get('gallery/{id}', 'GalleryController@show')->name('detail_gallery');
		// submit photos
		Route::post('gallery/{id}', 'GalleryController@photoPost')->name('post_photos');
		// edit photos
		// Route::get('photo/{id}/edit', 'GalleryController@editPhoto')->name('edit_photos');
		// Route::post('photo/{id}', 'GalleryController@updatePhoto')->name('update_photos');
		//hapus photos
		Route::delete('photo/{id}', 'GalleryController@photoDestroy')->name('hapus_photos');

		
		// editor, penulis -> edit
		Route::get('gallery/{id}/edit', 'GalleryController@edit')->name('edit_gallery');
		Route::put('gallery/{id}', 'GalleryController@update')->name('update_gallery');


		// **************
		// penulis -> submit
		Route::get('/gallery/{id}/submit', 'GalleryController@submit')->name('submit_gallery');

		// editor -> approve -> btn
		Route::get('/gallery/{id}/approve', 'GalleryController@approve')->name('approve_gallery');
		Route::get('/gallery/{id}/reject', 'GalleryController@reject')->name('reject_gallery');
		//delete
		Route::delete('gallery/{id}', 'GalleryController@destroy')->name('delete_gallery');


	// component

	Route::get('components', 'ComponentController@index')->name('components');
	Route::get('components/{id}', 'ComponentController@show')->name('show_component');
	// editor, penulis -> edit
	Route::get('components/{id}/edit', 'ComponentController@edit')->name('edit_component');
	Route::put('components/{id}', 'ComponentController@update')->name('update_component');

	Route::resource('apps', 'AppPadiController');
    Route::resource('pengumum', 'PengumumanController');


});

// guest

Route::get('berita/g/list', 'GuestController@index_news')->name('g_news_index');
Route::get('berita/g/{id}', 'GuestController@show_news')->name('g_news_show');

Route::get('headline/g/list', 'GuestController@index_headline')->name('g_headline_index');
Route::get('headline/g/{id}', 'GuestController@show_headline')->name('g_headline_show');

Route::get('galeri/g/list', 'GuestController@index_gallery')->name('g_gallery_index');
Route::get('galeri/g/{id}', 'GuestController@show_gallery')->name('g_gallery_show');

Route::get('p/g/{id}', 'GuestController@show_page')->name('g_show_page');
Route::get('l/g/{id}', 'GuestController@show_page_link')->name('g_show_pagel');

Route::get('a/g', 'GuestController@index_app')->name('g_show_app');

Route::get('info/g/list', 'GuestController@index_pengumuman')->name('g_info_index');
Route::get('info/g/{id}', 'GuestController@show_pengumuman')->name('g_info_show');