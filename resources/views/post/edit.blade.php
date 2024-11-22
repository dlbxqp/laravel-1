@extends('layouts.main')
@section('page content')
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @method('patch')
        @csrf
        <div>
            <label for="title">title</label>
            <input name="title" id="title" value="{{$post->title}}">

            @error('title')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="description">description</label>
            <textarea name="description" id="description">{{$post->description}}</textarea>

            @error('description')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="likes">likes</label>
            <input type="number" min="1" max="10" name="likes" id="likes" value="{{$post->likes}}">

            @error('likes')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="image">image</label>
            <input name="image" id="image" value="{{$post->image}}">

            @error('image')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="category">categories</label>
            <select name="category_id" id="category">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category->id ? ' selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>

            @error('category')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="tags">tags</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{$tag->id === $postTag->id ? ' selected' : ''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>

            @error('tags')
            <p class="error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button>Update</button>
        </div>
    </form>
@endsection
