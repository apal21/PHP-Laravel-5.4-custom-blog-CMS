@extends('main')

@section('title', ' | All Blogs')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class="btn btn-lg btn-lg btn-primary btn-h1-spacing">Create New Blog</a>
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
					
			@foreach ($posts as $post)
			<div class="col-md-9">
				<div>
					<h2>{{ $post->title }}</h2>
				</div>
				<div class="lead">
					{!! substr(strip_tags($post->body), 0, 150) !!} {{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}
				</div>
				<div>
					@foreach($post->tags as $tag)
						<span class="label label-primary">{{ $tag->name }}</span>
					@endforeach
				</div>
				<div>
					<p>{{ $post->author }} | {{ $post->category->name }}</p>
				</div>
				<div>
					{{ date('M j, Y' , strtotime($post->created_at))}}
				</div>
			</div>
			<div class="col-md-3 btn-h1-spacing">
				<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-block btn">View</a><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-block">Edit</a>
			</div>
			<div class="col-md-12">
				<hr>
			</div>

			@endforeach
		</div>

		<div class="text-center">
			{!! $posts->links(); !!}
		</div>
	</div>

@endsection