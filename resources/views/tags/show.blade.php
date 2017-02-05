@extends('main')

@section('title', " | $tag->name Tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }}
                @if ($tag->posts()->count() == 1)
                    Post
                @else Posts
                @endif
            </small></h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-block pull-right form-spacing-top">Edit</a>
        </div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block form-spacing-top'])}}
            {{ Form::close() }}
        </div>
    </div>

    <div>
        <div class="col-md-12">
            <table class="table lead">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                            <span class="label label-danger">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm btn-block pull-right">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection