<?php
namespace App\Http\Controllers;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function show(Post $post){
        //$post = Post::findOrFail($id); //значение в скобках выше подразумевает эту строку, делая её излишней

        return view('post.show', compact('post'));
    }
/*
    public function create($num = 10){
        $post = Post::orderBy('id', 'desc')->first();

        !isset($post) && ($post['id'] = 0);

        $j = $post['id'] + $num;
        for($i = ($post['id'] + 1); $i < $j; $i++){
            $out = [
                'title' => "title {$i}",
                'description' => "content {$i}",
                'image' => "image_{$i}.jpg",
                'is_published' => 1
            ];
            Post::create($out);
        }

        dump($out);
        //redirect('/posts');
    }
*/
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }
    public function store(StoreRequest $request){
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        //$post = Post::findOrFail($id); //значение в скобках выше подразумевает эту строку, делая её излишней
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }
    public function update(UpdateRequest $request, Post $post){
        //$post = Post::findOrFail($id); //значение в скобках выше подразумевает эту строку, делая её излишней
        $data = $request->validated();

        $this->service->update($data, $post);

        return redirect()->route('post.show', $post);
    }

    public function destroy(Post $post){
/*
        //$post = Post::findOrFail($id); //значение в скобках выше подразумевает эту строку, делая её излишней
        if( isset($post) ){
            $post->delete(); //softDelete, чтобы восстановить - restore()
        }

        dump($post->id . ' deleted');
*/
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function index(FilterRequest $request){
/*
        $post = Post::find(1);
        $category = Category::find(1);
        $tag = Tag::find(1);

        dump($post->category);
        dump($category->posts);
        dump($post->tags);
        dump($tag->posts);
*/
        $data = $request->validated();
        $query = Post::query();
/*
        if(isset($data['category_id'])){
            $query->where('category_id', $data['category_id']);
        }
        if(isset($data['title'])){
            $query->where('title', 'like', "%{$data['title']}%");
        }
        if(isset($data['description'])){
            $query->where('description', 'like', "%$data['description']%");
        }
*/

        $aPosts = $query->get();

        $aPosts = Post::paginate(3);
        return view('post.index', compact('aPosts'));
    }
}
