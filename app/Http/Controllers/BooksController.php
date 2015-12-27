<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Book;
use App\Author;
use App\Genre;

use DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$books = Book::all();
		
		foreach ($books as $book) {
			//TODO: make a method in model for retreiving authors and genres
			$authors = Book::find($book->book_id)->authors()->get(); 
			$genres = Book::find($book->book_id)->genres()->get();
			$book->authors = $authors;
			$book->genres = $genres;
		}

	    return view('books/books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$authors = Author::lists('name', 'author_id');
		$genres = Genre::lists( 'name', 'genre_id');	
		
        return view('books/books-create', ['authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//TODO: validation should be done in the MODEL not in the controller :)
    	$data = Input::all(); 
		$rules = ['title' => 'required',
			'isbn10' => 'required|min:1|max:10'];
    	$validator = Validator::make($data, $rules);
		if ($validator->fails()) {
			
			return Redirect('/books/create')->withErrors($validator)->withInput();
		}
		else {  
			Book::saveBook($data);
			
			return Redirect('/books/')->withErrors($validator)->withInput();
		}
    }	

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$book = Book::find($id);
    	$authors = Author::lists('name', 'author_id');
		$genres = Genre::lists( 'name', 'genre_id');
		
        return view('books/book-edit', ['id' => $id, 'authors' => $authors, 'genres' => $genres]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$data = Input::all();
		
        Book::editBook($data, $id);
		
		return Redirect('/books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
		$book->delete();
		
		return Redirect('/books');
    }
}