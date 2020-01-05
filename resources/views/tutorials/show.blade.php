<h1>show product</h1>

<div>
	<h2>{{$tutorial->title}}</h2>
	<h3>{{$tutorial->description}}</h3>
	<p>
		<a href="/tutorials/{{$tutorial->id}}/edit">edit</a>
	</p>
	<div>
		@foreach ($tutorial->tasks as $task)
			<form method="post" action="/tasks/{{$task->id}}">
				@method('patch')
				@csrf
				<label>
					
					<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
					{{$task->description}}
				</label>
			</form>
		@endforeach
	</div>
	<div>
		<h2>New task</h2>
		<form method="post" action="/tutorials/{{$tutorial->id}}/tasks/">
			@csrf
			<input type="text" name="description">
			<button type="submit">Add task</button>
		</form>

	</div>




</div>