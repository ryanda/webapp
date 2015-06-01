<?php

class Author extends Larapus {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required|unique:authors,name,:id'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	public function books() {
		return $this->hasMany('Book');
	}

	public static function boot() {
		parent::boot();

		self::deleting( function($author) {
			//cek author has book?
			if($author->book->count() > 0) {
				$html  = 'Penulis tidak bisa dihapus karena memiliki buku : ';
				$html .= '<ul>';
				foreach ($author->books as $book) {
					$html .= "<li>$book->title</li>";
				}
				$html .= '</ul>';
				Session::flash('errorMessage', $html);
				return false;
			}
		});
	}

}