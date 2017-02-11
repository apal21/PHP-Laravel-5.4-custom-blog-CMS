@extends('main')

<?php
	$titleTag = htmlspecialchars($post->title);
?>

@section('title', " | $titleTag")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if($post->image != null)
			<img src="{{ asset('images/'.$post->image) }}" class="featured-image img-responsive">
			@endif
			<h1>{{ $post->title }}</h1>
			<hr>
			<div class="lead">{!! $post->body !!}</div>
			<div>
				<span class="glyphicon glyphicon-tags"></span>
				@foreach($post->tags as $tag)
				<span class="label label-primary">{{ $tag->name }}</span>
				@endforeach
			</div>
			<p>{{ $post->author }} | {{ $post->category->name }}</p>
			<h5>Published : {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if($post->comments->count() > 0)
			<p class="lead">
				<strong>{{ $post->comments->count() }}</strong>
				<span class="glyphicon glyphicon-comment"></span> 
				@if($post->comments->count() == 1 )
					Comment
				@else
					Comments
				@endif
					on this post</p>
				<hr>
			@endif
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($post->comments as $comment)
				<div class="comment lead well">

					<img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="author-image">
					<div class="author-name">
						<strong>{{ $comment->name }}</strong> Says:
						<p class="comment-font"><small>{{ date('M j, Y', strtotime($comment->created_at)) }}</small></p>
					</div>
					<div class="comment-content">{{ $comment->comment }}</div>
				</div>
				<hr>
			@endforeach
		</div>
	</div>				

	<div class="row form-spacing-top">
		<div id="comment-form" class="col-md-8 col-md-offset-2">
			<div class="lead">Add Comment</div>
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'post']) }}
				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name :") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-6">
						{{ Form::label('email', "Email :") }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>
					<div class="col-md-12 form-spacing-top">
						{{ Form::label('comment', "Comment :") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
					</div>
					<div class="col-md-12">
						{{ Form::submit('Post Comment', ['class' => 'btn btn-success btn-block form-spacing-top']) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
	</div>				

@endsection