<?php
class SAdmin extends Eloquent {
	protected $table = 'sadmin';
	protected $fillable = array('id_plg','jenis', 'berat', 'biaya', 'ket');
}