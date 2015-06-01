<?php
class SBarang extends Eloquent {
	protected $table = 'sbarang';
	 protected $fillable = array('id_plg','jenis', 'berat', 'biaya', 'ket');
}