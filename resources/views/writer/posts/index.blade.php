@extends('layouts.app')

@section('content')
    <h1>Your Posts</h1>
    <a href="{{ route('writer.posts.create') }}" class="btn btn-primary">Create New Post</a>
    <hr>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->caption }}</p>
            <hr>
        </div>
    @endforeach
@endsection
