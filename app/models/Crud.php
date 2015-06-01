<?php
class Crud extends Eloquent {
	protected $table = 'crud';
	protected $fillable = array('nama', 'usia', 'jk', 'telepon', 'email');
}