<h1 class="title"> edit projects </h1>


<form method="post" action="/tutorials/{{$tutorial->id}}">
	{{ method_field('patch') }}
	{{ csrf_field() }}

	<div>
		<input type="text" name="title" placeholder="title" value="{{$tutorial->title}}">
	</div>
	<div>
		<textarea name="description"  >{{$tutorial->description}}</textarea>
	</div>	
	<div>
		<button type="submit"> update project</button>

	</div>
</form>

<form method="post" action="/tutorials/{{$tutorial->id}}">
	{{ method_field('delete') }}
	{{ csrf_field() }}
			<button > delete project</button>
</form>