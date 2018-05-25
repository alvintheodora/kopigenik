@extends('layouts.app')

@section('title','Blog')

@section('content')
	<!--body-->
	<div class="container-fluid">
		<h1 class="text-center">{{$post->title}}</h1>
		<p class="small text-center">{{$post->created_at}}</p>

		<p id="contentText">{!!$post->content!!}</p>
	

		
	</div>
@endsection