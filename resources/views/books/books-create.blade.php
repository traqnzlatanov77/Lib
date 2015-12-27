@extends('layouts.default')
@section('content')	
<h3>Create</h3>
<div class="well bs-component">
	{!! Form::open(['url' => '/books', 'class' => 'form-horizontal']) !!}
	<div class="form-group">
	  	{!! Form::label('title') !!}
	  	{!! Form::text('title') !!}
	  	{!! $errors->first('title') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('ISBN') !!}
	  	{!! Form::text('isbn10') !!}
	  	{!! $errors->first('isbn10') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('new author') !!}
	  	{!! Form::text('author') !!}
	  	{!! $errors->first('author') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('new genre') !!}
	  	{!! Form::text('genre') !!}
	  	{!! $errors->first('genre') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('existing author') !!}
	  	{!! Form::select('existing-author', $authors) !!}
	  	{!! $errors->first('existing-author') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('existing genre') !!}
	  	{!! Form::select('existing-genre', $genres) !!}
	  	{!! $errors->first('existing-genre') !!}
	</div>
	<div class="form-group">
	  	{!! Form::label('picture') !!}
	  	{!! Form::file('picture') !!}
	  	{!! $errors->first('picture') !!}
	</div>
	<div>
	  	{!! Form::submit('Create book', ['class' => 'btn btn-success']) !!}
	</div>
{!! Form::close() !!}
</div>
@stop