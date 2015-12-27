<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use DB;

class Book extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';
	
	protected $primaryKey = 'book_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	public $timestamps = true; 
	
	// TODO: not sure if should be static :)
	public static function all ($columns = []) {
		
		$books = DB::table('books')->get();
		
		return $books;
	}
	
	public static function saveBook ($data) {

		$book = new Book;
		//TODO: validation for data
		$book->title = $data['title'];
		$book->isbn10 = $data['isbn10'];
		$book->cover_pic = $data['picture'];
		$author = new Author;
		$genre = new Genre;
		$author->name = $data['author'];
		$genre->name = $data['genre'];
		$existingAuthor = Author::find($data['existing-author']);
		$existingGenre = Genre::find($data['existing-genre']);
		$book->save();
		
		if ($data['author'] != '') {
			$book->authors()->save($author);
		}
		
		if ($data['genre'] != '') {
			$book->genres()->save($genre);
		}
		
		$book->authors()->attach($existingAuthor['author_id']);
		$book->genres()->attach($existingGenre['genre_id']);
	}
	
	public static function editBook ($data, $id) {
		$book = Book::find($id);
		
		if ($data['title'] != '') {
			$book->title = $data['title'];
		}
		
		if ($data['isbn10'] != '') {
			$book->isbn10 = $data['isbn10'];
		}
		
		$author = new Author;
		$genre = new Genre;
		$author->name = $data['author'];
		$genre->name = $data['genre'];
		$authorToRemove = Author::find($data['authors']);
		$genreToRemove = Genre::find($data['genres']);
		$exisitngAuthor = Author::find($data['existing-author']);
		$exisitngGenre = Genre::find($data['existing-genre']);
		$book->authors()->detach($authorToRemove['author_id']);
		$book->genres()->detach($genreToRemove['genre_id']);
		$book->authors()->attach($exisitngAuthor['author_id']);
		$book->genres()->attach($exisitngGenre['genre_id']);
		
		if ($data['author'] != '') {
			$book->authors()->save($author);
			var_dump($data['author']);
		}
	
		if ($data['genre'] != '') {
			$book->genres()->save($genre);
		}
 		
		$book->save();
	}
	
	public function authors() {
		return $this->belongsToMany('App\Author', 'author_book');
	}
	
	public function genres() {
		return $this->belongsToMany('App\Genre', 'book_genre');
	}
}
