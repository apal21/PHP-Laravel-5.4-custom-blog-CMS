@extends('main')

@section('title', ' | Post')

@section('content')

	<div class="row">
		<div class="container">
			<h1>{{ $post->title }}</h1>
		</div>

			<hr>
		<div class="col-md-8">
			<div class="lead">{!! $post->body !!}</div>
			<div>
				@foreach($post->tags as $tag)
					<span class="label label-primary">{{ $tag->name }}</span>
				@endforeach
			</div>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Category:</dt>
					<dd><p>{{ $post->category->name }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Author:</dt>
					<dd>{{ $post->author }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y' , strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated At:</dt>
					<dd>{{ date('M j, Y' , strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkroute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete' ]) !!}

						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-12">
						{!! Html::linkroute('posts.show', 'All Posts', null, array('class' => 'btn btn-default btn-block')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection