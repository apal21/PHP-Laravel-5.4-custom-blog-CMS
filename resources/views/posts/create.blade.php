@extends('main')

@section('title', ' | New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
			    
				{{ Form::label('title', 'Title :') }}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '256')) }}			

				{{ Form::label('slug', 'Slug(URL) :') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '100')) }}

				{{ Form::label('category_id', 'Category :') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>

				{{ Form::label('tags', 'Tags :') }}
				<select class="form-control select2-multiple" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ Form::label('body', 'Body :') }}
				{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

				{{ Form::submit('Create New Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px;')) }}

			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.full.min.js') !!}
	<script type="text/javascript">
		$(".select2-multiple").select2();
	</script>

@endsection