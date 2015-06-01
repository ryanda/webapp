<?php

class BooksController extends \BaseController {
	public function index()
	{
		if(Datatable::shouldHandle()) {
			return Datatable::collection(Book::with('author')->get())
				->showColumns('id', 'title', 'amount')
				->addColumn('author', function($model) {
					return $model->author->name;
				})
				->addColumn('', function($model) {
					$html  = '<a href="'.route('admin.books.edit', ['books'=>$model->id]).'" class="uk-button uk-button-small uk-button-link">edit</a>';
					$html .= Form::open(array ('url' => route('admin.books.destroy', ['books'=>$model->id]), 'method'=>'delete', 'class'=>'uk-display-inline'));
					$html .= Form::submit('delete', array( 'class' => 'uk-button uk-button-small'));
					$html .= Form::close();
					return $html;
				})
				-> searchColumns('title', 'amount', 'author')
				->orderColumns('title', 'amount', 'author')
				->make();
		}
		return View::make('books.index')->withTitle('Buku');
	}
	public function create()
	{
		return View::make('books.create')->withTitle('Tambah Buku');
	}
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Book::$rules);
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$book = Book::create(Input::except('cover'));

		//isi field kover jika ada file yg di upload
		if(Input::hasFile('cover')) {
			$uploaded_cover = Input::file('cover');
			$extension = $uploaded_cover->getClientOriginalExtension(); //get extension file
			$filename = md5(time()) . '.' . $extension; //name file random
			$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img'; //set location
			$uploaded_cover->move($destinationPath, $filename); //and MOVE!
			//insert data to field cover
			$book->cover = $filename;
			$book->save();
		}

		return Redirect::route('admin.books.index')->with('successMessage', "Berhasil Menyimpan $book->title");
	}
	public function show($id)
	{
		$book = Book::findOrFail($id);

		return View::make('books.show', compact('book'));
	}

	public function edit($id)
	{
		$book = Book::find($id);

		return View::make('books.edit', ['book' => $book])->withTitle("Ubah $book->name");
	}
	public function update($id)
	{
		$book = Book::findOrFail($id);
		$validator = Validator::make($data = Input::all(), $book->updateRules());
		if($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if(Input::hasFile('cover')) {
			$filename = null;
			$uploaded_cover = Input::file('cover');
			$extension = $uploaded_cover->getClientOriginalExtension();
			$filename = md5(time()) . '.' . $extension;
			$destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';

			$uploaded_cover->move($destinationPath, $filename);

			if ($book->cover) {
				$old_cover = $book->cover;
				$filepath = public_path() . DIRECTORY_SEPARATOR . 'img' DIRECTORY_SEPARATOR . $book->cover;
				try {
					File::delete($filepath);
				} catch (FileNotFoundException $e) {
					file sudah di hapus / tidak ada
				}
			}

			$book->cover = $filename;
			$book->save();
		}

		if (!$book->update(Input::except('cover'))) {
			return Redirect::back();
		}

		return Redirect::route('admin.books.index')->with('successMessage', "Berhasil menyimpan $book->title");
	}

	/**
	 * Remove the specified book from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);

		return Redirect::route('admin.books.index')->with('successMessage', "Buku berhasil di hapus");
	}

}
