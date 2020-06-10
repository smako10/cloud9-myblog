@extends('layouts.default')

{{--
@section('title')
Blog Posts
@endsection
--}}

@section('title', 'Blog Posts')

@section('content')
    <h1>Blog Posts</h1>
    <ul>
        @forelse ($posts as $post)
        <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
        <!--<li><a href="{{ url('/posts', $post->id) }}">{{ $post->title }}</a></li>-->
        <!-- Implicit Binding での書き方(ブラウザに表示してでないと機能しない) -->
        <!-- controller渡し↓でないと↑は機能しないっぽい -->
        <li><a href="{{ action('PostsController@show', $post) }}">{{ $post->title }}</a></li>
        @empty
        <li>No posts yet</li>
        @endforelse
    </ul>
@endsection
