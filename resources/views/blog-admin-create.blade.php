@extends('layouts.app')

@section('title','Create Blog')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<form action="/blog-admin/create-post" method="POST">
					{{csrf_field()}}
					<h1>Add New Post</h1>
					<input class="form-control" type="text" name="title" placeholder="Title">

					<h2>Content</h2>
					<textarea class="form-control" name="contentText" placeholder="Content" rows="12"></textarea>
					<textarea class="form-control" name="content" id="content"></textarea>

					<button type="button" class="btn btn-lg btn-warning" onclick="parseTextArea()">Parse</button>
					<button type="submit" class="btn btn-lg btn-success btn-block">Publish</button>

				</form>
			</div>
		</div>
		

		

		
	</div>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
	var simplemde = new SimpleMDE();

	function parseTextArea(){
		var parsed = simplemde.markdown(simplemde.value());
		$('#content').text(parsed);
	}
</script>
@endsection