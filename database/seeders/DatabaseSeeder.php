<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(10)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(10)->create();

        foreach($posts as $post){
            $tagIds = $tags->random(6)->pluck('id');
            $post->tags()->attach($tagIds);
        }
    }
}
