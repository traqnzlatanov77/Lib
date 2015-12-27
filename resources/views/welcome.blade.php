@extends('layouts.default')
@section('content')
<!-- TODO: have to be seen only after login -->
<!-- <h1 >Hello, logged user!</h1>
<a href="books">These are your books.</a> -->
<a class="btn btn-primary" href="/user/create">Register</a>
<a class="btn btn-success" href="/auth/login">Login</a>
@stop