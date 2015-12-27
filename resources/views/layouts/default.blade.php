<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <!-- <link rel="stylesheet" href="{{URL::asset('assets/bootstrap.css')}}" type="text/css" charset="utf-8"/> -->
        {!! HTML::style('css/bootstrap.css') !!}
    </head>
    	<header>
    		<h1>This is the header</h1>
    	</header>
    	<hr />
		<div>
		  @yield('content')
		</div>
		<hr />
		<footer>
			<h3>This is the footer</h3>
		</footer>
    </body>
</html>