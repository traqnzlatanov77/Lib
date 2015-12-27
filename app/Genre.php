<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use DB;

class Genre extends Model 
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'genres';
	
	protected $primaryKey = 'genre_id';

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
		
		$allGenres = DB::table('genres')->get();
		
		return $allGenres;
	}
	
	public static function saveGenre ($data) {

		$genre = new Genre;
		$genre->name = $data['name'];
		$genre->save();
	}
	
	public static function editGenre ($data, $id) {
		$genre = Genre::find($id);
		$genre->name = $data['title'];
		$genre->save();
	}
	
	public function books() {
		return $this->belongsToMany('App\Book', 'genre_book');
	}
}
