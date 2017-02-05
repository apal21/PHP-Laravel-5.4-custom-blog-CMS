@extends('main')

    @section('stylesheets')

    @endsection

    @section('title', ' | Contact')

    @section('content')
        <div class="row">
            <div class="col-md-8">
                <h1>Contact Me</h1>

                <hr>
                
                <form method="post" action="{{ url('contact') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea name="subject" placeholder="Subject" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" value="Send Message" class="btn btn-success">
                    </div>
                </form>
            </div>

            <div class="col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
            </div>
        </div>
    @endsection

    @section('scripts')

    @endsection