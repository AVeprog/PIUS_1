<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(100)->create();    

        foreach($posts as $post)
        {
            $tagsId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
