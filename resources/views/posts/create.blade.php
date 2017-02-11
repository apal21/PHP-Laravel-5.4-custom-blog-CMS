@extends('main')

@section('title', ' | New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}
	<!-- This looks stupid(js in stylesheets) but this is the best way -->
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  	
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins: 'code,preview,link,autolink,lists,spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template'
  		});
  	</script>
	

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			<hr>

			{!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true]) !!}
			    
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
				<select class="select2-multiple form-control" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>

				{{ Form::label('featured_image', 'Upload Featured Image:') }}
				{{ Form::file('featured_image') }}

				{{ Form::label('body', 'Body :') }}
				{{ Form::textarea('body', null, ['class' => 'form-control input-lg']) }}

				{{ Form::submit('Create New Post', array('class' => 'btn btn-success btn-lg btn-block form-spacing-top')) }}

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