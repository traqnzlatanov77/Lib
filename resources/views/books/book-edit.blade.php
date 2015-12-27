@extends('layouts.default')
@section('content')	
<h3>EDIT - book</h3>
{!! Form::open(['url' => '/books/'.$id.'/edit', 'method' => 'PUT']) !!}
	<div>
	  	{!! Form::label('new title') !!}
	  	{!! Form::text('title') !!}
	  	{!! $errors->first('title') !!}
	</div>
	<div>
	  	{!! Form::label('new ISBN') !!}
	  	{!! Form::text('isbn10') !!}
	  	{!! $errors->first('isbn10') !!}
	</div>
	<div>
	  	{!! Form::label('add new author') !!}
	  	{!! Form::text('author') !!}
	  	{!! $errors->first('author') !!}
	</div>
	<div>
	  	{!! Form::label('add new genre') !!}
	  	{!! Form::text('genre') !!}
	  	{!! $errors->first('genre') !!}
	</div>
	<div>
	  	{!! Form::label('add existing author') !!}
	  	{!! Form::select('existing-author', $authors) !!}
	  	{!! $errors->first('existing-author') !!}
	</div>
	<div>
	  	{!! Form::label('add existing genre') !!}
	  	{!! Form::select('existing-genre', $genres) !!}
	  	{!! $errors->first('existing-genre') !!}
	</div>
	<div>
	  	{!! Form::label('remove author') !!}
	  	{!! Form::select('authors', $authors) !!}
	  	{!! $errors->first('genre') !!}
	</div>
	<div>
	  	{!! Form::label('remove genre') !!}
	  	{!! Form::select('genres', $genres) !!}
	  	{!! $errors->first('genres') !!}
	</div>
	<div>
	  	{!! Form::label('new picture') !!}
	  	{!! Form::file('picture') !!}
	  	{!! $errors->first('picture') !!}
	</div>
	<div>
	  	{!! Form::submit('Edit book', ['class' => 'btn btn-info']) !!}
	</div>
{!! Form::close() !!}
@stop