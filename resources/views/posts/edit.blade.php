@extends('main')

@section('title', ' | Edit Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	<script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
  	
  	<script>
  		tinymce.init({
  			selector:'textarea',
  			plugins: 'code,preview,link,autolink,lists,spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template'
  		});
  	</script>
@endsection

@section('content')

	<div class="container">
		<div class="row">
			<h1>Edit</h1>
		</div>
	</div>

	<hr>

	<div class="row">

		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
		<div class="col-md-8">

			{{ Form::label('title', 'Title :') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug(URL) :') }}
			{{ Form::text('slug', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('category_id', 'Category :') }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('tags', 'Tags :') }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control input-lg select2-multiple', 'multiple' => 'multiple']) }}

			{{ Form::label('featured_image', 'Update Featured Image:') }}
			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Body :') }}
			{{ Form::textarea('body', null, ['class' => 'form-control input-lg']) }}

		</div>

		<div class="col-md-4">
			<div class="well">
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
						{!! Html::linkroute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save', ['class' => 'btn btn-success btn-block']) }}
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
		{!! Form::close() !!}

	</div>

@endsection

@section('scripts')

	{!! Html::script('js/select2.full.min.js') !!}
	<script type="text/javascript">
		$(".select2-multiple").select2();
		$(".select2-multiple").select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger('change');
	</script>

@endsection