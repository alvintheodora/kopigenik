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
					<textarea class="form-control" name="content" placeholder="Content" rows="12"></textarea>

					<button type="submit" class="btn btn-lg btn-success btn-block">Publish</button>

				</form>
			</div>
		</div>
		

		

		
	</div>

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
@endsection