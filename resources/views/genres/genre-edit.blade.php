@extends('layouts.default')
@section('content')	
<h3>EDIT - genre name</h3>
{!! Form::open(['url' => '/genres/'.$id.'/edit', 'method' => 'PUT']) !!}
	<div>
	  	{!! Form::label('title') !!}
	  	{!! Form::text('title') !!}
	  	{!! $errors->first('title') !!}
	</div>
	<div>
	  	{!! Form::submit('Edit genre', ['class' => 'btn btn-info']) !!}
	</div>
{!! Form::close() !!}
@stop