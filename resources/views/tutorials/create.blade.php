<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'laracasts')</title>
</head>
<body>

<h1>Create form</h1>

<form method="post" action="/tutorials">
	{{ csrf_field() }}
	<div>
		<input type="text" name="title" placeholder="title">
	</div>
	<div>
		<textarea name="description" placeholder="tutorial descripition"></textarea>
	</div>	
	<div>
		<button type="submit"> create project</button>
	</div>

	<div>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>


</form>

</body>
</html>
