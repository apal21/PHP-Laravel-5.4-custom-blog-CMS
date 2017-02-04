@extends('main')

  @section('stylesheets')

  @endsection

  @section('title', ' | Home')

  @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Hello World</h1>
                    <p>Testing... My Cusom Blog CMS. 
                    <br>Built with laravel</p>
                    <p><a href="#" class="btn btn-primary btn-lg">Popular Post</a></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

              @foreach($posts as $post)

              <div class="post">
                <h2>{{ $post->title }}</h2>
                <div class="lead">{!! substr($post->body, 0, 150) !!} {{ strlen($post->body) > 150 ? "..." : "" }}</div>
                <p>{{ $post->author }} | {{ $post->category->name }}</p>
                <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary btn-md">Read More</a>
              </div>
              <hr>

              @endforeach

            </div>

            <div class="col-md-3 col-md-offset-1">
              <h2>Sidebar</h2>
            </div>
        </div>

        <div class="text-center">
          {!! $posts->links(); !!}
        </div>
  @endsection

  @section('scripts')

  @endsection