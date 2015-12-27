@extends('layouts.default')
@section('content')	
<h1>List all authors</h1>
<div class="bs-component">
	<div class="jumbotron">
		<table class = 'table table-striped table-hover'>
	<tr>
		<th>name</th>
		<th>Date of issue</th>
		<th>LastChange</th>
		<th>Action</th>
	</tr>
	@foreach ($authors as $author)
	<tr>
		<td>{{$author->name}}</td>
		<td>{{$author->created_at}}</td>
		<td>{{$author->updated_at}}</td>
		<td>
			<a class="btn btn-primary" href="{{ URL::to('authors/' . $author->author_id) }}">Edit author</a>
			{!! Form::open(['url' => 'authors/'. $author->author_id]) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				<div>
				  	{!! Form::submit('Delete author', ['class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
	</div>
</div>

<br />
<a class="btn btn-success" href="/authors/create">Add new author</a>
<a class="btn btn-warning" href="/books">Books</a>
<a class="btn btn-info" href="/genres">Genres</a>
@stop