@extends('main')

  @section('stylesheets')

  @endsection

  @section('title', ' | Home')

  @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1>Hello World</h1>
                    <p>Laravel 5.4 
                    <br>Description</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">

              @foreach($posts as $post)

              <div class="post">
                <h2>{{ $post->title }}</h2>
                <div class="lead">{!! substr(strip_tags($post->body), 0, 150) !!} {{ strlen(strip_tags($post->body)) > 150 ? "..." : "" }}</div>
                <div>
                  @foreach($post->tags as $tag)
                    <span class="label label-danger">{{ $tag->name }}</span>
                  @endforeach
                </div>
                <p>{{ $post->author }} | {{ $post->category->name }}</p>
                <p>{{ date('M j, Y', strtotime($post->created_at)) }}</p>
                <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary btn-md">Read More</a>
              </div>
              <hr>

              @endforeach

            </div>

            <div class="col-md-3 col-md-offset-1 well">
              <h2>Recent Posts</h2>
              
              @foreach($recents as $recent)
                <p><span class="glyphicon glyphicon-paperclip"></span> <a href="{{ url('blog/'.$recent->slug) }}" class="nolink">{{ $recent->title }}</a></p>
              @endforeach
            </div>
        </div>

        <div class="text-center">
          {!! $posts->links(); !!}
        </div>
  @endsection

  @section('scripts')

  @endsection