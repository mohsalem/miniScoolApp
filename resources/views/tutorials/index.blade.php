<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h1>tutorials</h1>
@foreach ($tutorials as $tutorial)
<ul>
	<a href="/tutorials/{{$tutorial->id}}">
		{{$tutorial->title}}
	</a>


</ul>


@endforeach

</body>
</html>
