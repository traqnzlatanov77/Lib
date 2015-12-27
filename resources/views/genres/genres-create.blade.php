@extends('layouts.default')
@section('content')	
<h3>Create</h3>
{!! Form::open(['url' => '/genres']) !!}
	<div>
	  	{!! Form::label('name') !!}
	  	{!! Form::text('name') !!}
	  	{!! $errors->first('name') !!}
	</div>
	<div>
	  	{!! Form::submit('Create genre', ['class' => 'btn btn-success']) !!}
	</div>
{!! Form::close() !!}
@stop