@extends('layouts.default')
@section('content')	
{!! Form::open(['url' => '/user']) !!}
	<div>
	  	{!! Form::label('email') !!}
	  	{!! Form::text('email') !!}
	  	{!! $errors->first('email') !!}
	</div>
	<div>
	  	{!! Form::label('username') !!}
	  	{!! Form::text('username') !!}
	</div>
	<div>
	  	{!! Form::label('pass') !!}
	  	{!! Form::password('pass') !!}
	  	{!! $errors->first('pass') !!}
	</div>
	<div>
	  	{!! Form::label('Repeat pass') !!}
	  	{!! Form::password('pass2') !!}
	  	{!! $errors->first('pass2') !!}
	</div>
	<div>
	  	{!! Form::submit('register', ['class' => 'btn btn-primary']) !!}
	</div>
{!! Form::close() !!}
@stop