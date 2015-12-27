@extends('layouts.default')
@section('content')	
<h3>EDIT - author name</h3>
{!! Form::open(['url' => '/authors/'.$id.'/edit', 'method' => 'PUT']) !!}
	<div>
	  	{!! Form::label('name') !!}
	  	{!! Form::text('name') !!}
	  	{!! $errors->first('name') !!}
	</div>
	<div>
	  	{!! Form::submit('Edit author', ['class' => 'btn btn-info']) !!}
	</div>
{!! Form::close() !!}
@stop