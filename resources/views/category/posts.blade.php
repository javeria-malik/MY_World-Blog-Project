<!-- resources/views/category/posts.blade.php -->

@extends('homepage') <!-- Replace with your layout if it's different -->

@section('content')
    <h1>Posts in Category: {{ $category->name }}</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
