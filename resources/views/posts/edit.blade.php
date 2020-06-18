@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
    <h1>
        <!-- ブラウザなら↓も効く -->
        <a href="{{ url('/') }}" class="header-menu">Back</a>
        <!--<a href="/" class="header-menu">Back</a>-->
        Edit Post
    </h1>
    <form method="post" action="{{ url('/posts', $post->id) }}">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
            @error('title')
            <span class="error">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
            @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
            @endif
            @error('body')
            <span class="error">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <input type="submit" name="submit" value="Update">
        </p>
    </form>
@endsection
