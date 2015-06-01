<?php
class SPenerima extends Eloquent {
	protected $table = 'spenerima';
	protected $fillable = array('id_brg','nama','telp', 'kota');
}