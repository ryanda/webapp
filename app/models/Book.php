<?php

class Book extends Larapus {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required|unique:books,title, :id',
		'author_id' => 'required|exists:authors,id',
		'amount' => 'numeric',
		'cover' => 'image|max:2048'
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'author_id', 'amount'];

	public function author() {
		return $this->belongsTo('Author');
	}

}