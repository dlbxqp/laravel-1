@extends('layouts.main')
@section('page content')


<form action="{{ route('post.store') }}" method="post">
    @csrf
    <div>
        <label for="title">title</label>
        <input name="title" id="title" value="{{old('title')}}">

        @error('title')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="description">description</label>
        <textarea name="description" id="description">{{old('description')}}</textarea>

        @error('description')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="likes">likes</label>
        <input type="number" min="1" max="10" name="likes" id="likes" value="{{old('likes')}}">

        @error('likes')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="image">image</label>
        <input name="image" id="image" value="{{old('image')}}">

        @error('image')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <label for="category">categories</label>
        <select name="category_id" id="category">
            @foreach($categories as $category)
                <option
                    {{(old('category_id') == $category->id) ? ' selected' : ''}}
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
                    {{(old('tags') == $tag->id) ? ' selected' : ''}}
                    value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>

        @error('tags')
        <p class="error">{{$message}}</p>
        @enderror
    </div>
    <div>
        <button>Create</button>
    </div>
</form>

@endsection
