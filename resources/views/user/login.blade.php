@extends('layouts.default')
@section('content')	
{!! Form::open(['url' => '/login']) !!}
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
	  	{!! Form::submit('login') !!}
	</div>
{!! Form::close() !!}
@stop