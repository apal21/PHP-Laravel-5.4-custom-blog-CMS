@extends('main')

@section('title', ' | Login')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			{!! Form::open() !!}
				{{ Form::label('email', 'Email :') }}
				{{ Form::email('email', null, ['class' => 'form-control']) }}
				
				{{ Form::label('password', 'Password :') }}
				{{ Form::password('password', ['class' => 'form-control']) }}

				<br>
				{{ Form::checkbox('Remember') }}{{ Form::label('remember', '&nbsp;Remember Me') }}

				<p><a href="{{ url('password/reset') }}">Forgot Password</a></p>

				{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}

			{!! Form::close() !!}	
		</div>
	</div>

@endsection