<?php

class SentryTableSeeder extends Seeder {

	public function run() {
		DB::table('users_groups')->delete();
		DB::table('groups')->delete();
		DB::table('users')->delete();
		DB::table('throttle')->delete();

		try {
			$group = Sentry::createGroup (array (
				'name'	=> 'admin',
				'permissions'	=> array(
					'admin'	=> 1,
					),
				));
			$group = Sentry::createGroup (array (
				'name'	=> 'regular',
				'permissions'	=> array(
					'regular'	=> 1,
					),
				));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			echo "Field nama dibutuhkan";
		}
		catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			echo "group sudah ada";
		}

		try {
			$admin = Sentry::register (array(
				'email'	=> 'laravel.perpusatakaan@gmail.com',
				'password'	=> '#larapus2014',
				'first_name'	=> 'Admin',
				'last_name'		=> 'Larapus'),
			true);

			$adminGroup = Sentry::findGroupByName('admin');
			$admin->addGroup($adminGroup);

			$user = Sentry::register (array(
				'email'	=> 'ryandaputra@gmail.com',
				'password'	=> '123456',
				'first_name'	=> 'ryand',
				'last_name'		=> 'putra'),
			true);

			$regularGroup = Sentry::findGroupByName('regular');
			$user->addGroup($regularGroup);
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
			echo "Field login dibutuhkan";
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
			echo "Field password dibutuhkan";
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e) {
			echo "user sudah ada";
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
			echo "group tidak ditemukan";
		}

		}
	}
