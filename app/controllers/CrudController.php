<?php

class CrudController extends \BaseController {
	public function daftar()
	{
		$data = Crud::all;
		return View::make('crud.daftar', compact('data'));
	}
	public function lihat($id)
	{
		$data = Crud::find($id);
		return View::make('crud.lihat', compact('data'));
	}
	public function buat()
	{
		$jk = array(
			'Laki-laki' => 'Laki-laki',
			'Perempuan' => 'Perempuan');
		return View::make('crud.buat', compact('jk'));
	}
	public function buatpost()
	{	
		$input = Input::all();
		$aturan = array(
			'nama' => 'required|min:3', 
			'usia' => 'required', 
			'telepon' => 'required', 
			'email' => 'required|email'
		);
		$pesan = array(
			'nama.required' => 'Inputan Nama wajib diisi.',
			'nama.min' => 'Inputan Nama minimal 3 karakter.',
			'usia.required' => 'Inputan Usia wajib diisi.',
			'telepon.required' => 'Inputan Telepon wajib diisi.',
			'email.required' => 'Inputan Email wajib diisi.',
			'email.email' => 'Inputan harus berupa Email.'
		);
		$validasi = Validator::make($input, $aturan, $pesan);
		if($validasi->fails()) {
			return Redirect::back()->withErrors($validasi)->withInput();
		} else {
			$nama = Input::get('nama');
			$usia = Input::get('usia');
			$jk = Input::get('jk');
			$telepon = Input::get('telepon');
			$email = Input::get('email');
			Biodata::create(compact('nama', 'usia', 'jk', 'telepon', 'email'));
			return Redirect::route('daftar')->withPesan('Biodata baru berhasil ditambahkan.');
		}

	}
	public function ubah($id)
	{
		$jk = array(
			'Laki-laki' => 'Laki-laki', 
			'Perempuan' => 'Perempuan');
		$biodata = Biodata::find($id);
		return View::make('crud.ubah', compact('jk', 'biodata'));
	}
	public function ubahpost($id)
	{
		$input = Input::all();
		# Buat aturan validasi
		$aturan = array(
			'nama' => 'required|min:3', 
			'usia' => 'required', 
			'telepon' => 'required', 
			'email' => 'required|email'
		);
		# Buat pesan error validasi manual
		$pesan = array(
			'nama.required' => 'Inputan Nama wajib diisi.',
			'nama.min' => 'Inputan Nama minimal 3 karakter.',
			'usia.required' => 'Inputan Usia wajib diisi.',
			'telepon.required' => 'Inputan Telepon wajib diisi.',
			'email.required' => 'Inputan Email wajib diisi.',
			'email.email' => 'Inputan harus berupa Email.'
		);
		# Validasi
		$validasi = Validator::make($input, $aturan, $pesan);
		# Bila validasi gagal
		if($validasi->fails()) {
			return Redirect::back()->withErrors($validasi)->withInput();
		} else {
			$ganti = Biodata::find($id);

			$ganti->nama			= Input::get('nama');
			$ganti->usia 			= Input::get('usia');
			$ganti->jk 				= Input::get('jk');
			$ganti->telepon 		= Input::get('telepon');
			$ganti->email 			= Input::get('email');
			$ganti->save();
			return Redirect::route('daftar')->withPesan('Biodata baru berhasil ditambahkan.');
		}
	}
	public function hapus($id)
	{
		Biodata::find($id)->delete();
		return Redirect::back()->withPesan('Biodata berhasil dihapus.');
	}
	

}