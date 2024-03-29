<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use App\Model\Post;
use App\Model\Category;
use App\User;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $imagesRand = [
            'uploads/test.jpg',
            'uploads/test2.jpg',
            'uploads/test3.jpg',
            'uploads/test4.jpg',
            'uploads/test5.jpg',
        ];

        for ($i = 0; $i < 30; $i++) {
            $newPost = new Post();
            $newPost->title = $faker->sentence(3, true);
            $newPost->content = $faker->paragraphs(5, true);
            $newPost->slug = Str::slug($newPost->title . '-');
            $newPost->user_id = User::inRandomOrder()->first()->id;
            $newPost->category_id = Category::inRandomOrder()->first()->id;
            $newPost->image = $imagesRand[rand(0, 4)];
            $newPost->save();
        }
    }
}
