@extends('layouts.main')
@section('page content')
    <h1>Запись #{{$post->id}}</h1>
    <div>
        <div>title: {{$post->title}}</div>
        <div>description: {{$post->description}}</div>
        <div>likes: {{$post->likes}}</div>
        <div>image: {{$post->image}}</div>
        <div>category: {{$post->category}}</div>
        <div>tags: {{$post->tags}}</div>
        <div>is_published: {{$post->is_published}}</div>
    </div>
    <div>
        <div>
            <a href="{{route('post.edit', $post->id)}}">edit</a>
        </div>
        <div>
            <form action="{{route('post.delete', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <button>delete</button>
            </form>
        </div>
    </div>
@endsection
