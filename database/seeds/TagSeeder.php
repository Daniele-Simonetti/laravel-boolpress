<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'animals',
            'kitchen',
            'technology',
            'mindfulness',
            'desing',
            'food',
            'boolean'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag, '-');
            $newTag->save();
        }
    }
}
