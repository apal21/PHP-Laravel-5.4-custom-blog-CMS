@extends('main')

@section('title', ' | Tags')

@section('content')

    <div class="row">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td><a href="{{ route('tags.show', $tag->id) }}" class="nolink">{{ $tag->name }}</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-3 col-md-offset-1">
			<div class="well">
				{{ Form::open(['route' => 'tags.store']) }}
				<h2>New Tag</h2>

				{{ Form::label('name', 'Name :') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}

				{{ Form::submit('Add Tag', ['class' => 'btn btn-success btn-block login-spacing-top']) }}
			</div>
		</div>
	</div>

@endsection