@extends('main')

@section('title', ' | Forgot Password')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    
                    {{ Form::open(['url' => 'password/reset', 'method' => 'post']) }}

                        {{ Form::hidden('token', $token) }}

                        {{ Form::label('email', 'Email :') }}
                        {{ Form::email('email', $email, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'New Password :') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}

                        {{ Form::label('password_confirmation', 'Confirm Password :') }}
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                        {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
                
@endsection
