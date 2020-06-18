@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
    @parent
    詳細ページ    
@endsection

@section('content')
    @if ($items != null)
    @foreach ($items as $item)
    {{--
    <table width="400px">
        <tr>
            <th width="50px">id:</th><td width="50px">{{ $item->id }}</td>
            <th width="50px">name:</th><td width="50px">{{ $item->name }}</td>
        </tr>
    --}}
    <table>
        @csrf
        <tr><th>id:</th><td>{{ $item->id }}</td></tr>
        <tr><th>name:</th><td>{{ $item->name }}</td></tr>
        <tr><th>mail:</th><td>{{ $item->mail }}</td></tr>
        <tr><th>age:</th><td>{{ $item->age }}</td></tr>
    </table>
    @endforeach
    @endif
    {{--
    <table>
        @csrf
        <tr><th>id:</th><td>{{ $item->id }}</td></tr>
        <tr><th>name:</th><td>{{ $item->name }}</td></tr>
        <tr><th>mail:</th><td>{{ $item->mail }}</td></tr>
        <tr><th>age:</th><td>{{ $item->age }}</td></tr>
    </table>    
    </form>
    --}}
@endsection

@section('footer')
copyright 2020 tuyano.
@endsection