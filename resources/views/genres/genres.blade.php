@extends('layouts.default')
@section('content')	
<h1>List all genres</h1>
<div class="bs-component">
	<div class="jumbotron">
		<table class = 'table table-striped table-hover'>
	<tr>
		<th>name</th>
		<th>Date of issue</th>
		<th>LastChange</th>
		<th>Action</th>
	</tr>
	@foreach ($genres as $genre)
	<tr>
		<td>{{$genre->name}}</td>
		<td>{{$genre->created_at}}</td>
		<td>{{$genre->updated_at}}</td>
		<td>
			<a class="btn btn-primary" href="{{ URL::to('genres/' . $genre->genre_id) }}">Edit genre</a>
			{!! Form::open(['url' => 'genres/'. $genre->genre_id]) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				<div>
				  	{!! Form::submit('Delete genre', ['class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
	</div>
</div>

<br />
<a class="btn btn-success" href="/genres/create">Add new genre</a>
<a class="btn btn-warning" href="/authors">Authors</a>
<a class="btn btn-info" href="/books">Books</a>
@stop