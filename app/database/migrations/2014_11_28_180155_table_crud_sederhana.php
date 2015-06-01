<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCrudSederhana extends Migration {
	public function up()
	{
		Schema::create('crud', function($tabel) {
			$tabel->increments('id');
			$tabel->string('nama');
			$tabel->integer('usia');
			$tabel->string('jk');
			$tabel->string('telepon');
			$tabel->string('email');
			$tabel->timestamps();
		});
	}
	public function down()
	{
		Schema::drop('crud');
	}
}
