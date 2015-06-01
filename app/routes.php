<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

#halaman Beranda
Route::get('/', function()
{
	return View::make('hello');
});

#Larapus MainFrame
Route::get('larapus', function() {
	return View::make('larapus.guest.index');
});
#Larapus Autentifikasi
Route::get('login', array('guest.login', 'uses' => 'GuestController@login'));
Route::get('logout', 'GuestController@logout');
Route::post('authenticate', 'GuestController@authenticate');

#Larapus Function
Route::group(array ('before' => 'auth'), function() {
	Route::get('dashboard', 'LarapusController@dashboard');
	Route::group(array ('before' => 'admin', 'prefix' => 'admin'), function () {
			Route::resource('authors', 'AuthorsController');
			Route::resource('books', 'BooksController');
	});
});


#simple APP compro
Route::get('1home', function() {		return View::make('simple.home');		});
Route::get('1about', function() {		return View::make('simple.about');		});
Route::get('1contact', function() {		return View::make('simple.contact');	});
// Route::post('1contact', function() {
// 	$data = Input::all();
// 	$rules = array(
// 		'subject'	=> 'required',
// 		'message'	=> 'required'
// 	);

// 	$validator = Validator::make($data, $rules);

// 	if($validator->fails()) {
// 		return Redirect::to('contact')->withErrors($validator)->withInput();
// 	}

// 	$emailcontent = array(
// 		'subject' 	=> $data['subject'],
// 		'message' 	=> $data['message']
// 	);

// 	Mail::send('simple.email', $emailcontent, function($message){
// 		$message->('support@learninglaravel.net', 'Learning Laravel Support')->subject('Contact via Our Contact Form');
// 	});

// 	return 'Your message has been sent';
// });


#implementasi RESTful
Route::resource('nerds', 'NerdController');


# Halaman muka, untuk menampilkan semua data biodata yang ada. [localhost:8000/]
Route::get('beranda', array('as' => 'beranda', 'uses' => 'BiodataController@index'));
# Halaman yang berisi Form inputan Biodata baru [localhost:8000/buat]
Route::get('buat', array('as' => 'baru', 'uses' => 'BiodataController@baru'));
# Memproses Form lalu mengirimnya kedalam database [localhost:8000/buat]
Route::post('buat', array('as' => 'buat', 'uses' => 'BiodataController@buat'));
# Menampilkan Biodata perorangan [localhost:8000/lihat/{id}]
Route::get('lihat/{id}', array('as' => 'lihat', 'uses' => 'BiodataController@lihat'));
# Form untuk mengubah isi Biodata dalam database [localhost:8000/ubah/{id}]
Route::get('ubah/{id}', array('as' => 'ubah', 'uses' => 'BiodataController@ubah'));
# Memproses Form lalu mengirim yang baru kedalam database [localhost:8000/ubah/{id}]
Route::put('ubah/{id}', array('as' => 'ganti', 'uses' => 'BiodataController@ganti'));
# Tindakan untuk menghapus Biodata [localhost:8000/{id}/hapus]
Route::get('hapus/{id}', array('as' => 'hapus', 'uses' => 'BiodataController@hapus'));




/*
##CRUD sederhana
# untuk Read
Route::get('/', array('as' => 'daftar', 'uses' => 'CrudController@daftar'));
Route::get('lihat/{id}', array('as' => 'lihat', 'uses' => 'CrudController@lihat'));
# untuk Create
Route::get('buat', array('as' => 'buat', 'uses' => 'CrudController@buat'));
Route::post('buat', array('as' => 'buatpost', 'uses' => 'CrudController@buatpost'));
#untuk Update
Route::get('ubah/{id}', array('as' => 'ubah', 'uses' => 'CrudController@ubah'));
Route::put('ubah/{id}', array('as' => 'ubahpost', 'uses' => 'CrudController@ubahpost'));
#untuk Delete
Route::get('hapus/{id}', array('as' => 'hapus', 'uses' => 'CrudController@hapus'));
*/
