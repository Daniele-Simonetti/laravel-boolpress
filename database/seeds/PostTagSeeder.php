<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;
use App\Model\Post;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $tags = Tag::inRandomOrder()->limit(3)->get();
            $post->tags()->attach($tags);
        }
    }
}
