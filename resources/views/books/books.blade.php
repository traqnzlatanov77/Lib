@extends('layouts.default')
@section('content')	
<h1>List all books</h1>
<div class="bs-component">
	<div class="jumbotron">
	  <table class = 'table table-striped table-hover'>
	<tr>
		<th>Title</th>
		<th>Authors</th>
		<th>Genres</th>
		<th>Picture</th>
		<th>Date of issue</th>
		<th>LastChange</th>
		<th>Action</th>
	</tr>
	@foreach ($books as $book)
	<tr>
		<td>{{$book->title}}</td>
		<td>
			@foreach ($book->authors as $author)
				{{$author->name}}
			@endforeach
		</td>
		<td>
			@foreach ($book->genres as $genre)
				{{$genre->name}}
			@endforeach
		</td>
		<td>{{ HTML::image($book->cover_pic) }}</td>
		<td>{{$book->created_at}}</td>
		<td>{{$book->updated_at}}</td>
		<td>
			<a class="btn btn-primary" href="{{ URL::to('books/' . $book->book_id) }}">Edit book</a>
			{!! Form::open(['url' => 'books/'. $book->book_id]) !!}
				{!! Form::hidden('_method', 'DELETE') !!}
				<div>
				  	{!! Form::submit('Delete book', ['class' => 'btn btn-danger']) !!}
				</div>
			{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>	
	</div>
</div>
<br />
<a class="btn btn-success" href="/books/create">Add new book</a>
<a class="btn btn-warning" href="/authors">Authors</a>
<a class="btn btn-info" href="/genres">Genres</a>
@stop