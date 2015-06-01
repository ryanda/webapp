<?php
class SPelanggan extends Eloquent {
	protected $table = 'spelanggan';
	protected $fillable = array('nama', 'alamat', 'telp', 'kota');
}