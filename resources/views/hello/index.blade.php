@extends('layouts.helloapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ    
@endsection

@section('content')
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <p>入力に問題があります。再入力して下さい。</p>
    @endif
    <form action="/hello" method="post">
    <table>
        {{-- @csrf --}}
        @if ($errors->has('msg'))
            <tr><th>ERROR</th>
            <td>{{ $errors->first('msg') }}</td></tr>
        @endif
        <tr><th>Message:</th><td><input type="text" name="msg" value="{{ old('msg') }}"></td></tr>
        {{--
        @error('name')
            <tr><th>ERROR</th>
            <td>{{ $message }}</td></tr>
        @enderror
        <tr><th>name:</th><td><input type="text" name="name" value="{{ old('name') }}"></td></tr>
        @error('mail')
            <tr><th>ERROR</th>
            <td>{{ $message }}</td></tr>
        @enderror
        <tr><th>mail:</th><td><input type="text" name="mail" value="{{ old('mail') }}"></td></tr>
        @error('age')
            <tr><th>ERROR</th>
            <td>{{ $message }}</td></tr>
        @enderror
        <tr><th>age:</th><td><input type="text" name="age" value="{{ old('age') }}"></td></tr>
        --}}
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
    {{--
    <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>

    <table>
        @foreach($data as $item)
        <tr><th>{{ $item['name'] }}</th><td>{{ $item['mail'] }}</td></tr>
        @endforeach
    </table>
    <p>Controller value<br>'message' = {{ $message }}</p>
    <p>ViewComposer value<br>'view_message' = {{ $view_message }}</p>
    
    @component('components.message')
        @slot('msg_title')
        CAUTION!
        @endslot
        
        @slot('msg_content')
        これはメッセージの表示です。
        @endslot
    @endcomponent

    @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。'])
    --}}
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection