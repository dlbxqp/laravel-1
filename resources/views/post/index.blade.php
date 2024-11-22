@extends('layouts.main')
@section('page content')
    <h1>Все записи:</h1>
    @foreach($aPosts as $post)
    <a href="{{route('post.show', $post->id)}}">
        <div>{{$post->id}}</div>
        <div>{{$post->title}}</div>
        <div>{{$post->likes}}</div>
    </a>
    <hr>
    @endforeach

    {{$aPosts->links()}}

    <div>
        <div>
            <a href="{{route('post.create')}}">create</a>
        </div>
    </div>
@endsection
