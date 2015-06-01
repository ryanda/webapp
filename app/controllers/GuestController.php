<?php

class GuestController extends BaseController {
	protected $layout = 'larapus.layout.guest';

	public function login() {
		$this->layout->content = View::make('larapus.guest.login');
	}

	public function authenticate() {
		//ambil credentials dari $_POST variable
		$credentials = array(
			'email'		=> Input::get('email'),
			'password'	=> Input::get('password'),
			);
		try {
			//authentifikasi user
			$user = Sentry::authenticate($credentials, false);
			//redirect ke dashboard
			return Redirect::intended('dashboard');
		}
		catch (Cartalyst\Sentry\User\WrongPasswordException $e) {
			return Redirect::back()->with('errorMessage', 'Password yang Anda masukan salah.');
		}
		catch (Exception $e) {
			return Redirect::back()->with('errorMessage', 'Akun dengan email tersebut tidak ditemukan.');
		}
	}

	public function logout() {
		//logout user
		Sentry::logout();
		//redirect
		return Redirect::to('login')->with('successMessage', 'Anda berhasil Logout!');
	}
}


