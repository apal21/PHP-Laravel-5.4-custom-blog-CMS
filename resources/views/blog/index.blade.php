@extends('main')

@section('title', ' | Blog')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<h1>Blog</h1>
		</div>
	</div>
	
	<hr>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			@foreach($posts as $post)

			<h2>{{ $post->title }}</h2>
			<div class="lead"> {!! substr(strip_tags($post->body), 0, 150) !!} {{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }} </div>
			<div>
				@foreach($post->tags as $tag)
				<span class="label label-danger">{{ $tag->name }}</span>
				@endforeach
			</div>
			<p>{{ $post->author }} | {{ $post->category->name }}</p>
			<h5>Published : {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
			<a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary btn-md">Read More</a>
			<hr>

			@endforeach
		</div>

		<div class="col-md-12">

			<div class="text-center">
	    	    {!! $posts->links(); !!}
		    </div>

	    </div>

	</div>

@endsection