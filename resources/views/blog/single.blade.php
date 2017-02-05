@extends('main')

@section('title', " | $post->title")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->title }}</h1>
			<hr>
			<div class="lead">{!! $post->body !!}</div>
			<div>
				@foreach($post->tags as $tag)
				<span class="label label-primary">{{ $tag->name }}</span>
				@endforeach
			</div>
			<p>{{ $post->author }} | {{ $post->category->name }}</p>
			<h5>Published : {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
		</div>
	</div>

@endsection